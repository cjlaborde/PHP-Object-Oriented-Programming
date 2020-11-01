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


### Interfaces
1. OOP is less about syntax and more about good design
2. We going to introduce interfaces abstract class.
3. Understanding interfaces actual classes can be confusing at first.
4. Interfaces probably more complicated to understand
5. Lets create a DatabaseTaskStorage class
6. It can contain methods like get to retreive tasks from database
7. then a method to store a task and take a task in
8. We can go ahead and use this class anywhere in our application to store
```php
class DatabaseTaskStorage
{
    public function get($id)
    {
        // mysql implementation

    }

    public function store(Task $task)
    {
        // mysql implementation

    }
}
```
9. and you might not see immediately see a problem with this.
10. But by using this class what we are actually doing is tying ourself down
11. To an exact implementation
12. What happens if we want to move to storing tasks to another database type.
13. Or we want to store tasks between files or session or cookies
14. Now what we want to do when we creating tasks
15. Especially this task storage class
16. Is think how this would look from any implementation
17. The idea here is implement specific implementation that have generic contrast
18. For the kind of methods you want to see specifically the task store.
19. Now lets go create our inferface and see how it looks and use it
20. Before I think of creating my specific DatabaseTaskStorage class
21. I want to think about my Interface, we call it TaskStorageInterface
22. Notice we not calling it DatabaseTaskStorageInterface
23. since all we are doing here is that this is going to be a generic contract that define out the methods
24. That we want to see for any kind of database
25. We would do this before we even begin to create our class
26. Then we add what kind of method we would like to see
27. This help you design your application before you start writing any classes
28. Notice that we are not defining the block {} since this is not an actual implementation

```php
// We refer to this as interfece for a contract
interface TaskStorageInterface
{
    public function get($id);
    public function store(Task $task);
}

// We refer to this as a concrete implementation
class DatabaseTaskStorage
{
    public function get($id)
    {
        // mysql implementation

    }

    public function store(Task $task)
    {
        // mysql implementation

    }
}
```
29. All this is saying is that when you implement an interface you have to define the methods we give in the Interface or it will give an error

```php
class Task
{
}

interface TaskStorageInterface
{
    public function get($id);
    public function store(Task $task);
}

class MySqlDatabaseTaskStorage implements TaskStorageInterface
{
    public function get($id)
    {
        // mysql implementation

    }

    public function store(Task $task)
    {
        // mysql implementation

    }
}

$storage = new MySqlDatabaseTaskStorage;
//  Class MySqlDatabaseTaskStorage contains 2 abstract methods and must therefore be declared 
// abstract or implement the remaining methods (TaskStorageInterface::get, TaskStorageInterface::store)
```
30. Because we have not implemented 2 methods that we find in our interface
31. So we remove comment from get() and store() and it will work again
32. What is the point of using interface if it works without it
33. What happens when you want to switch from mysql to storing these within a file?
34. You would use get and store throught your application
35. So you need to know when you create new class to handle class storage
36. What we don't want to do is updating this class
37. We don't want to change this MySqlDatabaseTaskStorage at all
38. This is one of the SOLID principals
39. The class should be open for extension and close from modifications
40. We don't want to modify this at all
41. Therefore what we do is implement a new implementation
```php
class Task
{
}

interface TaskStorageInterface
{
    public function get($id);
    public function store(Task $task);
}

class FileTaskStorage implements TaskStorageInterface
{
    public function get($id)
    {
        // mysql implementation

    }

    public function store(Task $task)
    {
        // mysql implementation

    }
}

class MySqlDatabaseTaskStorage implements TaskStorageInterface
{
    public function get($id)
    {
        // mysql implementation

    }

    public function store(Task $task)
    {
        // mysql implementation

    }
}

$storage = new FileTaskStorage;
//  Class MySqlDatabaseTaskStorage contains 2 abstract methods and must therefore be declared 
// abstract or implement the remaining methods (TaskStorageInterface::get, TaskStorageInterface::store)
```
42. Now we can switch to file by changing `$storage = new FileTaskStorage;`
43. This will work through our application since we know we will use our store and get method
44. Think of this from the point of the developer
45. All we need to do is switch out a class and we are done
46. Is the developer point of view we want to think about we don't want to break things when we swith to a new type of story
47. The main question you want to ask yourself will this implementation change when you are building a class.
48. If so you want to implement a interface
49. Create the methods you have seen as part of that implementation
50. Then you can go ahead and build your concrete implementation
51. You can create any of the methods you need and no need to just create the methods added to interface as we do here with `private function buildQuery()`
```php
interface TaskStorageInterface
{
    public function get($id);
    public function store(Task $task);
}

class FileTaskStorage implements TaskStorageInterface
{
    public function get($id)
    {
        // file implementation

    }

    public function store(Task $task)
    {
        // file implementation

    }
}

class MySqlDatabaseTaskStorage implements TaskStorageInterface
{
    public function get($id)
    {
        // mysql implementation

    }

    public function store(Task $task)
    {
        // mysql implementation

    }

    private function buildQuery()
    {
    }
}

$storage = new MySqlDatabaseTaskStorage;
```
### Abstract methods
1. Abstract classes similar to interfaces in 1 way.
2. We will discuss how they are similar and different to interfeces
3. Lets say we building social media authentication class
4. With a Service to be able to authenticate
```php

class Service
{
    // 
}

class FacebookService extends Service
{
    // 
}

$facebook = new FacebookService;
$facebook->getRedirectUri();
```
5. What we would never do is
```php
$facebook = new Service;
$facebook->getRedirectUri();
```
6. There is no point in intiatiating the server
7. We want to make it so Service class can't be intiatiated.
```php
class Service
{
    // 
}

class FacebookService extends Service
{
    // 
}

$service = new Service;
```
8. We can now and it will not show error, but that should not happen
9.  To resolve this we need to add abstract to Service class
```php
class Service
{
    // 
}

class FacebookService extends Service
{
    // 
}

$service = new Service; //  Uncaught Error: Cannot instantiate abstract class Service in
```
10. Not useful to us but again thinking in terms of the developer that will use this class.
11. You want them to know they should create FacebookService instead
12. We have more benefit to an abstract class method

#### How Abstract classes can be similar to interfeces
1. We can do a similar thing by calling something called abstract method
2. This will mean any child class we create, will have to implement the abstract method defined in the base class.
3. `$facebook->getRedirectUri();` What this will do is generate the specific service uri that we redirect to the user to say yes I accept
```php
abstract class Service
{
    // 
}

class FacebookService extends Service
{
    public function getRedirectUri()
    {
        return 'uri';
    }
}

$facebook = new FacebookService;
$facebook->getRedirectUri();
```
4. You can easily add more services with extends Service
```php
abstract class Service
{
    // 
}

class FacebookService extends Service
{
    public function getRedirectUri()
    {
        return 'uri';
    }
}

class TwitterService extends Service
{
    public function getRedirectUri()
    {
        return 'uri';
    }
}
```
5. We might extend Service again but not include the getRedirectUri() method
6. These are all concrete implementations that we expect to have the same functionality
7. How ever we donn't in this case that is why we get error message

```php
abstract class Service
{
    // 
}

class FacebookService extends Service
{
    public function getRedirectUri()
    {
        return 'uri';
    }
}

class TwitterService extends Service
{
    public function getRedirectUri()
    {
        return 'uri';
    }
}
class GoogleService extends Service
{
    //
}

$google = new GoogleService;
echo $google->getRedirectUri(); // Fatal error: Uncaught Error: Call to undefined method GoogleService::getRedirectUri() 
```
8. How do we enforce this without using interface?
9. Sometimes is better to not use interfaces.
10. There is nothing wrong with using interface.
11. `class FacebookService extends Service implements SocialServiceInterface`
12. We could do that ^ but is a lot cleaner and a lot easier to now create an abstract method.
13. Lets implement an abstract method just as we did before we don't give it a block {}
```php
abstract class Service
{
    
    abstract function getRedirectUri();
}
```
14. We can also set visiblity `abstract public function getRedirectUri();`
15. Now when we try to intiantiate google service we get error
```php
abstract class Service
{
    // oauth method


    abstract public function getRedirectUri();
}

class GoogleService extends Service
{
    //
}

// Fatal error: Class GoogleService contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (Service::getRedirectUri) 
```
16. Now when someone tries to extend the service class now they see they need to create the getRedirectUri(); for it to work.
17. Now it works correctly.
```php
abstract class Service
{
    // oauth method


    abstract public function getRedirectUri();
}

class GoogleService extends Service
{
    public function getRedirectUri()
    {
        return 'uri'; // uri
    }
}
```
18. This will usually appear when you working with other people code.
19. The main thing is spend sometime yourself thinking about the side of your code and how is going to be used.
20. Thinking by a developer point of view makes a lot of sense.
21. Is about building solid clean code that we can't easily mess up.

### Typehinting
1. Typehinting makes it easier to create clean and easier to read code
2. As well protect against problems later down the line
3. Typehinting is checking a type of a variable or object before the code in your method is run.
4. Simple example, if you were expecting an array to be past into a method maybe you are itterating over it.
5. Lets say you have a Calculator class
6. and you want to implement methods like add and substract
7. You want multiple integers or floats to be pass into these methods
8. To start with we would have some kind of $total property
9. Then an add() method with array of values then do a foreach to update total
10. then we have total method that just grabs the total
11. then initiate it to use it new Calculator;
```php

class Caculator
{
    protected $total = 0;

    public function add($values)
    {
        foreach ($values as $value) {
            $this->total += $value;
        }
    }

    public function total()
    {
        return $this->total;
    }
}

$calculator = new Caculator;
$calculator->add([2, 4, 6]); // 12

echo $calculator->total();
```
12. How do they know if they can't see the class what they are passing in here
13. Lets pass 2 and see what happens `$calculator->add(2);`
14. We get error
15. That is caused by the foreach
```php

class Caculator
{
    protected $total = 0;

    public function add($values)
    {
        foreach ($values as $value) {
            $this->total += $value;
        }
    }

    public function total()
    {
        return $this->total;
    }
}

$calculator = new Caculator;
// $calculator->add([2, 4, 6]); // 12
$calculator->add(2); //  Warning: Invalid argument supplied for foreach()

echo $calculator->total();
```
14. This is not good enough
15. We should be saying who ever using this
16. You need to pass an array here because the function requires iterating through values
17. How can we do this? We could create if statement
```php
class Caculator
{
    protected $total = 0;

    public function add($values)
    {
        if (!is_array($values)) {
            return; // or show error here
        };

        foreach ($values as $value) {
            $this->total += $value;
        }
    }

    public function total()
    {
        return $this->total;
    }
}

$calculator = new Caculator;
$calculator->add(2); // 0

echo $calculator->total();
```
18. Now it works, but is this really useful?
19. The developer using this how they think they going to get this to work?
20. They may try to add it multiple times and still not know what is going on.
```php
$calculator->add(2); // 0
$calculator->add(2); // 0
$calculator->add(2); // 0
```
21. So lets get rid of the if statement and use tpyehinting
#### Using Typehinting
1. Before the value `add(array $values)` you want to pass into any method we type in the type
```php

class Caculator
{
    protected $total = 0;

    public function add(array $values)
    {
        foreach ($values as $value) {
            $this->total += $value;
        }
    }

    public function total()
    {
        return $this->total;
    }
}

$calculator = new Caculator;

$calculator->add(2); // TypeError: Argument 1 passed to Caculator::add() must be of the type array, int given
```
2. Now the other developer will know it requires an array of values and they can fix it
3. That is the benefit of typehinting
4. You can also use int.
5. Now you have cleaner method method the need of an if statement to show the other programmer the error
6. We can typehint classes and interfaces too which is great.

#### Shopping cart example
1. Here we create a Cart class with Item class
```php
class Item
{
    protected $cost = 0;


    public function setCost(float $cost)
    {
        $this->cost = $cost;
    }

    public function getCost()
    {
        return $this->cost;
    }
}
 
class Cart
{
    protected $items = [];

    public function add($item)
    {
        $this->items[] = $item;
    }

    public function total()
    {
        return 0;
    }
}

$item1 = new Item;
$item1->setCost(5);

$item2 = new Item;
$item2->setCost(20.50);

$cart = new Cart;

$cart->add($item1);
$cart->add($item2);

var_dump($cart);

/*
object(Cart)[4]
  protected 'items' => 
    array (size=2)
      0 => 
        object(Item)[2]
          protected 'cost' => float 5
      1 => 
        object(Item)[3]
          protected 'cost' => float 20.5
*/

```
2. Set the total method
```php

class Cart
{
    protected $items = [];

    public function add($item)
    {
        $this->items[] = $item;
    }

    public function total()
    {
        // return 0;
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->getCost();
        }

        return $total;
    }
}

$item1 = new Item;
$item1->setCost(5);

$item2 = new Item;
$item2->setCost(20.50);

$cart = new Cart;

$cart->add($item1);
$cart->add($item1);

// var_dump($cart);

echo $cart->total(); // 25.5
```

3. What happens then if we pass anything on our cart
4. The point here is when we get the total we getting the getCost() method
5. That is important because not every object in our application is going to have a getCost method
6. What we could here is pass the cart $cart = new Cart; into $cart->add($cart);
7. What would happen is that we would get error.
8. Can't find getCost since it doesn't exist in Cart but does in Item class.
```php
$cart->add($cart);
// Fatal error: Uncaught Error: Call to undefined method Cart::getCost() 
```
9. The point here is how do we use type hinting
10. We do it at the point were we add items to our cart.

#### Type Hinting by model name function add(Item $item)
1. We add typehinting to add function
```php
    public function add(Item $item)
    {
        $this->items[] = $item;
    }
```
2. A developer looking at this methods knows exactly what needs to be passed in
3. Type makes your code more redeable
```php
class Item
{
    protected $cost = 0;


    public function setCost(float $cost)
    {
        $this->cost = $cost;
    }

    public function getCost()
    {
        return $this->cost;
    }
}

class Cart
{
    protected $items = [];

    // public function add($item)
    public function add(Item $item)
    {
        $this->items[] = $item;
    }

    public function total()
    {
        // return 0;
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->getCost();
        }

        return $total; // 25.5
    }
}

$item1 = new Item;
$item1->setCost(5);

$item2 = new Item;
$item2->setCost(20.50);

$cart = new Cart;

$cart->add($item1);

// : Uncaught TypeError: Argument 1 passed to Cart::add() must be an instance of Item, instance of Cart given
```
4. It makes a lot more sense now and is more readable
5. What we trying to do here is bullet proof our code and make sure is completely clear what it does.
6. Also in greatly improve readability

#### type hinting interfaces
1. Lets say we have interface for our items
```php
interface ItemInterface
{
    public function setCost(float $cost);
    public function getCost();
}

class Item implements ItemInterface
{
```
2. What we can do now is change Item to ItemInterface
```php

interface ItemInterface
{
    public function setCost(float $cost);
    public function getCost();
}

class Item implements ItemInterface
{
    protected $cost = 0;


    public function setCost(float $cost)
    {
        $this->cost = $cost;
    }

    public function getCost()
    {
        return $this->cost;
    }
}

class Cart
{
    protected $items = [];
    # What we can do is change Item to ItemInterface
    # We do this since we know when we implement interface it has to have that particular method
    # it assume that it will have the getCost method
    # If you are passing something into a method
    # That potentially have different concrete implementation
    # always type by the interface and not by the implementation
    public function add(ItemInterface $item)
    {
        $this->items[] = $item;
    }

    public function total()
    {
        // return 0;
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->getCost();
        }

        return $total; // 25.5
    }
}

$item1 = new Item;
$item1->setCost(5);

$item2 = new Item;
$item2->setCost(20.50);

$cart = new Cart;

$cart->add($item1);

$cart->add($item2);

echo $cart->total();
```
3. In this case would not be as useful
4. but when you see this ` add(ItemInterface $item)`
5. It means we are expecting some kind of item to be pass in that has an specific method
6. Since we know interface is define top say that the concrete implementation must have that method
7. You will come into contact with this often when you working with other people code or when you building projects
8. Personally typehint everything, I can just to make it clear what should be accepted into a method
9. It also give us as you seen protection knowing what is inside of that object.
10. What kind of method we call on it
11. Just tidy up and bullet proof our code

### Static properties and methods
1. If you used OOP you probably came across static methods and static properties.
2. Here is an example of a static property we are accessing.
```php
User::$username;
```
3. We come accross of a static Method
```php
User::create()
```
4. You have seen these in frameworks like laravel.
5. We will talk about what these actually are
6. Before we have started is very important to say.
7. That you should stay away from using static unless you have a very good reason to and makes things more convenient.
8. Static methods and static properties have the potential to create really difficult code to work with.
9. Also is very difficult to test.
10. Lets look at static methods and properties and see how we interact with them.
11. First important to realize what static property actually is
#### Static Property
1. To create static method add keyword static in front
```php
class User
{
    protected static $username;
}
```
2. Here is an example using static property
```php
class User
{
    public static $username;
}

$user = new User;

$user::$username = 'john';

echo $user::$username; // john
```
2. What is the point of doing this?
3. What exactly is static property?
4. Lets create new User to see what it does.
5. The whole point here is that $username doesn't belong to the user class or user object
6. Is just a global variable floating around
7. This is the kind of problem we get when we start using static
```php
class User
{
    public static $username;
}

$user1 = new User;
$user1::$username = 'john';

$user2 = new User;
$user2::$username = 'joe';

echo $user2::$username; // joe
echo $user1::$username; // joe
```
8. Why would we use a static property/method?
9. If you have a very simple one use functionality that would benefit from using a static method then this makes sense.

#### Validation example using static
1. Lets say we using validation for your application.
2. All this is doing is taking what is in the form via $request
3. Then checking if username is there
4. As well check if email is there and is a valid email address
```php
$validator->validate($request, [
    'username' => 'required',
    'email' => 'required|email',
]);
```
5. Maybe this is on a controller
6. This will be in your code
7. Lets say you want to extract your rules away to a new file
8. To make it easier to update
9. As well make them easier to share when you want to validate elsewhere
10. Where you can use them for login or registration
```php
$validator->validate($request, [
    'username' => 'required',
    'email' => 'required|email',
    'password' => 'required',
]);
```
11. These the validation rule for signup
12. We often call these SignUpForm
13. This would be perfect place to use static
14. Now we have the ability to create SignUpForm without creating a new intance
15. Now if we wanted to use this validation somewhere else in our application
16. We update in one place and both validator below will pick up these roles changes
17. Here is where you would use static since it just makes sense
```php

class SignUpForm
{
    public static $rules = [
        'username' => 'required',
        'email'    => 'required|email',
        'password' => 'required|min:5'
    ];
    // YUSMG1GSMCGD25QM
}

$validator->validate($request, SignUpForm::$rules);

// Admin 
$validator->validate($request, SignUpForm::$rules);
```
18. There more examples where you might use static but as you come accross these in real world you will be able to understand where exactly they are.

#### Static method vs Facades in Laravel
1. Might confuse you when you start working with framework like Laravel
2. Now essentially within laravel
3. User would be our model 
4. create() method would create a record in the database with these details
5. We have spoken at how how we should not use static
6. Laravel calls User:: facade
7. What happening here behing the scene is that we not calling a static method
8. What we are doing is calling user model or user class already been instantiated
9. We are hiding the methods it has behind the static
10. For the sole purpose of mekind it easier to develop
```php
$user = new User;

User::create([
    'username' => 'alex',
    'email' => 'alex@codecourse.com',
]);
```
11. Both of these are exactly the same
```php
# Both are the same
$user = new User;
$user->username = 'alex';
$user->email = 'alex@codecourse.com';
$user->save(); // save in the db

# Both are the same
# hidden behind a static
# is not actually a static method that we are calling
# is calling this which is calling an instantiated version of above ^
User::create([
    'username' => 'alex',
    'email' => 'alex@codecourse.com',
]);
```
12. Is called Facace and you will see it as well when you are calling a route
13. and you are running something when you hit that particular url
```php
Route::get('/', function () {
});
```
14. Just be safe and don't use static unless you find a really good reason to use it.

### Traits
1. We saw earlier in the part about inheritance when we looked at the model example
2. That we can share functionality between 2 subclasses when we extend a parent class
3. If we have method on the parent class
4. This is not always a reason to use parent class
5. Remember that extended classes can be abused
6. You often seen parent classes been abused just for the sake of sharing methods
7. That often is not a good idea.
8. What is our other option?
9. Of course we want to keep our code nice, clean and reusable.
10. To get around this we use traits
11. traits are simply a way to share methods with classes
12. These are highly reusable and very simple to pull them into another class
13. traits can be abused too
14. We will look into a way where we can include these in so they make sense
15. Here is an example of using a traits
16. Lets say we want to include a functionaliryt in both User and Admin class so we can use a trait for this
```php
trait Authenticatable
{
    // Here we type methods
}

class User
{
    # To use traits
    use Authenticatable;
}
// Then wen we initiate User we will have access to Authenticatable methods

class Admin
{
}
```
#### Using Trait real life example
1. what happens if we have another class that extend from base model
2. For example Admin class
```php

interface AuthenticatableInterface
{
    public function getPassword();
    public function setPassword($password);
}

class User implements AuthenticatableInterface
{
    public function getPassword()
    {
        //
    }

    public function setPassword($password)
    {
        //
    }
}

class Admin implements AuthenticatableInterface
{
    public function getPassword()
    {
        //
    }

    public function setPassword($password)
    {
        //
    }
}

```
3. Hopefully you can see the problem we have here, we are repeating 2 methods setPassword and getPassword
4. Perhaps there another table with same password or column
5. But we are duplication methods this is not a good idea
6. So along comes a trait that allows us to share these 2 methods.
7. Important to know these 2 most do the same thing
8. Must grab same column otherwise, or implementation between 2 classes would break.
9. Lets use a trait to resolve this issue
10. Just create a trait and put the methods that you will resue in it
11. Then inside the classes when you want to access the traits you just use `use Authenticatable;`
12. As you see this is more cleaner than above example with repetable code
13. You can also have your traits stored in a different file
```php

interface AuthenticatableInterface
{
    public function getPassword();
    public function setPassword($password);
}

trait Authenticatable
{
    public function getPassword()
    {
        //
    }

    public function setPassword($password)
    {
        //
    }
}

class User implements AuthenticatableInterface
{
    use Authenticatable;
}

class Admin implements AuthenticatableInterface
{
    use Authenticatable;
}
```

#### How Laravel use traits
1. In the App/User we are calling a trait use illuminate\Foundation\Auth\User as Authenticable;
2. You will notice that some methods use Multiple traits this is to keep code even more organized and clean

#### In our last example we use traits within traits
1. This can be useful but can get a little more complicated
2. Here we will create an example
```php

trait HelloWorld
{
    public function sayHelloWorld()
    {
        return 'Hello world';
    }
}

class Greeting
{
    use HelloWorld;

    public function output()
    {
        return $this->sayHelloWorld();
    }
}

$greeting = new Greeting;
echo $greeting->output(); // Hello world
```
3. Now what would happen if in our application we need to output Hello or World on their on?
4. What we can do is create another trait for this
5. Here you can see how we can break our application into pieces to smoothly put it together when we need to.
6. Now we can use either Hello or World on their own.
```php
trait Hello
{
    public function sayHello()
    {
        return 'Hello';
    }
}

trait World
{
    public function sayWorld()
    {
        return 'world';
    }
}


trait HelloWorld
{
    # how we use multiple traits
    use Hello, World;
    public function sayHelloWorld()
    {
        return $this->sayHello() . ' ' . $this->sayWorld();
    }
}

class Greeting
{
    use HelloWorld;

    public function output()
    {
        return $this->sayHelloWorld();
    }
}

$greeting = new Greeting;
echo $greeting->output();
```
7. You may not see these too often but they are useful as you have seen
8. When you want to DRY your code and reuse basic functionality as we saw in these examples

### Exceptions
1. Exception are a great way to control the flow of what you are building
2. By basically saying wait something has gone wrong within a class
3. This allow you to catch if something go wrong it a block {}
4. and you can change the flow of your application accordingly
5. The reason this is more cleaner is because the alternative is to use if statements and generally make your classes more messy
6. Now we will show example where we might throw an exception in a class
7. Checking using if statement instead of using Exception
8. This is find but we have not allowed to show information of what actually has gone wrong here
9. Something else could happen within here `if (!$gateway->charge('123', 25.00)) `
10. For example the token we pas through may not be right
```php
class PaymentGateway
{
    # payment method token
    # usually when you work with payment providers and user enter their card details
    # The card information will be translated into a token that we can store and
    # used to charge user.
    public function charge($token, $amount)
    {
        $payment = $this->service->charge($token, $amount);

        if (!$payment->success) {
            return false;
        }
    }
}

$gateway = new PaymentGateway;

### Checking using if statement instead of using Exception
if (!$gateway->charge('123', 25.00)) {
    die('Payment failed');
}

```
11. How do we know what have gone wrong here
12. That is where Eceptions come in
13. We can make it as explicit as we like
14. lets look at throwing a basic exception
15. all we do is use trow new Exeption.
16. Exception is a class we can instiantiate
17. <https://www.php.net/manual/en/language.exceptions.php>
18. What is happening is we throwing an exception but is 
19. Uncaught: we have not caught the exception
```php
class PaymentGateway
{
    public function charge($token, $amount)
    {
        if (1) {
            throw new Exception; //Uncaught Exception
        }
    }
}

$gateway = new PaymentGateway;

### Checking using if statement instead of using Exception
if (!$gateway->charge('123', 25.00)) {
    die('Payment failed');
}
```
20. What we can also do is when it throw exception we can pass in a message
```php
        if (1) {
            throw new Exception('Payment failed'); // Fatal error: Uncaught Exception: Payment failed
        }
```
21. How do we catch the Fatal record and control the flow of our application
#### try and catch
1. When you want to do this you create your try catch block
2. Get caught the exception and controlling flow of the application
3. in the catch you can redirect user or flash error message if it fails
```php
$gateway = new PaymentGateway;

try {
    $gateway->charge('123', 25.00);
} catch (Exception $e) {
    // redirect user
    // flash error message
    die('Payment failed'); // Payment failed
}
```
3. What is the difference compared with an if statment?
4. The different is you can write other code in the try block
5. You could charge then when it is a success
6. of course if there was an error you don't want to update their subscription
7. You think because `echo 'Update subscription';` is under `$gateway->charge('123', 25.00);` it would run
8. But if at any point an exception is throw it will stop and not execute next line of code
9. It will immediately jump to the catch block
10. It would kill the page in this case and never update user subscription
```php
$gateway = new PaymentGateway;

try {
    $gateway->charge('123', 25.00);
    // update subscription
    echo 'Update subscription';
} catch (Exception $e) {
    die('Payment failed'); // Payment failed
}
```
8. Its very straight forward
9. For now we been using PHP own exceptions
10. We can make this even more useful by creating our own exceptions

#### Custom Exception
1. First create a class named GatewayPaymentFailedException
2. Notice name is long but very descriptive

```php

# remember this may be in a separate file in a directory where you store all your exceptions
class GatewayPaymentFailedException extends Exception
{
}

class PaymentGateway
{
    public function charge($token, $amount)
    {
        if (1) {
            throw new GatewayPaymentFailedException('Payment failed');
        }
    }
}

$gateway = new PaymentGateway;

try {
    $gateway->charge('123', 25.00);
    echo 'Update subscription';
} catch (GatewayPaymentFailedException $e) {
    die('Payment failed'); 
}
```
3. What we do to catch 2 different Exceptions is to create another catch
4. We are catch both but if we set one if to 1 and other zero in charge method we will only need one of them
```php
class GatewayPaymentFailedException extends Exception
{
    //
}

class InvalidGatewayTokenException extends Exception
{
    //
}

class PaymentGateway
{
    public function charge($token, $amount)
    {

        // Check if token is valid

        if (0) {
            throw new InvalidGatewayTokenException; //  Fatal error: Uncaught Exception: Payment failed
        }

        if (1) {
            throw new GatewayPaymentFailedException; //  Fatal error: Uncaught Exception: Payment failed
        }
    }
}

$gateway = new PaymentGateway;

try {
    $gateway->charge('123', 25.00);
    echo 'Update subscription';
} catch (GatewayPaymentFailedException $e) {
    die('Payment failed');
} catch (InvalidGatewayTokenException $e) {
    die('Invalid token');
}

```
5. Write a specific message to both Exception
6. Now if we see the PHP manual you can see you can set protected property
7. <https://www.php.net/manual/en/language.exceptions.php>
```php
# remember this may be in a separate file in a directory where you store all your exceptions
class GatewayPaymentFailedException extends Exception
{
    protected $message = 'Payment failed';
}

class InvalidGatewayTokenException extends Exception
{
    protected $message = 'Invalid token';
}

class PaymentGateway
{
    public function charge($token, $amount)
    {

        // Check if token is valid

        if (0) {
            throw new InvalidGatewayTokenException; //  Fatal error: Uncaught Exception: Payment failed
        }

        if (1) {
            throw new GatewayPaymentFailedException; //  Fatal error: Uncaught Exception: Payment failed
        }
    }
}

$gateway = new PaymentGateway;

try {
    $gateway->charge('123', 25.00);
    echo 'Update subscription';
} catch (GatewayPaymentFailedException $e) {
    die('Payment failed');
} catch (InvalidGatewayTokenException $e) {
    die('Invalid token');
}
```
8. Use Methods available we going to use getMessage
```php

try {
    $gateway->charge('123', 25.00);
    echo 'Update subscription';
} catch (GatewayPaymentFailedException $e) {
    // die('Payment failed');
    die($e->getMessage());
} catch (InvalidGatewayTokenException $e) {
    // die('Invalid token');
    die($e->getMessage());
}
```
9. If you add too many catch it could get very messy
10. So you will come to a point where you want to catch a general exception then catch a message
11. So what we can do is carch a general gateway
12. PaymentGatewayException will account for the other 2 exceptions that are subclasses of the base Exception
```php
try {
    $gateway->charge('123', 25.00);
    echo 'Update subscription';
} catch (PaymentGatewayException $e) {
    die($e->getMessage());
}
```
#### Using the finally part of try and catch
1. You may no need to use finally
2. What finally does is it will always run whenever try or catch runs
```php
try {
    $gateway->charge('123', 25.00);
    echo 'Update subscription';
} catch (PaymentGatewayException $e) {
    // die($e->getMessage());
} finally {
    die('finally');
}
```
3. This what Exception is
```php
class PaymentGatewayException extends Exception
{
}

# remember this may be in a separate file in a directory where you store all your exceptions
class GatewayPaymentFailedException extends PaymentGatewayException
{
    protected $message = 'Payment failed';
}

class InvalidGatewayTokenException extends PaymentGatewayException
{
    protected $message = 'Invalid token';
}

class PaymentGateway
{
    public function charge($token, $amount)
    {

        // Check if token is valid

        if (0) {
            throw new InvalidGatewayTokenException; //  Fatal error: Uncaught Exception: Payment failed
        }

        if (1) {
            throw new GatewayPaymentFailedException; //  Fatal error: Uncaught Exception: Payment failed
        }
    }
}

$gateway = new PaymentGateway;

try {
    $gateway->charge('123', 25.00);
    echo 'Update subscription';
} catch (PaymentGatewayException $e) {
    // die($e->getMessage());
} finally {
    die('finally');
}
```
4. You should use Exceptions to tidy the code and control the flow of the app.

### Dependency Injection
1. Understanding depency injection is fundamental to writting good code.
2. May take some time to get use to it, but once you do understand it.
3. It may take time to get used to but once you do,It should tie everything together nicely
4. The first thing we need to cover before we look in the concept of depency injection is magic method.
5. We going to look at the construct of magic methods.
#### Magic Methods
1. Magic method start with __ we use them as normal methods within classes
2. The only difference is they do something depending on what we are doing with an object.
3. lets look at an example
4. It looks like normal method except it says __construct
5. The content of the magic method __construct are been run when we instantiate a class
```php
class TwitterManager
{
    public function __construct()
    {
        var_dump('hello');
    }
}

$twitterManager = new TwitterManager; // hello
```
5. When we create new instance, we can also pass arguments that the constructor will pick up.
```php
class TwitterManager
{
    public function __construct($handle)
    {
        // var_dump('hello');
        var_dump($handle); // john9000
    }
}

// $twitterManager = new TwitterManager; // hello
$twitterManager = new TwitterManager('john9000');
```
6. Now what we can actually do is use what we pass to our constructor to the rest of our class
7. So if we have another method in our class and we want to use $handle on it
8. Here is how we do it and now we can use $handle on the other methods
```php
class TwitterManager
{
    protected $handle;

    public function __construct($handle)
    {
        $this->handle = $handle;
    }

    public function getHandle()
    {
        return $this->handle;
    }
}

$twitterManager = new TwitterManager('john9000');

echo $twitterManager->getHandle(); // john9000
```
9. Now we going to look at a more useful example

#### Concept of depency injection
1. This means we can pass other objects that we have already instantiated into a class
2. Know that we discussed that an object can easily be passed around our application
3. We can create another class and instantiate it and then we can pass it to other classes to be used within there.
4. In other words we can inject these into a another class
5. Now because the class will now depend on what we inject
6. We now have dependency injection
7. Lets think about a class and how it may depend on another one
8. So that we can make this very clear
9. What would happen if we got another method that use $handle to output the tweet of the user
10. We may have another class responsable for hitting the twitter api
11. and performing the operation of getting a list of these tweets
12. What we want to do then is use this and inject it into our twitter manager
13. So that we can use it
14. Lets look at how this would look
```php
class TwitterClient
{
    // takes in an handle
    public function getTweets($handle)
    {
        // here we return some fake data
        return [
            'This is a tweet',
            'Another tweet',
        ];
    }
}

# Now our twitter manager depends on our twitter client.
class TwitterManager
{
    protected $client;

    # we can actually use typehinting to make sure what we pass in what we expect
    # We are injecting TwitterClient here
    public function __construct(TwitterClient $client)
    {
        $this->client = $client;
    }

    public function getTweetsByUser($handle)
    {
        # now since we injecting we can use TwitterClient method getTweets
        # what we may do as well here is either sort, format, paginate them or anything else
        # this is why we have 2 separate classes
        return $this->client->getTweets($handle);
    }
}

# bare in mind that this could be external package that you pull down and you might that
# you can use within your own twitter manager and create your own method
# essentially create an adapter or wrapper
$twitterClient = new TwitterClient;

$twitterManager = new TwitterManager($twitterClient);

var_dump($twitterManager->getTweetsByUser('john9000'));
/*
array (size=2)
  0 => string 'This is a tweet' (length=15)
  1 => string 'Another tweet' (length=13)
*/
```
15. Why can't our twitter manager contain all of the code and we have 2 classes instead which would be easier that creating a separate class and injecting this in.
16. The reason we have split this into 2 classes and reason we would normally do this.
17. Is that each have their own responsability
18. This is an important concept with programming in general
19. We have a class that is responsible only for hitting the Twitter api
20. We have a class that is only responsible for doing something with data
21. Grabbing tweets or grabbing a single tweet or created tweet
22. Either way we don't want to be writing lots of code in here
23. A good to test this is look at the content of a method and immediately you should be able to tell what this is actually doing.
24. If you can't then that means your method content is probably too long
25. We can probably pass multiple dependencies into 1 class if we need to.
26. Lets imagine we have some class of paginator class that is responsable for paginator
27. Just breaking this up in small pieces that we can show page by page
28. We might want to paginate on tweets
```php
class TwitterClient
{
    // takes in an handle
    public function getTweets($handle)
    {
        // here we return some fake data
        return [
            'This is a tweet',
            'Another tweet',
        ];
    }
}

class Paginator
{
}

class TwitterManager
{
    protected $paginator;

    // When we grab TwitterClient may as well grab Pagination as wee
    public function __construct(TwitterClient $client, Paginator $paginator)
    {
        $this->client = $client;
        $this->paginator = $paginator;
    }

    public function getTweetsByUser($handle)
    {
        // in here we pass the list of items we are passing as first argument
        // then pass the number of items as second argument
        // Now we are returning a paginated result of the tweets
        // We using the twitter client to pull the results
        return $this->paginator->paginate($this->client->getTweets($handle), 10);
    }
}

$twitterClient = new TwitterClient;

$twitterManager = new TwitterManager($twitterClient);

var_dump($twitterManager->getTweetsByUser('john9000'));
```
29. There are some clever things that some frameworks and packages do
30. For example allow you to automatically inject classes via a controller by providing their classname or interfaces this is call auto wiring

### Method Chaining
1. We have covered the syntax and theory behind object orriented programming.
2. Method chaining comes a lot of frameworks and packages
3. Even if you are not working with a framework or package
4. Using method chaining in your code will make it more fluid
5. Lets look at example how method chaining can improve existing code
6. For example lets say we have search request
7. What we want to search is messy
```php
# what this will be responsable for is building the properties for a search for which will then
# pass to a search service, which will give us back a list of results
$request = new SearchRequest;

# this will be simple class that have setters and getters

# what we want to search
$request->setQuery('oop');
$request->setLimit(100);
$request->setPerPage(10);
```
8. What if we could do something like the following
9. We can actually do this and this is where method chaining comes in
10. This looks a lot nicer
11. you don't to keep repeating request
12. Now we have a request we can past through our search service class
```php
$request->setQuery('oop')->setLimit(100)->setPerPage(10);
```
13. The benefit here is easier to write code
14. again thinking about this from another developer perspective
15. This is one way to pass things through via search service
```php

class SearchRequest
{
    protected $query;

    protected $limit;

    public function setQuery($query)
    {
        $this->query = $query;
    }

    public function setLimit($limit = 100)
    {
        $this->limit = $limit;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function getLimit()
    {
        return $this->limit;
    }
}

class SearchService
{
    # would allow us to search a database or external service
    # this will take in some kind of request
    public function search(SearchRequest $request)
    {
        var_dump($request);
        # we have search request and query limit
        /*
            object(SearchRequest)[3]
                protected 'query' => string 'oop' (length=3)
                protected 'limit' => int 50
        */
    }
}

$service = new SearchService;
$request = new SearchRequest;

$request->setQuery('oop');
$request->setLimit(50);

$service->search($request);
```
16. But what we want to focus on is method chaining.
17. What would happen if we do something like this.
18. You will get error.
19. The reason is we trying to call setLimit on null
20. Means we calling setLimit method on the result of the return value of setQuery
21. So at the moment setQuery doesn't return anything at all
22. Well it does technically return null
23. So we can't call ->setLimit(50)
```php
// Uncaught Error: Call to a member function setLimit() on null
$request->setQuery('oop')->setLimit(50); 
```
24. So how do we chain them together to get access to the protected properties without calling the methods?
25. Remember when we did a var_dump($this) it represent current object you working with
26. so by returning $this from each method
27. You would not have to do this from the getters
28. All we doing is we are going to set it setQuery 
29. add `return $this;` to all the set Methods

```php
    $request->setQuery('oop')->setLimit(50); 

    public function setQuery($query)
    {
        $this->query = $query;

        return $this;
    }

    public function setLimit($limit = 100)
    {
        $this->limit = $limit;

        return $this;
    }

  /*
    object(SearchRequest)[3]
        protected 'query' => string 'oop' (length=3)
        protected 'limit' => int 50
  */
```
28. Now rather than getting error we get that same result
29. Of course this was very basic
30. but there are other uses for method chaining
31. You may see in some framework called packages
32. Here is an example where you subscribe to monthly plan, set token and subscribe
33. This works nicely since is easier to write and read in just 1 line
34. If you find yourself with lots of methods you can organize by the arrows
```php
$user->subscribeTo('monthly')
     ->setToken('123')
     ->subscribe();
```
35. Remember that this can be abused as well
36. But if it makes sense and makes your code a lot more fluid go ahead and use it.










