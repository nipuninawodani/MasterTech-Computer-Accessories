<?php
    require '../../PHP/Functions.php';
	$link = dblink();
    session_start();
    $id=$_GET['id'];
    $user_id=$_SESSION['UserID'];
    $delete_query="delete from shippingaddress where User_ID='$user_id' and id='$id'";
    $delete_query_result=mysqli_query($link,$delete_query) or die(mysqli_error($link));
    header('location: cart&checkout.php');
?>