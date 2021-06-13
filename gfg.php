<?php

// Get the user id
$Id = $_REQUEST['Id'];

// Database connection
$con = mysqli_connect("localhost", "root", "", "binary");

if ($Id !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($con, "SELECT Name,
	email,mob,doj,Status FROM login WHERE Id='$Id'");

	$row = mysqli_fetch_array($query);

	// Get the  name
	$Name = $row["Name"];

	// Get the email
	$email= $row["email"];
	$mob= $row["mob"];
	$doj= $row["doj"];
	$status= $row["Status"];


}

// Store it in a array
$result = array("$Name", "$email","$mob","$doj","$status");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>