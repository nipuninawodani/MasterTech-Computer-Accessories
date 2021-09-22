<?php session_start(); ?>
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
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/itemsCards.css" />

  </head>

  <body style="background-color:#ebebeb;">
  	<?php include 'header.php' ?>
    <?php include '../PHP/Functions.php';?>
    <div class="row" style="margin-top:10px;"  >
      <div class="col-md-2">
      </div>
      <div class="col-md-9" style="background-color:white; padding:20px;"><br>

      	<?php $searchresult=searchproduct($_GET['search']);
      	$numofrows = mysqli_num_rows ($searchresult);?>

      <?php $i=1;
      if($numofrows!=0){
      	$nmpages=ceil($numofrows/20);
      	 echo "<h5>".$numofrows." Results found for '".$_GET['search']."'</h5><br>";
         while($row=mysqli_fetch_array($searchresult)){
         if($i==1 or $i%5==0){ ?>
        <!--Grid row-->
        <div class="row wow fadeIn">
        <?php } ?>
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4">

            <!--Card-->
            <div class="card">

              <!--Card image-->
              <div class="view overlay">
                <img src="uploads/<?php echo $row['filename']; ?>" class="card-img-top" alt="" href="item?ID=<?php echo $row['ProductID']; ?>">
                <a href="item?ID=<?php echo $row['ProductID']; ?>">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!--Card image-->

              <!--Card content-->
              <div class="card-body text-center">
                <!--Category & Title-->
                <a href="item?ID=<?php echo $row['ProductID']; ?>" class="grey-text">
                  <h6><?php echo $row['Product_Name']; ?></h6>
                </a>
                <h5>
                  <strong>
                    <a href="" class="dark-grey-text"><?php echo $row['Catagory']; ?><br>
                      <span class="badge bg-danger">NEW</span>
                    </a>
                  </strong>
                </h5>

                <h4 class="font-weight-bold blue-text">
                  <strong>Rs. <?php echo number_format($row['Price']); ?>/= </strong>
                </h4>

              </div>
              <!--Card content-->

            </div>
            <!--Card-->

          </div>
          <!--Grid column-->
          <?php if(($i+1)%5==0){ ?>
        </div>
        <?php } ?>

      <?php $i=$i+1; }
      } else { ?>
        <div class="text-center" style="margin-top:50px;margin-bottom:50px;">
          <h2>No Search Result</h2><br><br>
          <h4>We're sorry. We cannot find any matches for your search term.</h4><br><br>
          <i class="fas fa-search fa-10x"></i><br><br>
        </div>

      <?php } ?>

      </div>
      <div class="col-md-1">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/itemsCards.js"></script>

  </body>
</html>
