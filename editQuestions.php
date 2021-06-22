
<html>
<head>
<meta charset="utf-8">
	<title>Edit Questions</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/editQuestions.css">

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
        <a href="teacher.html"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
        <!--<a href=""><i class="fa fa-user"></i><span>Students</span></a>-->
        <a href="Subject.php"><i class="fas fa-clipboard-list"></i><span>Create Test</span></a>
        <a href="editQuestions.php" style="background: #007BFF;"><i class="fas fa-question"></i><span>Edit Questions</span></a>

    </div>
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
                <input type="text" class="form-control" name="edit_question" id="Question"  >
            </div>
            <div class="form-group">
                <label for="Option1">Option1:</label>
                <input type="text" class="form-control" name="edit_option1" id="Option1"  >
            </div>
            <div class="form-group">
                <label for="Option2">Option2:</label>
                <input type="text" class="form-control" name="edit_option2" id="Option2"  >
            </div>
            <div class="form-group">
                <label for="Option3">Option3:</label>
                <input type="text" class="form-control" name="edit_option3" id="Option3"  >
            </div>
            <div class="form-group">
                <label for="Option4">Option4:</label>
                <input type="text" class="form-control" name="edit_option4" id="Option4"  >
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

<div class="main_content">
    <div class="add-ques">
    <div>
        <h2>Pending Requests</h2>
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

            $query="SELECT * FROM questions";
            $query_run=mysqli_query($connection,$query);
        ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                    
                if(mysqli_num_rows($query_run)>0)
                {
                    while($row=mysqli_fetch_assoc($query_run))
                    {
                    ?>

                    
                
                    <tr>
                        
                        <td>  <?php  echo $row['id']; ?></td>
                        <td>  <?php echo $row['question']; ?></td>   
                   
                        <td>
                            <?php echo $row['ans1']; ?>
                        </td>
                        
                        <td>    
                            <?php echo $row['ans2']; ?>
                        </td>
                        
                        <td>
                            <?php echo $row['ans3']; ?>
                        </td>
                        
                        <td>
                            <?php echo $row['ans4']; ?>
                        </td>
                        
                        <td>
                            <?php echo $row['ans']; ?>
                        </td>
                        
                        <td>
                            
                        <button type="button" class="btn btn-success updatebtn" data-bs-toggle="modal" data-bs-target="#editModal">
                            EDIT
                            </button>
                            </td>
                            
                         <td>   
                            <button type="button" class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            DELETE
                            </button>
                        </td>
                    </tr>
                    
                <?php
                    }
                }
                else
                {
                    echo "No Record Found";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
	</div>	
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