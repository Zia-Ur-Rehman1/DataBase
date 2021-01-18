<?php
include 'link.php';
session_start();
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <style>
      .active{
          color:white;
          background-color: rgb(51,122,183);
          border-radius: 5%;
      }
    </style>
    <meta charset="UTF-8">
    <title></title>
    </head>
<body data-spy="scroll" data-target="navbarCollapse">
<nav class="navbar   navbar-expand-md navbar-dark bg-dark">
    <a href="#" class="navbar-brand ">
        <img src="images/1.jpg" height="38" >
        Admin Acess
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse  navbar-collapse" id="navbarCollapse">
        <div class="  navbar-nav">
           
           <li  class="<?php if($page=='students'){echo 'active';}?>">  <a href="students.php" class=" nav-item nav-link ">Students</a></li>
           <li class="<?php if($page=='teachers'){echo 'active';}?>"> <a href="teachers.php" class=" nav-item nav-link">Teachers</a></li>
           <li class="<?php if($page=='courses'){echo 'active';}?>"> <a href="courses.php" class=" nav-item nav-link">Courses</a></li>
           <li class="<?php if($page=='departments'){echo 'active';}?>"> <a href="departments.php" class="nav-item nav-link">Departments</a></li>
           <li class="<?php if($page=='enrollments'){echo 'active';}?>"> <a href="enrollments.php" class="nav-item nav-link">Enrollments</a></li>
        </div>
        <div class="navbar-nav ml-auto">
            <a href="#" data-toggle="modal" data-target="#modal"   class="nav-item  text-light h3 text-uppercase p-2"><i class="fa fa-user mr-2 text-primary"  aria-hidden="true"></i><?php echo $_SESSION['name']?></a>
        </a>
        </div>
    </div>
</nav>
<!--Logout moddle-->
<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Do you Want to logout ?</h3>
                <button type="button" class="close" data-dismiss="modal">&times;

                </button>
            </div>
            <div class="modal-body">
               
            </div>
            <div class="modal-footer">
                <!-- <button  type="button"  class="btn btn-danger" data-dismiss="modal"> -->
                    <a class="btn btn-primary" href="logout.php">Logout</a>
            
            </div>
        </div>
    </div>
</div>
<!---end of logout section-->
</body>
</html>
