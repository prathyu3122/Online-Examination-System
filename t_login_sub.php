<?php
include("security.php");
include("class/users.php");

$login = new users;
extract($_POST);
if($login->t_login($u,$p))
{
	$_SESSION['username'] = $u;
	$login->url("teacher.php");
}
else
{
	$login->url("teacher.php");

	//$login->url("t_loginpage.php?run=failed");
}
?>