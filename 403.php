<?php
session_start();

require 'database/QueryBuilder.php';
require 'Components/Auth.php';

$db = new QueryBuilder; 
$check = new Auth($db);

?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div>
    <h3>403 <br> У Вас нет доступа к этой странице</h3>
    <a href="index.php">На главную</a>
</div>
</body>
</html>