<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Single Product View</title>
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
    <link rel="stylesheet" href="css/mdb.min.css" />
    <link rel="stylesheet" href="css/itemstyle.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

  </head>

  <body>
  	<?php include 'header.php' ?>
    <?php include '../PHP/Functions.php';?>
    <?php $row = viewproduct($_GET['ID']); //var_dump($row);?>

    <main class="container">
     <div class="row">
      <!-- Left Column / Headphones Image -->
      <div class="col-md-6">
        <img data-image="black" src="images/black.png" alt="">
        <img data-image="blue" src="images/blue.png" alt="">
        <img data-image="red" class="active" src="images/red.png" alt="">
      </div>


      <!-- Right Column -->
      <div class="col-md-6">

        <!-- Product Description -->
        <div class="product-description">
          <span><?php echo $row['Catagory'] ?></span>
          <h1><?php echo $row['Product_Name'] ?></h1>
          <p><?php echo $row['Description'] ?></p>
        </div>

        <!-- Product Configuration -->
        <div class="product-configuration">

          <!-- Product Color -->
          <div class="product-color">
            <span>Color</span>

            <div class="color-choose">
              <div>
                <input data-image="red" type="radio" id="red" name="color" value="red" checked>
                <label for="red"><span></span></label>
              </div>
              <div>
                <input data-image="blue" type="radio" id="blue" name="color" value="blue">
                <label for="blue"><span></span></label>
              </div>
              <div>
                <input data-image="black" type="radio" id="black" name="color" value="black">
                <label for="black"><span></span></label>
              </div>
            </div>

          </div>

          <!-- Cable Configuration -->
          <div class="cable-config">
            <span>Cable configuration</span>

            <div class="cable-choose">
              <button>Straight</button>
              <button>Coiled</button>
              <button>Long-coiled</button>
            </div>
          </div>
        </div>

        <!-- Product Pricing -->
        <div class="product-price">
          <span>LKR 14080/=</span>
          <a href="#" class="cart-btn">Add to cart</a>
        </div>
      </div>
     </div> 
    </main>

     <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/itemscript.js"></script>

  </body>
</html>
