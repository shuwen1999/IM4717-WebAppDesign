<?php
session_start();


    $qty=$_POST['itemqty'];
    $message=$_POST['message'];
    $productid=$_POST['productid'];
    $productname=$_POST['productname'];
    $price=$_POST['price'];

    $cartitem=array(
        "productid"=>$productid,
        "message"=>$message,
        "qty"=>$qty,	
        "productname"=>$productname,
        "price"=>$price
    );
    echo $message;
    $_SESSION['cart'][]=$cartitem;

    header('Location:cart.php');
    

?>

