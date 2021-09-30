<div class="containor row">
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style = "z-index:4;">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../Front-End/index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">SHOP NOW</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ABOUT US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">CONTACT US</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
      <a class="text-reset me-3" href="../Front-End/TheCart/my.php">
        <i class="fas fa-shopping-cart"></i>
      </a>
      <?php
        if(isset($_SESSION['LogedIn'])){
        ?>
          <!-- Notifications -->
          <a
            class="text-reset me-3 dropdown-toggle hidden-arrow"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            <i class="fas fa-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuLink"
          >
            <li>
              <a class="dropdown-item" href="#">Some news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Another news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>

          <!-- Avatar -->
          <a
            class="dropdown-toggle d-flex align-items-center hidden-arrow"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            <img
              src="https://mdbootstrap.com/img/new/avatars/2.jpg"
              class="rounded-circle"
              height="25"
              alt=""
              loading="lazy"
            />
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuLink"
          >
            <li>
              <a class="dropdown-item" href="../Front-End/UserUI.php">My profile</a>
            </li>
            <?php if($_SESSION['UType']=='Admin'){ ?>
            	<li>
              	<a class="dropdown-item" href="../admin/index.php">Admin</a>
            	</li>
			<?php }?>
            <li>
              <a class="dropdown-item" href="../PHP/logout.php">Logout</a>
            </li>

          </ul>
        </div>
      <?php
      } else{
      ?>

        <li class="nav-item" style="list-style-type: none">
          <a class="btn btn-light" href="../Front-End/login.php">Login</a>
        </li>
        <li class="nav-item" style="list-style-type: none">
          <a class="btn btn-light" href="../Front-End/register.php">Register</a>
        </li>

      <?php 
      } 
      ?>

    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style = "margin-top:53px;z-index:3;">
  <div class="container-fluid d-flex align-items-center" style="padding-top:4px">
    <!-- Navbar brand -->
    <a class="navbar-brand mt-2 mt-lg-0" href="#">
      <img
        src="logo.png"
        height="30"
        alt=""
        loading="lazy"
      />
    </a>
<div class="col-md-4">
  <form class="d-flex input-group w-auto my-auto mb-3 mb-md-0"  action="search.php" method="GET">
    <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search" name="search" <?php if(isset($_GET['search'])){echo 'Value="'.$_GET['search'].'"';} ?>>
    <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search text-white"></i></span>
  </form>
</div>
<button class="btn btn-outline-light" type="button">
  Download app<i class="fas fa-download ms-2"></i>
</button>
</div>
</nav>
</div>