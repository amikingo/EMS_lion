<?php
//error_reporting(0);
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
  // Redirect the user to the login page
  header("Location: login.php");
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
  $f_name = $row["first_name"];
  $f_lname = $row["last_name"];
  $f_email = $row["email"];
  $f_company = $row["company"];
} else {
  // Redirect the user to the profile page
  header("Location: profile.php");
  exit();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
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
<body>
  <h1>Profile Update</h1>
  <form id="profile-update-form" method="post">
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
</body>
</html>

<?php
// Process the form data
if (isset($_POST["submit"])) {
  // Connect to the database
  $conn = new mysqli($servername, $username, $password, $dbname);

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
      $sql = "UPDATE users SET first_name = '$f_name', last_name = '$f_lname', email = '$f_email', company = '$f_company' WHERE id = $user_id";

      if ($conn->query($sql) === TRUE) {
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

