<?php
include("class/users.php");

session_start();
unset($_SESSION['email']);
session_destroy();
header("Location: admin_login.php");
?>