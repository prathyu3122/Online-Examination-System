<?php
include("security.php");
include("class/users.php");

$login = new users;
extract($_POST);
if($login->a_login($user,$pass))
{
	$_SESSION['username'] = $user;
	$login->url("admin.php");
}
else
{
	//$login->url("admin.php");

	$login->url("admin_login.php?run=failed");
}
?>