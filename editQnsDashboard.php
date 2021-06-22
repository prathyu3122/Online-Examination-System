<?php
include("class/users.php");
$cat=new users;
?>

<html>
<head>
<meta charset="utf-8">
	<title>Edit Questions</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/editQnsDashboard.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
	
  <link rel = "icon" href = "css/images/logo-1.jpg" type = "image/x-icon">
</head>
<body>
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
            <p>Teacher</p>

        </center>
        <a href="teacher.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
        <!--<a href=""><i class="fa fa-user"></i><span>Students</span></a>-->
        <a href="Subject.php"><i class="fas fa-clipboard-list"></i><span>Create Test</span></a>
        <a href="editQuestions.php" style="background: #007BFF;"><i class="fas fa-question"></i><span>Edit Questions</span></a>

    </div>
    <div class="main_content">
        <div class="center">
            <form method="POST" id="form" action="editqus_show.php">

                <select class="sc" id="" name="cat">
                    <option>Select Category</option>

                <?php
                    $cat->cat_show();
                    foreach ($cat->cat as $category)
                    {?>
                        # code...

                            
                        <option value="<?php echo $category['id'];?>"><?php echo $category['cat_name'];?></option>
                        
                    <?php }
                        ?>
                </select><br>
                <div class="btn">
                    <button type="submit" id="view" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>

    </div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>



</body>
</html>