<?php 

include 'nav.php';
include 'connect.php';
$error='';
?>




<!DOCTYPE html>
<html lang="en">
<head>

	<title>Table V03</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="table/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="table/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="table/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="table/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="table/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="table/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="table/css/util.css">
	<link rel="stylesheet" type="text/css" href="table/css/main.css">
<!--===============================================================================================-->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students | LMS</title>

<style>
    .add-btn{
        margin-top: 5%;
        margin-left: 77%;
        margin-bottom: 2px;
    }
</style>
</head>
<body>

<?php 


$sql = "SELECT *  FROM students";

$result =mysqli_query($conn, $sql);

?>
<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
       
					<table data-vertable="ver1">
						<thead>
            <div class="col-12">
            <a href="#" class="float-right m-0 btn btn-success font-weight-bold add-btn" data-toggle="modal" data-target="#Add_Student">New Student + </a>
            </div>
							<tr class="row100 head">
								<th class="column100 column1 pl-3" data-column="column1">ID</th>
								<th class="column100 column2" data-column="column2">Name</th>
								<th class="column100 column3" data-column="column3">Roll</th>
								<th class="column100 column4" data-column="column4">Dept</th>
								<th class="column100 column5" data-column="column5">Phone</th>
								<th class="column100 column6" data-column="column6">Username</th>
								<th class="column100 column7" data-column="column7">Pass</th>
								<th class="column100 column8" data-column="column8">Email</th>
								<th class="column100 column9 w-25" data-column="column9">Reg_date</th>
								<th class="column100 column10 w-25 " data-column="column10">Action</th>

							</tr>
						</thead>
						<tbody>
						<?php while($row = mysqli_fetch_array($result)){ ?>
								<tr class='row100 '>

								<td class="column100  column1 pl-3" data-column="column1"> <?php echo $row['student_id'] ?> </td>
								<td class="column100  column2" data-column="column2"> <?php echo $row['student_name'] ?> </td>
								<td class="column100  column3" data-column="column3"> <?php echo $row['roll_no'] ?> </td>
								<td class="column100  column4" data-column="column4"> <?php echo $row['dep_id'] ?> </td>
								<td class="column100   column5" data-column="column5"> <?php echo $row['phone'] ?> </td>
								<td class="column100  column6" data-column="column6"> <?php echo $row['username'] ?> </td>
								<td class="column100  column7" data-column="column7"> <?php echo $row['pass'] ?> </td>
								<td class="column100  column8" data-column="column8"> <?php echo $row['email'] ?> </td>
								<td class="column100   column9 align-text-center" data-column="column9"> <?php echo $row['reg_date'] ?> </td>
								<td class="column100 column10 " data-column="column10"><button class="btn btn-md btn-success editbtn">Edit  </button>
									<button class="btn btn-md btn-danger float- "> <a class='text-white' href="delete.php?student_id=<?php echo $row['student_id']; ?>" name="delete">Delete</a> </button> </td>
								</tr>
							<?php } ?>

							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	




<!-- Modal -->
<div class="modal fade" id="Add_Student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Enter Student Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action='new.php'  method="POST">
      <div class="modal-body">
        

          <div class="form-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Student name">
          </div>


          <div class="form-group">

            <input type="number" class="form-control" name="roll1" id="roll1" placeholder="Roll Number">
          </div>


          <div class="form-group">
      
            <input type="number" class="form-control" name="dept1" id="dept1" placeholder="Department">
          </div>

          <div class="form-group">

            <input type="number" class="form-control" name="phone1" id="phone1" placeholder="Phone Number">
          </div>

          <div class="form-group">

            <input type="text" class="form-control" name="username1" id="username1" placeholder="Username">
          </div>



          <div class="form-group">
            <input type="text" class="form-control" name="1pass" id="1pass" placeholder="Password"> 
          </div>


          <div class="form-group">
            <input type="text" class="form-control" name="1email" id="1email" placeholder="Email address">
          </div>
       


      </div>
      <div class="modal-footer bg-dark">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="save_changes">Save Changes</button>

      </div>
      </form>

    </div>
  </div>
</div>

<!-- 
  Here Edit Starts
##############################################################################################
 -->


 <div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Enter Student Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="update_changes.php"  method="POST">
      <div class="modal-body">
        	<input type="hidden" name="student_id" id="student_id" />  
          <div class="form-group">
            <input type="text" class="form-control" name="student_name" id="student_name" placeholder="Student name">
          </div>


          <div class="form-group">

            <input type="text" class="form-control" name="roll_no" id="roll_no" placeholder="Roll Number">
          </div>


          <div class="form-group">
      
            <input type="text" class="form-control" name="dep_id" id="dep_id" placeholder="Department">
          </div>

          <div class="form-group">

            <input type="text" class="form-control" name="phone_no" id="phone" placeholder="Phone Number">
          </div>

          <div class="form-group">

            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
          </div>



          <div class="form-group">
            <input type="text" class="form-control" name="pass" id="pass" placeholder="Password"> 
          </div>


          <div class="form-group">
            <input type="text" class="form-control" name="email" id="email" placeholder="Email address">
          </div>
          
          



      </div>
      <div class="modal-footer bg-dark">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update_changes">Update Changes</button>

      </div>
      </form>

    </div>
  </div>
</div>


<!-- Edit Section End 


#############################################################################################################-->
<script>
$(document).ready(function()

{
  $('.editbtn').on('click',function(){
    
    $('#Edit').modal('show'); 
      $tr=$(this).closest('tr');

      var data=$tr.children("td").map(function(){
        return $(this).text();
      }).get();


      console.log(data);
      $('#student_id').val(data[0]);
      $('#student_name').val(data[1]);
      $('#roll_no').val(data[2]);
      $('#dep_id').val(data[3]);
      $('#phone').val(data[4]);
      $('#username').val(data[5]);
      $('#pass').val(data[6]);
      $('#email').val(data[7]);
  
  
  
  });
});
</script>


</body>
</html>
<!-- ############################################################################################################## -->


<!-- ############################################################################################################## -->
