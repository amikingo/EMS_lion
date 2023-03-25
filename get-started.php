<?php
include "funcs.php";
connect_db();
session_start();

if(isset($_SESSION["user_id"])) redirect_to("index.php");

?>
<!DOCTYPE html>

<head>

  <title>Welcome</title>

  <link rel="shortcut icon" href="images/logo.png">
  <link href="lib/bootstrap5/css/bootstrap.css" rel="stylesheet">
  <link href="css/get-started.css" rel="stylesheet">
  <link href="lib/mdb-ui-kit/css/mdb.min.css" rel="stylesheet">
  <link href="css/fontawesome6/css/all.min.css" rel="stylesheet">
  <link href="lib/toastr/toastr.min.css" rel="stylesheet">

</head>

<body>
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <span class="logo d-flex align-items-center">
        <img src="images/logo.png" alt="">
        <span><img alt="logo" src="https://www.lionsecurityet.com/images/LOGO.jpg" ></span>
      </span>

      <nav id="navbarr" class="navbarr">
        <ul>
          <li><a class="nav-link login-form-slider login-click" href="javascript:;">Signin</a></li>
          <li><a class="nav-link login-form-slider sign-up-click" href="javascript:;">Signup</a></li>
        </ul>
      </nav>

    </div>
  </header>


  <section id="hero" class="hero d-flex align-items-center">

    <div class="container ">
      <div class="row">
        
        <div class="col-lg-12 hero-img">
          <main class="cd-main">
            <section class="cd-section index2 visible">
              <div class="cd-content style2">
                <div class="login-box">
                  <div class="login-form-slider">
                    <div class="login-slide slide">
                      <div class="d-flex height-100-percentage">
                        <div class="align-self-center width-100-percentage">
                          <h3><b>Sign In</b></h3>
                          <form id="login-form">
                            <div class="form-group user-name-field my-3">
                              <input type="text" class="form-control" name="username" placeholder="Username">
                              <div class="field-icon"><i class="fas fa-user"></i></div>
                            </div>
                            <div class="form-group forgot-password-field my-3">
                              <input type="password" class="form-control" name="password" placeholder="Password">
                              <div class="field-icon"><i class="fas fa-key"></i></div>
                            </div>
                            <a href="javascript:;" class="forgot-password-click">Forgot Password?</a>
                            <br>
                            <div class="form-group sign-in-btn my-3">

                              <button type="submit" id="login-submit" class="submit sign-in-btn">
                                <span class="shadow"></span>
                                <span class="edge"></span>
                                <span class="front text"> Sign in
                                </span>
                              </button>
                            </div>

                          </form>


                          <div class="sign-up-txt">
                            Don't have an account? <a href="javascript:;" class="sign-up-click">Signup</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="signup-slide slide">
                      <div class="d-flex height-100-percentage">
                        <div class="align-self-center width-100-percentage">
                          <h3><b>Sign up</b></h3>
                          <form id="sign-up-form">

                            <div class="row">
                              <div class="col">

                                <div class="form-group user-name-field my-3">
                                  <input type="text" class="form-control" name="f_name" placeholder="First Name">
                                  <div class="field-icon"><i class="fas fa-user"></i></div>
                                </div>

                                <div class="form-group user-name-field my-3">
                                  <input type="text" class="form-control" name="f_lname" placeholder="Last Name">
                                  <div class="field-icon"><i class="fas fa-user"></i></div>
                                </div>


                                <div class="form-group user-name-field my-3">
                                  <input type="text" class="form-control" name="f_username" placeholder="Username">
                                  <div class="field-icon"><i class="fas fa-user"></i></div>
                                </div>

                                <div class="form-group user-name-field my-3">
                                  <input type="text" class="form-control" name="f_email" placeholder="Email">
                                  <div class="field-icon"><i class="fas fa-envelope"></i></div>
                                </div>


                              </div>
                              <div class="col">
                                <div class="form-group user-name-field my-3">
                                  <input class="form-control select" name="f_campus" placeholder = "Address"style="color: #757575;">
                                    <div class = "field-icon"> <i class="fas fa-address-book"></i></div>
                                </div>

                                <div class="col">
                                <div class="form-group user-name-field my-3">
                                  <input class="form-control select" name="f_depart" placeholder = "Company Name"style="color: #757575;">
                                    <div class = "field-icon"> <i class="fa-sharp fa-solid fa-building"></i></div>
                                </div>


                                <div class="form-group my-3">
                                  <input type="password" class="form-control" id="form_pass" name="f_pass" placeholder="Password">
                                  <div class="field-icon"><i class="fas fa-key"></i></div>
                                </div>
                                <div class="form-group my-3">
                                  <input type="password" class="form-control" id="form_cpass" name="f_cpass" placeholder="Confirm Password">
                                  <div class="field-icon"><i class="fas fa-key"></i></div>
                                </div>
                              </div>
                            </div>

                            <div class="form-group sign-in-btn my-3">

                              <button type="submit" class="submit sign-in-btn">
                                <span class="shadow"></span>
                                <span class="edge"></span>
                                <span class="front text"> Sign up
                                </span>
                              </button>
                            </div>
                          </form>
                          <div class="sign-up-txt">
                            if you have an account? <a href="javascript:;" class="login-click">login</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="forgot-password-slide slide">
                      <div class="d-flex height-100-percentage">
                        <div class="align-self-center width-100-percentage">
                          <h3><b>Forgot password</b></h3>
                          <form id="forget-pass-form">
                            <label class="label" style="text-align: left">Enter your email address to reset your password</label>
                            <div class="form-group user-name-field my-3">
                              <input type="text" id="forget-pass-input" class="form-control" placeholder="Email" required>
                              <div class="field-icon"><i class="fas fa-envelope"></i></div> 
                            </div>
                            <div class="form-group sign-in-btn my-5">

                              <button type="submit" id="forget-pass-btn" class="submit sign-in-btn">
                                <span class="shadow"></span>
                                <span class="edge"></span>
                                <span class="front text"> Submit
                                </span>
                              </button>
                            </div>
                          </form>
                          <div class="sign-up-txt">
                            if you remember your password? <a href="javascript:;" class="login-click">login</a>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </section>
          </main>

        </div>
      </div>
    </div>

  </section>


  <script src="lib/jquery.min.js"></script>
  <script src="lib/jquery.validate.min.js"></script>
  <script src="lib/bootstrap5/js/bootstrap.min.js"></script>
  <script src="lib/mdb-ui-kit/js/mdb.min.js"></script>
  <script src="lib/velocity.min.js"></script>
  <script src="lib/toastr/toastr.min.js"></script>
  <script src="js/get-started.js"></script>
</body>

</html>