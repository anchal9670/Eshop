<?php

include('connect.php');
include('nav.php');
    $errors = array();
  
    if (isset($_POST['sign_btn'])){
        $cname=$_POST['cname'];
        $email=$_POST['email'];
        $dob=$_POST['dob'];
        $mob=$_POST['mob'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $sponsor=$_POST['sponsor'];
        $search=$_POST['search'];
        if ($password != $cpassword) {
            array_push($errors, "The two passwords do not match");
            echo '<script type ="text/JavaScript">';  
            echo 'alert("The two passwords do not match")';  
            echo '</script>'; 
          }
        
          // first check the database to make sure 
          // a user does not already exist with the same username and/or email
          $user_check_query = "SELECT email , Id FROM login WHERE email='$email'  LIMIT 1";
          $result = mysqli_query($conn, $user_check_query);
          $user = mysqli_fetch_assoc($result);
          
          if ($user) { // if user exis
        
            if ($user['email'] === $email) {
              array_push($errors, "email already exists");
             
              echo '<script type ="text/JavaScript">';  
              echo 'alert("email already exists")';  
              echo '</script>';
            }
            // if ($user['Id'] !=$sponsor) {
            //      array_push($errors, "sponsor  id not  exists");
            //      echo "sponsor  id not  exists";
            // }
          }

        
        if (count($errors) == 0)
        {
            $sql="INSERT INTO login(Name,email,date,mob,password,doj,sponsor,spName) VALUES 
            ('$cname','$email','$dob','$mob','$password',current_timestamp(),'$sponsor','$search');";
            $result=mysqli_query($conn,$sql);
            $sql1="UPDATE login set refler=refler+1 where Id=$sponsor";
            $result1=mysqli_query($conn,$sql1);
            if($result){
                $html="<h3 style='color:blue;'>Binary Tech Consultancy</h3><h4 style='color:red;'>Welcome</h4> Congratulation for become the family member of BTC. <br><center><table style='width=100%; border-collapse: collapse;'><tr><td>Name</td><td>$cname</td></tr><tr><td>Email</td><td>$email</td></tr><tr><td>Mobile</td><td>$mob</td></tr><tr><td>Password</td><td>$password</td></tr></table></center>";
                
                include('smtp/PHPMailerAutoload.php');
                $mail=new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host="smtp.gmail.com";
                $mail->Port=587;
                $mail->SMTPSecure="tls";
                $mail->SMTPAuth=true;
                $mail->Username="digitaluniverse.india@gmail.com";
                $mail->Password="Anchal123";
                $mail->SetFrom("digitaluniverse.india@gmail.com");
                $mail->addAddress($email);
                $mail->IsHTML(true);
                $mail->Subject="BTC Welcome Letter";
                $mail->Body=$html;
                $mail->SMTPOptions=array('ssl'=>array(
                    'verify_peer'=>false,
                    'verify_peer_name'=>false,
                    'allow_self_signed'=>false
                ));
                if($mail->send()){
                    //echo "Mail send";
                }else{
                    //echo "Error occur";
                }
                
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
  
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Sansita:ital@1&display=swap" rel="stylesheet">
<style>

.footer {
    background-color: #39464a;
    color: #ffffff;
    text-align: center;
    font-size: 12px;
    padding: 15px;
    }
    /* For mobile phones: */
    [class*="col-"] {
    width: 90%;
    }
    @media only screen and (min-width: 600px) {
    /* For tablets: */
    
    .container {width: 50%;}
    
    }
    @media only screen and (min-width: 768px) {
    /* For desktop: */
    
    .container {width: 50%;}
  
    
    }
    h2{
        font-family: 'Sansita', sans-serif;
    }
</style>
</head>
<body>
<div class="row p-3">
    <div class="container border rounded bg-light ">
  
        <div class="form p-2 ">         
            <h2 class="text-center text-success p-3">SignUp </h2>
            <label name="msg"></label>
            <form action="SignUp.php" method="post">
    
            <div class="form-group">
            <label for="Name" class="text-primary ">Enter Name</label>
            <input type="text" id="Name" name="cname" class="form-control " required>
            </div><div class="form-group">
            <label for="email" class="text-primary ">Enter Your E-Mail</label>
            <input type="email" id="email" name="email" class="form-control " required>
            </div><div class="form-group">
            <label for="DOB" class="text-primary ">Date of Birth</label>
            <input type="Date" id="DOB" name="dob" class="form-control " required>
            </div><div class="form-group">
            <label for="mob" class="text-primary ">Enter Mob. Number</label>
            <input type="tel" id="mob" name="mob" pattern="[0-9]{10}" class="form-control " required>
            </div><div class="form-group">
            <label for="password" class="text-primary ">Enter Password</label>
            <input type="password" id="password" name="password" class="form-control " required>
            </div><div class="form-group">
            <label for="cpassword" class="text-primary ">Enter Confirm Password</label>
            <input type="password" id="cpassword" name="cpassword" class="form-control "required>
            </div>
            <div class="form-group">
            <label for="search" class="text-primary ">Sponsor Name</label>
            
            <input type="hidden" id="search" name="search" value="" class="form-control" >
            <input type="text" id="search1" name="search1" value="" class="form-control" disabled>
            </div>
         
            <div class="form-group">
            <input type="hidden" id="sponsor" name="sponsor"  value=""  >
            <label for="spemail" class="text-primary ">Enter Sponsor email</label>
            <input type="text" id="spemail" name="spemail" onkeyup="GetDetail(this.value)" value="" class="form-control" >
            </div>
            <div class="btn-group d-flex p-3">
            <button class="btn btn-primary flex-fill" name="sign_btn" p-3 style="font-family: 'Sansita', sans-serif; font-size:25px;">Submit</button>
            
            </div>
        </form>

        </div>
    </div>
</div>
<script>

// onkeyup event will occur when the user
// release the key and calls the function
// assigned to this event
function GetDetail(str) {
    if (str.length == 0) {
        document.getElementById("search").value = "";
        document.getElementById("search1").value = "";
        document.getElementById("sponsor").value = "";
        

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
                
                document.getElementById(
                    "search").value = myObj[0];
                document.getElementById(
                        "search1").value = myObj[1];
                document.getElementById(
							"sponsor").value = myObj[2];
                
              
            }
        };

        // xhttp.open("GET", "filename", true);
        xmlhttp.open("GET", "gfg1.php?spemail=" + str, true);
        
        // Sends the request to the server
        xmlhttp.send();
    }
}
</script>
<div class="footer">
<p>copyright: &copy; 2021-2024 Binary Tech Consultancy. All right are reserved. </p>
</div>
</body>
</html>