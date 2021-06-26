<?php
include("connect.php");
// Get the user id
$email = $_REQUEST['email'];


if ($email !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($conn, "SELECT Name,
	Id,mob,doj,Status FROM login WHERE email='$email'");

	$row = mysqli_fetch_array($query);

	// Get the  name
	$Name = $row["Name"];

	// Get the email
	$Id= $row["Id"];
	$mob= $row["mob"];
	$doj= $row["doj"];
	$status= $row["Status"];


}

// Store it in a array
$result = array("$Name", "$Id","$mob","$doj","$status");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>