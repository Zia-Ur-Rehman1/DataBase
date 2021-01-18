<?php
include 'connect.php';
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
}

$sql="UPDATE students SET student_name='$student_name',roll_no='$roll_no',dep_id='$dep_id',phone='$phone',username='$username',pass='$pass',email='$email' Where student_id='$id' ";
$result=mysqli_query($conn,$sql);
if($result){
    echo '<script> alert ("Data Updated");</script>';
    header("Location:students.php");
}
else
{
    echo '<script> alert ("Data Not Updated");</script>';

}

?>