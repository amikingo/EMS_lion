<?php
session_start(); // Start the session

include('../includes/dbconnection.php');
// include('../includes/session.php');
 error_reporting(0);

if (isset($_GET['editid'])) {
    $_SESSION['editId'] = $_GET['editid'];

    $query = mysqli_query($con, "SELECT * FROM tbladmin WHERE ID = '{$_SESSION['editId']}'");
    $rowi = mysqli_fetch_array($query);
} else {
    echo "<script type=\"text/javascript\">
    window.location = \"index.php\";
    </script>";
    exit; // Add an exit statement to stop further execution
}

if (isset($_POST['submit'])) {
    $alertStyle = "";
    $statusMsg = "";

    $adminName = $_POST['adminName'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $phoneNo = $_POST['phoneNo'];
    $emailAddress = $_POST['emailAddress'];
    $adminTypeId = $_POST['adminTypeId'];

    // Check if the username already exists in the database
    $stmt = $con->prepare("SELECT * FROM tbladmin WHERE ID != ? AND username = ?");
    $stmt->bind_param('ss', $_SESSION['editId'], $userName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // The username already exists
        $alertStyle = "danger";
        $statusMsg = "The User Name already exists.";
    } else {
        // Update the admin details in the database
        $stmt = $con->prepare("UPDATE tbladmin SET AdminName=?, UserName=?, Password=?, Email=?, MobileNumber=?, adminTypeId=? WHERE ID=?");
        $stmt->bind_param('sssssss', $adminName, $userName, $password, $emailAddress, $phoneNo, $adminTypeId, $_SESSION['editId']);
        $ret = $stmt->execute();

        if ($ret === TRUE) {
            // The admin details have been updated successfully
            $alertStyle = "success";
            $statusMsg = "User Detail has been updated.";
        } else {
            // An error occurred while updating the admin details
            $alertStyle = "danger";
            $statusMsg = "An Error Occurred!";
        }
    }
}
?>

<!-- Add CSS to display the error/success message -->
<style>
    .danger {
        background-color: #f8d7da;
        color: red;
        font-weight: bold;
    }

    .success {
        background-color: #d4edda;
        color: green;
        font-weight: bold;
    }
</style>



<!-- Add your HTML form and input fields here -->


<!-- Add CSS to display the error/success message -->
<style>
    .danger {
        background-color: #f8d7da;
        color: red;
        font-weight: bold;
    }

    .success {
        background-color: #d4edda;
        color: green;
        font-weight: bold;
    }
</style>

<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Users</title>
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

        <!-- <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Administrator</a></li>
                                    <li class="active">Edit Administrator</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div> -->
      <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Users</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Users</li>
            </ol>
          </div>
          </div>
      </div>
      <section class="content">
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h2 align="center">Edit Users Details</h2></strong>
                            </div>
                            <div class="card-body">
                            <strong> <div class="<?php echo $alertStyle;?>" role="alert"><?php echo $statusMsg;?></strong></div>
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <form method="Post" action="">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Admin Name</label>
                                                        <input id="" name="adminName" type="tel" class="form-control cc-exp" value="<?php echo $rowi['AdminName']?>" Required data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Full Name">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">User Name</label>
                                                        <input id="" name="userName" type="tel" class="form-control cc-cvc" value="<?php echo $rowi['UserName']?>" Required data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" placeholder="User Name">
                                                        </div>
                                                    </div>
                                                    <div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Mobile Number</label>
                                                        <input id="" name="phoneNo" type="text" class="form-control cc-exp" value="<?php echo $rowi['MobileNumber']?>" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Othername">
                                                    </div>
                                                </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="x_card_code" class="control-label mb-1">Email Address</label>
                                                    <input id="" name="emailAddress" type="email" class="form-control cc-cvc" value="<?php echo $rowi['Email']?>" Required data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" placeholder="Email Address">
                                                </div>
                                            </div>
                                        </div>

                                             <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Password</label>
                                                        <input id="" name="password" type="text" class="form-control cc-exp" value="<?php echo ''?>" Required data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Enter a new Password">
                                                    </div>
                                                </div>
                                            </div>


                                       <div class="row">
                                               <div class="col-6">
                                                <div class="form-group">
                                                    <label for="x_card_code" class="control-label mb-1">Admin Type</label>
                                                    <?php



// Check if the connection was successful
if ($con) {

    // Get the total number of admin types
    $count_query = mysqli_query($con, "SELECT COUNT(*) AS total_count FROM tbladmintype");
    $count_row = mysqli_fetch_assoc($count_query);
    $total_count = $count_row['total_count'];

    // Check if there are any admin types
    if ($total_count > 0) {

        // Get the list of admin types
        $ad_query = mysqli_query($con, "SELECT * FROM tbladmintype ORDER BY adminType ASC");

        // Initialize the select element
        echo '<select required name="adminTypeId" onchange="showValues(this.value)" class="custom-select form-control">';

        // Add the empty option
        // echo '<option value="" disabled>--Select Admin Type--</option>';

        // Loop through the admin types and add them as options
        while ($ad_row = mysqli_fetch_assoc($ad_query)) {

            // Get the admin type id and name
            $admin_type_id = $ad_row['Id'];
            $admin_type_name = $ad_row['adminType'];

            // Check if the admin type is selected
            if ($admin_type_id == $_GET['adminTypeId']) {
                $selected = 'selected';
            } else {
                $selected = '';
            }

            // Add the option to the select element
            echo '<option value="' . $admin_type_id . '" ' . $selected . '>' . $admin_type_name . '</option>';
        }

        // Close the select element
        echo '</select>';
    }
}



?>
                                                  
                                                </div>
                                                </div>
                                        
                                            </div>

                                                <button type="submit" name="submit" class="btn btn-primary">Update Admin</button>
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
                                <strong class="card-title"><h2 align="center">All Administrator</h2></strong>
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
        </div><!-- .animated -->
    </div><!-- .content -->

      </section>
    </div></div>

        <?php include 'includes/footer.php';?>


</div><!-- /#right-panel -->

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

      // Menu Trigger
      $('#menuToggle').on('click', function(event) {
            var windowWidth = $(window).width();   		 
            if (windowWidth<1010) { 
                $('body').removeClass('open'); 
                if (windowWidth<760){ 
                $('#left-panel').slideToggle(); 
                } else {
                $('#left-panel').toggleClass('open-menu');  
                } 
            } else {
                $('body').toggleClass('open');
                $('#left-panel').removeClass('open-menu');  
            } 
                
            }); 

      
  </script>

</body>
</html>
