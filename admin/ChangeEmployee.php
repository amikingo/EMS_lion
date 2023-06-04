<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'includes/dbconnection.php';

$editId = isset($_GET['editid']) ? $_GET['editid'] : '';

if (isset($_POST['remove'])) {
  $removeId = $_POST['remove'];

  // Remove the guard from the tblhiring table
  $sql = "UPDATE tblhiring SET GuardAssign = REPLACE(CONCAT(',' ,GuardAssign, ','), ',$removeId,', ',') WHERE GuardAssign LIKE '%,$removeId,%' OR GuardAssign LIKE '$removeId,%' OR GuardAssign LIKE '%,$removeId'";
  $query = $dbh->prepare($sql);
  $query->execute();

  // Update the tblguard table to mark the guard as unassigned
  $sqli = "UPDATE tblguard SET isAssigned = 0 WHERE ID = :removeId";
  $query = $dbh->prepare($sqli);
  $query->bindParam(':removeId', $removeId, PDO::PARAM_INT);
  $query->execute();

  // Retrieve an unassigned guard from tblguard
  $sql = "SELECT * FROM tblguard WHERE isAssigned = 0 AND isTrainer = 0 LIMIT 1";
  $query = $dbh->prepare($sql);
  $query->execute();
  $guard = $query->fetch(PDO::FETCH_OBJ);

  if ($guard) {
    $guardId = $guard->ID;

    // Update the guard as assigned
    $sql = "UPDATE tblguard SET isAssigned = 1 WHERE ID = :guardId";
    $query = $dbh->prepare($sql);
    $query->bindParam(':guardId', $guardId, PDO::PARAM_INT);
    $query->execute();

    // Update the tblhiring table to include the new guard in GuardAssign column
    $sql = "UPDATE tblhiring SET GuardAssign = CONCAT(GuardAssign, ',', :guardId) WHERE GuardAssign IS NOT NULL";
    $query = $dbh->prepare($sql);
    $query->bindParam(':guardId', $guardId, PDO::PARAM_INT);
    $query->execute();
  }

  // Redirect to the same page to reflect the changes
  header("Location: viewChangeEmployee.php?editid=$editId");
  exit;
}

?>

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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Request</h3>
            </div>
            <div class="card-body">
              <form method="POST" action="">
                <input type="hidden" name="editid" value="<?php echo $editId; ?>">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>ID Number</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>ID</th>
                      <th>Contact Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM tblguard WHERE ID = :editId";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':editId', $editId, PDO::PARAM_INT);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($results) {
                      foreach ($results as $row) {
                        ?>
                        <tr>
                          <td><?php echo $cnt ?></td>
                          <td><?php echo $row->ID; ?></td>
                          <td><img src="..images/<?php echo $row->Profilepic; ?>" class="img-circle" width="100"></td>
                          <td><?php echo $row->Name; ?></td>
                          <td><?php echo $row->Address; ?></td>
                          <td><?php echo $row->IDnumber; ?></td>
                          <td><?php echo $row->MobileNumber; ?></td>
                          <td>
                            <button type="submit" name="remove" value="<?php echo $row->ID; ?>">Remove</button>
                          </td>
                        </tr>
                        <?php
                        $cnt++;
                      }
                    } else {
                      echo '<tr><td colspan="8">No data available</td></tr>';
                    }
                    ?>
                  </tbody>
                </table>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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
