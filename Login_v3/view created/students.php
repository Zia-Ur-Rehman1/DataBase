<?php 
$page='students';
include 'nav.php';
include 'connect.php';

$error='';
?>




<!DOCTYPE html>
<html lang="en">
<head>

	<title>Students</title>
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
$sql1="SELECT *  FROM department";
$re=mysqli_query($conn, $sql1);

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
							<tr class="row100 head ">
								<th class="column100 column1 pl-3 text-center" data-column="column1">ID</th>
								<th class="column100 column2" data-column="column2">Name</th>
								<th class="column100 column3" data-column="column3">Roll</th>
								<th class="column100 column4" data-column="column4">Dept</th>
								<th class="column100 column5" data-column="column5">Phone</th>
								<th class="column100 column6" data-column="column6">Username</th>
								<th class="column100 column7" data-column="column7">Pass</th>
								<th class="column100 column8" data-column="column8">Email</th>
								<th class="column100 column9 w-25" data-column="column9">Reg_date</th>
								<th class="column100 column10 w-25 justify-content-center "  data-column="column10">Action</th>

							</tr>
						</thead>
						<tbody>
						<?php while($row = mysqli_fetch_array($result)){ ?>
								<tr class='row100 ' data-id="<?php echo $row['student_id'] ?>">

								<td class="column100  column1 pl-3 text-center" data-column="column1" id="<?php echo $row['student_id'] ?>"> <?php echo $row['student_id'] ?> </td>
								<td class="column100  column2" data-column="column2" data-target="n"> <?php echo $row['student_name'] ?> </td>
								<td class="column100  column3" data-column="column3" data-target="r"> <?php echo $row['roll_no'] ?> </td>
                  <?php 
                 
                  $d_id=$row['dep_id'];
                  $sql = "SELECT *  FROM department where dep_id='$d_id'";
                  $r =mysqli_query($conn, $sql);
                  $dep=mysqli_fetch_array($r);
                  ?>
								<td class="column100  column4" data-column="column4"data-target="d" > <?php echo $dep['dep_name'] ?> </td>
								<td class="column100   column5" data-column="column5" data-target="p"> <?php echo $row['phone'] ?> </td>
								<td class="column100  column6" data-column="column6" data-target="u"> <?php echo $row['username'] ?> </td>
								<td class="column100  column7" data-column="column7" data-target="p"> <?php echo $row['pass'] ?> </td>
								<td class="column100  column8" data-column="column8" data-target="e"> <?php echo $row['email'] ?> </td>
								<td class="column100   column9 align-text-center" data-column="column9"> <?php echo $row['reg_date'] ?> </td>
								<td class="column100 column10 justify-content-center " data-column="column10"><button class="btn btn-md btn-success editbtn" data-id="<?php echo $row['student_id'] ?>">Edit  </button>
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
          <label class="bg-info ">Please Select Departments</label>
          <select name='dept1' class="myselect" id='dept1' required>
              <option >Null</option>
              <?php
              while($row1=mysqli_fetch_array($re))
              {
                $dept_name=$row1['dep_name'];
                $d_id=$row1['dep_id'];
                echo "<option value='$d_id'>$dept_name</option>";
              }
              ?>
            </select>
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
      <div class="modal-header bg-info">
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
          <input class="text-danger " type="text"   id="dep_id" disabled>

           <label class="bg-info " >Select Department Name</label> 
          <select  name='dep_id'  class="select" id='depart' required>
              <?php
              $sql1="SELECT *  FROM department";
              $result=mysqli_query($conn, $sql1);
              while($row=mysqli_fetch_array($result))
              {
                $dept_name=$row['dep_name'];
                $d_id=$row['dep_id'];
                echo "<option value='$d_id'>$dept_name</option>";
              }
              ?>
            </select> 
            
           
           
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
<!-- <script>
$(document).ready(function()
{
  $('.editbtn').on('click',function(){
    
    $('#Edit').modal('show'); 
      $tr=$(this).closest('tr');

      var data=$tr.children("td").map(function(){
        return $(this).text();
      }).get();
      var name=data[3].toString();
      $('select#depart').val(name); 
      //console.log($("#deaprt 2:selected").index());
      console.log(data);
      $('#student_id').val(data[0]);
      $('#student_name').val(data[1]);
      $('#roll_no').val(data[2]);
      $('#dep_id').val(data[3]); 
      $('#phone').val(data[4]);
      $('#username').val(data[5]);
      $('#pass').val(data[6]);
      $('#email').val(data[7]);
  
      //var x=$("select[name='dep-id'] option:selected").index()
    
  });
});

</script> -->


<script>
  $(document).ready(function(){

$('.editbtn').click(function(){
  
  var userid = $(this).data('id');

  // AJAX request
  $.ajax({
   url: 'fetch.php',
   type: 'post',
   data: {userid: userid},
   success: function(response){ 
     // Add response in Modal body
     $('.modal-body').html(response);

     // Display Modal
     $('#Edit').modal('show'); 
   }
 });
});
});

// $(function(){
//     $('#Edit').modal({
//         keyboard: true,
//         backdrop: "static",
//         show:false,

//     }).on('show', function(){ //subscribe to show method
//           var getIdFromRow = $(event.target).closest('tr').data('id'); //get the id from tr
//         //make your ajax call populate items or what even you need
//         $(this).find('#formgroup').html($('<b> Order Id selected: ' + getIdFromRow  + '</b>'))
//     });
// });
</script>

</body>
</html>
<!-- ############################################################################################################## -->


<!-- ############################################################################################################## -->
