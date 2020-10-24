### Class methods and properties
1. class methods and properties are part of oop
2. Since when you building a project almost everything represented by a class.
3. classes can be anything
4. if you heard about model and controller before, both of these will be classes.
5. simple example for a class
```php
class User {

}
```
6. We are instantiating a class.
```php
// now we have here an object
$user = new User

```
7. when we create classes and we think about objects.
8. We think of things we can actually do with.
9. With $user object I can pass it to my application and use it as I want.
10. This is where properties and methods come in.
11. So basic function can look like
12. Here we have normal function and normal variable
```php
// function with properties
function createUser($username, $password)
{
    // sql query


}
// create variable to hold different data types
$config = [
    'db' => ''
];
```
13. Within a class we can create variable and functions
14. But instead we call them properties and methods when inside a class.
15. There is difference between plane global variables and properties and global functions.
16. Lets define our first property and do something with it.
17. We get error since is it out of scope.
```php

class User
{
    public $username = 'alex';
}

$user = new User

// this is out of scope and will not work
echo $username; //  Notice: Undefined variable: username 
```
18. Now to be able to access to the property
```php
class User
{
    public $username = 'alex';
}


// instantiating a class
$user = new User;

echo $user->username; // alex
```
19. This only works because the property is public
20. Now we will create a method
```php
class User
{

    public function avatar($size = 60)
    {
        return $size;
    }
}

$user = new User;

echo $user->avatar(); // 60
echo $user->avatar(80); // 80
```
21. Why use this when we can use global variables? 
22. As well here there is a lot more code to write.
23. But there is one benefit, our object is a single thing.
24. This is all the functionality we can add to its contain in is own box.
25. We can pass this object into other objects.
26. Everything inside it will be pass around with it so we can use it.
27. This is main advantage of OOP you work with objects that can be easily pass around.
28. It really cleans up your code.

### var_dump is your friend
1. When you building classes soon enough you will need to debug.
2. If you are working with packages that you are pulling into your project.
3. and you want to see what is available.
4. In this case you just want to var_dump your object.
```php
class User
{
    public $username = 'alex';

    public function fullName()
    {
        return 'Alex Garrett';
    }

    public function avatar($size = 60)
    {
        return $size;
    }
}

$user = new User;
var_dump($user);
/*
object(User)[2]
  public 'username' => string 'alex' (length=4)
*/
```
5. We see here we only see this property
6. We don't see the methods
7. We only seeing the public property
8. To also dump the method
```php
var_dump($user->fullName()); // 'Alex Garrett'
var_dump($user->avatar()); // 60
```
9. When you are stuck with anything go ahead and use var_dump













