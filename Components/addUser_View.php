<?php

//require '../database/QueryBuilder.php';
//require 'Auth.php';

//$db = new QueryBuilder;
//$check = new Auth($db);
$auth->is_admin();

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
            <h1>User settings</h1>
            <form action="/my_project/5/web/addUser_Controller" method="post">
                <p>Email</p>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" value="">
                </div>
                <p>Password</p>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" value="">
                </div>
                <p>Name</p>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" value="">
                </div>
                <div class="form-group">
                    <button class="btn btn-warning" type="submit">Add</button>
                    <button class="btn btn-danger" type="submit"><a href="../Components/allUsers_View.php">Go Back</a></button>

                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
