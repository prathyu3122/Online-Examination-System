<?php

include "class/users.php";
extract($_POST);
//$question=$option1=$option2=$option3=$option4=$correctanswer=$cat='';
$quiz=new users;
$qus=htmlentities($question);
$op1=htmlentities($option1);
$op2=htmlentities($option2);
$op3=htmlentities($option3);
$op4=htmlentities($option4);
$array=[$option1,$option2,$option3,$option4];
$answer=array_search($correctanswer,$array);
$query="insert into questions values('','$qus','$op1','$op2','$op3','$op4','$answer','$cat')";
if($quiz->AddQuestion($query))
{
	$quiz->url("AddQuestion.php?msg=run");
	#$quiz->url("AddQuestion.php");
	#echo "<script>alert('Question added Successfully!')</script>";
	
}
?>