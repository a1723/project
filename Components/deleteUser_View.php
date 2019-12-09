<?php
session_start();

require '../database/QueryBuilder.php';
require 'Auth.php';

$db = new QueryBuilder; 
$check = new Auth($db);

$check->check();
$check->is_admin();

$id = $_GET['id'];
$user = $db->getOne("users", $id);

?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Remove</h1>
            <form action="deleteUser_Controller.php?id=<?= $user['id'];?>" method="post">
                <div class="form-group">
                    <p>E-mail пользователя</p>
                    <input type="email" class="form-control" name="email" readonly value="<?= $user['email'];?>">
                </div>
                <div class="form-group">
                    <button class="btn btn-danger " type="submit" >Удалить</button>
                </div>
            </form>
        </div>
    </div>
                <div>    
                    <button type="submit"><a href="../">Back</a></button>
                </div>
</div>
</body>
</html>