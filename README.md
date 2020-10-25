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

### Getters and setters
1. OOP is much more than just syntax
2. We will follow a concept here that follows good practice.
3. We see we can set method and properties to our clases
4. But how do we set properties and access them once they are set.
5. How do we set and get properties?
6. We will not set value to $email property
7. Instead we will instantiate the class and set the property.
```php
class User
{
    public $email;
}

$user = new User;

$user->email = 'alex@codecourse.com';

var_dump($user);
/*


*/

var_dump($user->email); // 'alex@codecourse.com'
```
8. This is fine and nothing wrong with it.
9. But leave your class open to modifications that may cause unexpected results.
10. When you writting code, lets say a class.
11. Think how it works in terms of the developer who is going to be using it
12. Essentially the goal is to create classes that are simple to use and are not Easily use in the wrong way.
13. Write code that is easy to read, makes sense and works.
14. Does setting and accessing a property like this makes sense?
15. `$user->email = 'alex@codecourse.com';`
16. Set sometimes we want to protect when we setting and getting values back
17. That is were setters and getters come in
18. They help create a nice and easy readable way to use a class.

#### Create setter method
1. We will create a method that allow us to set and get inside the User class
2. setEmail
3. $this represents the current object we working with
```php

class User
{
    public $email;

    // method allow us to set email
    public function setEmail($email)
    {
        // not going to work either since is still within the scope
        // $email = $email;
        // we can fix this with $this
        var_dump($this);
        /*
            object(User)[2]
            public 'email' => null
        */
        // $this->email = $email;
    }
}
$user = new User;

$user->setEmail('john@gmail.com');
```
4. Now we see is working correctly.

```php
class User
{
    public $email;

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        //
    }
}

$user = new User;

$user->setEmail('john@gmail.com');

var_dump($user);
/*
object(User)[2]
  public 'email' => string 'john@gmail.com' (length=14)
*/
```
5. Now use getter getEmail to get email
```php
class User
{
    public $email;

    public function getEmail()
    {
        return $this->email;
    }
}

$user = new User;

$user->setEmail('john@gmail.com');
# Both return the same
echo $user->email; // john@gmail.com
echo $user->getEmail(); // john@gmail.com
```
6. What is point of this if we can get email with $user->email?
7. Having public property means we can set this value directly
8. When we setting an email on this class and object
9. We want to check if it a valid email
10. This should be used in validation layer of your application
11. But we will use this as an example to see how this works.
12. Now that we have a method we have ability to do anything we like
13. This can be anything like changing formatting the email or checking if it valid
14. Now what happens when we call this method we check if it a valid email
15. `$user->setEmail('john@gmail.com');`
16. getEmail should give us back this value back if it valid
```php

class User
{
    public $email;

    public function setEmail($email)
    {
        // Check if not valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return;
        }

        $this->email = $email;
    }
}

$user = new User;

// $user->setEmail('john@gmail.com');
// echo $user->getEmail(); // john@gmail.com


# invalid we get nothing
$user->setEmail('johngmail.com');
echo $user->getEmail(); //
# we can check this using a var_dump
var_dump($user);
/*
object(User)[2]
  public 'email' => null
*/
```
17. when you have property and doesn't have value it's value will be set to null.
18. What if we want something to always happen when we getEmail
19. in this case email will be set to lower case
```php
    public function getEmail()
    {
        return strtolower($this->email); // john@gmail.com

    }
    $user->setEmail('John@Gmail.com');
```
20. Lets say is critical we have lowercase and valid email
21. We setting email directly and bypass the validation we set before
22. That we we easy can bypass all the work we have done.
```php
$user->email = 'ererewrewDEFEFR';
echo $user->email; // ererewrewDEFEFR
```
23. To deal with this we will dicuss Encapsulation in next lesson.
