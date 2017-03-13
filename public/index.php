<?php
require '../vendor/autoload.php';

/**
* Keep environment configuration outside of the app and source code
*/
$dotenv = new Dotenv\Dotenv(__DIR__ . '/..');
$dotenv->load();

date_default_timezone_set(getenv('TZ'));

// Prepare app
$app = new \Slim\Slim(array(
    'templates.path' => '../templates',
));

$app->notFound(function () use ($app) {
    $app->render('errors/404.twig');
});

$app->error(function (\Exception $e) use ($app) {
    $app->render('errors/500.twig');
});

// Create monolog logger and store logger in container as singleton
// (Singleton resources retrieve the same log resource definition each time)
$app->container->singleton('log', function () {
    $log = new \Monolog\Logger('slim-skeleton');
    $log->pushHandler(new \Monolog\Handler\StreamHandler('../logs/app.log', \Monolog\Logger::DEBUG));
    return $log;
});

/**
* Set up database connection and resource
* Separate read and write connections for master/slave database setups
* Note: could be improved by making connection 'lazy'
*/
$app->container->singleton('db', function () {
    $dsn = sprintf('mysql:dbname=%s;host=%s',
        getenv('DB_NAME'),
        getenv('DB_HOST')
    );

    try {
        $pdo = new PDO($dsn, getenv('DB_USER'), getenv('DB_PASS'));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db['default_read'] = $pdo;
        $db['default_write'] = $pdo;
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    return $db;
});

/**
* Set up standard view templates using Twig
*/
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath('../templates/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());


// Automatically load router files
$routers = glob('../app/controllers/*.router.php');
foreach ($routers as $router) {
    require $router;
}

// Run app
$app->run();
