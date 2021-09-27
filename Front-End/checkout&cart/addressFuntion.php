<?php

	session_start();
	 $id=$_GET['id'];


	if($id!=0){
		$_SESSION['ADD'] = $id;
	}
	
	header('location: cart&checkout.php');

?>
				