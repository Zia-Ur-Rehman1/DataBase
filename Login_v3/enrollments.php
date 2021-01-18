<?php 

$page='enrollments';

include 'nav.php';
include 'connect.php';
include 'link.php';

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


$sql = "SELECT *  FROM enrollments";

$result =mysqli_query($conn, $sql);


?>
<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
       
					<table data-vertable="ver1">
						<thead>
            <div class="col-12">
            <a href="#" class="float-right m-0 btn btn-success font-weight-bold add-btn" data-toggle="modal" data-target="#Add_Student">New Enrollment + </a>
            </div>
							<tr class="row100 head ">
                            <th class="column100 column1  text-center" data-column="column1">ID </th>
								<th class="column100 column2 w-25 " data-column="column1">Student Name</th>
								<th class="column100 column3 w-25" data-column="column2">Teacher Name</th>
								<th class="column100 column4 w-25" data-column="column3">Course Name</th>
								<th class="column100 column9 w-25" data-column="column9">Reg_date</th>
								<th class="column100 column10 w-25 justify-content-center "  data-column="column10">Action</th>

							</tr>
						</thead>
						<tbody>
						<?php while($row = mysqli_fetch_array($result)){ ?>
								<tr class='row100 '>
								<td class="column100  column1  text-center" data-column="column1"> <?php echo $row['enroll_id'] ?> </td>

                                <?php 
                                    $s_id=$row['student_id'];
                                    $sql = "SELECT *  FROM students where student_id='$s_id'";
                                    $r =mysqli_query($conn, $sql);
                                    $s=mysqli_fetch_array($r);
                                    ?>
								<td class="column100  column2  " data-column="column2"> <?php echo $s['student_name'] ?> </td>
                                <?php 
                                    $s_id=$row['teacher_id'];
                                    $sql = "SELECT *  FROM teacher where teacher_id='$s_id'";
                                    $r =mysqli_query($conn, $sql);
                                    $s=mysqli_fetch_array($r);
                                    ?>
                                <td class="column100  column3" data-column="column3"> <?php echo $s['teacher_name'] ?> </td>
                                <?php 
                                    $s_id=$row['course_id'];
                                    $sql = "SELECT *  FROM courses where course_id='$s_id'";
                                    $r =mysqli_query($conn, $sql);
                                    $s=mysqli_fetch_array($r);
                                    ?>
                                <td class="column100  column4" data-column="column4"> <?php echo $s['course_name'] ?> </td>
                 
								<td class="column100   column9 align-text-center" data-column="column9"> <?php echo $row['reg_date'] ?> </td>
								<td class="column100 column10 justify-content-center " data-column="column10">
									<button class="btn btn-md btn-danger float- "> <a class='btn-del text-white' href="delete.php?enroll_id=<?php echo $row['enroll_id']; ?>" name="delete">Delete</a> </button> </td>
								</tr>
							<?php } ?>

							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
<!-- ######################################################################################## -->





<div class="modal fade" id="Add_Student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Enter Enrollemnt Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action='new.php'  method="POST">
      

      <div class="modal-body">
		  <!-- ############################# -->
        


          <div class="form-group">
          <label class="bg-info ">Please Select Students</label>
          <select name='student' id='student'>
              <option >Null</option>
			  <?php
			  $sql1="SELECT *  FROM students";
              $re=mysqli_query($conn, $sql1);
              while($row1=mysqli_fetch_array($re))
              {
                $dept_name=$row1['student_name'];
                $d_id=$row1['student_id'];
                echo "<option value='$d_id'>$dept_name</option>";
              }
              ?>
            </select>
		  </div>

		  <!-- ############################# -->
		  <div class="form-group">
          <label class="bg-info ">Please Select Teacher</label>
          <select name='teacher_id' id='teacher'>
              <option >Null</option>
			  <?php
              $sql1="SELECT *  FROM teacher";
              $re=mysqli_query($conn, $sql1);
              while($row1=mysqli_fetch_array($re))
              {
                $tept_name=$row1['teacher_name'];
                $t_id=$row1['teacher_id'];
                echo "<option value='$t_id'>$tept_name</option>";
              }
              ?>
            </select>
          </div>

		  <!-- ############################# -->

		  <div class="form-group">
          <label class="bg-info ">Please Select Courses</label>
          <select name='course' id='course'>
              <option >Null</option>
			  <?php
			
              $sql1="SELECT *  FROM courses";
              $re=mysqli_query($conn, $sql1);
              while($row1=mysqli_fetch_array($re))
              {
                $dept_name=$row1['course_name'];
                $d_id=$row1['course_id'];
                echo "<option value='$d_id'>$dept_name</option>";
              }
              ?>
            </select>
          </div>

		  

		  <!-- ############################# -->
		 



      </div>
      <div class="modal-footer bg-dark">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="btn" class="btn btn-primary" name="save_changes_for_enrollment">Save Changes</button>

      </div>
      </form>

    </div>
  </div>
</div>




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
<!-- ######################################################################################## -->
<!-- ######################################################################################## -->
<!-- ######################################################################################## -->
