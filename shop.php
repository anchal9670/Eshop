<?php 
session_start();
include("navlog.php");
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
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
    [class*="col-"] {
    width: 50%;
    }
    </style>
</head>
<body >
    
    
    <div class="text-success border rounded bg-light my-1 p-2">
    <form action="cart.php" method="POST">
        <button type="submit" class="btn btn-success " name="home" >

        <?php echo $_SESSION['Name']; ?></button>
        <button class="btn btn-warning  text-white" name="cart"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
        </svg><?php if(isset($_SESSION['cart']))
        { echo $count=count($_SESSION['cart']);}else{echo"0";} ?></button>
    </form>
    </div>
    <div class="row p-3">
        <?php
        $query="SELECT P_name,P_price,P_dis,image,dis,rate,Ass from shop order by P_id";
        $queryfire=mysqli_query($conn, $query);
        $num=mysqli_num_rows($queryfire);
        if($num>0){
            while($product=mysqli_fetch_array($queryfire)){
                $product1=round($product['P_price']-$product['P_price']*($product['P_dis']/100));
                ?>
                <div class="col-lg-2 col-md-2 col-sm-12 p-1">
                    <form action="cart.php" method="POST">
                        <div class="card">
                            <h6 class="card-title bg-info text-white p-3 text-uppercase"><?php echo $product['Ass'];?></h6>
                            <div class="card-body">
                                <div class="card-img-top ">
                                <img src="img/<?php echo $product['image'];?>" alt="mouse" class="img-fluid m-1 " style="height:10em" ></div>
                                <h6 class=" text-uppercase text-primary"><?php echo $product['P_name'];?></h6>
                                <h6 class="text-danger" style="text-decoration: line-through;" > &#x20a8;  <?php echo $product['P_price'];?></h6>
                                <h6 class="text-success" > &#x20a8;  <?php echo $product1;?>.00
                                <span class="text-danger">(<?php echo $product['P_dis'];?>%off)</span></h6>
                                <h6 class="text-secondary"><?php echo $product['dis'];?></h6>
                                <h5 class="badge badge-success"><?php echo $product['rate'];?>  
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                                </h5>
                               
                            </div>
                        
                                
                            
                            <input type="hidden" name="Item_Name" value="<?php echo $product['P_name'];?>">
                            <input type="hidden" name="Price" value="<?php echo $product1?>.00">
                            
                            <div class="btn-group d-flex">
                                <button type="submit" class="btn btn-success flex-fill" name="Add">
                            
                                Add <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                </svg></button>
                                <button class="btn btn-warning  text-white" name="Buy">Buy Now</button>
                            </div>
                      
                        </div>
                    
                    </form>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <div class="footer">
        <p>copyright: &copy; 2021-2024 Binary Tech Consultancy. All right are reserved.</p>
    </div>
</body>
</html>