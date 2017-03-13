<?php

namespace App;

final class App
{
    public static function startSession()
    {
        if (!session_id()) {
            session_cache_limiter(false);
            session_start();
        }
    }
}
