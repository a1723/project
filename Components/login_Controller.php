<?php

//require '../database/QueryBuilder.php';
//require 'Auth.php';

//$db = new QueryBuilder;

//$login = new Auth($db);
$email = $_POST['email'];
$password = $_POST['password'];

try {
    $au->login($email, $password);

    echo 'User is logged in';
}
catch (\Delight\Auth\InvalidEmailException $e) {
    die('Wrong email address');
}
catch (\Delight\Auth\InvalidPasswordException $e) {
    die('Wrong password');
}
catch (\Delight\Auth\EmailNotVerifiedException $e) {
    die('Email not verified');
}
catch (\Delight\Auth\TooManyRequestsException $e) {
    die('Too many requests');
}

?>