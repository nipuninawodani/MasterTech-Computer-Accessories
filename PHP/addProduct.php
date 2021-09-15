<?php

	session_start();
    include('Functions.php') ;
	$link = dblink();
	$productSaved = FALSE;

	if (isset($_POST['submit'])) {
     // Read posted values.
	$productID = isset($_POST['ProductID']) ? $_POST['ProductID'] : '';
    $productName = isset($_POST['Product_Name']) ? $_POST['Product_Name'] : '';
	$productCatagory  = isset($_POST['Catagory']) ? $_POST['Catagory'] : '';
	$productPrice = isset($_POST['Price']) ? $_POST['Price'] : 0;
    $productQuantity = isset($_POST['NumInStock']) ? $_POST['NumInStock'] : 0;
    $productDescription = isset($_POST['Description']) ? $_POST['Description'] : '';
	$productBrand = isset($_POST['Brand']) ? $_POST['Brand'] : '';
	$productWarranty = isset($_POST['Warranty']) ? $_POST['Warranty'] : '';

    // Validate posted values.
     
    if (empty($productName)) {
        $errors[] = 'Please provide a product name.';
    }
	if (empty($productCatagory)) {
        $errors[] = 'Please provide a product Catagory.';
    }
	if ($productPrice== 0) {
        $errors[] = 'Please provide a product Price.';
    }

    if ($productQuantity == 0) {
        $errors[] = 'Please provide the quantity.';
    }

    if (empty($productDescription)) {
        $errors[] = 'Please provide a description.';
    }
	if (empty($productBrand)) {
        $errors[] = 'Please provide a product brand.';
    }
	if ($productWarranty == 0) {
        $errors[] = 'Please provide a product Warranty in years.';
    }

    
    // Save product
     
    if (!isset($errors)) {
      
<<<<<<< Updated upstream
        $sql = 'INSERT INTO product(
=======
        $sql = "INSERT INTO product(
					ProductID,
>>>>>>> Stashed changes
                    Product_Name,
					Catagory,
					Price,
					NumInStock,
                    description,
					Brand,
					Warranty
                ) VALUES (
<<<<<<< Updated upstream
                    $productName, 
					$productCatagory,
					$productPrice,
					$productQuantity,
					$productDescription,
					$productBrand,
					$productWarranty
                )';

    
  

        $productSaved = TRUE;
	$productName = $productQuantity = $productDescription = $productCatagory = $productBrand = $productPrice = $productWarranty = NULL;
		$_SESSION['msg']="Product Inserted Successfully !!";  
      
    }
}
=======
					'$productID',
                    '$productName', 
					'$productCatagory',
					'$productPrice',
					'$productQuantity',
					'$productDescription',
					'$productBrand',
					'$productWarranty'
                )";

    	if ($link->query($sql) === TRUE) {
			$productSaved = TRUE;
			$productName = $productQuantity = $productDescription = $productCatagory = $productBrand = $productPrice = $productWarranty = NULL;
			$_SESSION['msg']="Product Inserted Successfully !!";  
		} else {
		  	echo "<label align='Center'>Error: " . $sql . "<br>" . $link->error."</label>";
		}
	}
	}
>>>>>>> Stashed changes
?>
