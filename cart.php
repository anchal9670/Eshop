<?php
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['Add']))
    {
        if(isset($_SESSION['cart']))
        {
            $myitems=array_column($_SESSION['cart'],'Item_Name');
            if(in_array($_POST['Item_Name'],$myitems))
            {
                echo"<script>
                alert('items already added');
                window.location.href='shop.php';
                </script>";
            }
            else{
            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('Item_Name'=>$_POST['Item_Name'], 'Price'=>$_POST['Price'] , 'quantity'=>1);
            
            echo"<script>
                alert('item added');
                window.location.href='shop.php';
                </script>";
            }
        }
        else{
            $_SESSION['cart'][0]=array('Item_Name'=>$_POST['Item_Name'], 'Price'=>$_POST['Price'],'quantity'=>1);
            
            echo"<script>
                alert('item added');
                window.location.href='shop.php';
                </script>";
            }
    }
    if(isset($_POST['cart']))
    {
       echo"<script> window.location.href='mcart.php' </script>";
    }
   
    if(isset($_POST['minus']))
    {
        foreach($_SESSION['cart'] as $key=>$value)
        {
            if($value['Item_Name']==$_POST['Item_Name'] )
            {   
                if($value['quantity']==1){
                    foreach($_SESSION['cart'] as $key=>$value)
                    {
                        if($value['Item_Name']==$_POST['Item_Name'])
                        {
                            unset($_SESSION['cart'][$key]);
                            $_SESSION['cart']=array_values($_SESSION['cart']);
                            echo"<script>
                            alert('Item Removed');
                            window.location.href='mcart.php';
                            </script>
                            ";
                        }
                    }
                }
                else{
                $i=$_POST['i'];
                $i=$i;
                unset($_SESSION['cart'][$key]);
                $quantity=$_POST['quantity'];
                $_SESSION['cart']=array_values($_SESSION['cart']);
                $_SESSION['cart'][$i]=array('Item_Name'=>$_POST['Item_Name'], 'Price'=>$_POST['Price'],'quantity'=>$quantity-1);
                echo"<script>
                alert('Quantity decrease 1');
                window.location.href='mcart.php';
                </script>
                ";
                }
            }
            
        }
    }
    if(isset($_POST['Plus']))
    {
        foreach($_SESSION['cart'] as $key=>$value)
        {
            if($value['Item_Name']==$_POST['Item_Name'] )
            {   
                $i=$_POST['i'];
                
                unset($_SESSION['cart'][$key]);
                $quantity=$_POST['quantity'];
                $_SESSION['cart']=array_values($_SESSION['cart']);
                $_SESSION['cart'][$i]=array('Item_Name'=>$_POST['Item_Name'], 'Price'=>$_POST['Price'],'quantity'=>$quantity+1);
                echo"<script>
                alert('Quantity Increased 1');
                window.location.href='mcart.php';
                </script>
                ";
            }
        }
    }
}

