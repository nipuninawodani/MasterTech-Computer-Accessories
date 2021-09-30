<?php

function dblink() {
      $conn = mysqli_init();
	mysqli_ssl_set($conn,NULL,NULL, "../BaltimoreCyberTrustRoot.crt.pem", NULL, NULL);
	mysqli_real_connect($conn, 'mastertechserver.mysql.database.azure.com', 'mahela@mastertechserver', 'M4h3l4100Di554', 'mastertech', 3306, MYSQLI_CLIENT_SSL);
	if (mysqli_connect_errno($conn)) {
	die('Failed to connect to MySQL: '.mysqli_connect_error());}
	
	return $conn;
} 

function login($email,$password,$remember) {
	$link = dblink();

	$sql = "SELECT * FROM user WHERE Email = '$email' AND Password = '".$password."'";

	$result = mysqli_query($link,$sql);
	if($result==False){
		echo "Error";
	}
	else{
		$row = mysqli_fetch_array($result);
		$count = mysqli_num_rows($result);
	}
	
	if ($count == 1) {
		if($row['Status']=='Unverified'){
			echo "Please Verify Your Account Before Login";
		}
		else{
			$_SESSION['User_Name'] = $row['First_Name'].' '.$row['Last_Name'];
			$_SESSION['UserID'] = $row['UserID'];
			$_SESSION['UType'] = $row['Type'];
			$_SESSION['UStatus'] = $row['Status'];
			$_SESSION['LogedIn'] = TRUE;
			if($remember=='True'){
				setcookie("Email", $email, time()+3600, "/","", 0);
				setcookie("Password", $password, time()+3600, "/","", 0);
			}
			if($row['Type']=='Admin'){
				echo '<script type="text/javascript"> window.location = "../material-dashboard-master/index.php" </script>';
			}else{
				echo '<script type="text/javascript"> window.location = "../index.php" </script>';
			}
		}
	}
	else {
		echo "Your Login Name or Password is invalid";
	}

}

function searchproduct($pname,$sort,$rating,$type){

	$link = dblink();

	$sql_base="SELECT * FROM (SELECT product.*, products_images.filename, IFNULL(AVG(review.Rating),0) as Rating FROM product INNER JOIN products_images ON product.ProductID=products_images.ProductID LEFT JOIN review ON product.ProductID=review.ProductID WHERE (UPPER(product.Product_Name) LIKE UPPER('%$pname%') OR (UPPER(product.Catagory) LIKE UPPER('%$pname%')) OR (UPPER(product.Brand) LIKE UPPER('%$pname%'))  OR (UPPER(product.Description) LIKE UPPER('%$pname%'))) GROUP BY product.ProductID) AS Base WHERE Catagory REGEXP '$type' HAVING Rating>= $rating ";


	if($sort=='Relavance'){

		$sql = $sql_base;
	}
	elseif($sort=='Pricedec'){

		$sql = $sql_base."ORDER BY Price DESC;";
	}
	elseif($sort=='Priceasc'){

		$sql = $sql_base."ORDER BY Price ASC;";
	}
	elseif($sort=='Rating'){

		$sql = $sql_base. "ORDER BY Rating DESC;";
	}


	$result = mysqli_query($link,$sql);

	if($result){
		return $result;
		}       

}

function signup($fname,$lname,$email,$password,$mobile,$gender){

	$link = dblink();

	$sql= "SELECT UserID FROM user Where Email='$email' ORDER BY UserID DESC LIMIT 1;";

	$result = mysqli_query($link,$sql);

	$row = mysqli_fetch_array($result);

	if ($row!=Null) {
		echo "A user with the given email already exist";
	}
	else{	

		$sql= "SELECT UserID FROM user Where Type = 'User' ORDER BY UserID DESC LIMIT 1;";

		$result = mysqli_query($link,$sql);

		$row = mysqli_fetch_array($result);

		$uid=(int)$row['UserID']+1;

		$sql = "INSERT INTO user (UserID, First_Name, Last_Name, Email, Password, Mobile, Gender, Type, Status)
				VALUES ('".sprintf("%'.010d", $uid)."','$fname','$lname','$email','".md5($password)."','$mobile','$gender','User','Unverified')";

		if ($link->query($sql) === TRUE){
			echo"Registration Complete You can login using your username and password";
			sendmail($email,$fname,$sprintf("%'.010d", $uid));
		}      
	}
}

function sendmail($to,$name,$Uid){

	$from = "mastertech.pcaccessories@gmail.com";
	$subject = "Hello Sendmail";
	//$message = "This is an test email to test Sendmail. Please do not block my account.";
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
	// Create email headers
	$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $message = '<html><body>';
	$message .= '<h1 style="color:#f40;">Hi '.$name.'!</h1>';
	$message .= '<p style="color:#080;font-size:18px;">';
	$message .= 'Your Registration is Successfull';
	$message .= '<a href="http://mastertechweb.azurewebsites.net/PHP/'.md5($Uid).'"> Click Here to verify Your Account</a>';
	$message .= '</body></html>';

	$message = wordwrap($message,70);

	$mail=mail( $to, $subject, $message, $headers );

}

function cardsearch($UserID){

	$link = dblink();

	$sql= "SELECT * FROM payment_options Where UserID = '$UserID' ORDER BY Cardnumber;";

	$result = mysqli_query($link,$sql);

	$row = mysqli_fetch_array($result);

	return $row;

}

function addresssearch($UserID){

	$link = dblink();

	$sql= "SELECT * FROM address Where userID = '$UserID' ORDER BY Address1;";

	$result = mysqli_query($link,$sql);

	$row = mysqli_fetch_array($result);

	return $row;

}


function viewproduct($ProductID){

	$link = dblink();

	$sql = "SELECT * from product where ProductID= '$ProductID'";

	$result = mysqli_query($link,$sql);

	if(mysqli_num_rows($result)==0){
		http_response_code(404);
		include('404.php');
		die();
	}

	$row = mysqli_fetch_array($result);

	return $row;

}

function getrating($UserID,$ProductID){

	$link = dblink();

	$sql = "SELECT Rating from review where ProductID= '$ProductID' AND UserID='$UserID'";

	$result = mysqli_query($link,$sql);

	$row = mysqli_fetch_array($result);

	return $row['Rating'];

}


function getreview($UserID,$ProductID){

	$link = dblink();

	$sql = "SELECT Review from review where ProductID= '$ProductID' AND UserID='$UserID'";

	$result = mysqli_query($link,$sql);

	$row = mysqli_fetch_array($result);

	return $row['Review'];

}

function updatereview($UserID,$ProductID,$rating,$review){

	$link = dblink();

	$sql = "SELECT * from review where ProductID= '$ProductID' AND UserID='$UserID'";

	$result = mysqli_query($link,$sql);

	$row=mysqli_fetch_array($result);

	if ($row!=null) {
		$sql = "UPDATE review SET Rating='$rating',Review='$review' where ProductID= '$ProductID' AND UserID='$UserID'";

		$result = mysqli_query($link,$sql);
	}
	else{
		$sql = "INSERT INTO review(Rating, Review, ProductID, UserID) VALUES ('$rating','$review','$ProductID','$UserID')";

		$result = mysqli_query($link,$sql);
	}

}



function check_if_added_to_cart($Product_id){
		$link = dblink();
        $user_id=$_SESSION['UserID'];
        $product_check_query="select * from cart_items where item_id='$Product_id' and user_id='$user_id' and status='Added to cart'";
        $product_check_result=mysqli_query($link,$product_check_query) or die(mysqli_error($link));
        $num_rows=mysqli_num_rows($product_check_result);
        if($num_rows>=1)return 1;
        return 0;
}

function getimage($ProductID){

	$link = dblink();

	$sql = "SELECT filename from products_images where ProductID= '$ProductID'";

	$result = mysqli_query($link,$sql);

	return $result;

}

function addtowishlist($ProductID,$UserID){

	$link = dblink();

	$sql = "INSERT INTO wishlist(UserID, ProductID) VALUES ('$UserID','$ProductID')";

	$result = mysqli_query($link,$sql);

}

function checkwishlist($ProductID,$UserID){

	$link = dblink();

	$sql = "SELECT * FROM wishlist WHERE ProductID = '$ProductID' AND UserID='$UserID';";

	$result = mysqli_query($link,$sql);

	if ($result) {
		return 1;
	}
	else{
		return 0;
	}

}

function getstar($ProductID){

    $link = dblink();

    $sql = "SELECT Avg(Rating),COUNT(Rating) FROM review WHERE ProductID = '$ProductID';";

    $result = mysqli_query($link,$sql);

    $row = mysqli_fetch_array($result);

    $star= round($row['Avg(Rating)']);

    return $row;
}

function adminproducts(){

	$link = dblink();

	$sql = "SELECT * from product ORDER BY ProductID" ;

	$result = mysqli_query($link,$sql);

	return $result;
}

function adminusers(){

	$link = dblink();

	$sql = "SELECT * from user ORDER BY UserID" ;

	$result = mysqli_query($link,$sql);

	return $result;
}

function adminoders(){

	$link = dblink();

	$sql= "SELECT * FROM mastertech.ordertb INNER JOIN user ON mastertech.ordertb.UserID=user.UserID;"; 

	$result = mysqli_query($link,$sql);

	return $result;

}

function adminoderproducts($OrderID){

	$link = dblink();

	$sql= "SELECT order_product.*, product.Product_Name FROM order_product INNER JOIN product ON order_product.ProductID = product.ProductID where OrderID='$OrderID'"; 

	$result = mysqli_query($link,$sql);

	return $result;
}

?>

