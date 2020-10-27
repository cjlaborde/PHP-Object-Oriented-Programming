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

### Encapsulation
1. Encapsulation is a term that makes people run a mile away
2. But this is one term is actually easy to understand
3. We already see how we set properties within classes
4. We see the problem with getters and setters
5. Since we can bypass setters and getter to change properties
6. Encapsulation is just changing the visibilities of your properties
```php
class User
{
    public $email;

    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return;
        }
        $this->email = $email;
    }

    public function getEmail()
    {
        return strtolower($this->email);
    }
}

$user = new User;
$user->email = 'ererwerewr';

echo $user->email; // ererwerewr

die();
```
7. To fix this issue we change `public $email;` to `protected $email;`
```php
class User
{
    // public $email;
    protected $email; // Cannot access protected property User::$email in

    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return;
        }
        $this->email = $email;
    }

    public function getEmail()
    {
        return strtolower($this->email);
    }
}

$user = new User;
$user->email = 'ererwerewr';

echo $user->email; // ererwerewr

die();
$user->setEmail('john@gmail.com');
```
8. We can still set it using classes
```php
class User
{
    // public $email;
    protected $email;

    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return;
        }
        $this->email = $email;
    }

    public function getEmail()
    {
        return strtolower($this->email);
    }
}

$user = new User;

$user->setEmail('john@gmail.com');
echo $user->getEmail(); // john@gmail.com
```
9. Public means property is public accesible.
10. Protected means is only allowed to be set in the class.

#### private
1. Setting the property to private
2. We see the same type of error
```php
class User
{
    private $email;

    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return;
        }
        $this->email = $email;
    }

    public function getEmail()
    {
        return strtolower($this->email);
    }
}

$user = new User;
$user->email = 'ererwerewr';

echo $user->email; // ererwerewr
die();
```
3. The general rule is set properties to private or protected unless you absolutely need these properties to be accessed outside of your class.
4. We don't always need getters and setters, sometimes we just need a property in our class to store something.

#### Class Validation example
1. For example we could have an array of things that would only set internally in the class.
2. What we can do is loop through all the $rules and $data and check them against them.
3. We also might happen a particular validation might fail.
4. Now were would we store all these error messenges.
5. You don't want to set errors outside the class that makes no sense.
6. Instead internally we set there errors.
7. Check that is not empty
8. Essentially after we call the validate method
9. we check if it fails by checking the errors array
10. Since we don't need to access error array all we doing is checking the errors array

```php
class Validator
{
    protected $errors = [];
    public function validate($data, $rules)
    {
        //

        $this->errors[] = 'The email is required.';
    }

    public function fails()
    {
        return !empty($this->errors);
    }

    public function getError()
    {
        return $this->errors;
    }
}

$validator = new Validator;
$validator->validate([''], ['required']);

if ($validator->fails()) {
    die('Fails'); // Fails
}
```
11. Whereas if there was not any error then it passes
```php
class Validator
{
    protected $errors = [];
    public function validate($data, $rules)
    {
        // $this->errors[] = 'The email is required.';
    }

    public function fails()
    {
        return !empty($this->errors);
    }

    public function getError()
    {
        return $this->errors;
    }
}

$validator = new Validator;
$validator->validate([''], ['required']);

if ($validator->fails()) {
    die('Fails'); // 
}
```
12. In this case we don't care about setting errors outselves
13. the getErrors give us more control on how we output the errors


### Inheritance
1. The basic idea of inheritance is that when you create a class.
2. Then you extend that class inheriting the methods and properties of that class
3. Of course this depends on the visibility but we will be discussing this at the end of this part.
4. We will work with example working with Model
5. A model is a way to represent a noun base object within your application
6. For example a User or forum Post
7. Model usually a representation of data we get back from the database
8. To create our base model naming it Model
9. It will be the parent of any other model we want to create
10. So the User model could contain things like username and email and Comment  Model simular information
11. To get this working we extend our base model
12. Both User & Comment are a model that extend the base Model class
```php
class Model
{
}

class User extends Model
{
}

class Comment extends Model
{
}
```
13. Now our base Model can have useful functionality that we want to share with both models without having to duplicate code
14. Lets say our User and Comment models both have created and updated in our database
15. This will just be a column and insert a timestamp for when each of these were created
16. These would typically come from the database when we run a query
```php
class Model
{
}

class User extends Model
{
    public $createdAt = '2016-01-01 12:30:00';
}

class Comment extends Model
{
    public $createdAt = '2016-01-01 12:30:00';
}

$user = new User;
echo $user->createdAt; // 2016-01-01 12:30:00
```
17. What if we want any date from within any model that we created to be transform into a datetime object
18. Date Time is a way to represent a Day and a time and be able to format it increment it and decrement it etc.
19. <https://www.php.net/manual/en/class.datetime.php>
20. What we could to is implement a method of each model and return a new dateTime instance with this date in
21. We would have to do this with any Model that add the function getCreatedAt
22. We see this quickly becomes messy
```php
class Model
{
}

class User extends Model
{
    public $createdAt = '2016-01-01 12:30:00';

    public function getCreatedAt()
    {
        return new DateTime($this->createdAt);
    }
}

class Comment extends Model
{
    public $createdAt = '2016-01-01 12:30:00';
    public function getCreatedAt()
    {
        return new DateTime($this->createdAt);
    }
}

$user = new User;
echo $user->createdAt; // 2016-01-01 12:30:00
```
23. But because we have our base model we can clean this.
24. We Refer to this as // DRY = DON'T REPEAT YOURSELF
```php
class Model
{
    public $createdAt = '2016-01-01 12:30:00';
    public function getCreatedAt()
    {
        return new DateTime($this->createdAt);
    }
}

class User extends Model
{
}

class Comment extends Model
{
}

$user = new User;
echo $user->createdAt; // 2016-01-01 12:30:00

```

#### Another example
1. What we want to happen is that the is for a date time object to come back from the $createdAt value
2. We want to do that in our base Model
3. Because we want to assume any model we create are going to have a similar thing happened
4. First we put a protected property called dates
5. In User I want to identify which dates when I access them to I want them to be transformed
6. Now we need to figure out a way how do we get back a date time class object
7. since at the moment we just get back a string

```php
class Model
{
    protected $dates = [];
}

class User extends Model
{
    protected $dates = ['createdAt'];

    public $createdAt = '2016-01-01 12:30:00'; // '2016-01-01 12:30:00'
}

$user = new User;

var_dump($user->createdAt);

```
8. To do this we will use Magic Method
9. Magic methods are methods that pre exist to do a expecific thing when you do an action with an object.
10. What happens here is that when we try to access a property this __get() will be run
11. Lets test the magic method out
    
```php
class Model
{
    protected $dates = [];

    public function __get($propery)
    {
        var_dump($this->dates);
        die('Works'); // Works
    }
}

class User extends Model
{
    protected $dates = ['createdAt'];

    protected $createdAt = '2016-01-01 12:30:00'; \
}

$user = new User;

var_dump($user->createdAt);

```
12. Now you wonder there is nothing in $dates = [] 
13. What is going to happen is that because of __get() parent class here
14. Is a parent of the User model
15. It will pick up the dates we entered in User  protected $dates = ['createdAt'];
```php
class Model
{
    protected $dates = [];

    public function __get($propery)
    {
        var_dump($this->dates);
        die('Works');
    }
}

class User extends Model
{
    protected $dates = ['createdAt'];

    protected $createdAt = '2016-01-01 12:30:00'; // '2016-01-01 12:30:00'
}

$user = new User;

var_dump($user->createdAt);
/*
array (size=1)
  0 => string 'createdAt' (length=9)
Works
*/
```
16. As you see here we actually get that data value
17. We going to use in_array to check if the property we trying to access is within this date
18. If there is we return new DateTime with that property value
19. and I am putting {$property} to show is not an actual direct property we want to access, is infact a variable
20. Otherwise return property as it is, and do a default of returning the property
21. Now what happens when we access this created update you see we get back an datetime object
22. From this we can format it or use any of the other methods
```php
class Model
{
    protected $dates = [];

    public function __get($propery)
    {
        if (in_array($propery, $this->dates)) {
            return new DateTime($this->{$propery});
        }
        return $this->{$propery};
    }
}

class User extends Model
{
    protected $dates = ['createdAt'];

    protected $createdAt = '2016-01-01 12:30:00'; // '2016-01-01 12:30:00'
}

$user = new User;

var_dump($user->createdAt);

/*
object(DateTime)[3]
  public 'date' => string '2016-01-01 12:30:00.000000' (length=26)
  public 'timezone_type' => int 3
  public 'timezone' => string 'America/Puerto_Rico' (length=19)
  */
var_dump($user->createdAt->format('H:i')); // '12:30' 
```
23.  Allow you to create really powerful classes but keep the base class really clean
24. We can do the same with Comments easily and we get same result
```php
class Comment extends Model
{
    protected $dates = ['createdAt'];

    protected $createdAt = '2016-01-01 12:30:00'; // '2016-01-01 12:30:00'
}

$comment = new Comment;
var_dump($comment->createdAt->format('H:i')); // '12:30'
```
25. Without having to duplicate code
26. When ever you see extend keyword you know this model is a sub class or child class of a parent.
27. If we don't know what is going on all we have to do is hunt down the parent class and see what happening
28. Just know be careful that inheritance can get messy and become unmaintanable code
29. Only create sub class if you think is necessary

#### We look at encapsulation: private
1. public: allow us to modify properties from anywhere
2. protected: only allow us to access and modify this within the class but you can still acess it from subclasses you create
3. private: can only be accessible only within the current class
4. Now if we change $dates to private it will not work anymore
```php

class Model
{
    private $dates = [];

    public function __get($propery)
    {
        if (in_array($propery, $this->dates)) {
            return new DateTime($this->{$propery});
        }
        return $this->{$propery};
    }
}

class Comment extends Model
{
    protected $dates = ['createdAt'];

    protected $createdAt = '2016-01-01 12:30:00'; // '2016-01-01 12:30:00'
}


$user = new User;
// var_dump($user->createdAt);
// var_dump($user->createdAt->format('H:i'));

$comment = new Comment;
var_dump($comment->createdAt->format('H:i')); //  Call to a member function format() on string in
```
5. We use private when we don't want a property be accessible in sub classes.


### Class Files
1. Up till now we been creating and using classes in just 1 file
2. But in real project you not going to create all classes in just 1 file
3. Reason for this is OOP is about good design and structure.
4. Generally what we do is create a new class of every class
5. we create a file for User.php
6. We only add a class once
7. this is convention and we always use Uppercase when naming class
8. Also always give the file name as your class
```php
class User
{
}
```

#### Directory structure
1. Generally we structure classes into directories
2. For example we could have a Model directory and put User.class inside
```php
class User
{
    public $username = 'billy';
}
```
3. Then to be able to use this class we use required
```php 

require 'Models/User.php';

$user = new User;

echo $user->username; // billy
```
4. Now the problem is that we may need to use too many requires
5. So it will become messy when you need to access more than 1 class
6. As well you will need to add new line of code everytime you create a new class
7. To resolve this we use autoloading which we cover in next lesson

### Autoloading PSR4 and Composer
1. We will look in how to work with classes in real life
2. PSR4 is a standard of autoloading class based on namespace
3. Autoload = automatically allow us to load or record without manually having to like in the last part
4. All we need to do with autoloading is create a class and we can use it.
5. First we create file call App where all my application files are stored
6. in App is where I will store all Models, Controllers and classes
7. Then create Models/Task.php
8. Then we create storage to store our classes
9. Then create Storage/DatabaseTaskStorage.php
10. Then create a TaskManager.php that uses the model Task.php we create a dark in Database 
11. <https://www.php-fig.org/psr/psr-4/>
12. A fully qualified class name has the following form:
13.  \<NamespaceName>(\<SubNamespaceNames>)*\<ClassName>
14.  NamespaceName = App
15.  SubNamespaceNames = Models & Storage

#### Composer
1. Composer will handle all of this for you
2. Essentially what it is, a dependency manager
3. Aside of been able to pull other projects into your project
4. We can easily set autoloading with composer
5. `composer init`
6. Create a componser.json
7. Add autoload to composer.json
8. Because we working with json this escape datas so we need another \\ Todo\\
```php
{
    "autoload": {
        "psr-4": {
            "Todo\\": "app"
        }
    },
    "name": "cjlaborde/phpoop",
    "require": {}
}
```
9. composer dump-autoload
10. composer dump-autoload -o this is for optimizing for more files in a more complex project
11. Now to use it on index.php write require 'vendor/autoload.php';
12. Now we loading our classes based on our namespace
13. One thing is missing, remember when we review psr4 auto-loading
14.  We need to make sure we add namespace
15.  Remember app now is represented by Todo
```php
// App == Todo we set it like this in composer.json
namespace Todo\Models;

class Task
{
}
```
16. We do the dame in DatabaseTaskStorage
```php
namespace Todo\Storage;

class DatabaseTaskStorage
{
}
```
17. What happens when is not inside a directory?
18. like TaskManager in this case we just write Todo only
```php

namespace Todo;

class TaskManager
{
}
```

19. In index we try to add new Task but we get error.
```php
require 'vendor/autoload.php';

$task = new Task;
// Fatal error: Uncaught Error: Class 'Task' not found in
```
20. Now since Task doesn't tecnically exist has a namespace instead
21.  What we have to do is
```php
$task = new \Todo\Models\Task;
```
22. We can prove that by doing a var_dump
```php
var_dump($task);
/*
object(Todo\Models\Task)[4]
*/

```
23.  We can use "use" to make it cleaner
```php
use Todo\Models\Task;

require 'vendor/autoload.php';

$task = new Task;
```
24. If you want to call Task something else you can use "as"
```php
use Todo\Models\Task as TaskModel;

require 'vendor/autoload.php';

$task = new TaskModel;
```
25. Why we need to do all of this?
26. Lets say we create a new Model called User.php that can be the user allowed to create Tasks
```php
namespace Todo\Models;

class User
{
}
```
27. Now we don't need to do anything else anymore.
28. We just write the code we need.
29. If we need to pull other Models into here we use "use" to create new instance.
30. Now in index all we need to do is pull `use Todo\Models\User;`
31. Then create new class `$user = new User;`
32. No autoloading anything in, no need to manually do it.
33. and now we have a user model.
```php
use Todo\Models\Task;
use Todo\Models\User;

require 'vendor/autoload.php';

$task = new Task;
$user = new User;

var_dump($user);
/*
object(Todo\Models\Task)[4]
*/
```
34. Is good idea to have this setup for every project.
35. Since this is standard now in modern php development you have to be using composer to create a maintanable project.
36. 