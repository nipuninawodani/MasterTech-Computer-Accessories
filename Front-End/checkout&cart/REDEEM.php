<?php
	session_start();
	$word1="RED10";
	$word2="RED05";
	$word3="RED07";
	$word4="NOCODE";
	
	 $red=$_POST['promo'];
	if(strpos($red, $word1) !== false){
			$_SESSION['red']=0.1;
		}elseif(strpos($red, $word2) !== false){
			$_SESSION['red']=0.05;
		}elseif(strpos($red, $word3) !== false){
			$_SESSION['red']=0.07;
		}elseif(strpos($red, $word4) !== false){
			$_SESSION['red']=0;
		}
		header('location: cart&checkout.php');


?>