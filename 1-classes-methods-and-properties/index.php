<?php

/*
function createUser($username, $password)
{
    // sql query


}

$config = [
    'db' => ''
];
*/

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


// instantiating a class
$user = new User;

// echo $user->username; // alex
// echo $user->avatar(); // 60
echo $user->avatar(80); // 80

// this is out of scope and will not work
// echo $username;
