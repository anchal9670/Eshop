
<?php
session_start();
include('connect.php');
include('navlog.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    [class="col-lg-12"] {
    width:90%;
    }
    @media only screen and (min-width: 600px) {
    /* For tablets: */
    
    .col-lg-9 {width: 80%;}
    
    }
    @media only screen and (min-width: 768px) {
    /* For desktop: */
    
    .col-lg-9 {width: 80%;}
  
    
    }
   
    </style>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-3">
            <h1 style="font-family: 'Playfair Display', serif;">Tree View</h1>
            </div>
            <div class="table-responsive">
            <div class="col-lg-12">
                <table class="table ">
                    <thead class="text-center">
                        <tr class="d-flex">
                        <th class="col-1">Level</th>
                        <th class="col-2">Name</th>
                        <th class="col-3">Mobile</th>
                        <th class="col-3">Refler Name</th>
                        <th class="col-2">status</th>
                        <th class="col-1">Direct</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

<?php
$level=$_SESSION['Id'] ;
$sql = "SELECT * FROM login WHERE Id = $level ORDER BY Id asc";
$queryfire=mysqli_query($conn, $sql);
$num=mysqli_num_rows($queryfire);
        if($num>0){
            while($product=mysqli_fetch_array($queryfire)){
                $i='my';
                echo"<tr class='d-flex'>
                <td class='col-1'>$i</td>
                
                <td class='col-2'>$product[Name]</td>
                <td class='col-3'>$product[mob]</td>
                <td class='col-3'>$product[spName]</td>
                <td class='col-2'>$product[Status]</td>
                <td class='col-1'>   
                <form action='tree1.php' method='POST'>
                <input class='text-center' name='sponsor' type='hidden' value='$product[Id]' >
            
                <button class='btn btn-sm btn-success' name='show'> $product[refler] </button>    </form> </td>
               
                </tr>";
			
			}
		}?>
	</div>
</div>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['show']))
        {
            $sponsor=$_POST['sponsor'];
            $sql = "SELECT * FROM login WHERE sponsor = '$sponsor'";
            $queryfire1=mysqli_query($conn, $sql);
            $num=mysqli_num_rows($queryfire1);
            ?>
            <div class="container pl-5">
                <div class="row border-left-1 border-success"><?Php
            if($num>0){
                while($product=mysqli_fetch_array($queryfire1)){
                    $i=1;
                    echo"<tr class='d-flex'>
                    <td class='col-1'>$i</td>
                    
                    <td class='col-2'>$product[Name]</td>
                    <td class='col-3'>$product[mob]</td>
                    <td class='col-3'>$product[spName]</td>
                    
                    <td class='col-2'>$product[Status]</td>
                    <td class='col-1'>   
                    <form action='tree1.php' method='POST'>
                    <input class='text-center' name='sponsor1' type='hidden' value='$product[Id]' >
                
                    <button class='btn btn-sm btn-success' name='show1'>$product[refler]</button>    </form> </td>
                
                    </tr>";
                
                        }
                        
                    }
                    ?>
                </div>
            </div>
            <?php				
        }
        if(isset($_POST['show1']))
        {
            $sponsor1=$_POST['sponsor1'];
            $sql = "SELECT * FROM login WHERE sponsor = '$sponsor1'";
            $queryfire2=mysqli_query($conn, $sql);
            $num=mysqli_num_rows($queryfire2);
            ?>
            <div class="container pl-5">
                <div class="row border-left-1 border-success"><?Php
            if($num>0){
                while($product=mysqli_fetch_array($queryfire2)){
                    $i=2;
                    echo"<tr class='d-flex'>
                    <td class='col-1'>$i</td>
                    
                    <td class='col-2'>$product[Name]</td>
                    <td class='col-3'>$product[mob]</td>
                    <td class='col-3'>$product[spName]</td>
                    
                    <td class='col-2'>$product[Status]</td>
                    <td class='col-1'>   
                    <form action='tree1.php' method='POST'>
                    <input class='text-center' name='sponsor2' type='hidden' value='$product[Id]' >
                
                    <button class='btn btn-sm btn-success' name='show2'>$product[refler]</button>    </form> </td>
                
                    </tr>";
                    
                        }
                        
                    }
                    ?>
                </div>
            </div>
            <?php				
        }
        if(isset($_POST['show2']))
        {
            $sponsor2=$_POST['sponsor2'];
            $sql = "SELECT * FROM login WHERE sponsor = '$sponsor2'";
            $queryfire2=mysqli_query($conn, $sql);
            $num=mysqli_num_rows($queryfire2);
            ?>
            <div class="container pl-5">
                <div class="row border-left-1 border-success"><?Php
            if($num>0){
                while($product=mysqli_fetch_array($queryfire2)){
                    $i=3;
                    echo"<tr class='d-flex'>
                    <td class='col-1'>$i</td>
                    
                    <td class='col-2'>$product[Name]</td>
                    <td class='col-3'>$product[mob]</td>
                    <td class='col-3'>$product[spName]</td>
                    <td class='col-2'>$product[Status]</td>
                    <td class='col-1'>   
                    <form action='tree1.php' method='POST'>
                    <input class='text-center' name='sponsor3' type='hidden' value='$product[Id]' >
                
                    <button class='btn btn-sm btn-success' name='show3'>$product[refler]</button>    </form> </td>
                
                    </tr>";
                    
                        }
                        
                    }
                    ?>
                </div>
            </div>
            <?php				
        }
        if(isset($_POST['show3']))
        {
            $sponsor3=$_POST['sponsor3'];
            $sql = "SELECT * FROM login WHERE sponsor = '$sponsor3'";
            $queryfire2=mysqli_query($conn, $sql);
            $num=mysqli_num_rows($queryfire2);
            ?>
            <div class="container pl-5">
                <div class="row border-left-1 border-success"><?Php
            if($num>0){
                while($product=mysqli_fetch_array($queryfire2)){
                    $i=4;
                    echo"<tr class='d-flex'>
                    <td class='col-1'>$i</td>
                    
                    <td class='col-2'>$product[Name]</td>
                    <td class='col-3'>$product[mob]</td>
                    <td class='col-3'>$product[spName]</td>
                    
                    <td class='col-2'>$product[Status]</td>
                    <td class='col-1'>   
                    <form action='tree1.php' method='POST'>
                    <input class='text-center' name='sponsor4' type='hidden' value='$product[Id]' >
                
                    <button class='btn btn-sm btn-success' name='show4'>$product[refler]</button>    </form> </td>
                
                    </tr>";
                
                        }
                        
                    }
                    ?>
                </div>
            </div>
            <?php				
        }
        if(isset($_POST['show4']))
        {
            $sponsor4=$_POST['sponsor4'];
            $sql = "SELECT * FROM login WHERE sponsor = '$sponsor4'";
            $queryfire2=mysqli_query($conn, $sql);
            $num=mysqli_num_rows($queryfire2);
            ?>
            <div class="container pl-5">
                <div class="row border-left-1 border-success"><?Php
            if($num>0){
                while($product=mysqli_fetch_array($queryfire2)){
                    $i=5;
                    echo"<tr class='d-flex'>
                    <td class='col-1'>$i</td>
                    
                    <td class='col-2'>$product[Name]</td>
                    <td class='col-3'>$product[mob]</td>
                    <td class='col-3'>$product[spName]</td>
                    
                    <td class='col-2'>$product[Status]</td>
                    <td class='col-1'>   
                    <form action='tree1.php' method='POST'>
                    <input class='text-center' name='sponsor5' type='hidden' value='$product[Id]' >
                
                    <button class='btn btn-sm btn-success' name='show5'>$product[refler]</button>    </form> </td>
                
                    </tr>";
                    
                        }
                        
                    }
                    ?>
                </div>
            </div>
            <?php				
        }
        if(isset($_POST['show5']))
        {
            $sponsor5=$_POST['sponsor5'];
            $sql = "SELECT * FROM login WHERE sponsor = '$sponsor5'";
            $queryfire2=mysqli_query($conn, $sql);
            $num=mysqli_num_rows($queryfire2);
            ?>
            <div class="container pl-5">
                <div class="row border-left-1 border-success"><?Php
            if($num>0){
                while($product=mysqli_fetch_array($queryfire2)){
                    $i=6;
                    echo"<tr class='d-flex'>
                    <td class='col-1'>$i</td>
                    
                    <td class='col-2'>$product[Name]</td>
                    <td class='col-3'>$product[mob]</td>
                    <td class='col-3'>$product[spName]</td>
                    
                    <td class='col-2'>$product[Status]</td>
                    <td class='col-1'>   
                    <form action='tree1.php' method='POST'>
                    <input class='text-center' name='sponsor6' type='hidden' value='$product[Id]' >
                
                    <button class='btn btn-sm btn-success' name='show6'>$product[refler]</button>    </form> </td>
                
                    </tr>";
                    
                        }
                        
                    }
                    ?>
                </div>
            </div>
            <?php				
        }
        if(isset($_POST['show6']))
        {
            $sponsor6=$_POST['sponsor6'];
            $sql = "SELECT * FROM login WHERE sponsor = '$sponsor6'";
            $queryfire2=mysqli_query($conn, $sql);
            $num=mysqli_num_rows($queryfire2);
            ?>
            <div class="container pl-5">
                <div class="row border-left-1 border-success"><?Php
            if($num>0){
                while($product=mysqli_fetch_array($queryfire2)){
                    $i=7;
                    echo"<tr class='d-flex'>
                    <td class='col-1'>$i</td>
                    
                    <td class='col-2'>$product[Name]</td>
                    <td class='col-3'>$product[mob]</td>
                    <td class='col-3'>$product[spName]</td>
                    
                    <td class='col-2'>$product[Status]</td>
                    <td class='col-2'>   
                    <form action='tree1.php' method='POST'>
                    <input class='text-center' name='sponsor7' type='hidden' value='$product[Id]' >
                
                    <button class='btn btn-sm btn-success' name='show7'>$product[refler]</button>    </form> </td>
                
                    </tr>";
                    
                
                        }
                        
                    }
                    ?>
                </div>
            </div>
            <?php				
        }
    }

    ?>
</div>
</div>
</body>
</html>