<?php

include("class/users.php");
$qus=new users;
$cat=$_POST['cat'];
$qus->qus_show($cat);
$_SESSION['cat']=$cat;

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  	function timeout()
  	{
  		//var hours = Math.floor(timeLeft/3600);

  		var minute = Math.floor(timeLeft/60);
  		//var minute = Math.floor((timeLeft - (hours*60*60)-30)/60);
  		
  		var second = timeLeft%60;
  		//var hrs = checktime(hours);
  		var sec = checktime(second);
  		var mint = checktime(minute);
  		if (timeLeft<=0) {
  			clearTimeout(tm);

  			document.getElementById('form1').submit();
  		}
  		else
  		{
  			document.getElementById('time').innerHTML=/*hrs+ " : " +*/mint+" : "+sec;
  		}
  		timeLeft--;
  		var tm = setTimeout(function(){timeout()},1000);	
  	}

  	function checktime(msg)
  	{
  		if(msg<10)
  		{
  			msg = "0" + msg;
  		}
  		return msg;
  	}
  </script>
</head>
<body onload="timeout()">

<div class="container">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
	  <h2>Online Exam<div id="time" style="float: right;">Time Out</div></h2> 

	  <script type="text/javascript">
	  	var timeLeft = 1*60;
	  </script>

	  <form id="form1" method="POST" action="answer.php">
	  	
	  <?php
	  $i=1;
	  foreach ($qus->qus as $qust) {
	  	?>                   
	  <table class="table table-bordered">
	    <thead>
	      <tr class="info">
	        <th>&nbsp;<?php echo $i;?>&nbsp;&nbsp;<?php echo $qust['question']; ?>&nbsp;&nbsp;</th>
	      </tr>
	    </thead>
	    <tbody>

	    <?php if (isset($qust['ans1'])) {
	    	# code... ?>
	      <tr>
	        <td>&nbsp;<input type="radio" value="0" name="<?php echo $qust['id']; ?>" />&nbsp;<?php echo $qust['ans1']; ?></td>
	      </tr>
	  	<?php } ?>
	    <?php if (isset($qust['ans2'])) { ?>
	       <tr>
	        <td>&nbsp;<input type="radio" value="1" name="<?php echo $qust['id']; ?>" />&nbsp;<?php echo $qust['ans2']; ?></td>
	      </tr>
	  	<?php } ?>
	    <?php if (isset($qust['ans3'])) { ?>
	       <tr>
	        <td>&nbsp;<input type="radio" value="2" name="<?php echo $qust['id']; ?>" />&nbsp;<?php echo $qust['ans3']; ?></td>
	      </tr>
	  	<?php } ?>
	    <?php if (isset($qust['ans4'])) { ?>
	       <tr>
	        <td>&nbsp;<input type="radio" value="3" name="<?php echo $qust['id']; ?>" />&nbsp;<?php echo $qust['ans4']; ?></td>
	      </tr>
	  	<?php } ?>
	  	<tr>
	        <td><input type="radio" checked="checked" style="display: none;" value="no_attempt" name="<?php echo $qust['id']; ?>" /></td>
	      </tr>

	    </tbody>
	  </table>
	<?php $i++; }?>

	<center><input type="submit" name="" value="Submit Exam" class="btn btn-success" style="margin-bottom: 20px;" /></center>
	</div>
	</form>
</div>

</body>
</html>
