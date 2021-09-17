<?php

	session_start();
    include('Functions.php') ;
	include('config.php') ;
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
		
			// product ID
			$query=mysqli_query($link,"select max(ProductID) as pid from product");
			$result=mysqli_fetch_array($query);
			$productID=$result['pid']+1;
		
		if (!is_dir(UPLOAD_DIR)) {
		 mkdir(UPLOAD_DIR, 0777, true);
		 }
		// List of file names to be filled in by the upload script below and to be saved in the db table "products_images" afterwards.
		//imgID
			$query=mysqli_query($link,"select max(id) as Iid from products_images");
			$result=mysqli_fetch_array($query);
			$ID=$result['Iid']+1;
		
		$filenamesToSave = [];

    	$allowedMimeTypes = explode(',', UPLOAD_ALLOWED_MIME_TYPES);
		
		 if (!empty($_FILES)) {
		 if (isset($_FILES['file']['error'])) {
            foreach ($_FILES['file']['error'] as $uploadedFileKey => $uploadedFileError) {
                if ($uploadedFileError === UPLOAD_ERR_NO_FILE) {
                    $errors[] = 'You did not provide any files.';
                } elseif ($uploadedFileError === UPLOAD_ERR_OK) {
                    $uploadedFileName = basename($_FILES['file']['name'][$uploadedFileKey]);

                    if ($_FILES['file']['size'][$uploadedFileKey] <= UPLOAD_MAX_FILE_SIZE) {
                        $uploadedFileType = $_FILES['file']['type'][$uploadedFileKey];
                        $uploadedFileTempName = $_FILES['file']['tmp_name'][$uploadedFileKey];

                        $uploadedFilePath = rtrim(UPLOAD_DIR, '/') . '/' . $uploadedFileName;

                        if (in_array($uploadedFileType, $allowedMimeTypes)) {
                            if (!move_uploaded_file($uploadedFileTempName, $uploadedFilePath)) {
                                $errors[] = 'The file "' . $uploadedFileName . '" could not be uploaded.';
                            } else {
                                $filenamesToSave[] = $uploadedFilePath;
                            }
                        } else {
                            $errors[] = 'The extension of the file "' . $uploadedFileName . '" is not valid. Allowed extensions: JPG, JPEG, PNG, or GIF.';
                        }
                    } else {
                        $errors[] = 'The size of the file "' . $uploadedFileName . '" must be of max. ' . (UPLOAD_MAX_FILE_SIZE / 1024) . ' KB';
                    }
                }
            }
        }
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
					Warranty,
					ProductID
					
                ) VALUES (

          			'$productName', 
					'$productCatagory',
					'$productPrice',
					'$productQuantity',
					'$productDescription',
					'$productBrand',
					'$productWarranty',
					'$productID'
                )";
		
			$statement = $link->prepare($sql);

            $statement->execute();

            $statement->close();
		
		
		foreach ($filenamesToSave as $filename) {
            $sql = "INSERT INTO products_images (
						id,
                        product_id,
                        filename
                    ) VALUES (
						'$ID',
                        '$productID',
						'$uploadedFileName'
                    )";}
		
			$statement = $link->prepare($sql);

            $statement->execute();

            $statement->close();
		
	}
	}
		
?>



+<!DOCTYPE html>
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
				
				<label for="file">Images</label>
                <input type="file" id="file" name="file[]" multiple>

				
				
                <button type="submit" id="submit" name="submit" class="button">
                    Submit
                </button>
            </form>

      
        </div>

    </body>
</html>