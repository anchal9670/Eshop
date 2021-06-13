<?php
session_start();
include('connect.php');
include('nav.php');
 
    if (isset($_POST['sign_btn'])){
        $cname=$_POST['cname'];
        $mail=$_POST['mail'];
        $dob=$_POST['dob'];
        $mob=$_POST['mob'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $sponsor=$_POST['sponsor'];
        if ($password != $cpassword) {
            array_push($errors, "The two passwords do not match");
            echo '<script type ="text/JavaScript">';  
            echo 'alert("The two passwords do not match")';  
            echo '</script>'; 
          }
        
          // first check the database to make sure 
          // a user does not already exist with the same username and/or email
          $user_check_query = "SELECT email , Id FROM login WHERE email='$mail'  LIMIT 1";
          $result = mysqli_query($conn, $user_check_query);
          $user = mysqli_fetch_assoc($result);
          
          if ($user) { // if user exis
        
            if ($user['email'] === $mail) {
              array_push($errors, "email already exists");
             
              echo '<script type ="text/JavaScript">';  
              echo 'alert("email already exists")';  
              echo '</script>';
            }
            // if ($user['Id'] !=$sponsor) {
            //     array_push($errors, "sponsor  id not  exists");
            //     echo "sponsor  id not  exists";
            // }
          }

        
        if (count($errors) == 0)
        {
            $sql="INSERT INTO login(Name,email,date,mob,password,doj,sponsor) VALUES 
            ('$cname','$mail','$dob','$mob','$password',current_timestamp(),'$sponsor');";
            $result=mysqli_query($conn,$sql);
            if($result){
                echo '<script type ="text/JavaScript">';  
                echo 'alert("You are successfully Register")';  
                echo '</script>';
            }
            else{
                echo '<script type ="text/JavaScript">';  
                echo 'alert("ERROR -found something wrong")';  
                echo '</script>';
            }
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="sign.css">
</head>
<body>
    
    <div class="row">
        <div class="col-1 col-s-2">
        </div>
        <div class="col-2 col-s-2">
            <h2>SignUp Form</h2>
            <label name="msg"></label>
            <form action="SignUp.php" method="post">
            <label for="Name">Enter Name</label>
            <input type="text" id="Name" name="cname" required>
            <label for="mail">Enter Your E-Mail</label>
            <input type="email" id="mail" name="mail" required>
            <label for="DOB">Date of Birth</label>
            <input type="Date" id="DOB" name="dob" required>
            <label for="mob">Enter Mob. Number</label>
            <input type="tel" id="mob" name="mob" pattern="[0-9]{10}" required>
            <label for="password">Enter Password</label>
            <input type="password" id="password" name="password" required>
            <label for="cpassword">Enter Confirm Password</label>
            <input type="password" id="cpassword" name="cpassword" required>
            <label for="sponsor">Enter Sponsor Id</label>
            <input type="text" id="sponsor" name="sponsor" >
            <button class="btn" name="sign_btn">Submit</button>
            <button class="btn1" name="reset_btn">Reset</button>
            </form>

        </div>
    </div>
<div class="footer">
<p>copyright: &copy; 2021-2024 Binary Tech Consultancy. All right are reserved. </p>
</div>
</body>
</html>