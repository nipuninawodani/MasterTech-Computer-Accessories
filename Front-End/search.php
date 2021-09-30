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
    <link rel="stylesheet" href="css/sideNav.css" />
    <link href="css/star.css" rel="stylesheet">

  </head>

  <body style="background-color:#ebebeb;">
  	<?php include 'header.php' ?>
    <?php include '../PHP/Functions.php';?>
    <div class="row" style="margin-top:10px;"  >
      <div class="col-md-2">
        <div class="fixed-top" style="margin-top:105px;z-index:1;width:150px">
      	<div class="side-nav nosd bg-white">
            <ul class="custom-scrollbar">
                <!-- Side navigation links -->
                <form method="GET" id="filter">
                <input type="hidden" name="search" value="<?php echo ($_GET['search']) ?>">
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li class="mainmenu">
                            <a class="robotor collapsible-header waves-effect arrow-r">
                                <i class="fab fa-buffer"></i> Sort By <i class="fas fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul> <div class="d-grid gap-2 text-center">
                                    <li> 
                                        <input type="radio" class="btn-check" name="sort" id="Relavance" value="Relavance" autocomplete="off" checked/>
                                        <label class="btn btn-info" for="Relavance" style="width: 150px">Relevence</label><br>
                                    </li>
                                    <li>
                                        <input type="radio" class="btn-check" name="sort" id="Rating" value="Rating" autocomplete="off" />
                                        <label class="btn btn-info" for="Rating" style="width: 150px">Ratings</label><br>
                                    </li>
                                    <li>
                                        <input type="radio" class="btn-check" name="sort" id="Priceasc" value="Priceasc" autocomplete="off" />
                                        <label class="btn btn-info" for="Priceasc" style="width: 150px">Price Low to High</label><br>
                                    </li>

                                    <li>
                                        <input type="radio" class="btn-check" name="sort" id="Pricedec" value="Pricedec" autocomplete="off" />
                                        <label class="btn btn-info" for="Pricedec" style="width: 150px">Price High to Low</label><br>
                                    </li> </div>
                                </ul>
                            </div>
                        </li>
                        <li class="mainmenu">
                            <a class="robotor  arrow-r">
                                <i class="fab fa-buffer"></i> Ratings <i class="fas fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul> <div class="d-grid gap-2 text-center">
                                    <li>
                                        <input type="radio" class="btn-check" name="rating" id="4" value="4" autocomplete="off" />
                                        <label class="btn btn-info" for="4" style="width: 150px">4.0 & Up</label><br>
                                    </li>
                                    <li>
                                        <input type="radio" class="btn-check" name="rating" id="3" value="3" autocomplete="off" />
                                        <label class="btn btn-info" for="3" style="width: 150px">3.0 & Up</label><br>
                                    </li> </div>
                                </ul>
                            </div>
                        </li>
                      <li class="mainmenu text-center">
                        <div class="btn-group text-center">
                          <input type="reset" onclick="document.getElementById('filter').reset();document.getElementById('filter').submit();" class="btn btn-outline-dark" name="filter" Value="Clear" style="width: 90px">
                          <input type="submit" class="btn btn-outline-success" name="filters" Value="Filter" style="width: 90px">
                        </div>
                        <br><br><br><br><br><br><br><br>
                      </li>
                        
                    </ul>
                </li>
              </form>
                <!--/. Side navigation links -->
            </ul>
            <div class="sidenav-bg rgba-blue-strong1"></div>
          </div>
        </div>
        <!--/. Sidebar navigation -->
      </div>
      <div class="col-md-10" style="background-color:white; padding:20px;margin-top:100px"><br>

        <?php
        if(!(isset($_GET['sort']))){$_GET['sort']='Relavance';}
        if(!(isset($_GET['rating']))){$_GET['rating']='0';}
        if(!(isset($_GET['Categories']))){$_GET['Categories']=array(1 => '[a-z]');}

        ?>



      	<?php $searchresult=searchproduct($_GET['search'],$_GET['sort'],$_GET['rating'],implode("|",$_GET['Categories']));
      	$numofrows = mysqli_num_rows ($searchresult);?>

      <?php $i=1;
      if($numofrows!=0){
      	$nmpages=ceil($numofrows/20);
      	 echo "<h5>".$numofrows." Results found for '".$_GET['search']."'</h5><br>";
         while($row=mysqli_fetch_array($searchresult)){
         if($i==1 or ($i-1)%4==0){ ?>
        <!--Grid row-->
        <div class="row wow fadeIn">
        <?php } ?>
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4">

            <!--Card-->
            <div class="card">

              <!--Card image-->
              <div class="view overlay">
                <img src="uploads/<?php echo $row['filename']; ?>" class="card-img-top" alt="" href="item?ID=<?php echo $row['ProductID'];?>" 
                style="width: 250px; height: 250px; object-fit: fill;">
                <a href="item.php?ID=<?php echo $row['ProductID']; ?>">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!--Card image-->

              <!--Card content-->
              <div class="card-body text-center">
                <!--Category & Title-->
                <a href="item.php?ID=<?php echo $row['ProductID']; ?>" class="grey-text">
                  <h6 style="line-height: 2.5ex; height: 5.0ex; overflow: hidden;"><?php echo $row['Product_Name']; ?></h6>
                </a>
                <h5>
                  <strong>
                    <a href="" class="dark-grey-text"><?php echo $row['Catagory']; ?></strong><br>
                      <?php $row2 = getstar($row['ProductID']); 
                        $val= round($row2['Avg(Rating)'])?>
                        <h6><?php include 'star.php';?></h6>
                    </a>
                  
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
          <?php if(($i)%4==0){ ?>
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
  <script type="text/javascript" src="js/sideNav.js"></script>

  </body>
</html>
