<!-- <?php
//include('includes/dbconnection.php');
?> -->
<!DOCTYPE html>
<html>
<head>
  <title>Lion Security Services | View More</title>
  <link href="dist/img/fav.png" rel="icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include_once('includes/header.php');?>
  <?php include_once('includes/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View More About Trainee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="trainerLists.php">Home</a></li>
              <li class="breadcrumb-item active">View More About Trainee</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-12">
          <!-- left column -->
         
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Request</h3>
            </div>
            <!-- general form elements -->
            <div class="card-body">
              

              <!-- Split The Guards In terms of Comma ',' And Display it in the Table -->
                <?php
  $Customer = $_POST['Customer'];
  $guards = $_POST['Guards'];
  $guard_names = explode('<DATA>', $guards);
?>
<input type="hidden" name="Customer" value="<?php echo $Customer;?>">
<input type="hidden" name="Guards" value="<?php echo $guards;?>">
<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>S.No</th>
      <th>Photo</th>
      <th>Name</th>
      <th>Address</th>
      <th>ID</th>
      <th>Contact Number</th>
      <th>Remove Guard</th>                    
    </tr>
  </thead>
  <tbody>
    <?php
      $cnt = 1;
      // $placeholders = implode(',', array_fill(0, count($guard_names), '?'));
      $sql = "SELECT * FROM tblguard WHERE ID = $Customer ";
      $query = $dbh->prepare($sql);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);
      if ($query->rowCount() > 0) {
        foreach ($results as $row) {
    ?>
    <tr>   
      <td><?php echo htmlentities($cnt)?></td>
      <td><img src="../admin/images/<?php echo $row->Profilepic;?>" class="img circle" width="100"></td>
      <td><?php echo htmlentities($row->Name);?></td>
      <td><?php echo htmlentities($row->Address);?></td>
      <td><?php echo htmlentities($row->ID);?></td>
      <td><?php echo htmlentities($row->MobileNumber);?></td>
      <td><a href="ChangeEmployee.php?editid=<?php echo urlencode($row->ID); ?>" title="View"> <button type="button" class="btn btn-primary">change</button></a></td>

    </tr>
    
    <?php
          $cnt++;
        }
      }
    ?>
  </tbody>
</table>


              </form>
            </div>
            </div>
          </div>
          </div>
           
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php include_once('includes/footer.php');?>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
</body>
</html>
