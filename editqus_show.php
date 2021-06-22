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
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  
</head>
<body>

<!--EDIT Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form action="editQnsUpdate.php" method="POST">
      <div class="modal-body">
        <input type="hidden" name="update_id" id="update_id">
        
            <div class="form-group">
                <label for="Question">Question:</label>
                <input type="text" class="form-control" name="edit_question" id="Question" >
            </div>
            <div class="form-group">
                <label for="Option1">Option1:</label>
                <input type="text" class="form-control" name="edit_option1" id="Option1">
            </div>
            <div class="form-group">
                <label for="Option2">Option2:</label>
                <input type="text" class="form-control" name="edit_option2" id="Option2">
            </div>
            <div class="form-group">
                <label for="Option3">Option3:</label>
                <input type="text" class="form-control" name="edit_option3" id="Option3">
            </div>
            <div class="form-group">
                <label for="Option4">Option4:</label>
                <input type="text" class="form-control" name="edit_option4" id="Option4" >
            </div>
            <div class="form-group">
                <label for="CA">Correct Answer:</label>
                <input type="text" class="form-control" name="edit_correctanswer" id="CA"  >
            </div>		
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="updatedata" class="btn btn-primary">Update</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
    

<!--DELETE Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Question</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="editQnsUpdate.php" method="POST">
      <div class="modal-body">

        <input type="hidden" name="delete_id" id="delete_id">

        <h4>Do you want to delete this Question??</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
        <button type="submit" name="deletedata" class="btn btn-primary">Yes !! Delete it.</button>
      </div>
      </form>
    </div>
  </div>
</div>



<div class="container">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
  <?php
        if(isset($_SESSION['success']) && $_SESSION['success']!='')
        {

            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <?php echo '<h5>'.$_SESSION['success'].'<h5>'; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            unset($_SESSION['success']);
        }
        if(isset($_SESSION['status']) && $_SESSION['status']!='')
        {
            echo '<h5>'.$_SESSION['status'].'<h5>';
            unset($_SESSION['status']);
        }
        ?>
	  <h2>EDIT QUESTIONS</h2> 

	  

	  <form id="form1" method="POST" action="">
	  	
	                   
	  <table class="table table-bordered">
	    <thead>
        <tr>
          <th>id</th>
          <th>Question</th>
          <th>Option-1</th>
          <th>Option-2</th>
          <th>Option-3</th>
          <th>Option-4</th>
          <th>Correct Answer</th>
          <th>EDIT</th>
          <th>DELETE</th>
        </tr>
	    </thead>
	    <tbody>
      <?php
	  
	  foreach ($qus->qus as $qust) {
	  	?> 

      <tr>
      <td><?php echo $qust['id']; ?></td>
      <td><?php echo $qust['question']; ?>&nbsp;&nbsp;</td>
	      
	        <td><?php echo $qust['ans1']; ?></td>
	      
	        <td><?php echo $qust['ans2']; ?></td>
	      
	        <td><?php echo $qust['ans3']; ?></td>
	     
	        <td><?php echo $qust['ans4']; ?></td>
          <td><?php echo $qust['ans']; ?></td>
	                       
            <td>
            
              
                  
            <button type="button" class="btn btn-success updatebtn" data-bs-toggle="modal" data-bs-target="#editModal">
                EDIT
            </button></td>
                              
           <td> <button type="button" class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                DELETE
                </button></td>
          </tr>
                            
	  	
          <?php } ?>
	    </tbody>
	  </table>
    
	

	</div>
	</form>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

<script>

$(document).ready(function(){

    $('.deletebtn').on('click',function(){

        $('#deleteModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#delete_id').val(data[0]);

    });

});


</script>


<script>

$(document).ready(function(){

    $('.updatebtn').on('click',function(){

        $('#editModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#update_id').val(data[0]);
        $('#Question').val(data[1]);
        $('#Option1').val(data[2]);
        $('#Option2').val(data[3]);
        $('#Option3').val(data[4]);
        $('#Option4').val(data[5]);
        $('#CA').val(data[6]);
        


    });

});


</script>



</body>
</html>