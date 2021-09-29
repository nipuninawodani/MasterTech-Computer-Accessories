<?php
	session_start();
    require '../../PHP/Functions.php';
	include 'paypal_System/confiq.php';
	require '../TheCart/functioncart.php';
	$link = dblink();
	if(isset($_SESSION['ADD'])){
		$ADD=$_SESSION['ADD'];
		
	} else {$ADD=0;}
    if(!isset($_SESSION['LogedIn'])){
        header('location: ../login.php');
    }
    $user_id=$_SESSION['UserID'];
	$sumP=$_SESSION['sum'];
    $user_shpAD_query="SELECT	*  from shippingaddress where User_ID= '$user_id'";
    $user_shpAD_result=mysqli_query($link,$user_shpAD_query) or die(mysqli_error($link));
    $no_of_user_add= mysqli_num_rows($user_shpAD_result);
    if($no_of_user_add==0){
        //echo "Add items to cart first.";
    ?>
        <script>
        window.alert("No shiping address available for you!!");
        </script>
    <?php
    }



	?>
			




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
    <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Checkout form</h2>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form class="card-body">

              

                <!--Grid column-->

             
			 <?php 
						
                        $user_shpAD_result=mysqli_query($link,$user_shpAD_query) or die(mysqli_error($link));
                        $no_of_user_add= mysqli_num_rows($user_shpAD_result);
                        $counter=1;
                       while($row=mysqli_fetch_array($user_shpAD_result)){
                           
                         ?>
             
			
              <hr>

              <div class="custom-control custom-checkbox">
              <!--  <input type="checkbox" class="custom-control-input" id="ship-address"> -->
                <label class="custom-control-label" for="same-address"><?php echo $row['First_Name'];?> <?php echo $row['lastName']; ?><br>
				  				<?php echo $row['shp_Address'];?><br><?php echo $row['shp_City'];?> <?php echo $row['shp_Pincode'];?> <br>
								<?php echo $row['shp_Province'];?>
				  
				  
				  </label>
				   <form action="" method="POST" >
				   <div class="input-group-append">
              		  <button  class="btn btn-secondary btn-md waves-effect m-0" type="button" id="submit" name="submit">	  <a href='addressFuntion.php?id=<?php echo $row['id']; ?>' style="color:inherit" > select </a></button>
					
              </div>
					  
					    
				  </form>
				  
				
				  <div class="input-group-append">
              		  <button class="btn btn-secondary btn-md waves-effect m-0" type="button" id="Address">
						  <a href='removeshippingadd.php?id=<?php echo $row['id']; ?>' style="color:inherit" > Remove </a></button>
					  
              </div>
				  
				  
				</div>
				<?php } 
				
				?>
				<hr>
					
				 <button class="btn btn-secondary btn-lg" type="submit" >
					  <a href="shipping_address.php" style="color:inherit">  update New shipping address</a></button>
				
             

            </form>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Summary</span>
            <span class="badge badge-secondary badge-pill">Cart Items</span>
          </h4>

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Price</h6>
                <small class="text-muted">product only</small>
              </div>
              <span class="text-muted">LKR. <?php echo $sumP; ?>.00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Shipping Charge</h6>
                <small class="text-muted">Island wide</small>
              </div>
              <span class="text-muted">+LKR 2000.00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Site Discount(10%)</h6>
                <small class="text-muted">For More than 50k </small>
              </div>
				<?php if($sumP>50000){?> 
					<span class="text-success">-LKR <?php echo $sumP*0.1; $DISCOUT=$sumP*0.1; ?> </span>
				<?php } else { ?>
					<span class="text-danger">-LKR 0.00</span>
				<?php }?>
              
            </li>
            
            <li class="list-group-item d-flex justify-content-between">
              <span>Total </span>
              <strong>LKR <?php   $total=(($sumP)+2000-($sumP*0.1)); echo $total;?>.00</strong>
            </li>
          </ul>
          <!-- Cart -->

        
			
				
			 <hr>

             
             
				<?php if($ADD!=0){?>
					
				  <!-- PayPal payment form for displaying the buy button -->
                <form action="<?php echo PAYPAL_URL; ?>" method="post">
                    <!-- Identify your business so that you can collect the payments. -->
                    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">	
					<input type="hidden" name="notify_url" value="<?php echo PAYPAL_NOTIFY_URL; ?>">
					<input type="hidden" name="cmd" value="_xclick">
					
					
					<?php $user_shpCAD_query="SELECT	*  from shippingaddress where User_ID= '$user_id'AND id='$ADD' ";
					 $user_shpAD_result=mysqli_query($link,$user_shpCAD_query) or die(mysqli_error($link));
					$row=mysqli_fetch_array($user_shpAD_result);
					//paypal information center
					
					$OID=getLastOrderId();?>
					<input type="hidden" name="amount" value="<?php echo $total/200; ?>">
					<input type="hidden" name="discount_amount" value="<?php echo $DISCOUT/200; ?>">
					<input type="hidden" name="item_name" value="All cart Items">
					<input type="hidden" name="item_number" value="<?php echo sprintf("%'.010d\n", $OID); ?>">
					<input type="hidden" name="custom" value="<?php echo $user_id; ?>">
					
					<input type="hidden" name="shipping" value="200">
					<input type="hidden" name="address_override" value="1">
					<input type="hidden" name="address1" value="<?php echo $row['shp_Address'];?>">
					<input type="hidden" name="city" value="<?php echo $row['shp_City'];?>">
					<input type="hidden" name="first_name" value="<?php echo $row['First_Name'];?> ">
					<input type="hidden" name="last_name" value="<?php echo $row['lastName']; ?>">
					<input type="hidden" name="address2" value="<?php echo $row['shp_Province'];?>">
					<input type="hidden" name="country" value="LK">
					<input type="hidden" name="zip" value="<?php echo $row['shp_Pincode'];?>">
                    <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
					
                    <!-- Specify URLs -->
                    <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                    <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
					
					<div class="paypal">
			<span class="text-success">Pay and confrim Order</span>
			<button type="submit" name="paypal"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png" border="0" alt="PayPal Logo"></button>
		</div>
	</form>
			<?php } ?>
   
        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->
    <script src="./cart&checkout.js"></script> 
 </body>
  
  </html>