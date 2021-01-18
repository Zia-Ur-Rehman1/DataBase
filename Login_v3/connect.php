<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="lmsdb";
// /create new database/ 

$conn = mysqli_connect($servername, $username, $password,$dbname);
//$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed:". mysqli_connect_error());
}



?>