<?php

	session_start();
    include('Functions.php') ;
	$link = dblink();
	
	//login checking

	if(strlen($_SESSION['alogin'])==0)
	{	
		header('location: login ');  //include login page here like :header('location:login.php');
	}
	else{
	$pid=intval($_GET['id']);// product id
		if(isset($_POST['submit']))
{
			
	$productName = $_POST['Product_Name'];
	$productCatagory  = $_POST['Catagory'];
	$productPrice = $_POST['Price'];
    $productQuantity = $_POST['NumInStock'];
    $productDescription = $_POST['Description'];
	$productBrand = $_POST['Brand'];
	$productWarranty = $_POST['Warranty'];
			
	//update into database whare search by id
$sql=mysqli_query($link,"update  products set Product_Name='$productName',Catagory='$productCatagory',Price='$productPrice',NumInStock='$productQuantity',Description ='$productDescription', Brand = '$productBrand',Warranty = '$productWarranty' where ProductID='$pid' ");
			
$_SESSION['msg']="Product Updated Successfully !!";

}
	}

?>