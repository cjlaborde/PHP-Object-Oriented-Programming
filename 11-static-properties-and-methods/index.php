<?php
/*
User::$username; // static property
User::create(); // static method
*/
/*
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
*/

/*
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
*/

$user = new User;
$user->username = 'alex';
$user->email = 'alex@codecourse.com';
$user->save(); // save in the db


User::create([
    'username' => 'alex',
    'email' => 'alex@codecourse.com',
]);



Route::get('/', function () {
});
