<?php

function dblink() {
  $link = new mysqli('localhost','root','','mastertech');
	
	// Check connection
	if ($link->connect_error) {
  		die("Database Connection failed: " . $link->connect_error);
	}
	return $link;
} 

function login($email,$password) {
	$link = dblink();

	$sql = "SELECT * FROM user WHERE Email = '$email' AND Password = '$password'";

	$result = mysqli_query($link,$sql);
	if($result==False){
		echo "Error";
	}
	else{
		$row = mysqli_fetch_array($result);
		$count = mysqli_num_rows($result);
	}
	
	if ($count == 1) {

		session_start();

		$_SESSION['user'] = $row['Username'];
		$_SESSION['fr_num'] = $row['Num of Friends'];
		$_SESSION['ID'] = $row['ID'];
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
				VALUES ('".sprintf("%'.010d\n", $uid)."','$fname','$lname','$email','".md5($password)."','$mobile','$gender','User','Active')";

		if ($link->query($sql) === TRUE){
			echo"Registration Complete You can login using your username and password";
		}      
	}
}

?>
