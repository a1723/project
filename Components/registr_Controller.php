<?php

//require '../database/QueryBuilder.php';
//require 'Auth.php';

//$db = new QueryBuilder; 

//$registr = new Auth($db);
$email = $_POST['email'];
$name = $_POST['name'];
$password = $_POST['password'];
$auth->register($email, $name, $password);

?>

