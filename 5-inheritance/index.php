<?php

class Model
{
    protected $dates = [];
    // private $dates = [];
    private $test = 'test';

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


class Comment extends Model
{
    protected $dates = ['createdAt'];

    protected $createdAt = '2016-01-01 12:30:00'; // '2016-01-01 12:30:00'
}


$user = new User;
// var_dump($user->createdAt);
// var_dump($user->createdAt->format('H:i'));

$comment = new Comment;
var_dump($comment->createdAt->format('H:i')); // '12:30'


/*
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
*/
