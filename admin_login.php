
<?php

include("security.php");
include("class/users.php");
$register=new users;
$register2=new users;
extract($_POST);



/*
if(isset($_POST['insert']))
{
  $email = $_POST['e'];
  $pass = $_POST['p'];

  $errors = array();


  $u = "SELECT email from a_users where email='$email'";
  $uu = $register2->a_dup($u);


  if(empty($email))
  {
    $errors['e'] = "Email is required";
  }
  else if(mysqli_num_rows($uu)>0)
  {
    $errors['e'] = "Email already exists!";
  }


  if(empty($pass))
  {
    $errors['p'] = "Password is required";
  }


  if(count($errors)==0)
  {
    $query="insert into a_users values('$email','$pass')";

    $result = $register->a_signup($query);
    if($result)
    {
      echo "<script>alert('Registeration Successful')</script>";
    }

  }
}

*/
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admin | Login</title>
  
  
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
      <li class="nav-item ml-4" style="font-weight: bold;">
        <a class="nav-link" href="t_loginpage.php">Teacher</a>
      </li>
      <li class="nav-item ml-4" style="font-weight: bold;">
        <a class="nav-link" href="st_loginpage.php">Student</a>
      </li>
      <li class="nav-item active ml-4" style="font-weight: bold;">
        <a class="nav-link" href="admin_login.php">Admin</a>
      </li>
      
    </ul>
  </div>
</nav>
      </div>


  <div class="login-wrap">
  <div class="login-html">
    <h2 style="margin-top: -50px; margin-bottom: 30px; color: #fff; text-align: center;">ADMIN</h2>
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label>
    <input id="tab-2"  name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
    <div class="login-form">

      <br>
       <?php
        if (isset($_GET['run']) && $_GET['run']=='failed') {
          echo "<script>alert('Your email or password is wrong.')</script>";
          #echo "Your id or email or password is wrong";
        }
        ?>
        <br>

      <form class="sign-in-htm" action="admin_login_sub.php" method="POST" enctype="multipart/form-data">
        <div class="group">
          <label for="user" class="label">Username</label>
          <input id="username" name="user" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" name="pass" type="password" class="input" data-type="password">
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
        <?php /*
        if(isset($_GET['run'])&& $_GET['run']=="success")
        {
          echo "<script>alert('You are registered successfully.')</script>";
          #echo "<mark>You are registered successfully.</mark>";
        } */
        ?>
      </div>
      
      <!--
      <form class="sign-up-htm" action="" method="POST" enctype="multipart/form-data">
        <div class="group">
          <label for="user" class="label">Email</label>
          <input id="username" name="e" type="text" class="input">
          <p class="text-danger"><?php# if(isset($errors['e'])) echo $errors['e']; ?></p>
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" name="p" type="password" class="input" data-type="password">
          <p class="text-danger"><?php# if(isset($errors['p'])) echo $errors['p']; ?></p>
        </div>
        <div class="group">
          <label for="pass" class="label">Confirm Password</label>
          <input id="pass" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input type="submit" name="insert" class="button" value="Sign Up">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <label for="tab-1">Already Member?</label>
        </div>
      </form>
    -->
    </div>
  </div>
</div>
  
  

</body>

</html>