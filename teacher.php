<?php

#include("security.php");

include("class/users.php");
extract($_POST);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashbord-Teacher</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/teacher.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
	
  <link rel = "icon" href = "css/images/logo-1.jpg" type = "image/x-icon">

</head>
<body>

<div>
		
	<!--Header area start-->
	<header>

		<div class="left_area">
			<h3>Online Examination System</h3>
		</div>
		<div class="right_area">
			<a href="t_loginpage.php" class="logout_btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
			<!--<a href="t_profile.html" class="logout_btn"><i class="fas fa-user"></i> Profile</a>-->

		</div>
	</header>
	<!--Header area end-->

	<!--side bar-->
	<div class="sidebar">
		<center>
			<img src="css/images/teacher.png" alt="user" class="profile_image">
			<h3 style="color:#fff; font-family: 'Roboto', sans-serif;">Hi <?php echo $_SESSION['username'] ?>!</h3>
		</center>
		<a href="index.php"><i class="fas fa-home"></i><span>Home</span></a>
		<a href="teacher.php" style="background: #007BFF;"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
		<!--<a href=""><i class="fa fa-user"></i><span>Students</span></a>-->
		<a href="Subject.php"><i class="fas fa-clipboard-list"></i><span>Create Test</span></a>
		<a href="editQuestions.php"><i class="fas fa-question"></i><span>Edit Questions</span></a>
       	<!--<a href="profile.html"><i class="fas fa-edit"></i><span>Edit Profile</span></a>-->

	</div>

  	
  	<div class="container">
			<div class="box">
				<div class="icon">
					<a href="Subject.php"><i class="fas fa-clipboard-list" aria-hidden="true"></i></a>
				</div>
				<div class="content">
					<h3>Create Test</h3>
					<h5>Click on the icon above to create new test</h5>
				</div>
			</div>
			<div class="box">
				<div class="icon">
					<a href="editQuestions.php"><i class="fas fa-question" aria-hidden="true"></i></a>
				</div>
				<div class="content">
					<h3>Edit Questions</h3>
					<h5>Click on the icon above to edit Questions</h5>
				</div>
			</div>
			<!--<div class="box">
				<div class="icon">
					<a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
				</div>
				<div class="content">
					<h3>Students</h3>
					<h5>Click on the icon above to view Students</h5>
				</div>
			</div>-->
			
		</div>
</div>

</body>
</html>