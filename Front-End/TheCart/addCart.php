<?php
    require '../../PHP/Functions.php';
	$link = dblink();
    session_start();
	if (isset($_POST['submit'])) {
    $item_id=$_POST['product_id'];
	$qty=$_POST['quantity'];
    $user_id=$_SESSION['LogedIn'];
	
			$query=mysqli_query($link,"select max(id) as Iid from cart_items");
			$result=mysqli_fetch_array($query);
			$ID=$result['Iid']+1;
	
    $add_to_cart_query="insert into cart_items(id,user_id,item_id,quantity_D,status) values ('$ID','$user_id','$item_id',$qty,'Added to cart')";
    $add_to_cart_result=mysqli_query($link,$add_to_cart_query) or die(mysqli_error($link));
    header('location: ../Item.php');
	}
?>