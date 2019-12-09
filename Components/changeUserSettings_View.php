<?php

require '../database/QueryBuilder.php';
require 'Auth.php';

$db = new QueryBuilder;
$check = new Auth($db);


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
            <h1>User Changes</h1>
            <form action="changeUserSettings_Controller.php" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" readonly value="<?= $user['id'];?>">
                </div>
                <p>Email</p>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" value="<?= $user['email'];?>">
                </div>
                <p>Name</p>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" value="<?= $user['name'];?>">
                </div>
                <p>is Banned</p>
                <div class="form-group">
                    <input type="text" name="is_banned" class="form-control" value="<?= $user['is_banned'];?>">
                </div>
                <p>is Admin</p>
                <div class="form-group">
                    <input type="text" name="is_admin" class="form-control" value="<?= $user['is_admin'];?>">
                </div>
                <div class="form-group">
                    <button class="btn btn-warning" type="submit">Change</button>
                    <button class="btn btn-danger" type="submit"><a href="../Components/allUsers_View.php">Go Back</a></button>

                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
