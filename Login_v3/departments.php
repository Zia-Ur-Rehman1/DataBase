<?php 

$page='departments';

include 'nav.php';
include 'connect.php';

$error='';
?>




<!DOCTYPE html>
<html lang="en">
<head>


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


$sql = "SELECT *  FROM department";

$result =mysqli_query($conn, $sql);

?>
<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
       
					<table data-vertable="ver1">
						<thead>
            <div class="col-12">
            <a href="#" class="float-right m-0 btn btn-success font-weight-bold add-btn " data-toggle="modal" data-target="#Add_Department">New Department + </a>
            </div>
							<tr class="row100 head ">
								<th class="column100 column1 text-center" data-column="column1">ID</th>
								<th class="column100 column2" data-column="column2">Name</th>
								
								
								<th class="column100 column10 w-25 " data-column="column10">Action</th>

							</tr>
						</thead>
						<tbody>
						<?php while($row = mysqli_fetch_array($result)){ ?>
								<tr class='row100  '>

								<td class="column100  column1 text-center" data-column="column1"> <?php echo $row['dep_id'] ?> </td>
								<td class="column100  column2 w-25" data-column="column2"> <?php echo $row['dep_name'] ?> </td>
								
								
								<td class="column100 column10 " data-column="column10"><button class="btn btn-md btn-success editbtn">Edit  </button>
									<button class="btn btn-md btn-danger  "> <a class='text-white btn-del' href="delete.php?dep_id=<?php echo $row['dep_id']; ?>" name="delete">Delete</a> </button> </td>
								</tr>
							<?php } ?>

							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	




<!-- Modal -->
<div class="modal fade" id="Add_Department" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Enter Department Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action='new.php'  method="POST">
      <div class="modal-body">
        
     
          <div class="form-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Department Name">
          </div>
              
          


      </div>
      <div class="modal-footer bg-dark">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="save_changes_for_department">Save Changes</button>

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
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Department Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="update_changes.php"  method="POST">
      <div class="modal-body">
        	<input type="hidden" name="dep_id" id="dep_id" />  
          <div class="form-group">
            <input type="text" class="form-control" name="dep_name" id="dep_name" placeholder="Course Name">
          </div>
          



      </div>
      <div class="modal-footer bg-dark">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update_changes_for_department">Update Changes</button>

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
      $('#dep_id').val(data[0]);
      $('#dep_name').val(data[1]);
      
  
  
  
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
<!-- ############################################################################################################## -->


<!-- ############################################################################################################## -->
