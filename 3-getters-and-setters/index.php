<?php

class User
{
    public $email;
    public $username;

    // method allow us to set email
    public function setEmail($email)
    {
        // Check if not valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return;
        }
        // not going to work either since is still within the scope
        // $email = $email;
        // we can fix this with $this
        // var_dump($this);
        /*
            object(User)[2]
            public 'email' => null
        */
        $this->email = $email;
    }

    public function getEmail()
    {
        return strtolower($this->email);
    }
}

$user = new User;

# we setting email directly and bypass the validation we set before
# that we we easy can bypass all the work we have done.
$user->email = 'ererewrewDEFEFR';
echo $user->email; // ererewrewDEFEFR

// $user->setEmail('john@gmail.com');
// echo $user->getEmail(); // john@gmail.com

# invalid we get nothing
// $user->setEmail('johngmail.com');
/*
$user->setEmail('John@Gmail.com');
echo $user->getEmail(); //
*/
# we can check this using a var_dump
// var_dump($user);
/*
object(User)[2]
  public 'email' => null
*/


/*
echo $user->email; // john@gmail.com
echo $user->getEmail(); // john@gmail.com
*/

// var_dump($user);
/*
object(User)[2]
  public 'email' => string 'john@gmail.com' (length=14)
*/


/*
$user->email = 'alex@codecourse.com';

var_dump($user);
```
object(User)[2]
  public 'email' => string 'alex@codecourse.com' (length=19)
```

// var_dump($user->email); // 'alex@codecourse.com'
*/
