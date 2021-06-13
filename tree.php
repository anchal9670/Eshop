<?php
include("connect.php");
 
function getCategoryTree($level = 3, $i =1) {


$category = '';
$sql = "SELECT * FROM login WHERE sponsor = $level ORDER BY Id asc";
$result = $GLOBALS['conn']->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    
    
    while($row = $result->fetch_assoc()) {
       
        $category .=$i . $row['Name'] . "<br/>"; 
        
       
       
        $category .= getCategoryTree($row['Id'],$i+1);
         
    }
    
}
return $category;

}

function printCategoryTree() {
    echo getCategoryTree();
}

printCategoryTree();


?>

 
       