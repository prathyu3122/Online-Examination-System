<?php
include("class/users.php");
$cat=new users;
?>


<!DOCTYPE html>
<html>
<head>
	<title>OES | Exam</title>

	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>


   	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel = "icon" href = "css/images/logo-1.jpg" type = "image/x-icon">


	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</head>
<body>

<div class="container" >
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" style="font-weight: bold; font-size: 20px;">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Exam</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content" id="ctrl_keys">
    <div id="home" class="container tab-pane active"><br>
      <center><button type="button" class="btn btn-primary" style="font-size: 25px; font-weight: bolder; padding: 15px;" data-toggle="tab" href="#select">Start Exam</button>

      <div class="col-sm-4"></div>
       <div class="col-sm-4"><br><br>
	      <div id="select" class="tab-pane fade">
		      
        <form method="POST" action="qus_show.php">

		      <select class="form-control" id="" name="cat">
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

         <input type="submit" value="Submit" id="start_exam" class="btn btn-primary"/>
			</form>


			</div>
		</div>
    </div>
    </center>
    
  </div>
</div>
    	
   
<script src="js/exam.js"></script>
</body>
</html>