<?php
session_start();

//require '../database/QueryBuilder.php';
//require 'Auth.php';

//$db = new QueryBuilder; 
//$check = new Auth($db);

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
        <p><a href="register">Зарегистрироваться</a></p>
            <h1>login</h1>
            <form action="/my_project/5/web/login_Controller" method="post">
                <div class="form-group">
                    <p>mail</p>
                    <input type="email" class="form-control" name="email">
                </div>

                <div class="form-group">
                    <p>pass</p>
                    <input type="password" name="password" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
                <div>    
                    <button type="submit"><a href="list">Back</a></button>
                </div>
</div>
</body>
</html>