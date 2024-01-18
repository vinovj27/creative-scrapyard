<?php
session_start();

$product_id = $_REQUEST['product_id'];

$data = $_SESSION['user'];
$user_id = $data['user_id'];
//print_r($user_id);

include 'db.php';
$q3 = "select * from wish where product_id='$product_id' AND user_id='$user_id'";
$res3 = mysqli_query($conn, $q3);
$wish = mysqli_fetch_array($res3);
$id = $wish['product_id'];
//print_r($wish);
if ($id > 0) {

    echo "<script>alert('Thise product already added in your wish list.');window.history.back();</script>";

} else {
    if (isset($_SESSION['user'])) {
        $data = $_SESSION['user'];
        $user_id = $data['user_id'];
        //print_r($user_id);
        include 'db.php';

        $q1 = "insert into wish values('','$product_id','$user_id')";
        $res1 = mysqli_query($conn, $q1);

        //print_r( $_SESSION['cart']);
        header("location:wish.php");
    } else {
        echo "<script>alert('Login Please');window.location='login.php';</script>";
    }
}

?>