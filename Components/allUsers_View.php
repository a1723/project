<?php
session_start();

//require '../database/QueryBuilder.php';
//require 'Auth.php';

//$db = new QueryBuilder; 
//$check = new Auth($db);
$auth->check();
//$auth->is_admin();
$users = $auth->showAllUsers("users");


?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<a href="/my_project/5/web/changeUserProfile_View"><?php echo $_SESSION["user"]?></a> 
<p><a href="/my_project/5/web/logout">Выход</a></p>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>All Users</h1>
            <a href="/my_project/5/web/index.php/addUser" class="btn btn-success">
            Add User
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>email</th>
                        <th>name</th>
                        <th>is_banned</th>
                        <th>is_admin</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach($users as $user):?>
                    <tr>
                        <td><?= $user["id"];?></td>
                        <td><?= $user["email"];?></td>
                        <td><?= $user["name"];?></td>
                        <td><?= $user["is_banned"];?></td>
                        <td><?= $user["is_admin"];?></td>
                        <td>
                            <a href="/my_project/5/web/userStatus?id=<?= $user['id'];?>" class="btn btn-success">
                                User Status
                            </a>
                            <a href="changeUserSettings_View.php?id=<?= $user['id'];?>" class="btn btn-warning">
                                Change
                            </a>
                            <a href="banUser_View.php?id=<?= $user['id'];?>" class="btn btn-danger">
                                Ban
                            </a>
                            <a href="unbanUser_View.php?id=<?= $user['id'];?>" class="btn btn-danger">
                                Unban
                            </a>
                            <a onclick="return confirm('are you sure?');" href="deleteUser_View.php?id=<?= $user['id'];?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>

                </tbody>
            </table>
        </div>
    </div>
                <div>    
                    <button type="submit"><a href="admin">Back</a></button>
                </div>
</div>
</body>
</html>