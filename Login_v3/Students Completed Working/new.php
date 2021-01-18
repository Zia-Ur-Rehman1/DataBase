<?php 
include 'connect.php';
if(isset($_POST['save_changes'])){

  $uname=$_POST["name"];
  $roll=$_POST['roll1'];
  $dept=$_POST['dept1'];
  $phone=$_POST["phone1"];
  $username=$_POST["username1"];
  $password=$_POST['1pass'];
  $email=$_POST["1email"];
  $sql=("INSERT INTO students (student_name,roll_no,dep_id,phone,username,pass,email) VALUES ('$uname','$roll','$dept','$phone','$username','$password','$email')");
  if(mysqli_query($conn, $sql)){
    $error= "Records added successfully.";
    header('location:students.php');
        } 
else{
   $error=  "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
      }


}


else{
  $error= "Data Getting error";
}
  

?>