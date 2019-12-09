<?php

//require '../database/QueryBuilder.php';
//require 'Auth.php';

//$db = new QueryBuilder;

//$login = new Auth($db);

$email = $_POST['email'];
$password = $_POST['password'];

$auth->login($email, $password);

?>