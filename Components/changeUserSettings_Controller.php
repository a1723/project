<?php

//require '../database/QueryBuilder.php';
//require 'Auth.php';

//$db = new QueryBuilder;
//$check = new Auth($db);

$data = [
      "id"  =>  $_POST['id'],
      "email"  =>  $_POST['email'],
      "name"  =>  $_POST['name'],
      "is_banned"  =>  $_POST['is_banned'],
      "is_admin"  =>  $_POST['is_admin'],
]; 
$db -> update("users", $data);

$auth->is_admin();
?>