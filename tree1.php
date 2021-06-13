
<?php
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
                        <th class="col-1">Level</th>
                        <th class="col-3">Name</th>
                        <th class="col-2">Mob</th>
                        <th class="col-2">Sponsor</th>
                        <th class="col-2">status</th>
                        <th class="col-2">show</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
<div class="col-lg-12  border rounded bg-light my-5">
<?php
$level=1;
$sql = "SELECT * FROM login WHERE Id = $level ORDER BY Id asc";
$queryfire=mysqli_query($conn, $sql);
$num=mysqli_num_rows($queryfire);
?>
<div class="container">
    <div class="row"><?Php
        if($num>0){
            while($product=mysqli_fetch_array($queryfire)){
                $i=0;
                echo"<tr class='d-flex'>
                <td class='col-1'>$i</td>
                
                <td class='col-3 text-uppercase'>$product[Name]</td>
                <td class='col-2'>$product[mob]</td>
                <td class='col-2'>$product[sponsor]</td>
                <td class='col-2'>$product[Status]</td>
                <td class='col-2'>   
                <form action='tree1.php' method='POST'>
                <input class='text-center' name='sponsor' type='hidden' value='$product[Id]' >
            
                <button class='btn btn-sm btn-success' name='show'>show</button>    </form> </td>
               
                </tr>";
				?>
				
				<div class="col-lg-12 col-md-12 col-sm-12 p-1">
                    <form action="tree1.php" method="POST">
                 		<input type="hidden" name="sponsor" value="<?php echo $product['Id'];?>">
                        <button class="btn btn-warning  text-white" name="show">1-<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
						<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
						</svg><?php echo $product['Name'];?></button>
                   	</form>
              
				</div>
                <?php
			}
		}
?>	</div>
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
                
                <td class='col-3'>$product[Name]</td>
                <td class='col-2'>$product[mob]</td>
                <td class='col-2'>$product[sponsor]</td>
                <td class='col-2'>$product[Status]</td>
                <td class='col-2'>   
                <form action='tree1.php' method='POST'>
                <input class='text-center' name='sponsor1' type='hidden' value='$product[Id]' >
            
                <button class='btn btn-sm btn-success' name='show1'>show</button>    </form> </td>
               
                </tr>";
                ?>
				
				<div class="col-lg-12 col-md-12 col-sm-12 p-1">
                    <form action="tree1.php" method="POST">
                 		<input type="hidden" name="sponsor1" value="<?php echo $product['Id'];?>">
                        <button class="btn btn-info  text-white" name="show1">1-<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
						<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
						</svg><?php echo $product['Name'];?></button>
                   	</form>
              
				</div>
                <?php
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
                
                <td class='col-3'>$product[Name]</td>
                <td class='col-2'>$product[mob]</td>
                <td class='col-2'>$product[sponsor]</td>
                <td class='col-2'>$product[Status]</td>
                <td class='col-2'>   
                <form action='tree1.php' method='POST'>
                <input class='text-center' name='sponsor2' type='hidden' value='$product[Id]' >
            
                <button class='btn btn-sm btn-success' name='show2'>show</button>    </form> </td>
               
                </tr>";
				?>
				
				<div class="col-lg-12 col-md-12 col-sm-12 p-1">
                    <form action="tree1.php" method="POST">
                 		<input type="hidden" name="sponsor2" value="<?php echo $product['Id'];?>">
                        <button class="btn btn-info  text-white" name="show2">2-<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
						<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
						</svg><?php echo $product['Name'];?></button>
                   	</form>
              
				</div>
                <?php
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

</body>
</html>