<?php
include("class/users.php");
$ans=new users;

$answer = $ans->answer($_POST);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Answer</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
</head>
<body>
	<center>
	<?php
	$total_ques = $answer['right'] + $answer['wrong'] + $answer['no_answer'];
	$attempted_qus = $answer['right'] + $answer['wrong'];
	$per = ($answer['right']*100)/($total_ques);
	?>



	<div class="container">
		<div class="col-sm-2"></div>
		<div class="col-sm-8"></div>
  <h2>Your Exam Results</h2>
             
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Total no.of Questions</th>
        <th><?php echo $total_ques; ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Attempted questions</td>
        <td><?php echo $attempted_qus; ?></td>
      </tr>
      <tr>
        <td>No.of Right answers</td>
        <td><?php echo $answer['right']; ?></td>
       
      </tr>
      <tr>
        <td>No.of Wrong answers</td>
        <td><?php echo $answer['wrong']; ?></td>
      </tr>
       <tr>
        <td>No.of answers not attempted</td>
        <td><?php echo $answer['no_answer']; ?></td>
      </tr>
      <tr>
        <td>Your Percentage</td>
        <td><?php echo $per."%";
         ?></td>
      </tr>
    </tbody>
  </table></div>

  <div class="col-sm-2"></div>

</div>
	</center>


	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>