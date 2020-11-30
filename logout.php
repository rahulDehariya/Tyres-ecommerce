<?php 
require_once "getdata/data.php";
$myCategory = new Category();

setcookie("user_id", time() - 3600);
setcookie("username", time() - 3600);
setcookie("is_logged_in", time() - 3600);
session_start();

$_SESSION = array();
session_unset();
session_destroy();


header("location:index.php");
?>
