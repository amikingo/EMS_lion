
<?php

    include('../includes/dbconnection.php');
    // include('../includes/session.php');

  ?>

<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Employees</title>
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

</head>

    <!-- Left Panel -->
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
            <h1 class="h3 mb-0 text-gray-800">View  All Employees</h1>
            <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">View  All Employees</li>
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
                          
                           
                        </div> <!-- .card -->
                    </div><!--/.col-->
                </div>
            </div>
               <div class="row">
 
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            <strong class="card-title"><h2 align="center">All Guards</h2></strong>
                            </div>
                            <div class="table-responsive p-3">
                                <?php 
  $GuardAssign = $_POST['GuardAssign'];
  $guard_names = explode(',', $GuardAssign);
?>
<input type="hidden" name="GuardAssign" value="<?php echo $GuardAssign;?>">

<table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
  <thead>
    <tr>
      <th>S.No</th>
      <th>Picture</th>
      <th>Name</th>
      <th>Gender</th>
      <th>Address</th>
      <th>ID</th>
      <th>Contact Number</th>                    
    </tr>
  </thead>
  <tbody>
    <?php
      $cnt = 1;
      $placeholders = implode(',', array_fill(0, count($guard_names), '?'));
      $sql = "SELECT * FROM tblguard WHERE ID IN ($placeholders)";
      $query = $dbh->prepare($sql);
      $query->execute($guard_names);
      $results = $query->fetchAll(PDO::FETCH_OBJ);
      if ($query->rowCount() > 0) {
        foreach ($results as $row) {
    ?>
    <tr>
      <td><?php echo htmlentities($cnt)?></td>
      <!-- profile Picture read -->
      <td><img src="images/<?php echo $row->Profilepic;?>" class="img circle" width="100"></td>
      <td><?php echo htmlentities($row->Name);?></td>
      <td><?php  if($row->gender =="0")
  {
        echo "Male";
      }
  elseif($row->gender =="1"){
    echo "Female";
  }
      
      

      ;?></td>
      <td><?php echo htmlentities($row->Address);?></td>
      <td><?php echo htmlentities($row->IDnumber);?></td>
      <td><?php echo htmlentities($row->MobileNumber);?></td>
    </tr>
    <?php
          $cnt++;
        }
      }
    ?>
  </tbody>
</table>
                            </div>
                        </div>
                    </div>
                </div>
<!-- end of datatable -->

               </div>
        </div>
        </div><!-- .animated -->
    </div><!-- .content -->

</section>
      </div>
    </div>
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

      
  </script>

</body>
</html>
