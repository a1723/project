<?php
session_start();

//require 'database/QueryBuilder.php';
//require 'Components/Auth.php';

//$db = new QueryBuilder; 
//$check = new Auth($db);

$tasks = $db->all("tasks");
$auth->check();

?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<a href="/my_project/5/web/changeUserProfile_View"><?php echo $_SESSION["user"]?></a> 
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>All Tasks</h1>
           <p><a href="/my_project/5/web/logout">Выход</a></p>
            <a href="/my_project/5/web/create" class="btn btn-success">Add Task</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach($tasks as $task):?>
                    <tr>
                        <td><?= $task["id"];?></td>
                        <td><?= $task["title"];?></td>
                        <td>
                            <a href="show.php?id=<?= $task['id'];?>" class="btn btn-info">
                                Show
                            </a>
                            <a href="edit.php?id=<?= $task['id'];?>" class="btn btn-warning">
                                Edit
                            </a>
                            <a onclick="return confirm('are you sure?');" href="delete.php?id=<?= $task['id'];?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>

                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>