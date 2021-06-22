<?php

include("class/users.php");
extract($_POST);

?>


<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>Student</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/stud.css">

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
			<a href="st_loginpage.php" class="logout_btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
			<!--<a href="profile.html" class="logout_btn"><i class="fas fa-user"></i> Profile</a>-->


		</div>
	</header>
	<!--Header area end-->

	<!--side bar-->
	<div class="sidebar">
		<center>
			<img src="css/images/user.png" alt="user" class="profile_image">
			<h3 style="color:#fff; font-family: 'Roboto', sans-serif;">Hi <?php echo $_SESSION['id']; ?>!</h3>

		</center>
		<a href="index.php"><i class="fas fa-home"></i><span>Home</span></a>
		<a href="student.php" class="activeclass"><i class="fas fa-home"></i><span>Dashboard</span></a>
		<a href="category.php" id="full_screen" target="_blank"><i class="fas fa-laptop"></i><span>Take Test</span></a>
		<a href="active_tests.php"><i class="fas fa-poll"></i><span>Active Tests</span></a>
		<a href="Instructions.pdf" target="_blank"><i class="fas fa-exclamation"></i><span>Instructions</span></a>
		<!--<a href="profile.html"><i class="fas fa-edit"></i><span>Edit Profile</span></a>-->

	</div>

  	
  	<div class="container">
			<div class="box">
				<div class="icon">
					<a href="category.php" target="_blank"><i class="fa fa-laptop" aria-hidden="true"></i></a>
				</div>
				<div class="content">
					<h3>Take Test</h3>
					<h5>Click on the icon above to enter into the exam.</h5>
				</div>
			</div>
			<div class="box">
				<div class="icon">
					<a href="active_tests.php"><i class="fa fa-poll" aria-hidden="true"></i></a>
				</div>
				<div class="content">
					<h3>Active Tests</h3>
					<h5>Click on the icon above to view active tests.</h5>
				</div>
			</div>
			<div class="box">
				<div class="icon">
					<a href="Instructions.pdf" target="_blank"><i class="fa fa-exclamation" aria-hidden="true"></i>
</a>
				</div>
				<div class="content">
					<h3>Instructions</h3>
					<h5>Click on the icon above to view instruction for exam.</h5>
				</div>
			</div>
			
		</div>
</div>

</body>
</html>

