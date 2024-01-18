<?php
session_start();

$product_id=$_REQUEST['product_id'];


if(isset($_SESSION['user']))
{
    $data=$_SESSION['user'];
    $user_id=$data['user_id'];

    include 'db.php';
    $q="delete from wish where product_id='$product_id' AND user_id='$user_id'";
    $res=mysqli_query($conn,$q);
    //print_r($res);

    echo "<script>alert('Product Remove Successfully');window.history.back();</script>";
}


?>