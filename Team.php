<?php 
include('navlog.php');
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Downline</title>
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
    [class*="col-"] {
    width: 100%;
    }
    @media only screen and (min-width: 0px) {
    /* For tablets: */
    
    .container {width: 100%;}
    
    }
    @media only screen and (min-width: 600px) {
    /* For tablets: */
    
    .container {width: 100%;
        }
    
    }
    @media only screen and (min-width: 768pix) {
    /* For desktop: */
    
    .container {width: 100%;
       }
  
    
    }
    
</style>
</head>
<body>
    <div class="container text-center  ">
    <h1 style="font-family: 'Playfair Display', serif;">My Downline</h1>
    </div>
    <div class="container ">
        
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="text-center">
                    <tr class="d-flex">
                    <th class="col">Level</th>
                    <th class="col">Name</th>
                    <th class="col">Mobile</th>
                    <th class="col">Sponsor Name</th>
                    <th class="col">status</th>
                    
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    // Level 1 code
                    $level=1;
                    $sql = "SELECT * FROM login WHERE sponsor = $level ORDER BY Id asc";
                    $queryfire=mysqli_query($conn, $sql);
                    $num=mysqli_num_rows($queryfire);
                    if($num>0){
                        while($product=mysqli_fetch_array($queryfire)){
                            $i=1;
                            echo"<tr class='d-flex'>
                            <td class='col'>$i</td>
                            <td class='col'>$product[Name]</td>
                            <td class='col'>$product[mob]</td>
                            <td class='col'>$product[spName]</td>
                            <td class='col'>$product[Status]</td></tr>";
                            
                        // level 2 code 
                            $sql1 = "SELECT * FROM login WHERE sponsor = $product[Id]  ORDER BY Id asc";
                            $queryfire1=mysqli_query($conn, $sql1);
                            $num1=mysqli_num_rows($queryfire1);
                            if($num1>0){
                                while($product1=mysqli_fetch_array($queryfire1)){
                                    $i=2;
                                    echo"<tr class='d-flex'>
                                    <td class='col'>$i</td>
                                    <td class='col'>$product1[Name]</td>
                                    <td class='col'>$product1[mob]</td>
                                    <td class='col'>$product1[spName]</td>
                                    <td class='col'>$product1[Status]</td></tr>";
                                  
                                    // Level 3 code
                                    $sql2 = "SELECT * FROM login WHERE sponsor = $product1[Id]  ORDER BY Id asc";
                                    $queryfire2=mysqli_query($conn, $sql2);
                                    $num2=mysqli_num_rows($queryfire2);
                                    if($num2>0){
                                        while($product2=mysqli_fetch_array($queryfire2)){
                                            $i=3;
                                            echo"<tr class='d-flex'>
                                            <td class='col'>$i</td>
                                            <td class='col'>$product2[Name]</td>
                                            <td class='col'>$product2[mob]</td>
                                            <td class='col'>$product2[spName]</td>
                                            <td class='col'>$product2[Status]</td></tr>";
                                            
                                            
                                            // Level 4 code
                                            $sql3 = "SELECT * FROM login WHERE sponsor = $product2[Id]  ORDER BY Id asc";
                                            $queryfire3=mysqli_query($conn, $sql3);
                                            $num3=mysqli_num_rows($queryfire3);
                                            if($num3>0){
                                                while($product3=mysqli_fetch_array($queryfire3)){
                                                    $i=4;
                                                    echo"<tr class='d-flex'>
                                                    <td class='col'>$i</td>
                                                    <td class='col'>$product3[Name]</td>
                                                    <td class='col'>$product3[mob]</td>
                                                    <td class='col'>$product3[spName]</td>
                                                    <td class='col'>$product3[Status]</td></tr>";
                                                    
                                            
                                                    // Level 5 code
                                                    $sql4 = "SELECT * FROM login WHERE sponsor = $product3[Id]  ORDER BY Id asc";
                                                    $queryfire4=mysqli_query($conn, $sql4);
                                                    $num4=mysqli_num_rows($queryfire4);
                                                    if($num4>0){
                                                        while($product4=mysqli_fetch_array($queryfire4)){
                                                            $i=5;
                                                            echo"<tr class='d-flex'>
                                                            <td class='col'>$i</td>
                                                            <td class='col'>$product4[Name]</td>
                                                            <td class='col'>$product4[mob]</td>
                                                            <td class='col'>$product4[spName]</td>
                                                            <td class='col'>$product4[Status]</td></tr>";
                                                           
                                                            // Level 6 code
                                                            $sql5 = "SELECT * FROM login WHERE sponsor = $product4[Id]  ORDER BY Id asc";
                                                            $queryfire5=mysqli_query($conn, $sql5);
                                                            $num5=mysqli_num_rows($queryfire5);
                                                            if($num5>0){
                                                                while($product5=mysqli_fetch_array($queryfire5)){
                                                                    $i=6;
                                                                    echo"<tr class='d-flex'>
                                                                    <td class='col'>$i</td>
                                                                    <td class='col'>$product5[Name]</td>
                                                                    <td class='col'>$product5[mob]</td>
                                                                    <td class='col'>$product5[spName]</td>
                                                                    <td class='col'>$product5[Status]</td></tr>";
                                                                    
                                                                    // Level 6 code
                                                                    $sql6= "SELECT * FROM login WHERE sponsor = $product5[Id]  ORDER BY Id asc";
                                                                    $queryfire6=mysqli_query($conn, $sql6);
                                                                    $num6=mysqli_num_rows($queryfire6);
                                                                    if($num6>0){
                                                                        while($product6=mysqli_fetch_array($queryfire6)){
                                                                            $i=7;
                                                                            echo"<tr class='d-flex'>
                                                                            <td class='col'>$i</td>
                                                                            <td class='col'>$product6[Name]</td>
                                                                            <td class='col'>$product6[mob]</td>
                                                                            <td class='col'>$product6[spName]</td>
                                                                            <td class='col'>$product6[Status]</td></tr>";
                                                                            
                                                                    
                                                                        }

                                                                    }
                                                                }

                                                            }
                                                        }

                                                    }
                                                }

                                            }
                                        }

                                    }

                                }
                            }
                        
                        }
                    }
                    
                    ?>
                </tbody>
            </table>
           
        </div>
    </div>
</body>
</html>