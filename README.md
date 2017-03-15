# Slim Shop

This is a demo of a basic shop, written as part of a recruitment test exercise.

Currently there are a number of issues with the code which I will attempt to refactor out based on the principles of Clean Architecture. 

However, refactoring can't be started until we have a test harness in place that we'll use to verify the functionality remains unaffected and no bugs are introduced. I will attempt to apply the refactoring techniques outlined in the book "Working with Legacy Code" by Michael C. Feathers. His definition of "legacy code" is simply code that has no unit tests in place.

For unit tests I'm going to use a library called Peridot, a modern PHP testing framework and it's accompanying assertion library, Leo.

#### Changelog
1. Test for Cart::addProduct() in place.

#### TODO
1. Put full test harness in place
