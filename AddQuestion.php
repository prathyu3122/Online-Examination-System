<?php
include "class/users.php";
$cat=new users;
$category=$cat->cat_show();

include("security.php");
extract($_POST);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Question</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleAddQuestion.css">
	<link rel = "icon" href = "css/images/logo-1.jpg" type = "image/x-icon">

</head>
<body>

	<input type="checkbox" id="check">
	<!--Header area start-->
	<header>
		<label for="check">
			<i class="fas fa-bars" id="sidebar_btn"></i>
		</label>

		<div class="left_area">
			<h3>Online Examination System</h3>
		</div>
		<div class="right_area">
			<a href="t_loginpage.php" class="logout_btn"><i class="fas fa-sign-out-alt"></i> Logout</a>

		</div>
	</header>
	<!--Header area end-->

	<!--side bar-->
	<div class="sidebar">
		<center>
			<img src="css/images/teacher.png" alt="user" class="profile_image">
			<h3 style="color:#fff; font-family: 'Roboto', sans-serif;">Hi <?php echo $_SESSION['username'] ?>!</h3>
		</center>
		<a href="teacher.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
		<a href="Subject.php"><i class="fas fa-clipboard-list"></i><span>Create Test</span></a>
		<a href="editQuestions.php"><i class="fas fa-question"></i><span>Edit Questions</span></a>
	</div>
	<div class="main_content">
		<div class="add-ques">

			<?php
        		if (isset($_GET['msg']) && $_GET['msg']=='run') {
          			echo "<script>alert('Question added Successfully!')</script>";
        		}
        	?>
			<h1>ADD QUESTION</h1>
			<form id="form" method="post" action="phpAddQuestion.php">
			<h2>ADD QUESTION</h2>
			<label for="Question">
				Question:
			</label><br>
			<textarea name="question" id="Question" rows="5" cols="100" placeholder="Enter Question">
			</textarea><br>

			<label for="Option1">
				Option1:
			</label><br>
			<input name="option1" id="Option1" type="text" placeholder="Enter Option1"><br>

			<label for="Option2">
				Option2:
			</label><br>
			<input name="option2" id="Option2" type="text" placeholder="Enter Option2"><br>

			<label for="Option3">
				Option3:
			</label><br>
			<input name="option3" id="Option3" type="text" placeholder="Enter Option3"><br>

			<label for="Option4">
				Option4:
			</label><br>
			<input name="option4" id="Option1" type="text" placeholder="Enter Option4"><br>

			<label for="CA">
				Correct Answer:
			</label><br>
			<input name="correctanswer" id="Option1" type="text" placeholder="Enter Answer">

			<br>
			<label for="subject">
				Subject:
			</label><br>
			<br>
			<select name="cat" id="subject" style="width: 150px; height: 30px; font-size: 18px; color:#000; font-family:'Roboto' sans-serif;'">
				<option value="select" style="font-family:'Roboto' sans-serif; font-size: 18px;">Select</option>
				<?php
				foreach($category as $c)
				{
					echo "<option value=".$c['id'].">".$c['cat_name']."</option>";
				}
				?>
			</select>
			<br>
			<br>

			<button type="submit" name="add" class="button b1">
				<i class="fas fa-plus">Add</i></button>
			<!--<button type="button" name="cancel" class="button b2">
				<i class="fas fa-times">Cancel</i></button>-->



		    </form>
		</div>
	</div>

</body>
</html>