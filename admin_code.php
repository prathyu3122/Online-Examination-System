<?php
extract($_POST);
session_start();
$connection=mysqli_connect("localhost","root","","oes");
//$_SESSION['email']='email';
//$_SESSION['password']='password';

if(isset($_POST['signup']))
{
    /*extract($_POST);
    $query="insert into t_pending_requests values('$e','$p')";*/
    $email=$_POST['e'];
    $password=$_POST['p'];
   // $cpassword=$_POST['c'];

    /*if($password===$cpassword)
    {*/
        $query="insert into t_pending_requests(Email,Password) values('$e','$p')"; /*add confirmpassword and in values $cpassword*/ 
        $query_run=mysqli_query($connection,$query);

        if($query_run)
        {
            $_SESSION['success']="Teacher Profile Added";
            header('Location: t_loginpage.php');
        }
        else
        {
            $_SESSION['status']="Teacher Profile NOT Added";
            header('Location: t_loginpage.php');
        }
    //}
    /*else
    {
        $_SESSION['status']="Password and Confirm Password Doesn't Match";
        header('Location: t_loginpage.php');
    }*/
    
}
?>