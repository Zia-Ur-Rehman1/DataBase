<?php
include 'connect.php';

if(isset($_POST["userid"]))  
{
    $id=$_POST["userid"];
    $query="SELECT * from students WHERE student_id='$id'" ;
    $result = mysqli_query($conn, $query);  
    $row = mysqli_fetch_array($result);
    
    echo json_encode($row);  
}
elseif(isset($_POST["teacherid"]))
{
    $id=$_POST["teacherid"];
    $query="SELECT * from teacher WHERE teacher_id='$id'" ;
    $result = mysqli_query($conn, $query);  
    $row = mysqli_fetch_array($result);
    
    echo json_encode($row);
}

 ?>