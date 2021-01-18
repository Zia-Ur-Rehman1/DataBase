<?php 
include 'connect.php';
session_start();


$_SESSION['email_error'] = 'no';
$_SESSION['username_error'] = 'no';
$_SESSION['roll_error'] = 'no';
$_SESSION['phone_error'] = 'no';


if(isset($_POST['save_changes'])){

  $uname=$_POST["name"];
  $roll=$_POST['roll1'];
  $dept=$_POST['dept1'];
  $phone=$_POST["phone1"];
  $username=$_POST["username1"];
  $password=$_POST['1pass'];
  $email=$_POST["1email"];






  #Check for dublications////
  #We will check for email, username, roll_no,phone ////


  //////////////////////////////////////////////////
  /////////////////////////////////////////////////
    $sql = "SELECT *  FROM students where email='$email'";
    
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if($result->num_rows==1)
    {
      $_SESSION['email_error'] = 'yes';
      header('location:student_error.php');
    }
    

  //////////////////////////////////////////////////
  /////////////////////////////////////////////////
    $sql = "SELECT *  FROM students where username='$username'";
    
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
    $sql = "SELECT *  FROM students where roll_no='$roll'";
    
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if($result->num_rows==1)
    {
      $_SESSION['roll_error'] = 'yes';
      header('location:student_error.php');
    }
////////////////////////////////////////////////
////////////////////////////////////////////////




  //////////////////////////////////////////////////
  /////////////////////////////////////////////////
  $sql = "SELECT *  FROM students where phone='$phone'";
    
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if($result->num_rows==1)
  {
    $_SESSION['phone_error'] = 'yes';
    header('location:student_error.php');
  }
    

if ($_SESSION['email_error'] == 'no' && $_SESSION['username_error'] == 'no' && $_SESSION['roll_error'] == 'no' && $_SESSION['phone_error'] == 'no'){

  $sql=("INSERT INTO students (student_name,roll_no,dep_id,phone,username,pass,email) VALUES ('$uname','$roll','$dept','$phone','$username','$password','$email')");
  if(mysqli_query($conn, $sql)){
    $error= "Records added successfully.";
    header('location:students.php');
        } 
else{
   $error=  "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
      }


}
}
//<!--  ###################################################################################### -->

elseif(isset($_POST['save_changes_for_teacher'])){
  $uname=$_POST["name"];
  $dept=$_POST['dept1'];
  $phone=$_POST["phone1"];
  $username=$_POST["username1"];
  $password=$_POST['1pass'];
  $email=$_POST["1email"];


  $sql = "SELECT *  FROM teacher where email='$email'";
    
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if($result->num_rows==1)
  {
    $_SESSION['email_error'] = 'yes';
    header('location:teacher_error.php');
  }
  

//////////////////////////////////////////////////
/////////////////////////////////////////////////
$sql = "SELECT *  FROM teacher where username='$username'";
    
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
//////////////////////////////////////////////////

$sql = "SELECT *  FROM teacher where phone='$phone'";
    
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if($result->num_rows==1)
  {
    $_SESSION['phone_error'] = 'yes';
    header('location:student_error.php');
  }
    


  if ($_SESSION['email_error'] == 'no' && $_SESSION['username_error'] == 'no' && $_SESSION['phone_error'] == 'no'){


  $sql=("INSERT INTO teacher (teacher_name,dep_id,phone,username,pass,email) VALUES ('$uname','$dept','$phone','$username','$password','$email')");
  if(mysqli_query($conn, $sql)){
    $error= "Records added successfully.";
    header('location:teachers.php');
        } 
else{
   $error=  "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
      }


}
}
  



 // ###################################################################################### -->
// ###################################################################################### -->

// ###################################################################################### -->




elseif(isset($_POST['save_changes_for_course'])){
  $uname=$_POST["name"];
  
  $_SESSION['course_error'] = 'no';

  $sql = "SELECT *  FROM courses where course_name='$uname'";
    
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $name = $row['course_name'];
  $name = strtoupper($name);
  if($name == strtoupper($uname))
  {
    $_SESSION['course_error'] = 'yes';
    header('location:course_error.php');
  }




  if( $_SESSION['course_error'] == 'no'){
  $sql=("INSERT INTO courses (course_name) VALUES ('$uname')");
  if(mysqli_query($conn, $sql)){
    echo "<script>alert('New Record Added');</script>";
    header('location:courses.php');
        } 


}
}
  // ###################################################################################### -->

// ###################################################################################### -->

// ###################################################################################### -->


elseif(isset($_POST['save_changes_for_department'])){
  $dep_name=$_POST["name"];
 

 
  $_SESSION['dep_error'] = 'no';

  $sql = "SELECT *  FROM department where dep_name='$dep_name'";
    
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
  $sql=("INSERT INTO department (dep_name) VALUES ('$dep_name')");
  if(mysqli_query($conn, $sql)){
    echo "<script> alert('Records Added ');window.location='departments.php'</script>";
        } 


    }
}




elseif(isset($_POST['save_changes_for_enrollment'])){
  $sname=$_POST["student"];
  $cname=$_POST["course"];
  $tname=$_POST["teacher_id"];

$_SESSION['en_error'] = 'no';



$sql = "SELECT *  FROM enrollments where student_id='$sname' and course_id='$cname' and teacher_id='$tname'";
  
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if($result->num_rows==1)
{
  $_SESSION['en_error'] = 'This student is already enrolled, in this course';
  header('location:en_error.php');
}

$sql = "SELECT *  FROM enrollments where student_id='$sname' and course_id='$cname'";
  
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if($result->num_rows==1)
{
  $_SESSION['en_error'] = 'Sorry, you cannot take same course from two teachers';
  header('location:en_error.php');
}




if ($_SESSION['en_error'] == 'no' ){
  $sql="INSERT INTO enrollments (student_id, course_id, teacher_id) VALUES ('$sname', '$cname', '$tname')";
  if(mysqli_query($conn, $sql)){
    $error= "Records added successfully.";
    header('location:enrollments.php');
        } 

}
}
?>