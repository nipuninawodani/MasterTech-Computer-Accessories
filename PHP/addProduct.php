<?php

	session_start();
    include('Functions.php') ;
	$link = dblink();
	$productSaved = FALSE;

	if (isset($_POST['submit'])) {
     // Read posted values.
     
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
      
        $sql = "INSERT INTO product(
                    Product_Name,
					Catagory,
					Price,
					NumInStock,
                    description,
					Brand,
					Warranty
                ) VALUES (
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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
        <meta charset="UTF-8" />
        <!-- The above 3 meta tags must come first in the head -->

        <title>Save product details</title>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
        <style type="text/css">
            body {
                padding: 30px;
            }

            .form-container {
                margin-left: 80px;
            }

            .form-container .messages {
                margin-bottom: 15px;
            }

            .form-container input[type="text"],
            .form-container input[type="number"] {
                display: block;
                margin-bottom: 15px;
                width: 150px;
            }

            .form-container input[type="file"] {
                margin-bottom: 15px;
            }

            .form-container label {
                display: inline-block;
                float: left;
                width: 100px;
            }

            .form-container button {
                display: block;
                padding: 5px 10px;
                background-color: #8daf15;
                color: #fff;
                border: none;
            }

            .form-container .link-to-product-details {
                margin-top: 20px;
                display: inline-block;
            }
        </style>

    </head>
    <body>

        <div class="form-container">
            <h2>Add a product</h2>

            <div class="messages">
                <?php
                if (isset($errors)) {
                    echo implode('<br/>', $errors);
                } elseif ($productSaved) {
                    echo 'The product details were successfully saved.';
                }
                ?>
            </div>

            <form action="addProduct.php" method="post" enctype="multipart/form-data">
                <label for="Product_Name">Name</label>
                <input type="text" id="Product_Name" name="Product_Name" value="<?php echo isset($productName) ? $productName : ''; ?>">
				
				 <label for="catagory">Catagory</label>
                <input type="text" id="Catagory" name="Catagory" value="<?php echo isset($productCatagory) ? $productCatagory : ''; ?>">
				

                <label for="NumInStock">Quantity</label>
                <input type="number" id="NumInStock" name="NumInStock" min="0" value="<?php echo isset($productQuantity) ? $productQuantity : '0'; ?>">
				
				<label for="price">Price</label>
                <input type="number" id="Price" name="Price" min="0" value="<?php echo isset($productPrice) ? $productPrice : '0'; ?>">

                <label for="Description">Description</label>
                <input type="text" id="Description" name="Description" value="<?php echo isset($productDescription) ? $productDescription : ''; ?>">
				
				<label for="Brand">Brand</label>
                <input type="text" id="Brand" name="Brand" value="<?php echo isset($productBrand) ? $productBrand : ''; ?>">
				
				<label for="Warranty">Warranty</label>
                <input type="number" id="Warranty" name="Warranty" min="0" value="<?php echo isset($productWarranty) ? $productWarranty : '0'; ?>">

				
				
                <button type="submit" id="submit" name="submit" class="button">
                    Submit
                </button>
            </form>

      
        </div>

    </body>
</html>