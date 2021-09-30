<?php session_start(); ?>
<?php include '../PHP/Functions.php';?>
<?php $row = viewproduct($_GET['ID']);?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $row['Product_Name']; ?></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/star.css" rel="stylesheet">
    <link rel='stylesheet' href='https://raw.githubusercontent.com/kartik-v/bootstrap-star-rating/master/css/star-rating.min.css'>
    <link rel='stylesheet' href='css/imggallery.css'>

  </head>

  <body style="background-color:#ebebeb;">

  	<?php include 'header.php' ?>

  <div class="container" style="margin-top:100px;">

    <div class="row" style="margin-top:10px;"  >
      <div class="col-md-1">
      </div>
      <div class="col-md-10" style="background-color:white;">
        <div class="container dark-grey-text mt-5">

          <!--Grid row-->
          <div class="row wow fadeIn">

            <!--Grid column-->
            <div class="col-md-6 mb-4">

                  <div class="row justify-content-center">
                      <div class="d-flex">
                          <div class="card">
                          	<?php $imgresult=getimage($_GET['ID']); $i=1;?>
                              <div class="d-flex flex-column thumbnails">
                              	<?php while($imgrow = mysqli_fetch_array($imgresult)){ ?>
                                  <div id="f<?php echo $i ?>" class="tb"> <img class="thumbnail-img fit-image" src="uploads/<?php echo $imgrow['filename']; ?>"> </div>
                                  <?php $i=$i+1;} ?>
                              </div>
                              <?php $imgresult=getimage($_GET['ID']); $i=1;?>
                              <?php while($imgrow = mysqli_fetch_array($imgresult)){
                              if($i==1){ ?>
                              <fieldset id="f<?php echo $i ?>1" class="active">
                                  <div class="product-pic"> <img class="pic0" src="uploads/<?php echo $imgrow['filename']; ?>"> </div>
                              </fieldset> <?php } else{ ?>
                              <fieldset id="f<?php echo $i ?>1">
                                  <div class="product-pic"> <img class="pic0" src="uploads/<?php echo $imgrow['filename']; ?>"> </div>
                              </fieldset>
                              <?php } $i=$i+1;} ?>
               
                          </div>
                      </div>
                  </div>

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-6 mb-4">

              <!--Content-->
              <div class="p-4">

                <div class="mb-3">
                  <a href="">
                    <span class="badge rounded-pill bg-primary"><?php echo $row['Catagory']; ?></span>&nbsp;
                  </a>
                  <a href="">
                    <span class="badge rounded-pill bg-success"><?php echo $row['Brand']; ?></span>&nbsp;
                  </a>
                  <a href="">
                    <span class="badge rounded-pill bg-info">Bestseller</span>
                  </a>
                </div>
                <h2><?php echo $row['Product_Name']; if($_SESSION['LogedIn'] && !checkwishlist($_GET['ID'],$_SESSION['UserID'])){?> <form  class="d-flex justify-content-left">
                 <button  class="btn btn-primary btn-md my-0 p" type="Submit" Name="wishlist"><i class="far fa-bookmark"></i></button>   
              </form>
              <?php
              if(isset($_POST['wishlist'])){
                addtowishlist($_GET['ID'],$_SESSION['UserID']);
              } }?></h2>
                <?php $row2 = getstar($_GET['ID']); 
                $val= round($row2['Avg(Rating)'])?>
                <?php include 'star.php';?>
                <p class="lead">
                  <span class="mr-1">
                    <s>Rs. <?php echo number_format($row['Price'] + $row['Price']/2,2); ?></s>
                  </span>
                  <span>Rs. <?php echo number_format($row['Price'],2); ?></span>
                </p>

                <p class="lead font-weight-bold">Description</p>

                <p style="height: 130px;" class="overflow-auto"><?php echo nl2br($row['Description']); ?><br> </p>
                <?php if($row['Warranty']>=12){
                echo floor($row['Warranty']/12) . ' Year ';
                if ($row['Warranty']%12>0){
                echo $row['Warranty']%12 . ' Months ';}
                echo 'Warranty <br />';} else{?>
                <p style="height: 20px;"><?php echo $row['Warranty'];?> Months Warranty </p> <?php } ?>

              <?php if ( $row['NumInStock'] >= 50){ ?>

                <span class="badge bg-light text-dark"><?php echo $row['NumInStock']; ?> Items in Stock</span> <br><br>

              <?php } elseif ( $row['NumInStock'] <= 0) { ?>

                <span class="badge bg-danger">Item Out of Stock</span> <br><br>

              <?php } else { ?>

                <span class="badge bg-danger">Only <?php echo $row['NumInStock']; ?> Items in Stock</span> <br><br> <?php } ?>

				<?php  
				  $check = check_if_added_to_cart($row['ProductID']);
				  	if ($check!=0){
				 
				  ?>
                  <!-- Default input -->
				  
				 <form  class="d-flex justify-content-left">
            		 <button  class="btn btn-primary btn-md my-0 p" type="Disabled" style="margin-left: 20px" name="Disable" disabled>Already Added to the cart
                    <i class="fas fa-shopping-cart ml-1"></i>
                  </button>		
      			  </form>
						                            
					
				<?php	}else{
				 
				  ?>
	 

				 <form action="TheCart/addCart.php" method="POST" class="d-flex justify-content-left">
					 <input type="number"	name="quantity" value="1" min="1" max=" <?php $row['NumInStock']; ?>" required aria-label="Search" class="form-control" style="width: 100px">
           			 <input type="hidden" name="product_id" value="<?=$row['ProductID']?>">
            		 <button  class="btn btn-primary btn-md my-0 p" type="submit" style="margin-left: 20px" name="submit">Add to cart
                    <i class="fas fa-shopping-cart ml-1"></i>
                  </button>		
        </form>
		<?php } ?>
              </div>
              <!--Content-->

            </div>
            <!--Grid column-->

          </div>
          <!--Grid row-->
        </div>
        <hr>
      </div>
      <div class="col-md-1">
      </div>
    </div>
    <div class="row">
      <div class="col-md-1">
      </div>
      <div class="col-md-10" style="background-color:white;">
        <div class="row container d-flex h-100">
          <div class="col-md-4 border-right justify-content-center" style="padding-top:auto">
              <h3 style="text-align:center;"><b>Rating & Reviews</b></h3>
                <div class="row">
    
                <div class="col-md-6 align-self-center">
                  <h3 align="center"><b><?php include '../PHP/Reviews.php';
                   echo round($AVGRATE,1);?></b> <span style="font-size:30px;color:#ff9f00;">★</span></h3>
                  <p style="text-align: center;"><?php echo $Total_review; ?> Reviews</p>
                </div>
                <div class="col-md-6">
                  <?php
                  while($db_rating= mysqli_fetch_array($rating)){
                  ?>
                    <h4 align="center"><?=$db_rating['Rating'];?> <span style="font-size:30px;color:#ff9f00;">★</span> Total <?=$db_rating['Total'];?></h4>
                    
                    
                  <?php 
                  }
                    
                  ?>
                </div>
              </div>
          </div>
          <div class="col-md-8">
            <?php
              while($db_review= mysqli_fetch_array($review)){
            ?>
                <h5><?=$db_review['Rating'];?> <span style="font-size:30px;color:#ff9f00;">★</span> by <span style="font-size:14px;"><?php echo $db_review['First_Name']." ".$db_review['Last_Name'] ;?></span></h5>
                <p><?=$db_review['Review'];?></p>
                <hr>
            <?php 
              }
                
            ?>
            <?php if (isset($_SESSION['UserID'])){ ?>
              <h3>My Review</h3>
              <?php $val2=getrating($_SESSION['UserID'],$_GET['ID']); ?>
              <form action="" method="POST">
                <div class="ratingbg" style="margin-left:15px">
                    <input id="rating-1" type="radio" name="rating" value="1" <?php echo ($val2==1)?'checked':''?>> 
                    <label for="rating-1">1 star</label>
                    <input id="rating-2" type="radio" name="rating" value="2" <?php echo ($val2==2)?'checked':''?>>
                    <label for="rating-2">2 stars</label>
                    <input id="rating-3" type="radio" name="rating" value="3" <?php echo ($val2==3)?'checked':''?>>
                    <label for="rating-3">3 stars</label>
                    <input id="rating-4" type="radio" name="rating" value="4" <?php echo ($val2==4)?'checked':''?>>
                    <label for="rating-4">4 stars</label>
                    <input id="rating-5" type="radio" name="rating" value="5" <?php echo ($val2==5)?'checked':''?>>
                    <label for="rating-5">5 stars</label>
                    
                    <div class="starsbg">
                        <label for="rating-1" aria-label="1 star" title="1 star"></label>
                        <label for="rating-2" aria-label="2 stars" title="2 stars"></label>
                        <label for="rating-3" aria-label="3 stars" title="3 stars"></label>
                        <label for="rating-4" aria-label="4 stars" title="4 stars"></label>
                        <label for="rating-5" aria-label="5 stars" title="5 stars"></label>
                    </div> 
                </div>
                <script>
                    (function(){
                        var rating = document.querySelector('.rating');
                        var handle = document.getElementById('toggle-rating');
                        handle.onchange = function(event) {
                            rating.classList.toggle('rating', handle.checked);
                        };
                    }());
                </script>
              <div class="col-md-12">
              <textarea class="form-control" rows="5" placeholder="Write your review here..." name="review" id="review" required><?php echo getreview($_SESSION['UserID'],$_GET['ID']); ?></textarea><br>
              
              <div class="d-flex justify-content-end pt-1 col-md">
                <input type="submit" class="btn btn-default btn-sm btn-info" name="submit" value="Submit">
                 <?php
                    if (isset($_POST["submit"])){
                        updatereview($_SESSION['UserID'],$_GET['ID'],$_POST['rating'],$_POST['review']);
                        echo "<meta http-equiv='refresh' content='0'>";
                      }    
                  ?>
              </div>
              </div>
            </form>
            <?php } ?>
            <br>
          </div>
        </div>
      </div>
      <div class="col-md-1">
      </div>
    </div>
</div>
    

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">

    // Animations initialization
    new WOW().init();

  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/index.js"></script>
  <script src="js/imggallery.js"></script>

  </body>
</html>
