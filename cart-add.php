<?php
session_start();

$product_id = $_REQUEST['product_id'];
$qty = $_REQUEST['qty'];

$data = $_SESSION['user'];
$user_id = $data['user_id'];
//print_r($user_id);

include 'db.php';
$q3 = "select * from cart where product_id='$product_id' AND user_id='$user_id'";
$res3 = mysqli_query($conn, $q3);
$card_data = mysqli_fetch_array($res3);
$id = $card_data['product_id'];

if ($id > 0) {

    echo "<script>alert('Thise product already added in your cart.');window.history.back();</script>";

} else {
    if (isset($_SESSION['user'])) {
        $data = $_SESSION['user'];
        $user_id = $data['user_id'];
        //print_r($user_id);


        $q = "select * from products where product_id='$product_id'";
        $res = mysqli_query($conn, $q);
        $product = mysqli_fetch_array($res);

        $totalprice = $product['price'] * $qty;
        //print_r($totalprice);

        $q1 = "insert into cart values('','$product_id','$qty','$totalprice','$user_id')";
        $res1 = mysqli_query($conn, $q1);

        //print_r( $_SESSION['cart']);
        header("location:cart.php");
    } else {
        echo "<script>alert('Login Please');window.location='login.php';</script>";
    }
}


?>