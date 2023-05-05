<?php //require_once('includes/session.php');
      require_once('includes/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>CAAZ | SECURITY - DASHBOARD</title>

         <!-- Bootstrap CSS CDN -->
       <link rel="stylesheet" href="css/bootstrap.min.css"/>
           <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
        <!-- Our Custom CSS -->
        <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="css/nice-select.css"/>
    <link rel="stylesheet" href="css/slicknav.min.css"/>
    <!--<link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"> -->
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/awesome/font-awesome.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/header.css"/>
    </head>
    <body>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a class="navbar-brand" href="index.php"></a>
   
      <img alt="logo" src="../assets/img/LOGO.png" style="width: 800px;height: 50px;">
      

      <nav class="nav-menu d-none d-lg-block"style="margin-left: 400px;">
        <ul>
          <li ><a href="Home.php">Home</a></li>
          <li ><a href="About us.php">About Us</a></li>
          <li ><a href="contact us.php">Contact Us</a></li>
          <li class="drop-down">
            <a href="">Request & complain </a> 
            <ul >
              <li ><a href="index.php">Request Employee</a></li>
              <li><a href="search-request.php">Check Request</a></li>
              <li class="active"><a href="invest.php" >Complain</a></li>
            </ul>
          </li>
          <li class="drop-down">
            <a href="">My Account </a> 
            <ul >
              <li><a href="login/profile.php">Profile</a></li>
              <li><a href="login/change-password.php">Change Password</a></li>
              <li><a href="login/logout.php" >Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <br><br>

       <div class="wrapper">
            <!-- Sidebar Holder -->
            

            <!-- Page Content Holder -->
            <div id="content">
             
                <section class="contact-page-section spad overflow-hidden">
        <div class="container">
            
            <div class="row">
         
                <div class="col-lg-8">
                    <form class="singup-form contact-form" method="post">
                
                <div class="line"></div>

                            <?php
                            if(isset($mysqli,$_POST['submit'])){
                            $employee_id = mysqli_real_escape_string($mysqli,$_POST['employee_id']);
                            $severity = mysqli_real_escape_string($mysqli,$_POST['severity']);
                            $notes = mysqli_real_escape_string($mysqli,$_POST['notes']);
                            $as = rand(1000,9999);     
                            $case_num = date("YmdHis").'.'.$as;
      
                  
                            $sql = "INSERT INTO cases(employee_id,severity,case_num,notes)VALUES('$employee_id','$severity','$case_num','$notes')";
                            $results = mysqli_query($mysqli,$sql);

                        if($results==1){
                              ?>
                        <div class="alert alert-success strover animated bounce" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Successfully! </strong><?php echo'Case has successfully added';?></div>
                        <?php

                          }else{
                                ?>
                        <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Danger! </strong><?php echo'OOPS something went wrong';?></div>
            
                        <?php    
                          }      
                
            }
                
                ?>
        <div class="panel panel-default sammacmedia">
           
        <div class="panel-body">
            <form method="post" action="invest.php">
        <div class="row form-group">
          <div class="col-lg-6">
            <label>Select Employee</label>
             <?php
                       
                    $query1 = "SELECT * FROM `employees`";
                    $result1 = mysqli_query($mysqli, $query1);
                    ?>
                    <select class="form-control" name="employee_id">
                    <?php while($row1 = mysqli_fetch_array($result1)):;?>
                        <option value="<?php echo $row1['employee_id'];?>"><?php echo ucwords($row1['name'].' '.$row1['surname']);?></option>
                        <?php endwhile;?>
                       
                       </select>
            </div>  
            <div class="col-lg-6">
            <label>Case Severity</label>
                <select class="form-control" name="severity">
                <option>Normal</option>
                <option>Critical</option>  
                <option>Danger</option>    
                </select>
            </div>
           </div>
                <div class="row form-group">
          <div class="col-lg-12">
              <textarea class="form-control" id="editor" name="notes"></textarea>
            </div>  
             
           </div>
                
                <div class="row">
                <div class="col-md-6">
                  <button type="submit" name="submit" class="btn btn-suc btn-block"><span class="fa fa-plus"></span> Process</button>  
                </div>
                     <div class="col-md-6">
                  <button type="reset" class="btn btn-dan btn-block"><span class="fa fa-times"></span> Cancel</button>  
                </div>
                </div>
            </form></div></div></form></div>

            </div>
                </div>
                <div class="line"></div>
                <br><br><br>
        <footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

    <div class="col-lg-9 col-md-6 footer-contact">
        <h3>Lion Security Services</h3>
        <p>
          Ethiopia Addis Ababa,<br>
          Mekanisa,<br><br>
          <strong>Phone:</strong> +251 116 683333 , +251 930 519202<br>
          <strong>Email:</strong> www.lionsecurityservices.com<br>
        </p>
      </div>
      <div class="col-lg-2 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="Home.php">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="About us.php" style="color:black !important;">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="contact us.php" style="color:black !important;">Contact us</a></li>
        </ul>
      </div>
    
<div class="container d-md-flex py-4">

  <div class="mr-md-auto text-center text-md-left">
    <div class="copyright">
      &copy; <strong><span>Lion Security Services PLC</span></strong> - <?php echo date('Y');?> - Developed By REHA TECH
    </div>
    <div class="credits">
    </div>
  </div>
  <div class="social-links text-center text-md-right pt-3 pt-md-0">
    <a href="#" class="twitter"><i  style="color:#fff;" class="bx bxl-twitter"></i></a>
    <a href="#" class="facebook"><i style="color:#fff;" class="bx bxl-facebook"></i></a>
    <a href="#" class="instagram"><i style="color:#fff;" class="bx bxl-instagram"></i></a>
    <a href="#" class="google-plus"><i style="color:#fff;" class="bx bxl-skype"></i></a>
    <a href="#" class="linkedin"><i style="color:#fff;" class="bx bxl-linkedin"></i></a>
  </div>
</div>
</footer>
        <!-- jQuery CDN -->
         <script src="assets/js/jquery-1.10.2.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="assets/js/bootstrap.min.js"></script>
         <script src="vendors/ckeditor/sammacmedia.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
             $('sams').on('click', function(){
                 $('makota').addClass('animated tada');
             });
         </script>
         <script type="text/javascript">

        $(document).ready(function () {
 
            window.setTimeout(function() {
        $("#sams1").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
        });
            }, 5000);
 
        });
              ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                console.log( editor );
		} )
                .catch( error => {
                console.error( error );
		} );
    </script>

    </body>

</form></div></div></section>
</html>
