<?php
	session_start();
	include 'php/Functions.php';
	$link = dblink();
	$pid=($_GET['id']);//productID

	if(isset($_POST['update']))
	{
		$productName = $_POST['Product_Name'];
		$productCatagory  = $_POST['Catagory'];
		$productPrice = $_POST['Price'];
    	$productQuantity = $_POST['NumInStock'];
		$productDescription = $_POST['Description'];
		$productBrand = $_POST['Brand'];
		$productWarranty = $_POST['Warranty'];
		
		$sql=mysqli_query($link,"update  products set Product_Name='$productName',Catagory='$productCatagory',Price='$productPrice',NumInStock='$productQuantity',Description ='$productDescription', Brand = '$productBrand',Warranty = '$productWarranty' where ProductID='$pid' ");
			
	}





?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
	<div class="col-md-4 col-sm-12 ">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
					<span >Edit Product</span>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div >
<?php
							$query=mysqli_query($link,"select * from product where ProductID='$pid'")or die(mysqli_error($link));
							while($row=mysqli_fetch_array($query))
{
?>

					<div >
					    <label class="info-title" for="ProductName">Product Name<span>*</span></label>
					    <textarea class="form-control unicase-form-control text-input"  name="billingaddress" required="required"><?php echo $row['Product_Name'];?></textarea>
					  </div>
							<div>
					    <label class="info-title" for="ProductName">Product Catagory<span>*</span></label>
					    <textarea class="form-control unicase-form-control text-input"  name="billingaddress" required="required"><?php echo $row['Catagory'];?></textarea>
					  </div>
							<div >
					    <label class="info-title" for="ProductName">Product Price<span>*</span></label>
					    <textarea class="form-control unicase-form-control text-input"  name="billingaddress" required="required"><?php echo $row['Price'];?></textarea>
					  </div>
							<div >
					    <label class="info-title" for="ProductName">Product Quantity<span>*</span></label>
					    <textarea class="form-control unicase-form-control text-input"  name="billingaddress" required="required"><?php echo $row['NumInStock'];?></textarea>
					  </div>
							<div >
					    <label class="info-title" for="ProductName">Product Description<span>*</span></label>
					    <textarea class="form-control unicase-form-control text-input"  name="billingaddress" required="required"><?php echo $row['Description'];?></textarea>
					  </div>
							<div >
					    <label class="info-title" for="ProductName">Product Brand<span>*</span></label>
					    <textarea class="form-control unicase-form-control text-input"  name="billingaddress" required="required"><?php echo $row['Brand'];?></textarea>
					  </div>
							<div >
					    <label class="info-title" for="ProductName">Product Warranty<span>*</span></label>
					    <textarea class="form-control unicase-form-control text-input"  name="billingaddress" required="required"><?php echo $row['Warranty'];?></textarea>
					  </div>
	


						

					  <button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">Update</button>
			
					<?php } ?>
		
						</div>
					
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div>
</body>
</html>