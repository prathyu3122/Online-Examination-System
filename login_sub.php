<?php
include("security.php");
include("class/users.php");

$login = new users;
extract($_POST);
if($login->login($i,$e,$p))
{
	$_SESSION['id'] = $i;
	$login->url("student.php");
}
else
{
	$login->url("st_loginpage.php?run=failed");
}
?>