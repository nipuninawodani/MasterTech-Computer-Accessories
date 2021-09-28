<?php
    require '../../PHP/Functions.php';
	$link = dblink();
    session_start();
    $item_id=$_GET['id'];
    $user_id=$_SESSION['UserID'];
    $delete_query="delete from cart_items where user_id='$user_id' and item_id='$item_id'";
    $delete_query_result=mysqli_query($link,$delete_query) or die(mysqli_error($link));
    header('location: my.php');
?>