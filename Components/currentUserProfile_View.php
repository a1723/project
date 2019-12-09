<?php

//require '../database/QueryBuilder.php';
//require 'Auth.php';

//$db = new QueryBuilder;
//$check = new Auth($db);

$email = $_SESSION["user"];

$user = $db->getOneByEmail("users", $email);

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
            <h1>User Settings</h1>
            <form action="/my_project/5/web/changeUserSettings_Controller" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" readonly value="<?= $user['id'];?>">
                </div>
                <p>Email</p>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" readonly value="<?= $user['email'];?>">
                </div>
                <p>Name</p>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" value="<?= $user['name'];?>">
                </div>
                <div class="form-group">
                    <input type="hidden" name="is_admin" class="form-control" readonly value="<?= $user['is_admin'];?>">
                </div>
                <div class="form-group">
                    <input type="hidden" name="is_banned" class="form-control" readonly value="<?= $user['is_banned'];?>">
                </div>
                    <button class="btn btn-warning" type="submit">Change</button>
                    <!--<button class="btn btn-danger" type="submit"><a href="../Components/allUsers_View.php">Go Back</a></button> -->

                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
