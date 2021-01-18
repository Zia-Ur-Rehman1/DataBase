<?php 

$page='teachers';


include 'nav.php';
include 'connect.php';

$error='';
?>




<!DOCTYPE html>
<html lang="en">
<head>

	<title>Teachers</title>
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


$sql = "SELECT *  FROM teacher";

$result =mysqli_query($conn, $sql);

?>
<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
       
					<table data-vertable="ver1">
						<thead>
            <div class="col-12">
            <a href="#" class="float-right m-0 btn btn-success font-weight-bold add-btn" data-toggle="modal" data-target="#Add_Teacher">New Teacher + </a>
            </div>
							<tr class="row100 head">
								<th class="column100 column1" data-column="column1">ID</th>
								<th class="column100 column2" data-column="column2">Name</th>
								<th class="column100 column4" data-column="column4">Dept</th>
								<th class="column100 column5" data-column="column5">Phone</th>
								<th class="column100 column6" data-column="column6">Username</th>
								<th class="column100 column7" data-column="column7">Pass</th>
								<th class="column100 column8" data-column="column8">Email</th>
								<th class="column100 column9" data-column="column9">Reg_date</th>
								<th class="column100 column10 w-25 " data-column="column10">Action</th>

							</tr>
						</thead>
						<tbody>
						<?php while($row = mysqli_fetch_array($result)){ ?>
								<tr class='row100 '>

								<td class="column100  column1" data-column="column1"> <?php echo $row['teacher_id'] ?> </td>
								<td class="column100  column2" data-column="column2"> <?php echo $row['teacher_name'] ?> </td>
                <?php 
                  $d_id=$row['dep_id'];
                  $sql = "SELECT *  FROM department where dep_id='$d_id'";
                  $r =mysqli_query($conn, $sql);
                  $dep=mysqli_fetch_array($r);
                  ?>
                   
								<td class="column100  column4" data-column="column4"> <?php echo $dep['dep_name'] ?> </td>
								<td class="column100   column5" data-column="column5"> <?php echo $row['phone'] ?> </td>
								<td class="column100  column6" data-column="column6"> <?php echo $row['username'] ?> </td>
								<td class="column100  column7" data-column="column7"> <?php echo $row['pass'] ?> </td>
								<td class="column100  column8" data-column="column8"> <?php echo $row['email'] ?> </td>
								<td class="column100   column9 w-25" data-column="column9"> <?php echo $row['reg_date'] ?> </td>
								<td class="column100 column10 " data-column="column10"><button  class="btn btn-md btn-success editbtn"><a name="edit" class="editbtn" value="Edit" id="<?php echo $row["teacher_id"]; ?>">Edit</a>  </button>
									<button class="btn btn-md btn-danger float- "> <a class='text-white btn-del' href="delete.php?teacher_id=<?php echo $row['teacher_id']; ?>" name="delete">Delete</a> </button> </td>
								</tr>
							<?php } ?>

							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	




<!-- Modal -->
<div class="modal fade" id="Add_Teacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Enter Teacher Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action='new.php'  method="POST">
      <div class="modal-body">
        

          <div class="form-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Teacher name">
          </div>


       

          <div class="form-group">
      
          <label class="bg-info ">Please Select Departments</label>
          <select name='dept1' id='dept1'>
              <option >Null</option>
              <?php
              $sql1="SELECT *  FROM department";
              $re=mysqli_query($conn, $sql1);
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
            <input type="email" class="form-control" name="1email" id="1email" placeholder="Email address">
          </div>
       


      </div>
      <div class="modal-footer bg-dark">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="save_changes_for_teacher">Save Changes</button>

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
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Teacher Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="update_changes.php"  method="POST">
      <div class="modal-body">
        	<input type="hidden" name="teacher_id" id="teacher_id" />  
          <div class="form-group">
            <input type="text" class="form-control" name="teacher_name" id="teacher_name" placeholder="Teacher name">
          </div>


         


          <div class="form-group">
                    <label class="bg-info " >Select Department Name</label> 
                    <select  name='dep_id'  id="dep_id" required>
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
            <input type="email" class="form-control" name="email" id="email" placeholder="Email address">
          </div>
          
          



      </div>
      <div class="modal-footer bg-dark">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update_changes_for_teacher">Update Changes</button>

      </div>
      </form>

    </div>
  </div>
</div>


<!-- Edit Section End 


#############################################################################################################-->

<script>
$(document).ready(function(){  
      
      
  $('.editbtn').on('click',function(){  
           var teacherid = $(this).attr("id");  
                  console.log(teacherid);
                
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{teacherid:teacherid},  
                dataType:"json",  
                success:function(data){
                  console.log(data);
                 
                    $('#teacher_id').val(data.teacher_id);  
                    $('#teacher_name').val(data.teacher_name);  
                    $('#dep_id').val(data.dep_id);  
                    $('#phone').val(data.phone);  
                    $('#username').val(data.username);  
                    $('#pass').val(data.pass);  
                    $('#email').val(data.email);  
                    $('#Edit').modal('show');  
                }
                   
           });  
      });  

});
</script>

<script>
$('.btn-del').on('click',function(e){
  e.preventDefault();
  const href=$(this).attr('href')
  Swal.fire({
  icon:'error',
  title: "Are You Sure?",
  text: "Record will be Deleted?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!',
  reverseButtons: true,

}).then((result) => {
  if(result.value)
  {
    document.location.href=href;
  }
})


});
</script>


</body>
</html>