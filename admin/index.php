
<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
  {
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT ID FROM tbladmin WHERE UserName=:username and Password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['osghsaid']=$result->ID;
}

  if(!empty($_POST["remember"])) {
//COOKIES for username
setcookie ("user_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
//COOKIES for password
setcookie ("userpassword",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
} else {
if(isset($_COOKIE["user_login"])) {
setcookie ("user_login","");
if(isset($_COOKIE["userpassword"])) {
setcookie ("userpassword","");
        }
      }
}
$_SESSION['login']=$_POST['username'];
echo "<script type='text/javascript'> document.location ='component.php'; </script>";
} else{
$errormsg="Invalid Email or Password Please Try Again. ";
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="dist/css/ruang-admin.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="dist/css/adminlte.min.css"> -->
  <style>
body{
background-image: url(dist/img/aa.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;

margin-top: 10%;
margin-right: 49%;

    }
    .login-form{
background-color:#bfbfbf;
    }
  </style>
</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
    <div class="card shadow-sm my-7">
          <div class="card-body p-0">
            <div class="row">
       <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <br><br>
                    
<span class="brand-text font-weight-light"><img alt="logo" src="../assets/img/LOGO.png" style="width: 235px;height: 40px;"></span>
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>

                  <form class="user" method="Post" action="">
              <p style="padding-left: 4%; padding-top:2%; color:red;"><?php if($errormsg){echo htmlentities($errormsg);}  ?></p>

                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="User Name" required="true" name="username" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>" >
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Password" name="password" required="true" value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>">
                    </div>
<div><a href="forgot-password.php" style="margin-left: 45%;">Forgot-password ?</a></div>
                    <div class="form-group">
                      <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />
              <label for="remember">
                Remember Me
              </label>
            </div>
                    </div>
                    <div class="form-group">
                        <input type="submit"  class="btn btn-primary btn-block" value="Login" name="login" />
                    </div>
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
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>