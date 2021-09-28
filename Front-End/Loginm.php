    <!-- Start your project here-->
    <section class="intro">
      <div class="bg-image h-100">
        <div class="mask d-flex align-items-center h-100" style="background-color: #f3f2f2;">
          <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
              <div class="col-12 col-lg-9 col-xl-8">
                <div class="card" style="border-radius: 1rem;">
                  <div class="row g-0">
                    <div class="col-md-4 d-none d-md-block">
                      <img
                        src="https://mdbootstrap.com/img/Photos/Others/sidenav2.jpg"
                        alt="login form"
                        class="img-fluid" style="border-top-left-radius: 1rem; border-bottom-left-radius: 1rem;"
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