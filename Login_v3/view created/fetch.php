<?php
include 'nav.php';
include 'connect.php';

$userid=$_POST['userid'];
$sql="SELECT * from students WHERE student_id=".$userid ;
$result=mysqli_query($conn,$sql);
$response = "<table border='0' width='100%'>";
while( $row = mysqli_fetch_array($result) ){
 $id = $row['student_id'];
 $student_name = $row['student_name'];
 $roll_no = $row['roll_no'];
 $dep_id = $row['dep_id'];
 $phone = $row['phone'];
 $username = $row['username'];
 $pass = $row['pass'];
 $email = $row['email'];
 
 $response .= "<tr>";
 $response .= "<td>Name : </td><td>".$student_name."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Roll No : </td><td>".$roll_no."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Dep_id : </td><td>".$dep_id."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Phone : </td><td>".$phone."</td>";
 $response .= "</tr>";

 $response .= "<tr>"; 
 $response .= "<td>Username : </td><td>".$username."</td>"; 
 $response .= "</tr>";

 $response .= "<tr>"; 
 $response .= "<td>Pass : </td><td>".$pass."</td>"; 
 $response .= "</tr>";

 $response .= "<tr>"; 
 $response .= "<td>Email : </td><td>".$email."</td>"; 
 $response .= "</tr>";

}
$response .= "</table>";

echo $response;
exit;
 ?>