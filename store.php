<?php

require 'database/QueryBuilder.php';

$db = new QueryBuilder;

/* $data = [
    "title" => $_POST['title'],
    "content" => $_POST['content']
]; */

$db->store("tasks", $_POST);  // можно использовать $data чтобы было понятнее

header("Location: index.php"); exit;
?>