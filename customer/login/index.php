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

  header("Location: ../index.php");


}

if (isset($_POST["signup"])) {
  $first_name = mysqli_real_escape_string($conn, $_POST["f_name"]);
  $last_name= mysqli_real_escape_string($conn, $_POST["f_lname"]);
  $email = mysqli_real_escape_string($conn, $_POST["f_email"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["f_pass"]));
  $cpassword = mysqli_real_escape_string($conn, md5($_POST["f_cpass"]));
  $companyName = mysqli_real_escape_string($conn, $_POST["f_company"]);
 
 $targetfolder = "cfile/";

 $targetfolder = $targetfolder .basename( $_FILES['file']['name']) ;
 $target = basename( $_FILES['file']['name']) ;

if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

 {

 //echo "The file ". basename( $_FILES['file']['name']). " is uploaded";

 }

 else {

// echo "Problem uploading file";

 }



  $check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM users WHERE email='$email'"));
  
  if ($password !== $cpassword) {
    echo "<script>alert('Password did not match.');</script>";
  } elseif ($check_email > 0) {
    echo "<script>alert('Email already exists in out database.');</script>";
  } else {
    if(empty($_POST["f_name"]) || empty($_POST["f_lname"]) || empty($_POST["f_email"]) || empty($_POST["f_pass"]) || empty($_POST["f_cpass"]) || empty($_POST["f_company"]) ) {
  echo "<script>alert('Please fill all fields.');</script>";
} else {
  // existing code

    $sql = "INSERT INTO users (firstName,lastName, email, password, cpassword, status, file, companyName) VALUES ('$first_name',' $last_name', '$email', '$password', '$cpassword',  '2', '$target', '$companyName')";


    $result = mysqli_query($conn, $sql);
    }
    }
  }


if (isset($_POST["signin"])) {
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["password"]));

  $check_email = mysqli_query($conn, "SELECT id FROM users WHERE email='$email' AND password='$password' AND status='1'");
  $app=mysqli_query($conn, "SELECT id FROM users WHERE email='$email' AND password='$password' AND status='2'");
  $rej=mysqli_query($conn, "SELECT id FROM users WHERE email='$email' AND password='$password' AND status='0' OR status='3'");
  //$bann=mysqli_query($conn, "SELECT id FROM users WHERE email='$email' AND password='$password' AND status='3'");
  if (mysqli_num_rows($check_email) > 0) {
    $row = mysqli_fetch_assoc($check_email);
    $_SESSION["user_id"] = $row['id'];
    header("Location: ../Home.php");
  }
else if(mysqli_num_rows($app) == 1){
  echo "<script>alert('Your Account is pending. Please Wait Until its verified.');</script>";
}
else if(mysqli_num_rows($rej) == 1){
  echo "<script>alert('Your Account is Rejected Please Contact The Company For further Details.');</script>";
}
// else if(mysqli_num_rows($bann) == 1){
//   echo "<script>alert('Your Account Have been Banned For certain Reasons Please Contact The Company For Further Details');</scrpit>";
// }
   else  {
  $errormsg="Invalid Email or Password Please Try Again. ";
  }
}

?>
<!DOCTYPE html>

<head>

  <title>Welcome</title>
  <link href="../assets/img/fav.png" rel="icon">
  <link rel="shortcut icon" href="images/logo.png">
  <link href="lib/bootstrap5/css/bootstrap.css" rel="stylesheet">
  <link href="css/get-started.css" rel="stylesheet">
  <link href="lib/mdb-ui-kit/css/mdb.min.css" rel="stylesheet">
  <link href="css/fontawesome6/css/all.min.css" rel="stylesheet">
  <link href="lib/toastr/toastr.min.css" rel="stylesheet">
<style>
  .error-message {
      color: red;
      font-size: 14px;
      margin-top: 5px;
    }
    ul li button {
  display: inline-block;
  padding: 10px 20px;
  border: 1px solid #ccc;
  background-color: #fff;
  color: #333;
  cursor: pointer;
}

ul li.active button {
background-color: black;
  color: #fff;
}

</style>
<script>
    function userAvailability() {
      $("#loaderIcon").show();
      jQuery.ajax({
        url: "check_availability.php",
        data: "email=" + $("#email").val(),
        type: "POST",
        success: function(data) {
          $("#user-availability-status1").html(data);
          $("#loaderIcon").hide();
        },
        error: function() {},
      });
    }
  </script>
</head>

<body>
  <header id="header" class="header fixed-top">
<div class="container-fluid container-xl d-flex align-items-center justify-content-between" >

      <span class="logo d-flex align-items-center">
<img src="../../assets/img/LOGO.png" style="margin-right: 100%;">
        
      </span>

      <nav id="navbarr" class="navbarr">
<ul>
      <li><a class="nav-link login-form-slider login-click" href="javascript:;"><button type="button" class="btn btn-primary">Signin</button></a></li>
  <li><a class="nav-link login-form-slider sign-up-click" href="javascript:;"><button type="button" class="btn btn-primary">Signup </button></a></li>
      <li><a class="nav-link login-form-slider login-click" href="../../index.php"><button type="button" class="btn btn-primary">Home</button></a></li>
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
               <p style="padding-left: 1%; padding-top:2%; color:red;"><?php if($errormsg){echo htmlentities($errormsg);} ?></p>
                             <div class="form-group user-name-field my-3">
                   <input type="text" class="form-control" name="email" placeholder="Email" required="required">
                                     <span class="error-message"></span>
                                       <div class="field-icon"><i class="fas fa-user"></i></div>
                                       </div>
                                       <div class="form-group forgot-password-field my-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
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
                          <form id="sign-up-form" method="post" action="index.php" enctype="multipart/form-data">

                            <div class="row">
                              <div class="col">

                                <div class="form-group user-name-field my-3">
                              <input type="text" class="form-control" name="f_name" placeholder="First Name" required="required">
                                  <span class="error-message"></span>
                                  <div class="field-icon"><i class="fas fa-user"></i></div>
                                </div>

                                <div class="form-group user-name-field my-3">
                              <input type="text" class="form-control" name="f_lname" placeholder="Last Name" required="required">
                                  <span class="error-message"></span>
                                  <div class="field-icon"><i class="fas fa-user"></i></div>
                                </div>

                                <div class="form-group user-name-field my-3">
              <input type="text" id="email" class="form-control" onBlur="userAvailability()" name="f_email" placeholder="Email" required="required" oninput="this.value = this.value.replace(/\s/g, '')" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                              <span id="user-availability-status1" style="font-size: 12px"></span>
                              <span class="error-message"></span>
                                  <div class="field-icon"><i class="fas fa-envelope"></i></div>
                                </div>
                                <div class="form-group user-name-field my-3">
                          <input type="text" class="form-control" name="f_company" placeholder="Company Name" required="required">
                                  <span class="error-message"></span>
                                  <div class="field-icon"><i class="fas fa-university"></i></div>
                                  <div class="field-icon" style="right: 15px;height: 0px;pointer-events: none;"></i></div>
                                </div>

                              </div>
                              <div class="col">
                              

                                <div class="form-group user-name-field my-3">
                                  <!-- attach file input  -->
                          <input type="file" class="form-control" name="file" id="f_file" placeholder="Logo" required="required">
                                  <span class="error-message"></span>
                                  <div class="field-icon"><i class="fas fa-paperclip"></i></div>
                                  <div class="field-icon" style="right: 15px;height: 0px;pointer-events: none;"></i></div>
                                  
                                <!-- end attach file input  -->
                                  
                                </div>


                                <div class="form-group my-3">
                              <input type="password" class="form-control" id="form_pass" name="f_pass" placeholder="Password"  required="required">
                                  <span class="error-message"></span>
                                  <div class="field-icon"><i class="fas fa-key"></i></div>
                                </div>
                                <div class="form-group my-3">
                              <input type="password" class="form-control" id="form_cpass" name="f_cpass" placeholder="Confirm Password"  required="required">
                                  <span class="error-message"></span>
                                  <div class="field-icon"><i class="fas fa-key"></i></div>
                                </div>
                              </div>
                            </div>

                            <div class="form-group sign-in-btn my-3">

                              <button id = "signup" type="submit" class="submit sign-in-btn" name="signup">
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

<!-- <script>
  $('input[name="email"], input[name="password"]').attr('required', 'required');

// Add a validation function to the submit button
$('#login-submit').on('click', function() {
  // Check if the email and password fields are empty
  if ($('input[name="email"]').val() == '') {
    $('.error-message').html('Please enter your email address.');
    return false;
  }

  else ($('input[name="password"]').val() == '')
   {
    $('.error-message').html('Please enter your password.');
    return false;
  }

  // Submit the form
  return true;
});
</script> -->

   <script type="text/javascript">
  document.getElementById("login-submit").addEventListener("submit", function(event) {
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

<script type="text/javascript">
  document.getElementById("signup").addEventListener("signup", function(event) {
    event.preventDefault();

    var isValid = true;

    var fields = [
      { name: "f_name", required: true },
      { name: "f_lname", required: true },
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