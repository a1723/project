<?php

require '../database/QueryBuilder.php';
require 'Auth.php';

$db = new QueryBuilder; 
$deleteUser = new Auth($db);

// var_dump($_POST['email']);
$email = $_POST['email'];

$deleteUser->deleteUser(users, $email);
echo "пользователь '$email' успешно удалён";
header("refresh: 3; url=allUsers_View.php");


?>