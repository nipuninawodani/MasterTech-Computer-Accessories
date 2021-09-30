<?php
	
	include '../PHP/Functions.php';

	$link = dblink();

	$sql= "SELECT UserID FROM user Where 1";

	$result = mysqli_query($link,$sql);

	while ($row = mysqli_fetch_array($result)) {
		if (md5($row['UserID'])==$_GET['ID']) {
			$sql= "UPDATE user SET Status='Active' Where UserID='".$row['UserID']."'";
			$result = mysqli_query($link,$sql);
			if ($result) {
				echo "User Verification Success Returning to Login Page ......";
				sleep(5);
				echo '<script type="text/javascript"> window.location = "../Front-End/Login.php" </script>';
				die();
			}
		}
	}

?>