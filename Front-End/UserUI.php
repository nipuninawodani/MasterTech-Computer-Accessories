<?php session_start(); ?>
<?php include '../PHP/UserMngFunctions.php';?>
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
    <link rel="stylesheet" href="css/mdb.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link rel="stylesheet" href="./UserUI.css">
      <link href="css/star.css" rel="stylesheet">


  </head>
  <body>
    <!-- Start your project here-->
<!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <nav
         id="sidebarMenu"
         class="collapse d-lg-block sidebar collapse bg-white"
         style="z-index:1;margin-top:100px"
         >
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
          <a
             href="#profile"
             class="list-group-item list-group-item-action py-2 ripple"
             aria-current="true"
             >
            <i class="fas fa-tachometer-alt fa-fw me-3"></i
              ><span>My dashboard</span>
          </a>
          <a
             href="#track"
             class="list-group-item list-group-item-action py-2 ripple">
             <i class="fas fa-gift fa-fw me-3"></i><span>Track Package</span>
             </a>
             
            <a
             href="#wishlist"
             class="list-group-item list-group-item-action py-2 ripple"
             ><i class="fas fa-hand-sparkles fa-fw me-3"></i><span>My Wishlist</span></a
            >
          <a
             href="#MyLocations"
             class="list-group-item list-group-item-action py-2 ripple"
             ><i class="fas fa-map-marker-alt fa-fw me-3"></i><span>My Locations</span></a
            >
          
        </div>
      </div>
    </nav>
    <!-- Sidebar -->
    <?php include 'header.php' ?>
  </header>
  <!--Main Navigation-->
  <!--Main layout-->
  <main style="margin-top: 58px">
  <!--Section: My Profile-->
       <section class="mb-4" id="profile">
        <div class="card">
          <div class="card-header text-center py-3">
            <h5 class="mb-0 text-center">
              <h3 class="mb-0 text-center"><strong>My Profile</strong></h3>
      
            </h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <?php $user = getuserdetails($_SESSION['UserID']); ?>
              <table class="table table-hover text-nowrap">
                
                <tbody>
                  <tr>
                    <th scope="row">Name</th>
                    <th scope="row">:</th>
                    <td><?php echo $user['First_Name']." ".$user['Last_Name']; ?></td>
                  </tr>

                  <tr>
                    <th scope="row">Email</th>
                    <th scope="row">:</th>
                    <td><?php echo $user['Email']; ?></td>
                  </tr>

                  <tr>
                    <th scope="row">Mobile</th>
                    <th scope="row">:</th>
                    <td><?php echo $user['Mobile']; ?></td>
                  </tr>

                  <tr>
                    <th scope="row">Gender</th>
                    <th scope="row">:</th>
                    <td><?php echo $user['Gender']; ?></td>
                  </tr>

                  <tr>
                    <th scope="row">Password</th>
                    <th scope="row">:</th>
                    <td>************</td>
                  </tr>
                </tbody>
              </table> 
              <br>
              <div class="col-md-12 d-flex flex-row-reverse align-items-center" style="padding-bottom:10px;padding-right:50px;">
              <button type="button" class="btn btn-light  btn-floating flex-shrink-0"><i class="fas fa-pen"></i></button>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Section: My Profile-->
      <!-- Section: Main chart -->
      <section class="mb-4" id="track">
        <div class="card">
          <div class="card-header py-3">
            <h3 class="mb-0 text-center"><strong>Track Package</strong></h3>
          </div>
          <header class="card-header"> In Process </header>
          <div class="card-body">
              <h6>Order ID: OD45345345435</h6>
              <article class="card">
                  <div class="card-body row">
                      <div class="col"> <strong>Estimated Delivery time:</strong> <br>04 Oct 2021 </div>
                      <div class="col"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i>+94712345678 </div>
                      <div class="col"> <strong>Status:</strong> <br> Picked by the courier </div>
                      <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div>
                  </div>
              </article>
              <div class="track">
                  <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                  <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                  <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                  <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
              </div>
              <hr>
          </div>
            
        </div>
      </section>
      <!-- Section: Main chart -->
  
      <!--Section: Wishlist-->
      <section class="mb-4" id="wishlist">
        <div class="card">
          <div class="card-header text-center py-3">
            <h5 class="mb-0 text-center">
              <strong>My Wishlist</strong>
            </h5>
          </div>
          <div class="card-body">
             <!--Section: Products v.3-->
      <section class="text-center mb-4">
        <?php $wishlist=wishlist($_SESSION['UserID']);
        $numofrows = mysqli_num_rows ($wishlist);?>

      <?php $i=1;
      if($numofrows!=0){
         while($row=mysqli_fetch_array($wishlist)){
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
                <img src="uploads/<?php echo $row['filename']; ?>" class="card-img-top" alt="" href="item?ID=<?php echo $row['ProductID'];?>" 
                style="width: 250px; height: 250px; object-fit: fill;">
                <a href="item?ID=<?php echo $row['ProductID']; ?>">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!--Card image-->

              <!--Card content-->
              <div class="card-body text-center">
                <!--Category & Title-->
                <a href="item?ID=<?php echo $row['ProductID']; ?>" class="grey-text">
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
          <?php if(($i+1)%5==0){ ?>
        </div>
        <?php } ?>

      <?php $i=$i+1; }
      } else { ?>
        <div class="text-center" style="margin-top:50px;margin-bottom:50px;">
          <h2>Sorry</h2><br><br>
          <h4>It looks like you don't have any Items in Your Wishlist</h4><br><br>
          <i class="fas fa-search fa-10x"></i><br><br>
        </div>

      <?php } ?>

      </section>
      <!--Section: Products v.3-->
          </div>
        </div>
      </section>
      <!--Section: Wishlist-->

      <!--Section: My Locations-->
      <section class="mb-4" id="MyLocations">
        <div class="card">
          <div class="card-header text-center py-3">
            <h5 class="mb-0 text-center">
              <strong> My Locations</strong>
            </h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Description</th>
                    <th scope="col">Address Line 01</th>
                    <th scope="col">Address Line 02</th>
                    <th scope="col">City</th>
                    <th scope="col">Postal Code</th>
                    <th scope="col">Edit</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $address=useraddress($_SESSION['UserID']); $i=1;?>
                  <?php while($row=mysqli_fetch_array($address)){ ?>
                  <tr>
                    <th scope="row">Address <?php echo $i; ?></th>
                    <td><?php echo $row['Description']; ?></td>
                    <td><?php echo $row['Address1']; ?></td>
                    <td><?php echo $row['Address2']; ?></td>
                    <td><?php echo $row['City']; ?></td>
                    <th scope="col"><?php echo $row['PostCode']; ?></th>
                    <td><button type="button" class="btn btn-outline-danger">
                      Remove  <i class="fas fa-trash-alt fa-fw me-3"> </i>
                    </button></td>
                  </tr>
                <?php $i=$i+1;} ?>
                </tbody>
              </table>
            </div>
            <div class="d-grid gap-2">
              <button
                type="button"
                class="btn btn-outline-success btn-rounded"
                data-mdb-ripple-color="dark"  data-mdb-ripple-color="dark" data-mdb-toggle="modal" data-mdb-target="#Modaladdress"><h6> Add a new location <i class="fas fa-plus-circle"></i></h6>
            </div>
            
          </div>
        </div>
      </section>
      <!--Section: My Locations-->

  </main>
  <!--Main layout-->
      
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>

    <!-- Modal Address -->
<div class="modal fade" id="Modaladdress" tabindex="-1" aria-labelledby="ModaladdressLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModaladdressLabel">Add Address</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
                <label for="Description" class="form-label">Description</label>
                <input type="text" class="form-control" id="Description" name="Description" >
        
                <label for="Address1" class="form-label">Address 1</label>
                <input type="text" class="form-control" id="Address1" name="Address1" >
                
                <label for="Address2" class="form-label">Address 2</label>
                <input type="text" class="form-control" id="Address2" name="Address2" >

                <label for="City" class="form-label">City</label>
                <input type="text" class="form-control" id="City" name="City">
                
                <label for="PostCode" class="form-label">Post Code</label>
                <input type="text" class="form-control" id="PostCode" name="PostCode">
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        <button type="submit" id="addresssubmit" name="addresssubmit" class="btn btn-primary">Save changes</button></form>
        <?php if (isset($_POST["addresssubmit"])){
          adduseraddress($_SESSION['UserID'], $_POST['Description'], $_POST['Address1'], $_POST['Address2'], $_POST['City'], $_POST['PostCode']);
        }?>
      </div>
    </form>
    </div>
  </div>
</div>

  </body>
</html>