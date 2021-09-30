<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="../css/mdb.min.css" />
	  <link rel="stylesheet" href="paypal.css" />
   

  </head>
 <body>
<?php
    require '../../PHP/Functions.php';
    session_start();
	$link = dblink();
	 if(!isset($_SESSION['LogedIn'])){
        header('location: ../login.php');
    }
	if (isset($_POST['submit'])) {
    $item_id=$_POST['product_id'];
	$qty=$_POST['quantity'];
    $user_id=$_SESSION['UserID'];
	
			$query=mysqli_query($link,"select max(id) as Iid from cart_items");
			$result=mysqli_fetch_array($query);
			$ID=$result['Iid']+1;
	
    $add_to_cart_query="insert into cart_items(id,user_id,item_id,quantity_D,status) values ('$ID','$user_id','$item_id',$qty,'added to cart')";
    $add_to_cart_result=mysqli_query($link,$add_to_cart_query) or die(mysqli_error($link));
	echo '<script type="text/javascript"> window.location = "location: ../Item.php?ID='.$item_id.'</script>';
	}
?>
</body>
</html>