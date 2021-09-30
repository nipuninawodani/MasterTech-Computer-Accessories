<?php session_start(); ?>
<?php include '../PHP/Functions.php';

if($_SESSION['UType']!='Admin'){
header("HTTP/1.1 401 Unauthorized"); 
header("Location: ../index.php");
}?>
<?php $result = adminusers();?>
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
            <a class="navbar-brand" href="javascript:;">Users</a>
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
          <section class="intro">
            <div class="gradient-custom h-100">
              <div class="mask d-flex align-items-center h-100">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-12">
                      <div id="datatable"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- your content here -->
          <section class="intro">
            <div class="bg-image h-100" style="background-color: #f5f7fa;">
              <div class="row justify-content-right d-flex align-items-center" style="padding-left:10px;padding-top:10px">
                <div class="col-md-2">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                    <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                  </svg>
                  &nbsp;Add User
                  </button>
                </div>
              </div>
              <div class="mask d-flex align-items-center h-100">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body p-0">
                          <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 100%">
                            <table class="table table-striped table-hover mb-0 ">
                              <thead style="background-color: #a374ca;">
                                <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">First Name</th>
                                  <th scope="col">Last Name</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Mobile</th>
                                  <th scope="col">Gender</th>
                                  <th scope="col">Type</th>
                                  <th scope="col">Status</th>
                                </tr>
                              </thead>
                              <tbody>
                              	<?php while($row=mysqli_fetch_array($result)){ ?>
                                <tr <?php if($row['Status']=='Unverified'){echo 'class="table-warning"';}elseif ($row['Status']=='Inactive') {echo 'class="table-danger"';}	?>	>
                                  <td><?php echo $row['UserID']; ?></td>
                                  <td><?php echo $row['First_Name']; ?></td>
                                  <td><?php echo $row['Last_Name']; ?></td>
                                  <td><?php echo $row['Email']; ?></td>
                                  <td><?php echo $row['Mobile']; ?></td>
                                  <td><?php echo $row['Gender']; ?></td>
                                  <td><?php echo $row['Type']; ?></td>
                                  <td><?php echo $row['Status']; ?></td>
                                </tr><?php } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
     
    </div>
  </div>
 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
                <label for="First_Name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="First_Name" name="First_Name" >
        
                <label for="Last_Name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="Last_Name" name="Last_Name" >
                
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" >

                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile">
                
                <label for="gender" class="form-label">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender">

                <div class="form-group">
                  <label for="type" class="form-label">Type</label>
                  <select class="form-control" id="type" name="type" >
                    <option>Admin</option>
                    <option>Data Feeder</option>
                  </select>
                </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="submit" name="submit" class="btn btn-primary">Save changes</button></form>
      </div>
    </form>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</div>
</body>
</html>