<?php 
include 'Functions.php';


function trackactiveorders($UserID){

	$link = dblink();

	$sql= "SELECT mastertech.order.*, user.First_Name,user.Last_Name, address.* FROM mastertech.order INNER JOIN user ON mastertech.order.UserID=user.UserID INNER JOIN address ON mastertech.order.Address=address.ID"; 

	$result = mysqli_query($link,$sql);

	return $result;

}

function wishlist($UserID){

	$link = dblink();

	$sql= "SELECT * FROM wishlist INNER JOIN product ON wishlist.ProductID=Product.ProductID INNER JOIN products_images ON product.ProductID=products_images.ProductID Where UserID='$UserID' Group By product.ProductID"; 

	$result = mysqli_query($link,$sql);

	return $result;
}

function useraddress($UserID){

	$link = dblink();

	$sql= "SELECT * FROM address Where UserID='$UserID'"; 

	$result = mysqli_query($link,$sql);

	return $result;
}

function adduseraddress($UserID,$Description, $Address1, $Address2, $City, $PostCode){

		$link = dblink();

		$sql= "SELECT ID FROM address Where USERID = '$UserID' ORDER BY ID DESC LIMIT 1;";

		$result = mysqli_query($link,$sql);

		$row = mysqli_fetch_array($result);

		$id=(int)$row['ID']+1;

		$sql = "INSERT INTO `address`(`ID`, `Description`, `Address1`, `Address2`, `City`, `PostCode`, `userID`) 
				VALUES ('".sprintf("%'.012d\n", $id)."','$Description','$Address1','$Address2','$City','$PostCode','$UserID')";

		if ($link->query($sql) === TRUE){
			echo "<meta http-equiv='refresh' content='0'>";
		}
}

function getuserdetails($UserID){

		$link = dblink();

		$sql= "SELECT * FROM user Where USERID = '$UserID'";

		$result = mysqli_query($link,$sql);

		$row = mysqli_fetch_array($result);

		return $row;
}

?>