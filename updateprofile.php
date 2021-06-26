<?php
session_start();
include('connect.php');
include('navlog.php');

error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
  
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
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
    
    .container {width: 45%;}
    
    }
    @media only screen and (min-width: 768px) {
    /* For desktop: */
    
    .container {width: 45%;}
  
    
    }
    h2{
        font-family: 'Playfair Display', serif;
    }
</style>
</head>
<body>
<!-- Profile -->
<div class="row p-3">
    <div class="container border rounded bg-light p-2">
  
        <div class="form p-2 ">         
            <h2 class="text-center text-success p-3">Personal Details</h2>
            
            <form action="updateprofile.php" method="post">
    
            <div class="form-group">
            <label for="add" class="text-primary ">Enter Address</address></label>
            <input type="text" id="add" name="add" class="form-control " required>
            </div><div class="form-group">
            <label for="city" class="text-primary ">Enter City</label>
            <input type="text" id="city" name="city" class="form-control " required>
            </div><div class="form-group">
            <label for="pin" class="text-primary ">Enter pin</label>
            <input type="tel" id="pin" name="pin" pattern="[0-9]{6}" class="form-control " required>
            </div><div class="form-group">
            <label for="state" class="text-primary ">Enter State </label>
            <input type="text" id="state" name="state"  class="form-control " required>
            </div><div class="form-group">
            <label for="country" class="text-primary ">Enter Country</label>
            <input type="text" id="country" name="country" class="form-control " required>
            </div>
            <div class="btn-group d-flex p-3">
            <button class="btn btn-primary flex-fill" name="P_update" p-3 style="font-family: 'Sansita', sans-serif; font-size:25px;">Update Personal Details</button>
            
            </div>
        </form>

        </div>
    </div>
    <div class="container border rounded bg-light p-2">
    
        <div class="form p-2 ">         
            <h2 class="text-center text-success p-3">Bank Details</h2>
            
            <form action="updateprofile.php" method="post">

            <div class="form-group">
            <label for="add" class="text-primary ">Enter Bank Name</address></label>
            <input type="text" id="add" name="bankname" class="form-control " required>
            </div><div class="form-group">
            <label for="city" class="text-primary ">Enter A/C no.</label>
            <input type="text" id="city" name="account" class="form-control " required>
            </div><div class="form-group">
            <label for="pin" class="text-primary ">Enter IFSC code</label>
            <input type="tel" id="pin" name="ifsc"  class="form-control " required>
            </div><div class="form-group">
            <label for="state" class="text-primary ">Enter Branch Name </label>
            <input type="text" id="state" name="branch"  class="form-control " required>
            </div>
            <div class="btn-group d-flex p-3">
            <button class="btn btn-primary flex-fill" name="B_update" p-3 style="font-family: 'Sansita', sans-serif; font-size:25px;">Update Bank Details</button>
            
            </div>
            </form>

        </div>
    </div>
</div>
<?php
 if (isset($_POST['P_update'])){
    $add=$_POST['add'];
    $city=$_POST['city'];
    $pin=$_POST['pin'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $email=$_SESSION['email'];
    $sql="UPDATE login set address='$add' , city='$city', pin='$pin' ,state='$state',country='$country' where email='$email'";
    $result=mysqli_query($conn,$sql);
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Your Profile Update Successfully")';  
    echo '</script>';

 }
 if (isset($_POST['B_update'])){
    $bankname=$_POST['bankname'];
    $account=$_POST['account'];
    $ifsc=$_POST['ifsc'];
    $branch=$_POST['branch'];
    $email=$_SESSION['email'];
    $sql="UPDATE login set bankname='$bankname' , ACno='$account' ,ifsc='$ifsc' , branch='$branch' where email='$email'";
    $result=mysqli_query($conn,$sql);
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Your Bank Details Update Successfully")';  
    echo '</script>';
}
?>
<div class="footer">
<p>copyright: &copy; 2021-2024 Binary Tech Consultancy. All right are reserved. </p>
</div>
</body>
</html>