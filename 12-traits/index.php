<?php

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

// trait HelloWorld
// {
//     public function sayHelloWorld()
//     {
//         return 'Hello world';
//     }
// }

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



/*
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
*/















/*
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
*/