<?php
include("nav.php");
include("connect.php");

error_reporting(0);

if (isset($_POST['sign_btn'])){
   
   
    $Id=$_POST['Id'];
    $Name=$_POST['Name'];
    $mob=$_POST['mob'];
    $doj=$_POST['doj'];
    $status=$_POST['status'];

    $email=$_POST['email'];
    $password=$_POST['password'];
    $user_check_query = "SELECT email ,password FROM login WHERE email='$email'  LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exis
        
        if ($user['password']===$password) 
        {
             
            // Storing username in session variable
            
            $_SESSION['email'] = $email;
            $_SESSION['Id'] = $Id;
            $_SESSION['Name'] = $Name;
            $_SESSION['mob'] = $mob;
            $_SESSION['doj'] = $doj;
            $_SESSION['status'] = $status;
            // Welcome message
            $_SESSION['success'] = "Online";
         
            // Page on which the user is sent
            // to after logging in
            
            echo"<script>
            
            window.location.href='shop.php';
            </script>
            ";
            
            
           
            
        }
        else
        {
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Password is incorrect")';  
            echo '</script>'; 
        }
    }
    else{
            echo '<script type ="text/JavaScript">';  
            echo 'alert("email is incorrect or not register")';  
            echo '</script>'; 
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="stylesheet" href="login1.css">
</head>
<body>
   
    <div class="row">
        <div class="col-1 col-s-1 menu">
       
        </div>
        <div class="col-2 col-s-2">
            <h2>Login Form</h2>
            <form action="login.php" method="post">
            <label for="Id">User Id</label>
            <input type='text' name="Id"
            id='Id' 
        
            onkeyup="GetDetail(this.value)" value="">

            
            <input type="hidden" name="Name"
                id="Name" value="">

            <label for="email">E-mail</label>
            <input type="text" name="email"
                id="email" value="">
            
            
            <input type="hidden" name="mob"
                id="mob" value="">
            
            <input type="hidden" name="doj"
                id="doj" value="">
            
            <input type="hidden" name="status"
                id="status" value="">

            <label for="pass">Enter Password</label>
            <input type="password" id="pass"  name="password" >
            <button class="btn" name="sign_btn">Submit</button>
            </form>
        </div>
        <div class="col-3 col-s-3">
            
        </div>
    </div>
    <div class="footer">
    <p>copyright: &copy; 2021-2024 Binary Tech Consultancy. All right are reserved.</p>
    </div>
    <script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("Name").value = "";
				document.getElementById("eamil").value = "";
				document.getElementById("mob").value = "";
				document.getElementById("doj").value = "";

				document.getElementById("status").value = "";

				return;
			}
			else {

				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to first name input field
						
						document.getElementById
							("Name").value = myObj[0];
						
						// Assign the value received to
						// last name input field
						document.getElementById(
							"email").value = myObj[1];
                        document.getElementById(
							"mob").value = myObj[2];
                        document.getElementById(
							"doj").value = myObj[3];
                        document.getElementById(
							"status").value = myObj[4];
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "gfg.php?Id=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>
</body>
</html>