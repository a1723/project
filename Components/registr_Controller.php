<?php


//use Delight\Auth\Auth as gusev;
//$gusev = new gusev;


//require '../database/QueryBuilder.php';
//require 'Auth.php';

//$db = new QueryBuilder; 

//$registr = new Auth($db);
$email = $_POST['email'];
//$name = $_POST['name'];
$password = $_POST['password'];
//$auth->register($email, $name, $password);

//$au->confirmEmail("R-kYT2ehsdzF8ph1", "kHGZubcLDeixGZOb");

try {
    $userID = $au->register($email, $password, null, function ($selector, $token) {
        //echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
        $urd = \urlencode($selector) . ' ' . \urlencode($token);
        var_dump($urd);
    });

    //echo ('УРА!');
    //echo $selector . $token . $userId;
}
catch (\Delight\Auth\InvalidEmailException $e) {
    die('Invalid email address');
}
catch (\Delight\Auth\InvalidPasswordException $e) {
    die('Invalid password');
}
catch (\Delight\Auth\UserAlreadyExistsException $e) {
    die('User already exists');
}
catch (\Delight\Auth\TooManyRequestsException $e) {
    die('Too many requests');
} 
?>

