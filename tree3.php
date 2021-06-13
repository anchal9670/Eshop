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
<?php

$res=mysqli_query($conn,"select * from login where sponsor >0");
$arr=[];

while($row=mysqli_fetch_assoc($res)){
    $arr[$row['Id']]['Id']=$row['Id'];
	$arr[$row['Id']]['Name']=$row['Name'];
	$arr[$row['Id']]['sponsor']=$row['sponsor'];
    $arr[$row['Id']]['Status']=$row['Status'];
}


buildTreeView($arr,1);
function buildTreeView($arr,$parent,$level = 0,$prelevel = -1){
  
	foreach($arr as $id=>$data){
		if($parent==$data['sponsor']){
			if($level>$prelevel){
				echo "<ol>";
                if($data['Status']=='Active')
                {
                ?><div class="text-success text-uppercase"> <?php
                echo "<li>".$data['Name'];
                echo"<button type='button' class='btn btn-success'>  <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-person-circle' viewBox='0 0 16 16'>
                <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z'/>
                <path fill-rule='evenodd' d='M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z'/>
              </svg></button>";
                ?></div><?php
                }
                else{
                    ?><div class="text-danger text-uppercase"><?php
                    echo "<li>".$data['Name'];
                    echo" <button type='button' class='btn btn-danger'> <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-person-circle' viewBox='0 0 16 16'>
                    <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z'/>
                    <path fill-rule='evenodd' d='M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z'/>
                     </svg></button>";
                    ?></div><?php
                }
			}
			if($level==$prelevel){
				
                    if($data['Status']=='Active')
                    {
                    ?><div class="text-success text-uppercase"> <?php
                    echo "<li>".$data['Name'];
                    echo"  <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-person-circle' viewBox='0 0 16 16'>
                    <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z'/>
                    <path fill-rule='evenodd' d='M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z'/>
                  </svg>";
                    ?></div><?php
                    }
                    else{
                        ?><div class="text-danger text-uppercase"><?php
                        echo "<li>".$data['Name'];
                        echo"  <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-person-circle' viewBox='0 0 16 16'>
                        <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z'/>
                        <path fill-rule='evenodd' d='M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z'/>
                         </svg>";
                        ?></div><?php
                    }
                echo "</li>";
			}
			
			if($level>$prelevel){
				$prelevel=$level;
			}
			$level++;
			buildTreeView($arr,$id,$level,$prelevel);
			$level--;	
		}
	}
	if($level==$prelevel){
		echo "</li></ol>";
	}
	
}
//echo "<pre>";
//print_r($arr);
?>
</body>
</html>
               