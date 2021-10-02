<?php session_start();
include '../PHP/Functions.php'; 
?>
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
    <link rel="stylesheet" href="./login.css">
  </head>
  <body>
    <!-- Start your project here-->
    <?php include'header.php' ?>
    <section class="intro" style="margin-top:95px;height:87%">
      <div class="bg-image h-100">
        <div class="mask d-flex align-items-center h-100" style="background-color: #f3f2f2;">
          <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
              <div class="col-12 col-lg-9 col-xl-8">
                <div class="card" style="border-radius: 1rem;">
                  <div class="row g-0">
                    <div class="col-md-4 d-none d-md-block">
                      <img
                        src="./Index/images/bg.jpg"
                        alt="login form"
                        class="img-fluid" style="border-top-left-radius: 1rem; border-bottom-left-radius: 1rem;object-fit: cover; height:450px"
                      />
                    </div>
                    <div class="col-md-8 d-flex align-items-center">
                      <div class="card-body py-5 px-4 p-md-5">
    
                        <form action="" method="POST" class="container">
                          <h4 class="fw-bold mb-4" style="color: #92aad0;">Log in to your account</h4>
                          <p class="mb-4" style="color: #45526e;">To log in, please fill in these text fiels with your e-mail address and password.</p>
    
                          <div class="form-outline mb-4">
                            <input type="email" id="email" name="email" class="form-control" />
                            <label class="form-label" for="email">Email address</label>
                          </div>
    
                          <div class="form-outline mb-4">
                            <input type="password" id="password" name="password" class="form-control" />
                            <label class="form-label" for="password">Password</label>
                          </div>
                          <div class="row">
                              <div class="d-flex align-items-center form-check col-md">
                                <input type="hidden" name="remember" value="False" />
                                <input class="form-check-input" type="checkbox" value="True" name="remember" data-mdb-toggle="tooltip" title="Cookies must be enabled in your browser"/>
                                <label class="form-check-label" for="remember">Remember Me</label>
                              </div>
        
                              <div class="d-flex justify-content-end pt-1 col-md">
                                <input class="btn btn-primary btn-rounded" type="submit" name="submit" value="Log in" style="background-color: #92aad0;"/>
                              </div>                          
                          </div>
                          <div class="d-flex justify-content-end pt-1 mb-4" style="color:Red;" >
                            <?php
                              if (isset($_POST["submit"])){
                                  login($_POST["email"],md5($_POST["password"]),$_POST["remember"]);
                              }
                            ?>
                          </div>

                         <hr> <a class="link float-end" href="#!">Forgot password? Click here.</a>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
