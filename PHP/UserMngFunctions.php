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

	if($result){return $result;}
}

function useraddress($UserID){

	$link = dblink();

	$sql= "SELECT * FROM address Where UserID='$UserID'"; 

	$result = mysqli_query($link,$sql);

	return $result;
}

function adduseraddress($UserID,$Description, $Address1, $Address2, $City,$Province, $PostCode){

		$link = dblink();

		$sql= "SELECT ID FROM address Where USERID = '$UserID' ORDER BY ID DESC LIMIT 1;";

		$result = mysqli_query($link,$sql);

		$row = mysqli_fetch_array($result);

		$id1=(int)$row['ID']+1;

		$sql= "SELECT id FROM shippingaddress Where User_ID = '$UserID' ORDER BY id DESC LIMIT 1;";

		$result = mysqli_query($link,$sql);

		$row = mysqli_fetch_array($result);

		$ids=(int)$row['ID']+1;

		$sql= "SELECT First_Name , Last_Name FROM user Where User_ID = '$UserID';";

		$result = mysqli_query($link,$sql);

		$row = mysqli_fetch_array($result);

		$FirstName = $row['First_Name'];
		$LastName = $row['Last_Name'];

		$saddress=$Address1.$Address2;

		$sql = "INSERT INTO `address`(`ID`, `Description`, `Address1`, `Address2`, `City`, `PostCode`, `userID`, `Province`) 
				VALUES ('".sprintf("%'.012d", $id)."','$Description','$Address1','$Address2','$City','$PostCode','$UserID');
				INSERT INTO shippingaddress(id, shp_Address, shp_City, shp_Province, shp_Pincode, User_ID, First_Name, lastName ) VALUES ('$ids','$saddress''$City''$Province''$PostCode''$UserID''$FirstName''$LastName');";

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

function validatepw($UserID,$Password){

		$link = dblink();

		$sql= "SELECT Password FROM user Where USERID = '$UserID'";

		$result = mysqli_query($link,$sql);

		$row = mysqli_fetch_array($result);

		if($row['Password']==md5($Password)){
			return True;
		}
		else{
			return False;
		}

}

function updateuser($UserID,$Password,$Email,$Mobile,$First_Name,$Last_Name){

		$link = dblink();

		if($Password!=''){

			$sql="UPDATE user SET First_Name='$First_Name',Last_Name='$Last_Name',Email='$Email',Password='".md5($Password)."',Mobile='$Mobile' WHERE UserID='$UserID';";

		}
		else{

			$sql="UPDATE user SET First_Name='$First_Name',Last_Name='$Last_Name',Email='$Email',Mobile='$Mobile' WHERE UserID='$UserID';";

		}


		$result = mysqli_query($link,$sql);

}

function trackpackage($UserID){

	$link = dblink();

	$sql= "SELECT mastertech.ordertb.* FROM mastertech.ordertb Where ordertb.UserID = '$UserID'"; 

	$result = mysqli_query($link,$sql);

	if($result){
		return $result;
	} 

}

?>