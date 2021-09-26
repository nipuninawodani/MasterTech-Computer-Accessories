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
			$query=mysqli_query($link,"select ProductID from product ORDER BY ProductID DESC LIMIT 1;");
			$result=mysqli_fetch_array($query);
			$productID=(int)$result['ProductID']+1;

        $UPLOAD_DIR = '../Front-End/uploads';
		
		if (!is_dir($UPLOAD_DIR)) {
		 mkdir(UPLOAD_DIR, 0777, true);
		 }
		// List of file names to be filled in by the upload script below and to be saved in the db table "products_images" afterwards.
		//imgID
			$query=mysqli_query($link,"select max(id) as Iid from products_images");
			$result=mysqli_fetch_array($query);
			$ID=$result['Iid']+1;
		
		$filenamesToSave = [];

        var_dump($UPLOAD_DIR);

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

                        $uploadedFilePath = rtrim($UPLOAD_DIR, '/') . '/' . $uploadedFileName;

                        if (in_array($uploadedFileType, $allowedMimeTypes)) {
                            if (!move_uploaded_file($uploadedFileTempName, $uploadedFilePath)) {
                                $errors[] = 'The file "' . $uploadedFileName . '" could not be uploaded.';
                            } else {
                                $filenamesToSave[] = $uploadedFileName;
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
		
        var_dump($filenamesToSave);
		
		
    
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
					'".sprintf("%'.010d\n", $productID)."'
                )";
		
			$statement = $link->prepare($sql);

            $statement->execute();

            $statement->close();
		
		foreach ($filenamesToSave as $filename) {
            $sql = "INSERT INTO products_images (
						id,
                        ProductID,
                        filename
                    ) VALUES (
						'$ID',
                        '".sprintf("%'.010d\n", $productID)."',
						'$filename'
                    )";
		
			$statement = $link->prepare($sql);

            var_dump($sql);

            $statement->execute();

            $statement->close();
            $ID=$ID+1;
        }
		
	}
	}
		
?>
