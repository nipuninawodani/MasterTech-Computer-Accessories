<?php include '../PHP/Functions.php'; 
session_start();
if(isset($_COOKIE['Email']) && !(isset($_SESSION['LogedIn']))){
  login($_COOKIE['Email'],$_COOKIE['Password'],"True");
}?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>MasterTech Computer solutions</title>
    <!-- MDB icon -->
    <link rel="icon" href="favicon.png" type="image/x-icon" />
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
      <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">


    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
    <!-- Start your project here-->






























    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
          <a class="nav-link" href="#">HOME</a>
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
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
    



    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->

      <a class="text-reset me-3" href="TheCart/my.php">

        <i class="fas fa-shopping-cart"></i>
      </a>

      <!-- Notifications -->
      <a
        class="text-reset me-3 dropdown-toggle hidden-arrow"
        href="#"
        id="navbarDropdownMenuLink"
        role="button"
        aria-expanded="false"
       
      >
        <i class="fas fa-bell"></i>
        <span class="badge rounded-pill badge-notification bg-danger">1</span>
      </a>
      
            <!-- Avatar -->
            <li class="nav-item dropdown">
              <a
                class="nav-item dropdown dropdown-toggle  align-items-center"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
              >
                <img
                  src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg"
                  class="rounded-circle"
                  height="30"
                  loading="lazy"
                />
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">My profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
              </ul>
            </li>
            <!-- Avatar -->

      

        
      
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid " style="margin-bottom: 10px;">
    <!-- Navbar brand -->
    <a class="navbar-brand mt-2 mt-lg-0" href="#">
      <img
        src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"
        height="15"
        alt=""
        loading="lazy"
      />
    </a>
<div class="col-md-4">
  <form class="d-flex input-group w-auto my-auto mb-3 mb-md-0">
    <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search" />
    <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search text-white"></i></span>
  </form>
</div>
<button class="btn btn-outline-light" type="button">
  Download app<i class="fas fa-download ms-2"></i>
</button>
</div>
</div>
</nav>

    
<?php include "header.php" ?>
















<<<<<<< HEAD:Front-End/index.html
=======
      <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="text-center">
          <img
            class="mb-4"
            src="logo.png"
            style="width: 250px;"
          />
          <h5 class="mb-3">Thank you for using our product. We're glad you're with us.</h5>
          <p class="mb-3">MDB Team</p>
          <a
            class="btn btn-primary btn-lg"
            href="https://mdbootstrap.com/docs/standard/getting-started/"
            target="_blank"
            role="button"
            >Start MDB tutorial</a
          >
        </div>
        <a href="./Register.php">Register</a>
        <a href="./bootstrap-5-admin-template-main/admin.html">Admin</a>
>>>>>>> 8946a524f5a54cfa3833bb44a859282b970cfec7:Front-End/index.php






<!-- END nav -->
<div class="hero-wrap js-fullheight" style="background-image: url('images/bg.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
      <div class="col-md-11 ftco-animate text-center">
        <h1 class="mb-4">Highest Quality computer Solutions</h1>
        <p><a href="#" class="btn btn-primary mr-md-4 py-3 px-4">Learn more <span class="ion-ios-arrow-forward"></span></a></p>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section bg-light ftco-no-pt ftco-intro">
  <div class="container">
    <div class="row">
      <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
        <div class="d-block services active text-center">
          <div class="icon d-flex align-items-center justify-content-center">
            <span class="flaticon-blin"></span>
            <img src="images/lapicon.jpg" alt="" class="lap" style="height: 50px;">
          </div>
          <div class="media-body">
            <h3 class="heading">Shop</h3>

            <p>				With Computer hardware includes all the physical parts of a computer, software, and peripherals.
      .</p>
            <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
          </div>
        </div>      
      </div>
      <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
        <div class="d-block services text-center">
          <div class="icon d-flex align-items-center justify-content-center">
            <span class="flaticon-dog-eatin"></span>
            <img src="images/repairicon.png" alt="" class="lap" style="height: 50px;">

          </div>
          <div class="media-body">
            <h3 class="heading">Repair</h3>

    
            <p>We do Computer repair with broad field encompassing many tools, techniques and procedures used to repair computer hardware and software.</p>
            <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
          </div>
        </div>    
      </div>
      <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
        <div class="d-block services text-center">
          <div class="icon d-flex align-items-center justify-content-center">
            <span class="flaticon-groomin"></span>
            <img src="images/guiganceicon.png" alt="" class="lap" style="height: 50px;">

          </div>
          <div class="media-body">
            <h3 class="heading">Guidance</h3>
            <p>				Guidance for all relating to comfort and safety of those working at a desk and Provides advice on working position and posture
      .</p>
            <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
          </div>
        </div>      
      </div>
    </div>
  </div>
</section>


<section class="ftco-section ftco-no-pt ftco-no-pb">
  <div class="container">
    <div class="row d-flex no-gutters">
      <div class="col-md-5 d-flex">
        <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/chairr.png);">
        </div>
      </div>
      <div class="col-md-7 pl-md-5 py-md-5">
        <div class="heading-section pt-md-5">
          <h2 class="mb-4">Why Choose Us?</h2>
        </div>
        <div class="row">
          <div class="col-md-6 services-2 w-100 d-flex">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-stethoscope"></span></div>
            <div class="text pl-3">
              <h4>Best Service</h4>
              <p>Good place to bye computers, laptops & accessories with warranty and fast service</p>
            </div>
          </div>
          <div class="col-md-6 services-2 w-100 d-flex">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-customer-service"></span></div>
            <div class="text pl-3">
              <h4>Customer Supports</h4>
              <p> We are always provide our friendly customer service.</p>
            </div>
          </div>
          <div class="col-md-6 services-2 w-100 d-flex">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-emergency-call"></span></div>
            <div class="text pl-3">
              <h4>Fast Delivery</h4>
              <p>fast handling and delivery all over the island.</p>
            </div>
          </div>
          <div class="col-md-6 services-2 w-100 d-flex">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-veterinarian"></span></div>
            <div class="text pl-3">
              <h4>Best Price</h4>
              <p>place to buy and repair your computers & laptops for a reasonable cost.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-counter" id="section-counter">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 text-center">
          <div class="text">
            <strong class="number" data-number="1000">0</strong>
          </div>
          <div class="text">
            <span>Customers</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 text-center">
          <div class="text">
            <strong class="number" data-number="85">0</strong>
          </div>
          <div class="text">
            <span>Products</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 text-center">
          <div class="text">
            <strong class="number" data-number="15">0</strong>
          </div>
          <div class="text">
            <span>Brands</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 text-center">
          <div class="text">
            <strong class="number" data-number="320">0</strong>
          </div>
          <div class="text">
            <span>Mongthly sales</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="ftco-section">
<div class="container">
  <div class="row justify-content-center pb-5 mb-3">
<div class="col-md-7 heading-section text-center ftco-animate">
<h2>Featured products</h2>
</div>
</div>
  <div class="row">
<div class="col-md-4 ftco-animate">
<div class="work mb-4 img d-flex align-items-end" style="background-image: url(images/vga.jpg);">
  <a href="images/vga.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
        <span class="fa fa-expand"></span>
      </a>
  <div class="desc w-100 px-4">
    <div class="text w-100 mb-3">
      <span>Cat</span>
      <h2><a href="work-single.html">Persian Cat</a></h2>
    </div>
  </div>
</div>
</div>
<div class="col-md-4 ftco-animate">
<div class="work mb-4 img d-flex align-items-end" style="background-image: url(images/monitor.jpg);">
  <a href="images/gallery-2.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
        <span class="fa fa-expand"></span>
      </a>
  <div class="desc w-100 px-4">
    <div class="text w-100 mb-3">
      <span>Dog</span>
      <h2><a href="work-single.html">Pomeranian</a></h2>
    </div>
  </div>
</div>
</div>
<div class="col-md-4 ftco-animate">
<div class="work mb-4 img d-flex align-items-end" style="background-image: url(images/gamechair.jpg);">
  <a href="images/gallery-3.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
        <span class="fa fa-expand"></span>
      </a>
  <div class="desc w-100 px-4">
    <div class="text w-100 mb-3">
      <span>Cat</span>
      <h2><a href="work-single.html">Sphynx Cat</a></h2>
    </div>
  </div>
</div>
</div>

<div class="col-md-4 ftco-animate">
<div class="work mb-4 img d-flex align-items-end" style="background-image: url(images/mouse.jpg);">
  <a href="images/gallery-4.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
        <span class="fa fa-expand"></span>
      </a>
  <div class="desc w-100 px-4">
    <div class="text w-100 mb-3">
      <span>Cat</span>
      <h2><a href="work-single.html">British Shorthair</a></h2>
    </div>
  </div>
</div>
</div>
<div class="col-md-4 ftco-animate">
<div class="work mb-4 img d-flex align-items-end" style="background-image: url(images/headset.jpg);">
  <a href="images/gallery-5.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
        <span class="fa fa-expand"></span>
      </a>
  <div class="desc w-100 px-4">
    <div class="text w-100 mb-3">
      <span>Dog</span>
      <h2><a href="work-single.html">Beagle</a></h2>
    </div>
  </div>
</div>
</div>
<div class="col-md-4 ftco-animate">
<div class="work mb-4 img d-flex align-items-end" style="background-image: url(images/ssd.jpg);">
  <a href="images/gallery-6.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
        <span class="fa fa-expand"></span>
      </a>
  <div class="desc w-100 px-4">
    <div class="text w-100 mb-3">
      <span>Dog</span>
      <h2><a href="work-single.html">Pug</a></h2>
    </div>
  </div>
</div>
</div>
</div>
</div>
</section>






<section class="ftco-section testimony-section" style="background-image: url('images/back.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row justify-content-center pb-5 mb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <h2 class="back" style="color: aliceblue;">Happy Clients &amp; Feedbacks</h2>
      </div>
    </div>
    <div class="row ftco-animate">
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel ftco-owl">
          <div class="item">
            <div class="testimony-wrap py-4">
              <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
              <div class="text">
                <p class="mb-4">Bought a laptop online few weeks ago and delivered in the next day. Appreciate the service. Thank you Master Tech Computers</p>
                <div class="d-flex align-items-center">
                  <div class="user-img" style="background-image: url(images/nipu.jpg)"></div>
                  <div class="pl-3">
                    <p class="name">Nipuni Perera</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap py-4">
              <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
              <div class="text">
                <p class="mb-4">Extremely superb service provide for customers. Very flexible with customer requirements. My only selection is Master Tech Computers.</p>
                <div class="d-flex align-items-center">
                  <div class="user-img" style="background-image: url(images/mahela.jpg)"></div>
                  <div class="pl-3">
                    <p class="name">M.Dissanayake</p>
                    <span class="position">Marketing Manager</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap py-4">
              <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
              <div class="text">
                <p class="mb-4">Good Place to buy computers..highly recommend..Keep it up your good work..friendly customer service.</p>
                <div class="d-flex align-items-center">
                  <div class="user-img" style="background-image: url(images/mahela.jpg)"></div>
                  <div class="pl-3">
                    <p class="name">Yasas Perera</p>
                    <span class="position">Youtuber</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap py-4">
              <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
              <div class="text">
                <p class="mb-4">Good place to bye computers, laptops & accessories with warranty. Also highly recommended place to repair your computers & laptops for a reasonable cost.</p>
                <div class="d-flex align-items-center">
                  <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                  <div class="pl-3">
                    <p class="name">Roger Scott</p>
                    <span class="position">Marketing Manager</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimony-wrap py-4">
              <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
              <div class="text">
                <p class="mb-4">I’ve bought several items from these guys throughout the years. And can genuinely say its been a very positive experience.</p>
                <div class="d-flex align-items-center">
                  <div class="user-img" style="background-image: url(images/abu.jpg)"></div>
                  <div class="pl-3">
                    <p class="name">Abdullah Ramees</p>
                    <span class="position">Game streamer</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<<<<<<< HEAD:Front-End/index.html
  </div>
</section>





<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center pb-5 mb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <h2>Latest news from our blog</h2>
      </div>
    </div>
    <div class="row d-flex">
      <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
          <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/cyber.jpeg');">
          </a>
          <div class="text p-4">
            <div class="meta mb-2">
              <div><a href="#">April 07, 2020</a></div>
              <div><a href="#">Admin</a></div>
              <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
            </div>
            <h3 class="heading"><a href="https://tharakasachin98.medium.com/cybersecurity-and-hacking-717585f69aed">An Ethical Hacker exposes vulnerabilities.</a></h3>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
          <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/articledesktop.jpg');">
          </a>
          <div class="text p-4">
            <div class="meta mb-2">
              <div><a href="#">April 07, 2020</a></div>
              <div><a href="#">Admin</a></div>
              <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
            </div>
            <h3 class="heading"><a href="https://www.pcmag.com/picks/the-best-computer-monitors">The Best Computer Monitors for 2021</a></h3>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
          <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/tharnos.jpg');">
          </a>
          <div class="text p-4">
            <div class="meta mb-2">
              <div><a href="#">April 07, 2020</a></div>
              <div><a href="#">Admin</a></div>
              <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
            </div>
            <h3 class="heading"><a href="https://www.acer.com/ac/en/GB/content/predator-thronos">Acer predator-thronos the next level dream chair</a></h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
        <h2 class="footer-heading">Master Tech</h2>
        <p>The best Computer parts provider for you with fast delivery and reasonable prices.</p>
        <ul class="ftco-footer-social p-0">
          <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
          <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
          <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
        </ul>
      </div>
      <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
        <h2 class="footer-heading">Latest News</h2>
        <div class="block-21 mb-4 d-flex">
          <a class="img mr-4 rounded" style="background-image: url(images/articledesktop.jpg);"></a>
          <div class="text">
            <h3 class="heading"><a href="#">The Best Computer Monitors for 2021</a></h3>
            <div class="meta">
              <div><a href="#"><span class="icon-calendar"></span> April 7, 2020</a></div>
              <div><a href="#"><span class="icon-person"></span> Admin</a></div>
              <div><a href="#"><span class="icon-chat"></span> 19</a></div>
            </div>
          </div>
        </div>
        <div class="block-21 mb-4 d-flex">
          <a class="img mr-4 rounded" style="background-image: url(images/tharnos.jpg);"></a>
          <div class="text">
            <h3 class="heading"><a href="#">Acer predator-thronos the next level dream chair.</a></h3>
            <div class="meta">
              <div><a href="#"><span class="icon-calendar"></span> April 7, 2020</a></div>
              <div><a href="#"><span class="icon-person"></span> Admin</a></div>
              <div><a href="#"><span class="icon-chat"></span> 19</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
        <h2 class="footer-heading">Quick Links</h2>
        <ul class="list-unstyled">
          <li><a href="#" class="py-2 d-block">Home</a></li>
          <li><a href="#" class="py-2 d-block">About</a></li>
          <li><a href="#" class="py-2 d-block">Services</a></li>
          <li><a href="#" class="py-2 d-block">Shop</a></li>
          <li><a href="#" class="py-2 d-block">Blog</a></li>
          <li><a href="#" class="py-2 d-block">Contact</a></li>
        </ul>
      </div>
      <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
        <h2 class="footer-heading">Have a Questions?</h2>
        <div class="block-23 mb-3">
          <ul>
            <li><span class="icon fa fa-map"></span><span class="text">203 ,Hunupitiya Rd, Kiribathgoda, Sri Lanka</span></li>
            <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+94 776 308 309</span></a></li>
            <li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">info@mastertech.com</span></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-12 text-center">

        <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | MasterTech Computers <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://mastertech.com" target="_blank">MasterTech Computers.com</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      </div>
    </div>
  </div>
</footer>




<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>
=======
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

<!-- </div> -->
<!-- End of .cotainer -->
<a href="./Login.html">Login</a>
<a href="./Profile.html">Profile</a>
<a href="../material-dashboard-master/dashboard.html">Admin Dashboard</a>
<a href="./Cart.html">Cart</a>
<a href="../material-dashboard-master/dashboardDelivery.html">Delivery</a>
>>>>>>> 8946a524f5a54cfa3833bb44a859282b970cfec7:Front-End/index.php

    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
