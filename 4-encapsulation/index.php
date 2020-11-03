<?php

### Example of validation
class Validator
{
    protected $errors = [];
    public function validate($data, $rules)
    {
        //

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
    die('Fails'); // Fails
}






/*
class User
{
    // public $email;
    // protected $email;
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
// /*
$user->email = 'ererwerewr';
# when email changed to protected we get error message:
#  Cannot access protected property User::$email in

# if email changed to private we get error message:
# Cannot access private property User::$email in
echo $user->email; // ererwerewr
die();
// */

// $user->setEmail('john@gmail.com');
// echo $user->getEmail(); // john@gmail.com
