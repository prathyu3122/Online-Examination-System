<?php
extract($_POST);
session_start();
$connection=mysqli_connect("localhost","root","","oes");


if(isset($_POST['add']))
{
    
    $sub=$_POST['slct4'];
   
        $query="insert into category (cat_name) values('$sub')"; 
        $query_run=mysqli_query($connection,$query);

        if($query_run)
        {
            #$_SESSION['status']="Subject Added";
            echo "<script>alert('Subject Successfully Added')</script>";
            header('Location: Subject.php');
        }
        else
        {
            echo "<script>alert('Subject NOT Added')</script>";
            #$_SESSION['status']="Subject NOT Added";
            header('Location: Subject.php');
        }
    
    
}
?>