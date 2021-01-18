<?php

include 'connect.php';


$id = $_GET['student_id'];
$sql = ("DELETE FROM students WHERE student_id=$id"); 
mysqli_query($conn, $sql);
echo $id;
header ('location:students.php');



?>