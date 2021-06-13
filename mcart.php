<?php 
session_start();
include("navlog.php") ?>
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
<style>

.footer {
    background-color: #39464a;
    color: #ffffff;
    text-align: center;
    font-size: 12px;
    padding: 15px;
    }
        /* For mobile phones: */
    [class="col-lg-9"] {
    width: 100%;
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
            <div class="col-lg-12 text-center border rounded bg-light my-5">
            <h1>My Cart </h1>
            </div>
            <div class="col-lg-9">
                <table class="table table-striped">
                    <thead class="text-center">
                        <tr class="d-flex">
                        <th class="col-2">Serial no.</th>
                        <th class="col-5">Items Name</th>
                        <th class="col-3">Items Price</th>
                        <th class="col-2">Quantity</th>
                        
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                        if(isset($_SESSION['cart']))
                        {
                            $total=0.00;
                            $i=0;
                            foreach($_SESSION['cart'] as $key=>$value)
                            {
                                $total=$total+$value['Price']*$value['quantity'];
                                $i=$i+1;
                                echo"<tr class='d-flex'>
                                <td class='col-2'>$i</td>
                                
                                <td class='col-5'>$value[Item_Name]</td>
                                <td class='col-3'>$value[Price]</td>
                                <td class='col-2'>   
                                <form action='cart.php' method='POST'>
                                <input class='text-center' name='quantity' type='hidden' value='$value[quantity]' >
                                <input type='hidden' name='i' value='$i'>
                                <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                <input type='hidden' name='Price' value='$value[Price]'>
                                <button class='btn btn-sm btn-success' name='minus'>-</button>  $value[quantity]  <button class='btn btn-sm btn-success' name='Plus'>+</button> </form> </td>
                               
                                </tr>";
                            }
                            
                        }
                        ?> 
                        
                        
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3">
                <div class="border bg-light rounded">
                    <h4 class="p-2 text-success">Total :  &#x20a8; <?php if(isset($_SESSION['cart']))
        { echo"$total";}else{echo"0";}?></h4>
                    <br>
                    <form action="">
                    <button class="btn btn-primary btn-block"> Make Purchase <span class="badge badge-light"><?php if(isset($_SESSION['cart']))
        { echo "$i";} else{
            echo "0";
        }?> </span></button> 
                    </form>
                </div>
            </div>

        
        </div>
    </div>
</body>
</html>