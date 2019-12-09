<?php

//require '../database/QueryBuilder.php';
//require 'Auth.php';

//$db = new QueryBuilder;
//$check = new Auth($db);

$data = [
      "email"  =>  $_POST['email'],
      "password"  =>  $_POST['password'],
      "name"  =>  $_POST['name'],
]; 

$auth -> register($data["email"], $data["password"], $data["name"]);

header("Location: allUsers"); 
?>