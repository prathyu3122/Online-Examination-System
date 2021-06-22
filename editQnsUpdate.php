<?php
extract($_POST);
session_start();
$connection=mysqli_connect("localhost","root","","oes");

if(isset($_POST['updatedata']))
{
    $id=$_POST['update_id'];
    $question=$_POST['edit_question'];
    $op1=$_POST['edit_option1'];
    $op2=$_POST['edit_option2'];
    $op3=$_POST['edit_option3'];
    $op4=$_POST['edit_option4'];
    $canswer=$_POST['edit_correctanswer'];

    $query="UPDATE questions SET question='$question',ans1='$op1',ans2='$op2',ans3='$op3',ans4='$op4',ans='$canswer' WHERE id='$id'";
    $query_run=mysqli_query($connection,$query);

    if($query_run)
    {
        $_SESSION['success']="Data Updated";
        header('Location: editQuestions.php');
    }
    else
    {
        $_SESSION['success']="Data NOT Updated";
        header('Location: editQuestions.php');
    }
}



if(isset($_POST['deletedata']))
{
    $id=$_POST['delete_id'];
    

    $query="DELETE FROM questions where id='$id'";
    $query_run=mysqli_query($connection,$query);

    if($query_run)
    {
        echo '<script> alert("Question DELETED");</script>';
        header('Location: editQuestions.php');
    }
    else
    {
        echo '<script> alert("Question NOT DELETED");</script>';

    }
}

?>