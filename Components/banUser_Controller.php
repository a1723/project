<?php

require '../database/QueryBuilder.php';
require 'Auth.php';

$db = new QueryBuilder; 
$banUser = new Auth($db);

// var_dump($_POST['email']);
$email = $_POST['email'];

$banUser->banUser($email);
echo "пользователь '$email' успешно забанен";
header("refresh: 3; url=allUsers_View.php");


?>