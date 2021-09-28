<?php session_start(); ?>
<?php include '../PHP/Functions.php';

if($_SESSION['UType']!='Admin'){
header("HTTP/1.1 401 Unauthorized"); 
header("Location: ../index.php");
}?>
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
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a
        href="http://www.creative-tim.com" style="margin-left: 45%;"
            >
              <img
                src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg"
                class="rounded-circle "
                height="30"
                loading="lazy"
              />
            </a>
        <a href="../Front-End/index.html" class="simple-text logo-normal">
          MasterTech
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboard.html">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboardOrders.html">
              <i class="material-icons">dashboard</i>
              <p>Orders</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboardSales.html">
              <i class="material-icons">dashboard</i>
              <p>Sales</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboardReports.html">
              <i class="material-icons">dashboard</i>
              <p>Reports</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboardUsers.html">
              <i class="material-icons">dashboard</i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboardItems.html">
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
                <a class="nav-link" href="#0">
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
          <div class="content">
            <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title">Notifications</h3>
                  <p class="card-category">Handcrafted by our friend
                    <a target="_blank" href="https://github.com/mouse0270">Robert McIntosh</a>. Please checkout the
                    <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">full documentation.</a>
                  </p>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <h4 class="card-title">Notifications Style</h4>
                      <div class="alert alert-info">
                        <span>This is a plain notification</span>
                      </div>
                      <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>This is a notification with close button.</span>
                      </div>
                      <div class="alert alert-info alert-with-icon" data-notify="container">
                        <i class="material-icons" data-notify="icon">add_alert</i>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span data-notify="message">This is a notification with close button and icon.</span>
                      </div>
                      <div class="alert alert-info alert-with-icon" data-notify="container">
                        <i class="material-icons" data-notify="icon">add_alert</i>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span data-notify="message">This is a notification with close button and icon and have many lines. You can see that the icon and the close button are always vertically aligned. This is a beautiful notification. So you don't have to worry about the style.</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <h4 class="card-title">Notification states</h4>
                      <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>
                          <b> Info - </b> This is a regular notification made with ".alert-info"</span>
                      </div>
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>
                          <b> Success - </b> This is a regular notification made with ".alert-success"</span>
                      </div>
                      <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>
                          <b> Warning - </b> This is a regular notification made with ".alert-warning"</span>
                      </div>
                      <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>
                          <b> Danger - </b> This is a regular notification made with ".alert-danger"</span>
                      </div>
                      <div class="alert alert-primary">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>
                          <b> Primary - </b> This is a regular notification made with ".alert-primary"</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="places-buttons">
                    <div class="row">
                      <div class="col-md-6 ml-auto mr-auto text-center">
                        <h4 class="card-title">
                          Notifications Places
                          <p class="category">Click to view notifications</p>
                        </h4>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                        <div class="row">
                          <div class="col-md-4">
                            <button class="btn btn-primary btn-block" onclick="md.showNotification('top','left')">Top Left</button>
                          </div>
                          <div class="col-md-4">
                            <button class="btn btn-primary btn-block" onclick="md.showNotification('top','center')">Top Center</button>
                          </div>
                          <div class="col-md-4">
                            <button class="btn btn-primary btn-block" onclick="md.showNotification('top','right')">Top Right</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                        <div class="row">
                          <div class="col-md-4">
                            <button class="btn btn-primary btn-block" onclick="md.showNotification('bottom','left')">Bottom Left</button>
                          </div>
                          <div class="col-md-4">
                            <button class="btn btn-primary btn-block" onclick="md.showNotification('bottom','center')">Bottom Center</button>
                          </div>
                          <div class="col-md-4">
                            <button class="btn btn-primary btn-block" onclick="md.showNotification('bottom','right')">Bottom Right</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
</body>

</html>