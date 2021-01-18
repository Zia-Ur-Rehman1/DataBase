<?php
include 'connect.php';

session_start();
$_SESSION['email_error'] = 'no';
$_SESSION['username_error'] = 'no';
$_SESSION['roll_error'] = 'no';
$_SESSION['phone_error'] = 'no';



if(isset($_POST['update_changes']))
{
    $id=$_POST['student_id'];
    $student_name=$_POST['student_name'];
    $roll_no=$_POST['roll_no'];
    $dep_id=$_POST['dep_id'];
    $phone=$_POST['phone_no'];
    $username=$_POST['username'];
    $pass=$_POST['pass'];
    $email=$_POST['email'];




  #Check for dublications////
  #We will check for email, username, roll_no,phone////


  //////////////////////////////////////////////////
  /////////////////////////////////////////////////
  $sql = "SELECT *  FROM students where email='$email' and student_id!='$id'";
    
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if($result->num_rows==1)
  {
    $_SESSION['email_error'] = 'yes';
    header('location:student_error.php');
  }
  

//////////////////////////////////////////////////
/////////////////////////////////////////////////
  $sql = "SELECT *  FROM students where username='$username' and student_id!='$id'";
  
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $name = $row['username'];
  $name = strtoupper($name);
  if($name == strtoupper($username))
  {
    $_SESSION['username_error'] = 'yes';
    header('location:student_error.php');
  }

//////////////////////////////////////////////////
/////////////////////////////////////////////////
  $sql = "SELECT *  FROM students where roll_no='$roll_no' and student_id!='$id'";
  
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if($result->num_rows==1)
  {
    $_SESSION['roll_error'] = 'yes';
    header('location:student_error.php');
  }
////////////////////////////////////////////////
////////////////////////////////////////////////


$sql = "SELECT *  FROM students where phone='$phone' and student_id!='$id'";
    
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if($result->num_rows==1)
{
  $_SESSION['phone_error'] = 'yes';
  header('location:student_error.php');
}



if ($_SESSION['email_error'] == 'no' && $_SESSION['username_error'] == 'no' && $_SESSION['roll_error'] == 'no' && $_SESSION['phone_error'] == 'no'){

    $sql="UPDATE students SET student_name='$student_name',roll_no='$roll_no',dep_id='$dep_id',phone='$phone',username='$username',pass='$pass',email='$email' Where student_id='$id' ";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('Data Updated');</script>";
        header("Location:students.php");
    }
    
}

  //////////////////////////////////////////////////
  /////////////////////////////////////////////////
 
}

// ############################################################################################
// ############################################################################################
// ############################################################################################

elseif(isset($_POST['update_changes_for_teacher']))
{
    $id=$_POST['teacher_id'];
    $teacher_name=$_POST['teacher_name'];
    $dep_id=$_POST['dep_id'];
    $phone=$_POST['phone_no'];
    $username=$_POST['username'];
    $pass=$_POST['pass'];
    $email=$_POST['email'];


    $sql = "SELECT *  FROM teacher where email='$email' and teacher_id!='$id'";
    
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if($result->num_rows==1)
    {
      $_SESSION['email_error'] = 'yes';
      header('location:teacher_error.php');
    }
    
  
  //////////////////////////////////////////////////
  /////////////////////////////////////////////////
  $sql = "SELECT *  FROM teacher where username='$username' and teacher_id!='$id'";
      
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $name = $row['username'];
  $name = strtoupper($name);
  if($name == strtoupper($username))
  {
    $_SESSION['username_error'] = 'yes';
    header('location:teacher_error.php');
  }


  //////////////////////////////////////////////////
  /////////////////////////////////////////////////
  $sql = "SELECT *  FROM teacher where phone='$phone' and teacher_id!='$id'";
      
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  
  if($result->num_rows==1)
  {
    $_SESSION['phone_error'] = 'yes';
    header('location:teacher_error.php');
  }


  if ($_SESSION['email_error'] == 'no' && $_SESSION['username_error'] == 'no' && $_SESSION['phone_error'] == 'no'){

$sql="UPDATE teacher SET teacher_name='$teacher_name',dep_id='$dep_id',phone='$phone',username='$username',pass='$pass',email='$email' Where teacher_id='$id' ";
$result=mysqli_query($conn,$sql);
if($result){
    echo '<script> alert ("Data Updated");</script>';
    header("Location:teachers.php");
}


}
}

// ############################################################################################
// ############################################################################################
// ############################################################################################



elseif(isset($_POST['update_changes_for_course']))
{
    $id=$_POST['course_id'];
    $course_name=$_POST['course_name'];

    $_SESSION['course_error'] = 'no';

  $sql = "SELECT *  FROM courses where course_name='$course_name' and course_id!='$id'";
    
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $name = $row['course_name'];
  $name = strtoupper($name);
  if($name == strtoupper($course_name))
  {
    $_SESSION['course_error'] = 'yes';
    header('location:course_error.php');
  }


  elseif( $_SESSION['course_error'] == 'no'){
$sql="UPDATE courses SET course_name='$course_name' Where course_id='$id' ";
$result=mysqli_query($conn,$sql);
if($result){
    echo '<script> alert ("Data Updated");</script>';
    header("Location:courses.php");
}
else
{
    echo '<script> alert ("Data Not Updated");</script>';

}
}
}


// ############################################################################################
// ############################################################################################
// ############################################################################################
// ############################################################################################
elseif(isset($_POST['update_changes_for_department']))
{
    $id=$_POST['dep_id'];
    $dep_name=$_POST['dep_name'];


 
    $_SESSION['dep_error'] = 'no';

    $sql = "SELECT *  FROM department where dep_name='$dep_name' and dep_id!='$id'";
      
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['dep_name'];
    $name = strtoupper($name);
    if($name == strtoupper($dep_name))
    {
      $_SESSION['dep_error'] = 'yes';
      header('location:dep_error.php');
    }
  

    elseif ( $_SESSION['dep_error'] == 'no'){
$sql="UPDATE department SET dep_name='$dep_name' Where dep_id='$id' ";
$result=mysqli_query($conn,$sql);
if($result){
    echo '<script> alert ("Data Updated");</script>';
    header("Location:departments.php");
}


}
}
?>