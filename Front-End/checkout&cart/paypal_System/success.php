<?php
	session_start();
	unset($_SESSION['ADD']) ;
	include 'confiq.php'; 
	require '../../TheCart/functioncart.php';
	require '../../../PHP/Functions.php';
	require'../Confrim_Order.php';
	$link=$link = dblink();
    $user_id=$_GET['custom'];
	if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cc']) && !empty($_GET['st'])){ 
    // Get transaction information from URL
	
    $Order_number = $_GET['item_number'];  
		$AADDRESSNA=$_GET['address_name'];
		$AADDRESSST=$_GET['address_street'];
		$AADDRESSCT=$_GET['address_city'];
		$AADDRESSZP=$_GET['address_zip'];
		$address=$AADDRESSNA.",\n".$AADDRESSST.",\n ".$AADDRESSCT.",\n ".$AADDRESSZP;
		$PaymentDate=$_GET['payment_date'];
		$PayDate = substr($PaymentDate, 0, 10);
		$PaytIME = substr($PaymentDate, 11, 17);
    $txn_id = $_GET['tx']; 
    $payment_gross = $_GET['amt']; 
    $currency_code = $_GET['cc']; 
    $payment_status = $_GET['st']; 
		
		//Check if transaction data exists with the same TXN ID. 
			
		 $query="SELECT * FROM payments WHERE txn_id = '$txn_id'";
		$result=mysqli_query($link,$query) or die(mysqli_error($link));
		$no_of_row = mysqli_num_rows($result);

		 if($no_of_row > 0){ 
        $paymentRow = mysqli_fetch_array($result);
        $payment_id = $paymentRow['payment_id']; 
        $payment_gross = $paymentRow['payment_gross']; 
        $payment_status = $paymentRow['payment_status']; }
		else{ 
			
        // Insert tansaction data into the database 	
			
			$sql = "INSERT INTO payments(
					OrderID,
					txn_id,
					payment_gross,
					currency_code,
          			payment_status
					
					
                ) VALUES (

          			'$Order_number', 
					'$txn_id',
					'$payment_gross',
					'$currency_code',
					'$payment_status'
					
                )";
		
		 	if($link->query($sql)=== TRUE){
				
				
			}else{
				echo "Error:". $sql ."<br>";
					$link->error;
			}
			 $payment_id = $link->insert_id;
			
		
    } 
		updateOrderAndEmtycart($Order_number,$user_id,$address,$payment_gross,$PayDate);
} 



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Order Conformation</title>
    <!-- MDB icon -->
    <link rel="icon" href="../../img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <!-- MDB -->
	   <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="../../css/mdb.min.css" />
    <link rel="stylesheet" href="/OrderConfirmationEmail.css" />

    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
    </head>

<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
	
	
	<div class="containor row">
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style = "z-index:4;">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../../../Front-End/index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../../Front-End/browse.php">SHOP NOW</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../../Front-End/about_us&contact_us.php">ABOUT US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../../Front-End/about_us&contact_us.php#contact">CONTACT US</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
      <a class="text-reset me-3" href="../../../Front-End/TheCart/my.php">
        <i class="fas fa-shopping-cart"></i>
      </a>
      <?php
        if(isset($_SESSION['LogedIn'])){
        ?>
          <!-- Notifications -->
          <a
            class="text-reset me-3 dropdown-toggle hidden-arrow"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            <i class="fas fa-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuLink"
          >
            <li>
              <a class="dropdown-item" href="#">Some news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Another news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>

          <!-- Avatar -->
          <a
            class="dropdown-toggle d-flex align-items-center hidden-arrow"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            <img
              src="https://mdbootstrap.com/img/new/avatars/2.jpg"
              class="rounded-circle"
              height="25"
              alt=""
              loading="lazy"
            />
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuLink"
          >
            <li>
              <a class="dropdown-item" href="../../../Front-End/UserUI.php">My profile</a>
            </li>
            <?php if($_SESSION['UType']=='Admin'){ ?>
            	<li>
              	<a class="dropdown-item" href="../../../admin/index.php">Admin</a>
            	</li>
			<?php }?>
            <li>
              <a class="dropdown-item" href="../../../PHP/logout.php">Logout</a>
            </li>

          </ul>
        </div>
      <?php
      } else{
      ?>

        <li class="nav-item" style="list-style-type: none">
          <a class="btn btn-light" href="../../../Front-End/login.php">Login</a>&nbsp
        </li>&nbsp &nbsp &nbsp
        <li class="nav-item" style="list-style-type: none">
          <a class="btn btn-light" href="../../../Front-End/register.php">Register</a>
        </li>

      <?php 
      } 
      ?>

    <!-- Right elements -->

  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style = "margin-top:53px;z-index:3;">
  <div class="container-fluid d-flex align-items-center" style="padding-top:4px">
    <!-- Navbar brand -->
    <a class="navbar-brand mt-2 mt-lg-0" href="#">
      <img
        src="../../logo.png"
        height="30"
        alt=""
        loading="lazy"
      />
    </a>
<div class="col-md-4">
  <form class="d-flex input-group w-auto my-auto mb-3 mb-md-0"  action="../../search.php" method="GET">
    <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search" name="search" <?php if(isset($_GET['search'])){echo 'Value="'.$_GET['search'].'"';} ?>>
    <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search text-white"></i></span>
  </form>
</div>
<button class="btn btn-outline-light" type="button">
  Download app<i class="fas fa-download ms-2"></i>
</button>
</div>
</nav>
</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
      <?php if(!empty($payment_id)){ ?>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                   
                    <tr>
                        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"> <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                                        <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"><br> Thank You For Your Order! </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                        <p style="font-size: 16px;text-align:center; font-weight: 400; line-height: 24px; color: #00FF00;"> Your Payment has been Successful......!  </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Order Confirmation # </td>
                                                <td width="25%" align="right" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> #<?php echo $Order_number; ?> </td>
                                            </tr>
                                            <tr>
												<?php 
													
    $user_products_query="select it.ProductID,it.Product_Name,it.Price ,it.NumInStock from cart_items ut inner join product it on it.ProductID=ut.item_id where ut.user_id='$user_id' AND status='added to cart' ";
									
													$user_products_result=mysqli_query($link,$user_products_query) or die(mysqli_error($link));
													$sum=0;
													$pid=$row['ProductID'];
													$counter=0;
                       								while($row=mysqli_fetch_array($user_products_result)){
                           
                         ?>
												
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> <?php echo $row['Product_Name']; ?> </td>
                                                <td width="25%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> <?php echo  $row['Price']; ?> &nbsp X&nbsp   <?php echo (qunaty($row['ProductID'],$user_id)) ?>&nbsp =  &nbsp<?php  $subtotel=subtotalF( $row['ProductID'],$row['Price'],$user_id);
				  								$sum=$sum+$subtotel; ?>LKR  <?php echo $subtotel; ?></td>
                                            </tr><?php
													$qty=qunaty($row['ProductID'],$user_id);
													$newStk= $row['NumInStock']-$qty; 
													$update_query="update product set NumInStock='$newStk' where ProductID='$pid'";
													$update_query_result=mysqli_query($link,$update_query) or die(mysqli_error($link));
														
													
													
													
													
													} 
											
											//updating cart items
        								$confirm_query="update cart_items set status='Confirmed' where user_id=$user_id";
										$confirm_query_result=mysqli_query($link,$confirm_query) or die(mysqli_error($link));
											
											
											?>
											<hr>
											<tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> Subtotal</td>
                                                <td width="25%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"><?php   
													echo $sum;?> </td>
                                            </tr>
											<hr>
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> Shipping  </td>
                                                <td width="25%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">+LKR 2000 </td>
                                            </tr>
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> total discount</td>
                                                <td width="25%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"><?php   $discount= $sum+2000-$payment_gross*200;
													echo $discount;?> </td>
                                            </tr>
											 
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> TOTAL </td>
                                                <td width="25%" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">LKR <?php echo( $payment_gross*200); ?> <br> $ <?php echo $payment_gross; ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
						
                    <tr>
                        <td align="center" height="100%" valign="top" width="100%" style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
                                <tr>
                                    <td align="center" valign="top" style="font-size:0;">
                                        <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                                <tr>
                                                    <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                        <p style="font-weight: 800;">Delivery Address</p>
                                                        <p>
														<?php echo $AADDRESSNA;?><br><?php echo $AADDRESSST;?><br><?php echo $AADDRESSCT;?><?php echo $AADDRESSZP;?><br> Sri Lanka</p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                                <tr>
                                                    <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                        <p style="font-weight: 800;">Estimated Delivery Date</p>
                                                        <p>5 working days from <?php echo $PayDate;?></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                   
                    
                </table>
            </td>
        </tr>
    </table>
  <?php }else{ ?>
             <h2 style="font-size: 30px;text-align:center; font-weight: 800; line-height: 36px; color: #ff0000; margin: 0;"><br> Your Payment has Failed............. :( </h2>
        <?php } ?>
	
	
	<!--- back to product-->

     <div class="input-group-append">
              		  <button class="btn btn-secondary btn-md waves-effect m-0" type="button" id="Address">
						  <a href='../../index.php' style="color:inherit" > Back to Products </a></button>
					  
              </div>
				  


    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="t" src="js/about_us&contact_us.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    <script src="/about_us&contact_us.js"></script>
    
</body>
    
    </html>
    