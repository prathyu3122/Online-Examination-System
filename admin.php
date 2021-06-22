<?php

include("security.php");

include("class/users.php");
extract($_POST);

?>



<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>Admin</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">

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
			<a href="admin_login.php" class="logout_btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
		</div>
	</header>
	<!--Header area end-->

	<!--side bar-->
	<div class="sidebar">
		<center>
			<img src="css/images/admin.jpg" alt="user" class="profile_image">
			<h3 style="color:#fff; font-family: 'Roboto', sans-serif;">Hi <?php echo $_SESSION['username'] ?>!</h3>
		</center>

		<a href="index.php"><i class="fas fa-home"></i><span>Home</span></a>
		<a href="admin.php" class="activeclass"><i class="fas fa-tachometer-alt"></i><span>DashBoard</span></a>

		<!--<a href="category.php" id="full_screen" target="_blank"><i class="fas fa-laptop"></i><span>Exam</span></a>
		<a href="#"><i class="fas fa-poll"></i><span>Marks</span></a>
		<a href="Instructions.pdf" target="_blank"><i class="fas fa-exclamation"></i><span>Instructions</span></a>
		<a href="#"><i class="fas fa-check-circle"></i><span>Answers</span></a>-->

	</div>
	
    <div class="cards-container">
        <div class="card">
		<a href="admin_no.php">
            <div class="title">
                <h4>No.of Admins</h4>
            </div></a>
			<div class="icon">
				<i class="fas fa-user-shield fa-9px"></i>
            </div>
			<div class="count">
				<?php
            		$connection=mysqli_connect("localhost","root","","oes");

            		$query="SELECT email FROM a_users";
            		$query_run=mysqli_query($connection,$query);

					$row = mysqli_num_rows($query_run);
					echo '<h4> '.$row.' </h4>'
        		?>
				<h4></h4>
            </div>
        </div>
	
		
        <div class="card">
		<a href="teacher_no.php">	
            <div class="title">
                <h4>No.of Teachers</h4>
            </div></a>
			<div class="icon">
				<i class="fas fa-chalkboard-teacher fa-9px"></i> 
            </div>
			<div class="count">
			<?php
            		$connection=mysqli_connect("localhost","root","","oes");

            		$query="SELECT email FROM t_users";
            		$query_run=mysqli_query($connection,$query);

					$row = mysqli_num_rows($query_run);
					echo '<h4> '.$row.' </h4>'
        		?>
				<h4></h4>
            </div>
       
        </div>
			
		
        <div class="card">
			<a href="no_of_students.php">
            <div class="title">
                <h4>
                No.of Students</h4>
            </div></a>
			<div class="icon">
				<i class="fas fa-user-graduate fa-9px"></i>
		    </div>
			<div class="count">
			<?php
            		$connection=mysqli_connect("localhost","root","","oes");

            		$query="SELECT id FROM st_users order by id";
            		$query_run=mysqli_query($connection,$query);

					$row = mysqli_num_rows($query_run);
					echo '<h4> '.$row.' </h4>'
        		?>
				<h4></h4>
            </div>
        </div>
		
			
        <div class="card">
			<a href="pending_request.php">
            <div class="title">
            	
                <h4>Pending Requests</h4>
            </div></a>
			<div class="icon">
				<i class="fas fa-exclamation fa-9px"></i>
		    </div>
			<div class="count">
			<?php
            		$connection=mysqli_connect("localhost","root","","oes");

            		$query="SELECT Email FROM t_pending_requests";
            		$query_run=mysqli_query($connection,$query);

					$row = mysqli_num_rows($query_run);
					echo '<h4> '.$row.' </h4>'
        		?>
				<h4></h4>
            </div>
        </div>
    </div>		
</div>

</body>
</html>