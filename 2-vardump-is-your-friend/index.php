<?php

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
// var_dump($user);
/*
object(User)[2]
  public 'username' => string 'alex' (length=4)
*/

var_dump($user->fullName()); // 'Alex Garrett'
var_dump($user->avatar()); // 60
