<!-- <?php
//include "funcs.php";
//connect_db();
//session_start();

//if(isset($_SESSION["user_id"])) redirect_to("index.php");

?> -->

<?php

include 'config.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

session_start();

//error_reporting(0);

if (isset($_SESSION["user_id"])) {

  header("Location: ../customer/index.php");


}

if (isset($_POST["signup"])) {
  $full_name = mysqli_real_escape_string($conn, $_POST["f_name"]);
  $email = mysqli_real_escape_string($conn, $_POST["f_email"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["f_pass"]));
  $cpassword = mysqli_real_escape_string($conn, md5($_POST["f_cpass"]));
  $companyName = mysqli_real_escape_string($conn, $_POST["f_company"]);
  $file = mysqli_real_escape_string($conn, $_POST["f_file"]);
  $token = md5(rand());
//move_uploaded_file($_FILES["file"]["tmp_name"],"cfile/".$_FILES["file"]["name"]);
  $check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM users WHERE email='$email'"));
  
  if ($password !== $cpassword) {
    echo "<script>alert('Password did not match.');</script>";
  } elseif ($check_email > 0) {
    echo "<script>alert('Email already exists in out database.');</script>";
  } else {
    $sql = "INSERT INTO users (full_name, email, password, token, status, file, companyName) VALUES ('$full_name', '$email', '$password', '$token', '1', '$file', '$companyName')";
    $result = mysqli_query($conn, $sql);
    }}

if (isset($_POST["signin"])) {
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["password"]));

  $check_email = mysqli_query($conn, "SELECT id FROM users WHERE email='$email' AND password='$password' AND status='1'");

  if (mysqli_num_rows($check_email) > 0) {
    $row = mysqli_fetch_assoc($check_email);
    $_SESSION["user_id"] = $row['id'];
    header("Location: ../customer/index.php");
  } else {
    echo "<script>alert('Login details is incorrect. Please try again.');</script>";
  }
}

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

    <div class="container">
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
                      
                           <form id="login-form" method="post">
                             <div class="form-group user-name-field my-3">
                                 <input type="text" class="form-control" name="email" placeholder="Username">
                                     <span class="error-message"></span>
                                       <div class="field-icon"><i class="fas fa-user"></i></div>
                                       </div>
                                       <div class="form-group forgot-password-field my-3">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                        <span class="error-message"></span>
                                         <div class="field-icon"><i class="fas fa-key"></i></div>
                                        </div>
                                        <a href="javascript:;" class="forgot-password-click">Forgot Password?</a>
                                        <br>
                                        <div class="form-group sign-in-btn my-3">
                                          <button type="submit" id="login-submit" class="submit sign-in-btn" name="signin">
                                            <span class="shadow"></span>
                                            <span class="edge"></span>
                                            <span class="front text"> Sign in
                                            </span>
                                          </button>
                                        </div>
                                      </form>

                          <div class="sign-up-txt">
                            Don't have an account? <a href="javascript:;" name="signup"class="sign-up-click">Signup</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="signup-slide slide">
                      <div class="d-flex height-100-percentage">
                        <div class="align-self-center width-100-percentage">
                          <h3><b>Sign up</b></h3>
                          <form id="sign-up-form" method="post">

                            <div class="row">
                              <div class="col">

                                <div class="form-group user-name-field my-3">
                                  <input type="text" class="form-control" name="f_name" placeholder="First Name">
                                  <span class="error-message"></span>
                                  <div class="field-icon"><i class="fas fa-user"></i></div>
                                </div>

                                <div class="form-group user-name-field my-3">
                                  <input type="text" class="form-control" name="f_lname" placeholder="Last Name">
                                  <span class="error-message"></span>
                                  <div class="field-icon"><i class="fas fa-user"></i></div>
                                </div>


                                <div class="form-group user-name-field my-3">
                                  <input type="text" class="form-control" name="f_username" placeholder="Username">
                                  <span class="error-message"></span>
                                  <div class="field-icon"><i class="fas fa-user"></i></div>
                                </div>

                                <div class="form-group user-name-field my-3">
                                  <input type="text" class="form-control" name="f_email" placeholder="Email">
                                  <span class="error-message"></span>
                                  <div class="field-icon"><i class="fas fa-envelope"></i></div>
                                </div>


                              </div>
                              <div class="col">
                                <div class="form-group user-name-field my-3">
                                  <input type="text" class="form-control" name="f_company" placeholder="company Name">
                                  <span class="error-message"></span>
                                  <div class="field-icon"><i class="fas fa-university"></i></div>
                                  <div class="field-icon" style="right: 15px;height: 0px;pointer-events: none;"></i></div>
                                </div>

                                <div class="form-group user-name-field my-3">
                                  <!-- attach file input  -->
                                  <input type="file" class="form-control" name="f_file" placeholder="Logo">
                                  <span class="error-message"></span>
                                  <div class="field-icon"><i class="fas fa-paperclip"></i></div>
                                  <div class="field-icon" style="right: 15px;height: 0px;pointer-events: none;"></i></div>
                                  
                                <!-- end attach file input  -->
                                  
                                </div>


                                <div class="form-group my-3">
                                  <input type="password" class="form-control" id="form_pass" name="f_pass" placeholder="Password">
                                  <span class="error-message"></span>
                                  <div class="field-icon"><i class="fas fa-key"></i></div>
                                </div>
                                <div class="form-group my-3">
                                  <input type="password" class="form-control" id="form_cpass" name="f_cpass" placeholder="Confirm Password">
                                  <span class="error-message"></span>
                                  <div class="field-icon"><i class="fas fa-key"></i></div>
                                </div>
                              </div>
                            </div>

                            <div class="form-group sign-in-btn my-3">

                              <button type="submit" class="submit sign-in-btn" name="signup">
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
                                <span class="front text"> Submit</span>
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

  <script>
  document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault();

    var isValid = true;

    var fields = [
      { name: "email", required: true, type: "email" },
      { name: "password", required: true }
    ];

    fields.forEach(function(field) {
      var input = document.getElementsByName(field.name)[0];
      var errorMessage = input.nextElementSibling;
      errorMessage.textContent = "";

      if (field.required && !input.value) {
        errorMessage.textContent = "This field is required.";
        isValid = false;
      } else if (field.type === "email" && !validateEmail(input.value)) {
        errorMessage.textContent = "Please enter a valid email address.";
        isValid = false;
      }
    });

    if (isValid) {
      this.submit();
    }
  });

  function validateEmail(email) {
    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return emailRegex.test(email);
  }
</script>

<script>
  document.getElementById("sign-up-form").addEventListener("submit", function(event) {
    event.preventDefault();

    var isValid = true;

    var fields = [
      { name: "f_name", required: true },
      { name: "f_lname", required: true },
      { name: "f_username", required: true, minLength: 3 },
      { name: "f_email", required: true, type: "email" },
      { name: "f_company", required: true },
      { name: "f_file", required: true },
      { name: "f_pass", required: true, minLength: 8 },
      { name: "f_cpass", required: true }
    ];

    fields.forEach(function(field) {
      var input = document.getElementsByName(field.name)[0];
      var errorMessage = input.nextElementSibling;
      errorMessage.textContent = "";

      if (field.required && !input.value) {
        errorMessage.textContent = "This field is required.";
        isValid = false;
      } else if (field.type === "email" && !validateEmail(input.value)) {
        errorMessage.textContent = "Please enter a valid email address.";
        isValid = false;
      } else if (field.minLength && input.value.length < field.minLength) {
        errorMessage.textContent = "Must be at least " + field.minLength + " characters.";
        isValid = false;
      }
    });

    var password = document.getElementsByName("f_pass")[0].value;
    var confirmPassword = document.getElementsByName("f_cpass")[0].value;
    var confirmPasswordErrorMessage = document.getElementsByName("f_cpass")[0].nextElementSibling;

    if (password && confirmPassword && password !== confirmPassword) {
      confirmPasswordErrorMessage.textContent = "Passwords do not match.";
      isValid = false;
    }

    if (isValid) {
      this.submit();
    }
  });

  function validateEmail(email) {
    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return emailRegex.test(email);
  }
</script>
</body>

</html>