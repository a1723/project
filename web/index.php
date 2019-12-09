<?php
session_start();

require '../database/QueryBuilder.php';
require '../Components/Auth.php';

$db = new QueryBuilder;
$auth = new Auth($db);

//var_dump ($_SERVER); die;

//ТУТ ИДЕТ РОУТИНГ!



$url = $_SERVER['REQUEST_URI']; //aboutme
if($url == '/my_project/5/web/list') {                   // main
    require '../index.php'; exit;
} elseif($url == '/my_project/5/web/register') {
    require "../Components/registr_View.php"; exit;
}
  elseif($url == '/my_project/5/web/register_Controller') {
  require "../Components/registr_Controller.php"; exit;
}
  elseif($url == '/my_project/5/web/login') {
    require "../Components/login_View.php"; exit;
}
  elseif($url == '/my_project/5/web/login_Controller') {
  require "../Components/login_Controller.php"; exit;
}
  elseif($url == '/my_project/5/web/create') {
  require "../create.php"; exit;
}
  elseif($url == '/my_project/5/web/admin') {          // admin
  require "../index_for_admin_user.php"; exit;
}
  elseif($url == '/my_project/5/web/logout') {          // logout
  require "../Components/logout.php"; exit;
}
  elseif($url == '/my_project/5/web/allUsers') {          // allUsers
  require "../Components/allUsers_View.php"; exit;
}
  elseif($url == '/my_project/5/web/addUser') {          // addUser
  require "../Components/addUser_View.php"; exit;
}
  elseif($url == '/my_project/5/web/addUser_Controller') {
  require "../Components/addUser_Controller.php"; exit;
}
  elseif($url == '/my_project/5/web/changeUserProfile_View') {
  require "../Components/currentUserProfile_View.php"; exit;
}
  elseif($url == '/my_project/5/web/changeUserSettings_Controller') {
  require "../Components/changeUserSettings_Controller.php"; exit;
}
  elseif($url == '/my_project/5/web/auth_user') {
  require "../index_for_auth_user.php"; exit;
}
  
  




echo "404 | ERROR ";
