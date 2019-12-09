<?php

//require '../database/QueryBuilder.php';
//require 'Auth.php';

//$db = new QueryBuilder; 
//$userStatus = new Auth($db);

// var_dump($_POST['email']);
var_dump($user['id']);
$email = $_POST['email'];

$auth->getUserStatus($email);
// echo "пользователь '$email' успешно забанен";
// header("refresh: 3; url=allUsers_View.php");


?>