<?php

include 'connect.php';

//##############################################################################################################

$s_id = $_GET['student_id'];
if($s_id!=null)
{
    $sql = ("DELETE FROM students WHERE student_id=$s_id"); 
    mysqli_query($conn, $sql);
   
    header ('location:students.php');
    echo '<script>alert(" Data Deleted")</script>';
}
//##############################################################################################################

$t_id=$_GET['teacher_id'];
if($t_id!=null)
{
    $sql = ("DELETE FROM teacher WHERE teacher_id=$t_id"); 
    mysqli_query($conn, $sql);
    echo '<script> alert ("Data Deleted")</script>';
    header ('location:teachers.php');
}
//##############################################################################################################

$c_id=$_GET['course_id'];
if($c_id!=null)
{
    $sql = ("DELETE FROM courses WHERE course_id=$c_id"); 
    mysqli_query($conn, $sql);
    echo '<script> alert ("Data Deleted")</script>';
    header ('location:courses.php');
}

//##############################################################################################################
$d_id=$_GET['dep_id'];
if($d_id!=null)
{
    $sql = ("DELETE FROM department WHERE dep_id=$d_id"); 
    mysqli_query($conn, $sql);
    echo '<script> alert ("Data Deleted")</script>';
    header ('location:departments.php');
}

$e_id=$_GET['enroll_id'];
if($e_id!=null){
    $sql = ("DELETE FROM enrollments WHERE enroll_id=$e_id"); 
    mysqli_query($conn, $sql);
    header ('location:enrollments.php');


}
?>