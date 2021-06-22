<?php

include("security.php");

include("class/users.php");
extract($_POST);

?>


<html>
<head>
<meta charset="utf-8">
	<title>No.of Teachers</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/pending_request.css">

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
            <!--<a href="#" class="logout_btn"><i class="fas fa-user"></i> Profile</a>-->

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
            <a href="admin.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>

    </div>

<div class="main_content">
    <div class="add-ques">
    <div>
        <h2>No.of Teachers</h2>
    </div>
    <div class="card-body">
        <?php
        if(isset($_SESSION['success']) && $_SESSION['success']!='')
        {
            echo '<h2>'.$_SESSION['success'].'<h2>';
            unset($_SESSION['success']);
        }
        if(isset($_SESSION['status']) && $_SESSION['status']!='')
        {
            echo '<h2>'.$_SESSION['status'].'<h2>';
            unset($_SESSION['status']);
        }
        ?>
        <?php
            $connection=mysqli_connect("localhost","root","","oes");

            $query="SELECT username,email FROM t_users";
            $query_run=mysqli_query($connection,$query);
        ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <h2 style="text-align: center; margin-top: 30px;">No.of Teachers</h2>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    
                if(mysqli_num_rows($query_run)>0)
                {
                    while($row=mysqli_fetch_assoc($query_run))
                    {
                    ?>
                
                    <tr>
                        <td><?php  echo $row['username']; ?></td>
                        <td><?php  echo $row['email']; ?></td>
                    </tr>
                <?php
                    }
                }
                else
                {
                    echo "<script>alert('No teachers found!')</script>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
	</div>	
</div>   
</body>
</html>