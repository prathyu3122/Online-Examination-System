<?php
include "class/users.php";
$cat=new users;
$category=$cat->cat_show();

include("security.php");
extract($_POST);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Subject</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/addSubject.css">
	<link rel = "icon" href = "css/images/logo-1.jpg" type = "image/x-icon">
	<script>
        function populate(s1,s2,s3,s4){
            var s1 = document.getElementById(s1);
            var s2 = document.getElementById(s2);
            var s3 = document.getElementById(s3);
            var s4 = document.getElementById(s4);
            s4.innerHTML = "";
            if(s1.value == "E1" && s2.value=="CSE" && s3.value=="SEM1"){
                var optionArray = ["|","dm|DM","wt|WT","dld|DLD","c|C","c lab|C LAB","dld lab|DLD LAB","wt lab|WT LAB"];
            }
            else if(s1.value == "E1" && s2.value=="CSE" && s3.value=="SEM2"){
                var optionArray = ["|","em 1|EM 1","coa|COA","ds|DS","flat|FLAT","coa lab|COA LAB","ds lab|DS LAB"];
            }
            else if(s1.value == "E2" && s2.value=="CSE" && s3.value=="SEM1"){
                var optionArray = ["|","os|OS","OOPS|OOPS","DBMS|DBMS","DAA|DAA","DA|DA","OOPS lab|OOPS LAB","DBMS lab|OS LAB"];
            }
            else if(s1.value == "E2" && s2.value=="CSE" && s3.value=="SEM2"){
                var optionArray = ["|","SE|SE","CN|CN","P&S|P&S","MAD|MAD","AI|AI","SE lab|SE LAB","MAD lab|MAD LAB","CN LAB|CN LAB"];
            }
            else if(s1.value == "E3" && s2.value=="CSE" && s3.value=="SEM1"){
                var optionArray = ["|","dm|DM","wt|WT","dld|DLD","c|C","c lab|C LAB","dld lab|DLD LAB","wt lab|WT LAB"];
            }
            else if(s1.value == "E3" && s2.value=="CSE" && s3.value=="SEM2"){
                var optionArray = ["|","dm|DM","wt|WT","dld|DLD","c|C","c lab|C LAB","dld lab|DLD LAB","wt lab|WT LAB"];
            }
            else if(s1.value == "E4" && s2.value=="CSE" && s3.value=="SEM1"){
                var optionArray = ["|","dm|DM","wt|WT","dld|DLD","c|C","c lab|C LAB","dld lab|DLD LAB","wt lab|WT LAB"];
            }
            else if(s1.value == "E4" && s2.value=="CSE" && s3.value=="SEM2"){
                var optionArray = ["|","dm|DM","wt|WT","dld|DLD","c|C","c lab|C LAB","dld lab|DLD LAB","wt lab|WT LAB"];
            }
            for(var option in optionArray){
                var pair = optionArray[option].split("|");
                var newOption = document.createElement("option");
                newOption.value = pair[0];
                newOption.innerHTML = pair[1];
                s4.options.add(newOption);
            }
        }
            </script>
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
			<!--<a href="#" class="logout_btn"><i class="fas fa-user"></i> Profile</a>-->

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
		<a href="Subject.php" style="background: #007bff;"><i class="fas fa-clipboard-list"></i><span>Create Test</span></a>
		<a href="editQuestions.php"><i class="fas fa-question"></i><span>Edit Questions</span></a>
	</div>
	<div class="main_content">
        <div class="add_subject">
		<?php
			if(isset($GET['msg']) && !empty($GET['msg']))
			{
				echo "<script>alert('Subject added Successfully!')</script>";
			}
			?>
			<h1>Add Subject</h1>
			<form id="form" action="AddSubject.php" method="POST">
			<label for="Year" style="font-weight: bold; font-size: 18px; color:#000; font-family:'Roboto' sans-serif;'">
				Year:
			</label>
			<select id="slct1" name="slct1" style="width: 150px; height: 30px; font-family:'Roboto' sans-serif; font-size: 16px;">
				<option value=""></option>
				<option value="E1" selected>E1</option>
				<option value="E2">E2</option>
				<option value="E3">E3</option> 
				<option value="E4">E4</option>
			  </select>&emsp;
			  <label for="Branch" style="font-weight: bold; font-size: 18px; color:#000; font-size: 18px; color:#000; font-family:'Roboto' sans-serif;'">
				Branch:
			</label>
			  <select id="slct2" name="slct2" style="width: 150px; height: 30px; font-size: 16px; color:#000; font-family:'Roboto' sans-serif;'">
				  <option value=""></option>
				  <option value="CSE" selected>CSE</option>
				  <option value="ECE">ECE</option>
				  <option value="CIVIL">CIVIL</option>
				  <option value="MECH">MECH</option>
				</select>&emsp;
				<label for="Sem" style="font-weight: bold; font-size: 18px; color:#000; font-family:'Roboto' sans-serif;'">
					Sem:
				</label>
			  <select id="slct3" name="slct3" onchange="populate('slct1','slct2',this.id,'slct4')" style="width: 150px; height: 30px; font-size: 16px; color:#000; font-family:'Roboto' sans-serif;'">
				  <option value=""></option>
				  <option value="SEM1" selected>SEM1</option>
				  <option value="SEM2">SEM2</option>
				</select>&emsp;
				<label for="Subject" style="font-weight: bold; font-size: 18px; color:#000; font-family:'Roboto' sans-serif;'">
					Subject:
				</label>
			  <select id="slct4" name="slct4" style="width: 150px; height: 30px; font-size: 16px; color:#000; font-family:'Roboto' sans-serif;'">
				</select><br><br>


				<!--<label for="Questions">Questions</label><br>
				<input type="number" id="Question" name="Questions"><br><br>
				<label for="MarksQuestion">Marks/Question</label><br>
				<input type="number" id="Marks" name="Marks"><br><br>
				<label for="Time">Total time(min)</label><br>
				<input type="number" id="Time" name="Time"><br><br>-->

				
				<button type="submit" class="button b1" name="add">
					<i class="fas fa-plus">Add</i></button>
				<button type="button" class="button b2">
					<i class="fas fa-times">Cancel</i></button>	
				<br>
				<br>
				<a href="AddQuestion.php" style="color:#fff;"><button type="button" class="button b1" name="">
					<i class="fas fa-plus"><span>Add Questions</span></i></button></a>
			  </form>


		</div>
    </div>
</body>
</html>