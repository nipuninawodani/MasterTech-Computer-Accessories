<?php

	session_start();
    require '../../PHP/Functions.php';
	$link = dblink();
    if(!isset($_SESSION['LogedIn'])){
        header('location: ../login.php');
	}
    $user_id=$_SESSION['UserID'];

	if(isset($_POST['submit']))
	{	
		$FirstName=isset($_POST['First_Name']) ? $_POST['First_Name'] : '';
		$LastName=isset($_POST['lastName']) ? $_POST['lastName'] : '';
		$saddress=isset($_POST['shp_Addresss']) ? $_POST['shp_Addresss'] : '';
		$sprovincee=isset($_POST['shp_Province']) ? $_POST['shp_Province'] : '';
		$scity=isset($_POST['shp_City']) ? $_POST['shp_City'] : '';
		$sZipcode=isset($_POST['shp_Pincode']) ? $_POST['shp_Pincode'] : '';
		
			$query=mysqli_query($link,"select max(id) as Iid from shippingaddress");
			$result=mysqli_fetch_array($query);
			$ID=$result['Iid']+1;
	
		if (!isset($errors)) {
		$sql = "INSERT INTO shippingaddress(
					id,
					shp_Address,
					shp_City,
					shp_Province,
          			shp_Pincode,
					User_ID,
					First_Name,
					lastName
					
                ) VALUES (

          			'$ID', 
					'$saddress',
					'$scity',
					'$sprovincee',
					'$sZipcode',
					'$user_id',
					'$FirstName',
					'$LastName'
                )";
		
			if($link->query($sql)=== TRUE){
				echo "<script>alert('Shipping Address has been updated');</script>";
				
			}else{
				echo "Error:". $sql ."<br>";
					$link->error;
			}
			$link->close();
			 
			
			
		
		
	}}

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
   

  </head>
 <body>
    <!--Main layout-->
  <main class="mt-3 pt-4">
    <div class="container wow fadeIn">


      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form action="shipping_address.php" method="post" enctype="multipart/form-data" class="card-body">
				
				<h2 class="my-5 h2 text-center">Shipping Address</h2>

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--firstName-->
                  <div class="md-form ">
                        <input type="text" id="First_Name" class="form-control" placeholder="First Name" name="First_Name" value="<?php echo isset($FirstName) ? $FirstName : ''; ?>">
                    <label for="First_Name" class="">First name</label>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                     <input type="text" id="lastName" class="form-control" placeholder="Last Name" name="lastName" value="<?php echo isset($LastName) ? $LastName : ''; ?>">
                    <label for="lastName" class="">Last name</label>
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

           

             
              <!--address-->
              <div class="md-form mb-5">
                <input type="text" id="shp_Addresss" class="form-control" placeholder="1234 Main St" name="shp_Addresss" value="<?php echo isset($saddress) ? $saddress : ''; ?>">
				    
                <label for="shp_Addresss" class="">Address</label>
              </div>

             

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4">

                  <label for="shp_Province">Province</label>
                   <input type="text" id="shp_Province" class="form-control" placeholder="Province" name="shp_Province" value="<?php echo isset($sprovincee) ? $sprovincee : ''; ?>">
                  <div class="invalid-feedback">
                    city required.
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

                  <label for="shp_City">City</label>
             		 <input type="text" id="shp_City" class="form-control" placeholder="City" name="shp_City" value="<?php echo isset($scity) ? $scity : ''; ?>">
                  <div class="invalid-feedback">
                    city required.
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

                  <label for="shp_Pincode">Zip Code</label>
                 <input type="text" id="shp_Pincode" class="form-control" placeholder="Zip Code"  name="shp_Pincode" value="<?php echo isset($sZipcode) ? $sZipcode : ''; ?>">
                  <div class="invalid-feedback">
                    Zip code required.
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

           
              
              <hr class="mb-4">
              <button id="submit" name="submit" class="btn btn-primary btn-lg btn-block" type="submit">Update Address</button>
				

            </form>
					 <button class="btn btn-secondary btn-lg " type="submit" >
					  <a href="cart&checkout.php" style="color:inherit">  back</a></button>
          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->
	</div>
	  </div>
	  </div>

       
  </main>
	 
	 
  <!--Main layout-->
    <script src="cart&checkout.js"></script> 
 </body>
  
  </html>
