<?php
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
$database = "lion";

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
  $f_name = $row['FirstName'];
  $f_lname = $row['LastName'];
  $f_email = $row['email'];
  $f_company = $row['companyName'];
} else {
  // Redirect the user to the profile page
  header("Location: index.php");
  exit();
}

// Close the database connection
$conn->close();

// Process the form data
if (isset($_POST["submit"])) {
  // Connect to the database
  $conn = new mysqli($hostname, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get the form data
  $f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
  $f_lname = mysqli_real_escape_string($conn, $_POST['f_lname']);
  $f_email = mysqli_real_escape_string($conn, $_POST['f_email']);
  $f_company = mysqli_real_escape_string($conn, $_POST['f_company']);

  $user_id = $_SESSION["user_id"];

  // Check if the current password is correct
  $sql = "SELECT password FROM users WHERE id = $user_id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $sql = "UPDATE users SET FirstName= '$f_name', LastName = '$f_lname', email = '$f_email', companyName = '$f_company' WHERE id = '$user_id'";
    if ($conn->query($sql) === TRUE) {
      // Redirect the user to the profile page
        echo "<script>alert('Your Changes Have Been Made Successfully.');</script>";
      
      
    } else {
      // Handle the error
      echo "Error updating record: " . $conn->error;
    }
  } else {
    // Handle the error
    echo "Error updating record: " . $conn->error;
  }

  // Close the database connection
  $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="../assets/img/fav.png" rel="icon">
  <link rel="stylesheet" href="../css/style.css"/>
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../css/font-awesome.min.css"/>
  <link rel="stylesheet" href="../customer/css/owl.carousel.min.css"/>
  <link rel="stylesheet" href="../customer/css/nice-select.css"/>
  <link rel="stylesheet" href="../customer/css/slicknav.min.css"/>
  <link rel="stylesheet" href="../css/header.css"/>
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
</head>
</head>
   <!-- ======= Header ======= -->
   <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a class="navbar-brand" href="index.php"></a>
   
      <img alt="logo" src="../../assets/img/LOGO.png" style="width: 800px;height: 50px;">
      

      <nav class="nav-menu d-none d-lg-block"style="margin-left: 400px;">
      <ul>
  <li><a href="../Home.php"><button type="button" class="btn btn-primary">Home</button></a></li>
  <li><a href="../About us.php"><button type="button" class="btn btn-primary">About Us</button></a></li>
  <li><a href="../contact us.php"><button type="button" class="btn btn-primary">Contact Us</button></a></li>
  <li class="drop-down">
    <button type="button" class="btn btn-primary">Request</button>
    <ul class="submenu">
      <li><a href="../index.php">Request Employee</a></li>
      <li><a href="../search-request.php">Check Request</a></li>

    </ul>
  </li>
  <li class="drop-down">
    <button type="button" class="btn btn-primary">My Account</button>
    <ul class="submenu">
      <li class="active"><a href="profile.php">Profile</a></li>
      <li><a href="change-password.php">Change Password</a></li>
      <li><a href="logout.php">Logout</a></li>
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
  <input type="email" name="f_email" id="f_email" value="<?php echo $f_email; ?>"readonly>
      <span class="error-message"></span>
    </div>
    <div>
      <label for="f_company">Company:</label>
      <input type="text" name="f_company" id="f_company" value="<?php echo $f_company; ?>"readonly>
      <span class="error-message"></span>
    </div>
    <hr>

    <button type="submit" name="submit">Update Profile</button>
  </form>
</div>
</div>
</div>
</section>
</body>
</html>


