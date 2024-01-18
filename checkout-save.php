<?php

$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$email=$_POST['email'];
$mobile_no=$_POST['mobile_no'];
$country=$_POST['country'];
$state=$_POST['state'];
$tail=$_POST['tail'];
$city=$_POST['city'];
$address=$_POST['address'];
$totalprice=$_POST['totalprice'];
$payment=$_POST['payment'];
$user_id=$_POST['user_id'];

include 'db.php';
$q="insert into orders values('','$f_name','$l_name','$email','$mobile_no','$country','$state','$tail','$city','$address','$totalprice','$payment','$user_id')";
$res=mysqli_query($conn,$q);

if($conn)
{
    echo "<script>alert('Your order is successfully book.');window.location='order.php';</script>";
}
else{
    echo "<script>alert('Something Went Wrong.');window.history.back();</script>";

}

?>