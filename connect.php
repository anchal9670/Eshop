<?php
// Initialize the session
$server="localhost";
$username="root";
$password="";
$database="binary";

$conn=mysqli_connect($server,$username,$password,$database);
// if(!$conn){
//     die("connection to this data base failed due to".mysqli_connect_error());
// }
// else {
//     echo "sucess";
// }
?>