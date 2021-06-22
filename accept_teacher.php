<?php
extract($_POST);
session_start();
$connection=mysqli_connect("localhost","root","","oes");


if(isset($_POST['accept']))
{

    $email = $_POST['ie'];
    $username = $_POST['iu'];
    $pass = $_POST['ip'];

        
        $query="insert into t_users values('$username','$email','$pass')"; 
        $query_run=mysqli_query($connection,$query);


        $q1 = "delete from t_pending_requests where Email='$email'";
        $qr = mysqli_query($connection,$q1);


        if($query_run)
        {
            $_SESSION['success']="Teacher Accepted";
            #echo "<script>alert('Teacher Accepted')</script>";
            header('Location: pending_request.php');
        }
        else
        {
            $_SESSION['status']="Teacher not Accepted";
            #echo "<script>alert('Teacher not Accepted')</script>";
            header('Location: pending_request.php');
        }
    
    
}
?>