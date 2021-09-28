<?php 

function subtotalF($ProductID,$price){


	$link = dblink();
	$user_id=$_SESSION['UserID'];
	$sql = "SELECT	quantity_D  from cart_items where item_id= '$ProductID' AND User_id='$user_id' AND status='added to cart'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	$qty=$row['quantity_D'];
	return $qty*$price;

}

function qunaty($ProductID){
	

	$link = dblink();
	$user_id=$_SESSION['UserID'];
	$sql = "SELECT	quantity_D  from cart_items where item_id= '$ProductID' AND User_id='$user_id'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	$qty=$row['quantity_D'];
	return $row['quantity_D'];
}
function imgsview($ProductID){
	$link = dblink();
	$sql = "SELECT	filename  from products_images where ProductID= '$ProductID'";
	$result = mysqli_query($link,$sql) or die( mysqli_error($link));
	$row = mysqli_fetch_array($result);
	return $row['filename'];
}



function getLastOrderId(){
	$link = dblink();
	$query=mysqli_query($link,"select OrderID from orderTB ORDER  BY OrderID DESC LIMIT 1;");
	$result=mysqli_fetch_array($query);
	$OID=(int)$result['OrderID']+1;
	
	return $OID;
}
?>


