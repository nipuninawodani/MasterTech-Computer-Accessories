<?php session_start(); ?>
<?php include '../PHP/Functions.php';?>
<?php $result = adminoders();?>
<!doctype html>
<html lang="en">

<head>
  <title>Hello, world!</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
            <div class="logo" >
        <a style="margin-left: 45%;"
        
            >
              <img
                src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg"
                class="rounded-circle "
                height="30"
                loading="lazy"
              />
            </a>
        <a href="../Front-End/index.php" class="simple-text logo-normal">
          MasterTech
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboardOrders.php">
              <i class="material-icons">dashboard</i>
              <p>Orders</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboardSales.php">
              <i class="material-icons">dashboard</i>
              <p>Sales</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboardReports.php">
              <i class="material-icons">dashboard</i>
              <p>Reports</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboardUsers.php">
              <i class="material-icons">dashboard</i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboardItems.php">
              <i class="material-icons">dashboard</i>
              <p>Items</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Orders</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="./dashboardNotifications.html">
                  <i class="material-icons">notifications</i> Notifications
                </a>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <section class="intro">
            <div class="bg-image h-100" style="background-color: #f5f7fa;">
              <div class="mask d-flex align-items-center h-100">
                <div class="container">
                  <div class="row justify-content-center">
                    <?php while($row=mysqli_fetch_array($result)){ $total=0;?>
                    <div class="col-6">
                      <div class="card">
					      <div class="card-body">
					        <h5 class="card-title">Order #<?php echo $row['OrderID']; ?></h5>
					        <p class="card-text">Customer:- <?php echo $row['First_Name']." ".$row['Last_Name']; ?> <br>
					        Address:- <?php echo $row['Address1'].", ".$row['Address2'].",".$row['City'].". ".$row['PostCode']; ?></p>
					        <table class="table table-borderless">
					        <thead>
					          <tr>
						        <th scope="col">Product Name</th>
						        <th scope="col">Qty</th>
						        <th scope="col">Price</th>
						      </tr>
						    </thead>
						    <tbody>
						        <?php $presult=adminoderproducts($row['OrderID']);?>
						        <?php while($prow=mysqli_fetch_array($presult)){ ?>
						        <tr>
						        <td><?php echo $prow['Product_Name']; ?></td>
						        <td><?php echo $prow['Qty']; ?></td>
						        <td><?php echo $prow['OrderedPrice']; ?></td></tr>
						        <?php $total=$total+$prow['OrderedPrice'];} ?>
						        <tr>
						        <td>Total</td>
						        <td></td>
						        <td><?php echo $total; ?></td>
						    	</tr>
					        </tbody>
					    	</table>
					        <a href="#" class="btn btn-primary">Go somewhere</a>
					      </div>
					    </div>
					  </div>
					<?php } ?>
	                </div>
	              </div>
	            </div>
        	</div>
          </section>
        </div>
      </div>
     
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>