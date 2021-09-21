<?php

function dblink() {
    $conn = mysqli_init();
	mysqli_ssl_set($conn,NULL,NULL, "/home/site/wwwroot/BaltimoreCyberTrustRoot.crt.pem", NULL, NULL);
	mysqli_real_connect($conn, 'mastertechserver.mysql.database.azure.com', 'mahela@mastertechserver', 'M4h3l4100Di554', 'mastertech', 3306, MYSQLI_CLIENT_SSL);
	if (mysqli_connect_errno($conn)) {
	die('Failed to connect to MySQL: '.mysqli_connect_error());
	}
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

		$_SESSION['User_Name'] = $row['First_Name'].' '.$row['Last_Name'];
		$_SESSION['UserID'] = $row['UserID'];
		$_SESSION['UType'] = $row['Type'];
		$_SESSION['UStatus'] = $row['Status'];
		$_SESSION['LogedIn'] = TRUE;
		if($remember=='True'){
			setcookie("Email", $email, time()+3600, "/","", 0);
			setcookie("Password", $password, time()+3600, "/","", 0);
		}
		echo '<script type="text/javascript"> window.location = "index.php" </script>';
		}
	else {
		echo "Your Login Name or Password is invalid";
	}

}

function searchproduct($pname){

	$link = dblink();

	$sql = "SELECT * from product where (UPPER(name) LIKE UPPER('%$name%'))";

	$result = mysqli_query($link,$sql);

	if($result){
		while($row = mysqli_fetch_array($result))
		{
		}
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
				VALUES ('".sprintf("%'.010d\n", $uid)."','$fname','$lname','$email','".md5($password)."','$mobile','$gender','User','Unverified')";

		if ($link->query($sql) === TRUE){
			echo"Registration Complete You can login using your username and password";
			sendmail($email,$fname);
		}      
	}
}

function sendmail($to,$name){

	$from = "mastertech.pcaccessories@gmail.com";
	$to = "mahela100@gmail.com";
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
	$message .= '<h1 style="color:#f40;">Hi $name!</h1>';
	$message .= '<p style="color:#080;font-size:18px;">Your Registration is Successfull</p>';
	$message .= '</body></html>';

	mail( $to, $subject, $message, $headers );

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

	$sql = "SELECT * from product where ProductID= $ProductID";

	$result = mysqli_query($link,$sql);

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

function getimage($ProductID){

	$link = dblink();

	$sql = "SELECT filename from products_images where ProductID= '$ProductID'";

	$result = mysqli_query($link,$sql);

	return $result;


}
?>
