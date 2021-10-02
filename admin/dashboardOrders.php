<?php session_start(); ?>
<?php include '../PHP/Functions.php';

if($_SESSION['UType']!='Admin'){
header("HTTP/1.1 401 Unauthorized"); 
echo '<script type="text/javascript"> window.location = "../index.php" </script>';
die();
}?>
<?php
    if(!(isset($_GET['Status']))){$_GET['Status']='';}
    if(!(isset($_GET['OrderID']))){$_GET['OrderID']='';}
    if(!(isset($_GET['UserID']))){$_GET['UserID']='';}

?>
<?php $result = adminoders($_GET['Status'],$_GET['OrderID'],$_GET['UserID']);?>
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
            <a class="nav-link" href="./index.php">
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
            <a class="nav-link" href="./dashboardUsers.php">
              <i class="material-icons">dashboard</i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboardproducts.php">
              <i class="material-icons">dashboard</i>
              <p>Items</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="../PHP/logout.php">
              <i class="material-icons">dashboard</i>
              <p>Logout</p>
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
          		<div class="col-md-12">
          			<form class="form-inline" method="GET">
			          	    	<label for="Status" class="form-label">Status</label> 	&nbsp; 	&nbsp;
			          	    	<div class="form-group">
			            		<select class="form-control" id="Status" name="Status">
			            			<option value="">All</option>
			            			<option value="Confirmed">Confirmed</option>
			            			<option value="OnTheWay">OnTheWay</option>
				            		<option value="Delivered">Delivered</option>
				                    <option value="Completed">Completed</option>
				                    <option value="Cancled">Cancled</option>
			                	</select>
			                	</div> 	&nbsp; 	&nbsp;
			                	<label for="OrderID" class="form-label">OrderID</label> 	&nbsp;
			                	<input type="text" class="form-control" id="OrderID" name="OrderID"> 	&nbsp; 	&nbsp;
			                	<label for="UserID" class="form-label">UserID</label> 	&nbsp;
			                	<input type="text" class="form-control" id="UserID" name="UserID"> 	&nbsp; 	&nbsp;
			                	<button class="btn btn-info" type="submit" name="filter"><span class="material-icons">search</span></button>

                	</form>
            	</div>
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
					        Address:- <?php echo $row['Address']?><br>Status:- <?php echo $row['Status']?></p>
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
							        <td><?php echo $prow['OrderedPrice']; ?></td>
							    </tr>
						        <?php $total=$total+$prow['OrderedPrice'];} ?>
						        <tr>
							        <td>Total</td>
							        <td></td>
							        <td><?php echo $total; ?></td>
						    	</tr>
						    	<tr>
						    	<form action="" method="POST">
						    		<td style="text-align: right;"><button type="submit" class="btn btn-sm btn-primary" name="change<?php echo $row['OrderID']; ?>" value="OnTheWay"<?php if($row['Status']=="Delivered" or $row['Status']=="Completed" or $row['Status']=="Canceled"){echo "disabled";}?> >On the Way</button></td>
						    		<td style="text-align: right;"><button type="submit" class="btn btn-sm btn-primary" name="change<?php echo $row['OrderID']; ?>" value="Delivered"<?php if($row['Status']=="Completed" or $row['Status']=="Canceled"){echo "disabled";}?>>Delivered</button></td>
						    		<?php if($row['Status']=="Confirmed"){ ?>
						    		<td style="text-align: right;"><button type="submit" class="btn btn-sm btn-primary" name="change<?php echo $row['OrderID']; ?>" value="Canceled">Cancle</button></td>
						    		<?php } else { ?>
						    		<td style="text-align: right;"><button type="submit" class="btn btn-sm btn-primary" name="change<?php echo $row['OrderID']; ?>" value="Completed" <?php if($row['Status']=="Canceled"){echo "disabled";}?>>Completed</button></td>
						    		<?php } ?>
						    		<?php
							    		$otw="change".$row['OrderID'];
					                    if (isset($_POST[$otw])){
					                        updateorders($row['OrderID'],$_POST[$otw]);
					                    }
					                ?>
					            </form>
						    	</tr>
					        </tbody>
					    	</table>
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