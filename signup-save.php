<?php
	
$name=$_POST['name'];
$mobile_no=$_POST['mobile_no'];
$email=$_POST['email'];
$password=$_POST['password'];

include 'db.php';

$q="insert into user value(NULL,'$name','$mobile_no','$email','$password')";
$res=mysqli_query($conn,$q);

if($conn)
{
	echo "<script>alert('Sing-Up Successfull');window.location='login.php';</script>";
}	
else
{
	echo "<script>alert('Something Wrong, Please Try Again');window.history.back();</script>";

}



?>