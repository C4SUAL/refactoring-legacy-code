# Refactoring Legacy Code

This is a demo of a basic shop, built using the [Slim Framework](https://www.amazon.co.uk/Working-Effectively-Legacy-Michael-Feathers/dp/0131177052).

Currently there are a number of issues with the code which I will attempt to refactor out based on the principles of Clean Architecture. 

However, refactoring can't be started until we have a test harness in place which we'll use to verify the functionality remains unaffected and no bugs are introduced during the refactoring process. I will attempt to apply the refactoring techniques outlined in the book "[Working with Legacy Code](https://www.amazon.co.uk/Working-Effectively-Legacy-Michael-Feathers/dp/0131177052)" by Michael C. Feathers. His definition of "legacy code" is simply code that has no unit tests in place.

For unit tests I'm going to use a library called [Peridot](http://peridot-php.github.io/), a modern PHP testing framework and it's accompanying assertion library, [Leo](http://peridot-php.github.io/leo/).

## Rules

If this code was in production, we would want to be very careful about making any changes which may break regression. However sometimes it may be impossible, or at least impractical, to put code into a test harness without making some changes to make the code test-friendly. For example, tightly coupled dependencies or deeply nested dependencies can be difficult to test. We start by breaking these dependencies in order to get the code under test.
  
**The rules are:**
  
  1. Test first - always write tests for the current feature before making any changes to the subject under test. 
  2. Never write or change a test AND refactor in the same commit, always keep the two activities separate. The workflow should be: write a test - commit the test - refactor code - commit code when test passes. 
  3. Tests do not have to pass in order for a commit to be made - I'm deliberately breaking the usual rule of not committing code with failing tests in order to clearly separate the testing work from any changes to the source code that are required to get the code under test.
  3. If it's impossible to put tests in due to a dependency, make the smallest change possible to break the dependency and get the test in place. Sometimes this may not be required when the code is already test-friendly. Martin outlines many rules on what constitutes 'the smallest change' of which Preserve Signatures and Extract Interface are probably two of the safest and most important. 
  4. Once the tests pass, you have the code successfully under test, and you are in a much safer place to make larger refactoring changes. 
  5. Refactor the code to introduce your new feature. Primarily I want to break dependencies in tightly-coupled code to make future tests much easier to write.
   
 I'm not intending to add any new features to the code, but the golden rule of refactoring is that you should never be adding new features and refactoring at the same time. Only ever one activity or the other. Otherwise, if the code breaks, you don't know whether it's due to the new feature or the refactor.  

#### Changelog
1. Test for Cart::addProduct() in place.

#### TODO
1. Put full test harness in place
