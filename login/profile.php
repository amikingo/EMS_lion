<?php
//error_reporting(0);
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
  // Redirect the user to the login page
  header("Location: logout.php");
  exit();
}

// Connect to the database
$hostname = "localhost";
$username = "root";
$password = "";
$database = "osghsdb";


$conn = mysqli_connect($hostname, $username, $password, $database) or die("Database connection failed");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



// Get the user's current profile information
$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $f_name = $row["FirstName"];
  $f_lname = $row["LastName"];
  $f_email = $row["email"];
  $f_company = $row["companyName"];
} else {
  // Redirect the user to the profile page
  header("Location: profile.php");
  exit();
}

// Close the database connection
$conn->close();
?>
<?php
// Process the form data
if (isset($_POST["submit"])) {
  // Connect to the database
  $conn = new mysqli($hostname, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get the form data
  $f_name = $_POST["f_name"];
  $f_lname = $_POST["f_lname"];
  $f_email = $_POST["f_email"];
  $f_company = $_POST["f_company"];
  $current_password = $_POST["current_password"];
  $new_password = $_POST["new_password"];
  $confirm_password = $_POST["confirm_password"];

  // Check if the current password is correct
  $user_id = $_SESSION["user_id"];
  $sql = "SELECT password FROM users WHERE id = $user_id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $password_hash = $row["password"];

    if (password_verify($current_password, $password_hash)) {
      // Check if the new password and confirm password match
      if ($new_password != "" && $new_password == $confirm_password) {
        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = '$password_hash' WHERE id = $user_id";
        $conn->query($sql);
      }

      // Update the user's profile in the database
      $sqli = "UPDATE users SET FirstName = '$f_name', LastName = '$f_lname', email = '$f_email', companyName = '$f_company' WHERE id = $user_id";

      if ($conn->query($sqli) === TRUE) {
        // Redirect the user to the profile page
        header("Location: profile.php");
        exit();
      } else {
        echo "Error updating record: " . $conn->error;
      }
    } else {
      // Display an error message
      $error_message = "Invalid current password.";
    }
  }

  // Close the database connection
  $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../customer/css/style.css"/>
  <link rel="stylesheet" href="../customer/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../customer/css/font-awesome.min.css"/>
  <link rel="stylesheet" href="../customer/css/owl.carousel.min.css"/>
  <link rel="stylesheet" href="../customer/css/nice-select.css"/>
  <link rel="stylesheet" href="../customer/css/slicknav.min.css"/>
  <title>Profile Update</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 16px;
      line-height: 1.5;
      margin: 0;
      padding: 0;

    }

    h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    form {
      max-width: 600px;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      display: block;
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-bottom: 20px;
      box-sizing: border-box;
    }

    button[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    button[type="submit"]:hover {
      background-color: #3e8e41;
    }

    .error-message {
      color: red;
      font-size: 14px;
      margin-top: 5px;
    }
  </style>
  <style>
/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

body {
    font-family: "Open Sans", sans-serif;
    color: #444444;
}

a {
    color: #007bff !important;
}

a:hover {
    color: #86db9f;
    text-decoration: none;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Raleway", sans-serif;
}


/*--------------------------------------------------------------
# Back to top button
--------------------------------------------------------------*/

.back-to-top {
    position: fixed;
    display: none;
    right: 15px;
    bottom: 15px;
    z-index: 99999;
}

.back-to-top i {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    width: 40px;
    height: 40px;
    border-radius: 50px;
    background: #007bff !important;
    color: #fff;
    transition: all 0.4s;
}

.back-to-top i:hover {
    background: #095bb1 !important;
    color: #fff;
}




/*--------------------------------------------------------------
# Disable aos animation delay on mobile devices
--------------------------------------------------------------*/

@media screen and (max-width: 768px) {
    [data-aos-delay] {
        transition-delay: 0 !important;
    }
}


/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

#header {
    background: #fff;
    transition: all 0.5s;
    z-index: 997;
    padding: 15px 0;
    box-shadow: 0px 0 18px rgba(55, 66, 59, 0.08);
}

#header .logo {
    font-size: 32px;
    margin: 0;
    padding: 0;
    line-height: 1;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-family: "Poppins", sans-serif;
}

#header .logo a {
    color: #007bff !important;
}

#header .logo img {
    max-height: 40px;
}

@media (max-width: 992px) {
    #header .logo {
        font-size: 28px;
    }
}


/*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/


/* Desktop Navigation */

.nav-menu ul {
    margin: 0;
    padding: 0;
    list-style: none;
}

.nav-menu>ul {
    display: flex;
}

.nav-menu>ul>li {
    position: relative;
    white-space: nowrap;
    padding: 10px 0 10px 24px;
}

.nav-menu a {
    display: block;
    position: relative;
    color: #37423b;
    transition: 0.3s;
    font-size: 15px;
    font-family: "Poppins", sans-serif;
    font-weight: 500;
}

.nav-menu a:hover,
.nav-menu .active>a,
.nav-menu li:hover>a {
    color: #007bff !important;
}
.nav-menu .drop-down ul {
    display: block;
    position: absolute;
    left: 24px;
    top: calc(100% + 30px);
    z-index: 99;
    opacity: 0;
    visibility: hidden;
    padding: 10px 0;
    background: #fff;
    box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
    transition: 0.3s;
    border-radius: 4px;
}

.nav-menu .drop-down:hover>ul {
    opacity: 1;
    top: 100%;
    visibility: visible;
}

.nav-menu .drop-down li {
    min-width: 180px;
    position: relative;
}

.nav-menu .drop-down ul a {
    padding: 10px 20px;
    font-size: 14px;
    font-weight: 500;
    text-transform: none;
    color: #37423b;
}

.nav-menu .drop-down ul a:hover,
.nav-menu .drop-down ul .active>a,
.nav-menu .drop-down ul li:hover>a {
    color: #007bff !important;
}
.nav-menu .drop-down .drop-down ul {
    top: 0;
    left: calc(100% - 30px);
}

.nav-menu .drop-down .drop-down:hover>ul {
    opacity: 1;
    top: 0;
    left: 100%;
}

.nav-menu .drop-down .drop-down>a {
    padding-right: 35px;
}

.nav-menu .drop-down .drop-down>a:after {
    /* content: "\eaa0";
  font-family: IcoFont; */
    position: absolute;
    right: 15px;
}






/* Mobile Navigation */

.mobile-nav-toggle {
    position: fixed;
    top: 17px;
    right: 15px;
    z-index: 9998;
    border: 0;
    background: none;
    font-size: 24px;
    transition: all 0.4s;
    outline: none !important;
    line-height: 1;
    cursor: pointer;
    text-align: right;
}

.mobile-nav-toggle i {
    color: #37423b;
}

.mobile-nav {
    position: fixed;
    top: 55px;
    right: 15px;
    bottom: 15px;
    left: 15px;
    z-index: 9999;
    overflow-y: auto;
    background: #fff;
    transition: ease-in-out 0.2s;
    opacity: 0;
    visibility: hidden;
    border-radius: 10px;
    padding: 10px 0;
}

.mobile-nav * {
    margin: 0;
    padding: 0;
    list-style: none;
}

.mobile-nav a {
    display: block;
    position: relative;
    color: #37423b;
    padding: 10px 20px;
    font-weight: 500;
    outline: none;
}

.mobile-nav a:hover,
.mobile-nav .active>a,
.mobile-nav li:hover>a {
    color: #007bff !important;
    text-decoration: none;
}

.mobile-nav .drop-down>a:after {
    /* content: "\ea99";
  font-family: IcoFont; */
    padding-left: 10px;
    position: absolute;
    right: 15px;
}

.mobile-nav .active.drop-down>a:after {
    content: "\eaa1";
}

.mobile-nav .drop-down>a {
    padding-right: 35px;
}

.mobile-nav .drop-down ul {
    display: none;
    overflow: hidden;
}

.mobile-nav .drop-down li {
    padding-left: 20px;
}

.mobile-nav-overly {
    width: 100%;
    height: 100%;
    z-index: 9997;
    top: 0;
    left: 0;
    position: fixed;
    background: rgba(32, 38, 34, 0.6);
    overflow: hidden;
    display: none;
    transition: ease-in-out 0.2s;
}

.mobile-nav-active {
    overflow: hidden;
}

.mobile-nav-active .mobile-nav {
    opacity: 1;
    visibility: visible;
}

.mobile-nav-active .mobile-nav-toggle i {
    color: #fff;
}
</style>
  
</head>
</head>
   <!-- ======= Header ======= -->
   <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a class="navbar-brand" href="index.php"></a>
   
      <img alt="logo" src="../assets/img/LOGO.png" style="width: 300px;height: 50px;">
      

      <nav class="nav-menu d-none d-lg-block"style="margin-left: 510px;">
        <ul>
          <li class="active"><a href="../index.php">Home</a></li>
          <li class="drop-down">
            <a href="">Request & complain </a> 
            <ul >
              <li><a href="../customer/index.php">Request Employee</a></li>
              <li><a href="../customer/search-request.php">Check Request</a></li>
              <li><a href="" >Complain</a></li>
            </ul>
          </li>
          <li class="drop-down">
            <a href="">My Account </a> 
            <ul >
              <li><a href="../login/profile.php">Profile</a></li>
              <li><a href="../login/change-password.php">Change Password</a></li>
              <li><a href="../login/logout.php" >Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  
<body>
  
  <section class="contact-page-section spad overflow-hidden">
  <div class="container"> 

      <div class="row">
    
        <div class="col-lg-12">
       <h1>Profile Update</h1>
  <form class="singup-form contact-form"  id="profile-update-form" method="post">
    <div>
      <label for="f_name">First Name:</label>
      <input type="text" name="f_name" id="f_name" value="<?php echo $f_name; ?>">
      <span class="error-message"></span>
    </div>
    <div>
      <label for="f_lname">Last Name:</label>
      <input type="text" name="f_lname" id="f_lname" value="<?php echo $f_lname; ?>">
      <span class="error-message"></span>
    </div>
    <div>
      <label for="f_email">Email:</label>
      <input type="email" name="f_email" id="f_email" value="<?php echo $f_email; ?>">
      <span class="error-message"></span>
    </div>
    <div>
      <label for="f_company">Company:</label>
      <input type="text" name="f_company" id="f_company" value="<?php echo $f_company; ?>">
      <span class="error-message"></span>
    </div>
    <hr>
    <div>
      <label for="current_password">Current Password:</label>
      <input type="password" name="current_password" id="current_password" required>
      <span class="error-message"></span>
    </div>
    <div>
      <label for="new_password">New Password:</label>
      <input type="password" name="new_password" id="new_password">
      <span class="error-message"></span>
    </div>
    <div>
      <label for="confirm_password">Confirm Password:</label>
      <input type="password" name="confirm_password" id="confirm_password">
      <span class="error-message"></span>
    </div>
    <button type="submit" name="submit">Update Profile</button>
  </form>
</div>
</div>
</div>
</section>
</body>
</html>



