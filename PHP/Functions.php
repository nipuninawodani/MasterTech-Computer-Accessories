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



?>