 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light-primary elevation-8">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link" style="font-weight:bold; font-size:22px;">
    

    <span class="brand-text font-weight-light"><img alt="logo" src="../assets/img/LOGO.png" style="width: 235px;height: 40px;"></span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
<?php
$aid=$_SESSION['osghsaid'];
$sql="SELECT AdminName from  tbladmin where ID=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
          <a href="admin-profile.php" class="d-block">Welcome : <?php  echo $row->AdminName;?></a>
          <?php $cnt=$cnt+1;}} ?>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               </p>
            </a>
        
          </li>
          
<?php
// $sql=mysqli_query(select * 
// from uniformTable
// where expireDate < DATEADD(month, 6, GETDATE()));
$sql="SELECT * from tblguard where   isTrainer= '1' ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$new_uniform_row_count = $query->rowCount();

?>
          
 
<style type="text/css">
.notify-badge {
    height: 5;
    background: green;
    color: white;
    border-radius: 100px;
    /* padding: 5px; */
    width: 20px;
    display: inline-block;
    position: relative;
    text-align: center;
    height: 20px;
    vertical-align: middle;
    font-size: 13px;
}
</style>          
       
<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Trainee Lists
                <?php if($new_uniform_row_count) {  echo "<span class='notify-badge'>" . $new_uniform_row_count . "</span>"; } ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="trainerLists.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Trainee Lists</p>
                  <?php if($new_uniform_row_count) {  echo "<span class='notify-badge'>" . $new_uniform_row_count . "</span>"; } ?>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>
                Admin Setting
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin-profile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile Update</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="change-password.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
             </ul>
          </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>