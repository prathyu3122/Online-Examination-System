<?php
include("class/users.php");

session_start();
unset($_SESSION['id']);
session_destroy();
header("Location: st_loginpage.php");
?>