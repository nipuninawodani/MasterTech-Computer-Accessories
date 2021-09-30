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
            <a class="navbar-brand" href="javascript:;">Dashboard</a>
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
          <div class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                      <div class="card-icon">
                        <i class="material-icons">inventory_2</i>
                      </div>
                      <p class="card-category">Orders</p>
                      <h3 class="card-title">$34,245</h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons">date_range</i> Last 24 Hours
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                      <div class="card-icon">
                        <i class="material-icons">point_of_sale</i>
                      </div>
                      <p class="card-category">Revenue</p>
                      <h3 class="card-title">$34,245</h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons">date_range</i> Last 24 Hours
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                      <div class="card-icon">
                        <i class="material-icons">info_outline</i>
                      </div>
                      <p class="card-category">Products</p>
                      <h3 class="card-title">75</h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons">local_offer</i> Tracked from Github
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                      <div class="card-icon">
                        <i class="fa fa-users"></i>
                      </div>
                      <p class="card-category">Total Users</p>
                      <h3 class="card-title">+245</h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons">people</i> Just Updated
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="card card-chart">
                    <div class="card-header card-header-success">
                      <div class="ct-chart" id="dailySalesChart"></div>
                    </div>
                    <div class="card-body">
                      <h4 class="card-title">Daily Sales</h4>
                      <p class="card-category">
                        <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons">access_time</i> updated 4 minutes ago
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card card-chart">
                    <div class="card-header card-header-warning">
                      <div class="ct-chart" id="websiteViewsChart"></div>
                    </div>
                    <div class="card-body">
                      <h4 class="card-title">Email Subscriptions</h4>
                      <p class="card-category">Last Campaign Performance</p>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons">access_time</i> campaign sent 2 days ago
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card card-chart">
                    <div class="card-header card-header-danger">
                      <div class="ct-chart" id="completedTasksChart"></div>
                    </div>
                    <div class="card-body">
                      <h4 class="card-title">Completed Tasks</h4>
                      <p class="card-category">Last Campaign Performance</p>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons">access_time</i> campaign sent 2 days ago
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-12">
                  <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                      <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                          <span class="nav-tabs-title">Tasks:</span>
                          <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                              <a class="nav-link active" href="#profile" data-toggle="tab">
                                <i class="material-icons">bug_report</i> Bugs
                                <div class="ripple-container"></div>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#messages" data-toggle="tab">
                                <i class="material-icons">code</i> Website
                                <div class="ripple-container"></div>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#settings" data-toggle="tab">
                                <i class="material-icons">cloud</i> Server
                                <div class="ripple-container"></div>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                          <table class="table">
                            <tbody>
                              <tr>
                                <td>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" value="" checked>
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </td>
                                <td>Sign contract for "What are conference organizers afraid of?"</td>
                                <td class="td-actions text-right">
                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                    <i class="material-icons">close</i>
                                  </button>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" value="">
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </td>
                                <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                <td class="td-actions text-right">
                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                    <i class="material-icons">close</i>
                                  </button>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" value="">
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </td>
                                <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                </td>
                                <td class="td-actions text-right">
                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                    <i class="material-icons">close</i>
                                  </button>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" value="" checked>
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </td>
                                <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                <td class="td-actions text-right">
                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                    <i class="material-icons">close</i>
                                  </button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="tab-pane" id="messages">
                          <table class="table">
                            <tbody>
                              <tr>
                                <td>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" value="" checked>
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </td>
                                <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                </td>
                                <td class="td-actions text-right">
                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                    <i class="material-icons">close</i>
                                  </button>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" value="">
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </td>
                                <td>Sign contract for "What are conference organizers afraid of?"</td>
                                <td class="td-actions text-right">
                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                    <i class="material-icons">close</i>
                                  </button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="tab-pane" id="settings">
                          <table class="table">
                            <tbody>
                              <tr>
                                <td>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" value="">
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </td>
                                <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                <td class="td-actions text-right">
                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                    <i class="material-icons">close</i>
                                  </button>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" value="" checked>
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </td>
                                <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                </td>
                                <td class="td-actions text-right">
                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                    <i class="material-icons">close</i>
                                  </button>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" value="" checked>
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </td>
                                <td>Sign contract for "What are conference organizers afraid of?"</td>
                                <td class="td-actions text-right">
                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button>
                                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                    <i class="material-icons">close</i>
                                  </button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-12">
                  <div class="card">
                    <div class="card-header card-header-warning">
                      <h4 class="card-title">Employees Stats</h4>
                      <p class="card-category">New employees on 15th September, 2016</p>
                    </div>
                    <div class="card-body table-responsive">
                      <table class="table table-hover">
                        <thead class="text-warning">
                          <th>ID</th>
                          <th>Name</th>
                          <th>Salary</th>
                          <th>Country</th>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Dakota Rice</td>
                            <td>$36,738</td>
                            <td>Niger</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Minerva Hooper</td>
                            <td>$23,789</td>
                            <td>Curaçao</td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Sage Rodriguez</td>
                            <td>$56,142</td>
                            <td>Netherlands</td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>Philip Chaney</td>
                            <td>$38,735</td>
                            <td>Korea, South</td>
                          </tr>
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
     
    </div>
  </div>
</body>

</html>