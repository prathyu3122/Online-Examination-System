<?php

#session_start();
include("class/users.php");
$register=new users;

$register2=new users;
#extract($_POST);

if(isset($_POST['insert']))
{
  $uname = $_POST['n'];
  $email = $_POST['e'];
  $pass = $_POST['p'];
  $cpass = $_POST['cp'];


$errors = array();

$n = "SELECT username from t_users where username='$uname'";
$nn = $register2->t_dup($n);

if(empty($uname))
  {
    $errors['n'] = "Username is required";
  }
  else if(mysqli_num_rows($nn)>0)
  {
    $errors['n'] = "Username already exists!";

    #$errors['n'] = "<script>alert('Email already exists!')</script>";
  }

$u = "SELECT email from t_users where email='$email'";
$uu = $register2->t_dup($u);

if(empty($email))
  {
    $errors['e'] = "Email is required";
  }
  else if(mysqli_num_rows($uu)>0)
  {
    $errors['e'] = "Email already exists!";

    #$errors['e'] = "<script>alert('Email already exists!')</script>";
  }


  if(empty($pass))
  {
    $errors['p'] = "Password is required";
  }

  if($pass === $cpass)
  {
      if(count($errors)==0)
      {

        $tn = "SELECT username,Email from t_pending_requests where username='$uname' and Email='$email'";
        $tnn = $register2->p_dup($tn);

        if(mysqli_num_rows($tnn)>0)
        {
            echo "<script>alert('Username and Email under pending requests will be accepted soon!')</script>";
        }

        else
        {
          $query="insert into t_pending_requests values('$uname','$email','$pass')";
          if($register->t_signup($query))
          {
            $register->url("t_loginpage.php?run=success");
          }

        }  
      }
  }
  else
  {
     $errors['cp'] = "<script>alert('Password and Confirm Password do not match')</script>";
  }

}

?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Teacher | Login</title>
  
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>


   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel = "icon" href = "css/images/logo-1.jpg" type = "image/x-icon">

      <link rel="stylesheet" href="css/st_loginpage.css">

  
</head>

<body>

  <div>
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="index.php" style="font-weight: bold;">Online Examination System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ml-4" style="font-weight: bold;">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active ml-4" style="font-weight: bold;">
        <a class="nav-link" href="t_loginpage.php">Teacher</a>
      </li>
      <li class="nav-item ml-4" style="font-weight: bold;">
        <a class="nav-link" href="st_loginpage.php">Student</a>
      </li>
      <li class="nav-item ml-4" style="font-weight: bold;">
        <a class="nav-link" href="admin_login.php">Admin</a>
      </li>
    </ul>
  </div>
</nav>
      </div>


  <div class="login-wrap">
  <div class="login-html">
    <h2 style="margin-top: -50px; margin-bottom: 30px; color: #fff; text-align: center;">TEACHER</h2>
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
    <div class="login-form">

      <br>
       <?php
        if (isset($_GET['run']) && $_GET['run']=='failed') {
          echo "<script>alert('Your email or password is wrong.')</script>";
          #echo "Your id or email or password is wrong";
        }
        ?>
        <br>

      <form class="sign-in-htm" action="t_login_sub.php" method="POST" enctype="multipart/form-data">
        <div class="group">
          <label for="user" class="label">Username</label>
          <input id="username" name="u" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" name="p" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input type="submit" class="button" value="Login">
        </div>
        <div class="foot-lnk">
          <a href="#forgot">Forgot Password?</a>
        </div>
        <div class="hr"></div>
      </form>

      <div>
      <br>
        <?php 
        if(isset($_GET['run'])&& $_GET['run']=="success")
        {
          echo "<script>alert('Admin will process your request')</script>";
          #echo "<mark>A.</mark>";
        } 
        ?>
      </div>
      <form class="sign-up-htm" action="" method="POST" enctype="multipart/form-data">
        <div class="group">
          <label for="user" class="label">Username</label>
          <input id="username" name="n" type="text" class="input">
          <p class="text-danger"><?php if(isset($errors['n'])) echo $errors['n']; ?></p>
        </div>
        <div class="group">
          <label for="user" class="label">Email</label>
          <input id="username" name="e" type="text" class="input">
          <p class="text-danger"><?php if(isset($errors['e'])) echo $errors['e']; ?></p>
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" name="p" type="password" class="input" data-type="password">
          <p class="text-danger"><?php if(isset($errors['p'])) echo $errors['p']; ?></p>
        </div>
        <div class="group">
          <label for="pass" class="label">Confirm Password</label>
          <input id="password" name="cp" type="password" class="input" data-type="password">
          <p class="text-danger"><?php if(isset($errors['cp'])) echo $errors['cp']; ?></p>
        </div>
        <!--<div class="group">
          <label for="pass" class="label">Confirm Password</label>
          <input id="pass" type="password" class="input" data-type="password">
        </div>-->
        <div class="group">
          <input type="submit" name="insert" class="button" value="Sign Up">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <label for="tab-1">Already Member?</label>
        </div>
      </form>
    </div>
  </div>
</div> 

</body>

</html>