<?php
extract($_POST);
session_start();
$connection=mysqli_connect("localhost","root","","oes");


if(isset($_POST['reject']))
{
    
    $email = $_POST['rt'];
   
        $query="DELETE FROM t_pending_requests WHERE Email='$email' "; 
        $query_run=mysqli_query($connection,$query);

        if($query_run)
        {
            $_SESSION['success']="Teacher rejected";
            header('Location: pending_request.php');
        }
        else
        {
            $_SESSION['status']="Teacher not rejected";
            header('Location: pending_request.php');
        }
    
    
}
?>