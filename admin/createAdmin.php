
<?php

    include('../includes/dbconnection.php');
    // include('../includes/session.php');
error_reporting(0);

if(isset($_POST['submit'])){

//  $alertStyle ="success";
// $statusMsg="good job";

  $adminName=$_POST['adminName'];
  $userName=$_POST['userName'];
  $phoneNo=$_POST['phoneNo'];
  $emailAddress=$_POST['email'];

  $adminTypeId=$_POST['adminTypeId'];
  //$roleId=2;
  $dateCreated = date("Y-m-d H:i:s");

    $sampPass = "123456789";
    $sampPass_2 = md5($sampPass);



    $queryi=mysqli_query($con,"select * from tbladmin where adminTypeId = '$adminTypeId'");
    $rets=mysqli_fetch_array($queryi);



    $query=mysqli_query($con,"insert into tbladmin(AdminName,UserName,MobileNumber,Email,Password,adminTypeId,AdminRegdate) value('$adminName','$userName','$phoneNo','$emailAddress','$sampPass_2','$adminTypeId','$dateCreated')");
    
    if ($rets) {
        
        // Set the success message
        $alertStyle = "success";
        $statusMsg = "Your account has been created successfully.";
        // Add CSS to the success message
        echo "<style>
         .success {
          background-color: #d4edda;
           color: green;
           font-weight: bold;
         }
        </style>";
        // echo "<div class='success'>$statusMsg</div>";
      } else {
        // Set the error message
        $alertStyle = "danger";
        $statusMsg = "There was an error creating your account. Please try again later.";
        // Add CSS to the error message
        echo "<style>
         .danger {
    background-color: #f8d7da;
           color: red;
           font-weight: bold;
         }
        </style>";
    // echo "<div class='danger'>$statusMsg</div>";
      }
    
  }

  ?>

<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Users</title>
  <link href="dist/img/fav.png" rel="icon">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->


  
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="css/ruang-admin.min.css" rel="stylesheet"> -->


<script>
function showValues(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxCall.php?fid="+str,true);
        xmlhttp.send();
    }
}

function showRole(str) {
    if (str == "") {
        document.getElementById("txtHintt").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHintt").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxCallRole.php?id="+str,true);
        xmlhttp.send();
    }
}
</script>



</head>
<body class="hold-transition sidebar-mini" >

  <div class="wrapper" >
    <?php include "includes/sidebar.php";?> 
    <!-- Sidebar -->
    <?php include "includes/header.php";?>
       <!-- <div > <h5>Teacher</h5></div> -->
       
    <!-- Sidebar -->
    <div class="content-wrapper" > 
      <!-- class="d-flex flex-column" -->
      <div id="content">
        <!-- TopBar -->
      
      
            <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add User</h1>
            <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="viewAdmin.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add User</li>
            </ol>
          </div>
          </div>
        </div>
<section class="content">
        <div class="content-fluid">
            
            
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h2 align="center">Add New User</h2></strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    <strong> <div class="<?php echo $alertStyle;?>" role="alert"><?php echo $statusMsg;?></strong></div>
                                       <form role="form" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Admin Name</label>
                                                        <input id="" name="adminName" type="tel" class="form-control cc-exp" value="" Required data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Full Name">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">User Name</label>
                                                        <input id="" name="userName" type="tel" class="form-control cc-cvc" value="" Required data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" placeholder="User Name">
                                                        </div>
                                                    </div>
                                                    <div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Mobile Number</label>
                                                        <input id="" name="phoneNo" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Mobile Number">
                                                    </div>
                                                </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="x_card_code" class="control-label mb-1">Email Address</label>
                                                    <input id="" name="email" type="email" class="form-control cc-cvc" value="" Required data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" placeholder="Email Address">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            

                                         <div class="row">
                                               <div class="col-12">
                                                <div class="form-group">
                                                    <label for="x_card_code" class="control-label mb-1">Admin Type</label>
<?php 
    $ad_query = mysqli_query($con, "SELECT * FROM tbladmintype ORDER BY adminType ASC"); 
    $count_query = mysqli_query($con, "SELECT adminTypeId FROM tbladmin"); 
    $count = mysqli_num_rows($count_query);
    
    if ($count > 0) {                       
        echo '<select required name="adminTypeId" onchange="showValues(this.value)" class="custom-select form-control">';
        echo '<option value="">--Select Admin Type--</option>';
        
        while ($ad_row = mysqli_fetch_array($ad_query)) {
            $admin_type_id = $ad_row['Id'];
            $selected = "";
            
            while ($count_row = mysqli_fetch_array($count_query)) {
                $admin_type_id_db = $count_row['adminTypeId'];
                if ($admin_type_id == $admin_type_id_db) {
                    $selected = "selected";
                    break;
                }
            }
            
            echo '<option value="'.$admin_type_id.'" '.$selected.'>'.$ad_row['adminType'].'</option>';
            
            // Reset the $count_query pointer to the beginning

            mysqli_data_seek($count_query, 0);
        }
        
        echo '</select>'; 
    }
?>
</div>
                                          
                                                     </div>
                                                </div>
                                            </div>
                                            <p><small><i>Note: By default Users password is set to "<b>123456789</b>"</i></small></p>
                                                <button type="submit" name="submit" class="btn btn-success">Add Admin</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div><!--/.col-->
               
                

                <br><br>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h2 align="center">All Users</h2></strong>
                            </div>
                            <div class="table-responsive p-3">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Admin Name</th>
                                            <th>User Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email Address</th>
                                            <th>Admin Type ID</th>
                                            <th>Date Added</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                            <?php
        $ret=mysqli_query($con,"SELECT  * from tbladmin");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {
                            ?>
                <tr>
                <td><?php echo $cnt;?></td>
                <td><?php  echo $row['AdminName'];?></td>
                <td><?php  echo $row['UserName'];?></td>
                <td><?php  echo $row['MobileNumber'];?></td>
                <td><?php  echo $row['Email'];?></td>
                <td><?php if($row['adminTypeId'] == 1){
                                echo 'Adminstrator';

                        }else if($row['adminTypeId'] == 2){
                                echo 'HR';

                        }else if($row['adminTypeId'] == 3){
                                echo 'Store Keeper';
                        }else if($row['adminTypeId'] == 4){
                                echo 'Trainer';
                        }
                 ?></td>
                <td><?php  echo $row['AdminRegdate'];?></td>
                 <td><a href="editAdmin.php?editid=<?php echo $row['ID'];?>" title="View Admin"><i class="fa fa-edit fa-1x"></i></a></td> 
                <td><a onclick="return confirm('Are you sure you want to delete?')" href="deleteAdmin.php?delid=<?php echo $row['ID'];?>" title="Delete Admin"><i class="fa fa-trash fa-1x"></i></a></td>
                </tr>
                <?php 
               $cnt=$cnt+1;
                }?>
                                                                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!-- end of datatable -->
    </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
  </div>

</section>
    </div>
   

        <?php include 'includes/footer.php';?>
    </div>
  </div>

<!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="../assets/js/main.js"></script>

<script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/init/datatables-init.js"></script>

    <script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>

</body>
</html>
