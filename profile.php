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
    <title>Profile</title>
  
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
    
    .container {width: 50%;}
    
    }
    @media only screen and (min-width: 768px) {
    /* For desktop: */
    
    .container {width: 50%;}
  
    
    }
    h2{
        font-family: 'Playfair Display', serif;
    }
    h5{
        font-family: 'Playfair Display', serif;
    }
</style>
</head>
<body>

<!-- Profile -->
<?php
$email=$_SESSION['email'];
$query="SELECT * from login WHERE email='$email'  LIMIT 1";
$queryfire=mysqli_query($conn, $query);
$num=mysqli_num_rows($queryfire);

if($num>0){
    while($product=mysqli_fetch_array($queryfire)){
?>
<div class="row p-3">
    <div class="container border rounded bg-light ">
  
        <div class="form p-2 ">         
            <h2 class="text-center text-success p-3">View Profile Details</h2>
            
            <form >
            <h5 class="text-danger">Personal Details</h5>
            <div class="form-group">
            <label for="name" class="text-primary ">Name</address></label>
            <input type="text" id="name"  class="form-control " value="<?php echo $product['Name'];?>" disabled>
            </div><div class="form-group">
            <label for="mob" class="text-primary ">Mobile Number</label>
            <input type="text" id="mob"  class="form-control " value="<?php echo $product['mob'];?>" disabled>
            </div><div class="form-group">
            <label for="email" class="text-primary ">E-mail</label>
            <input type="tel" id="email"   class="form-control " value="<?php echo $product['email'];?>" disabled>
            </div><div class="form-group">
            <label for="dob" class="text-primary ">Date Of Birth </label>
            <input type="text" id="dob"  class="form-control " value="<?php echo $product['date'];?>" disabled>
            </div><div class="form-group">
            <label for="add" class="text-primary ">Address</label>
            <input type="text" id="add"  class="form-control " value="<?php echo $product['address'];?>" disabled>
            </div>
            <div class="form-group">
            <label for="city" class="text-primary ">City</label>
            <input type="text" id="city"  class="form-control " value="<?php echo $product['city'];?>" disabled>
            </div>
            <div class="form-group">
            <label for="pin" class="text-primary ">Pin Code</label>
            <input type="text" id="pin"  class="form-control " value="<?php echo $product['pin'];?>" disabled>
            </div>
            <div class="form-group">
            <label for="state" class="text-primary ">State</label>
            <input type="text" id="state"  class="form-control " value="<?php echo $product['state'];?>" disabled>
            </div>
            <div class="form-group">
            <label for="country" class="text-primary ">Country</label>
            <input type="text" id="country"  class="form-control " value="<?php echo $product['country'];?>" disabled>
            </div>
            <h5 class="text-danger">Bank Details</h5>
            
            <div class="form-group">
            <label for="bankname" class="text-primary ">Bank Name</label>
            <input type="text" id="bankname"  class="form-control " value="<?php echo $product['bankname'];?>" disabled>
            </div>
            <div class="form-group">
            <label for="account" class="text-primary ">A/C number</label>
            <input type="text" id="account"  class="form-control " value="<?php echo $product['ACno'];?>" disabled>
            </div>
            <div class="form-group">
            <label for="ifsc" class="text-primary ">Ifsc Code</label>
            <input type="text" id="ifsc"  class="form-control " value="<?php echo $product['ifsc'];?>" disabled>
            </div>
            <div class="form-group">
            <label for="branch" class="text-primary ">Branch</label>
            <input type="text" id="branch"  class="form-control " value="<?php echo $product['branch'];?>" disabled>
            </div>
           
        </form>

        </div>
    </div>

</div>
<?php 
    }
}

?>
<div class="footer">
<p>copyright: &copy; 2021-2024 Binary Tech Consultancy. All right are reserved. </p>
</div>
</body>
</html>