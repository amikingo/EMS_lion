 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link" style="font-weight:bold; font-size:22px;">
    

      <span class="brand-text font-weight-light">OSGHS | Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/download.png" class="img-circle elevation-2" alt="User Image">
        </div>
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
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               </p>
            </a>
        
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Secuirty Gauard
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-security-guard.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Security Gaurd</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage-security-guard.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Security Gaurd</p>
                </a>
              </li>
             </ul>
          </li>
           
       
<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Hiring Booking Request
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="all-booking-request.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Booking Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="new-booking-request.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Booking</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="accepted-booking-request.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Accepted Booking</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="rejected-booking-request.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rejected Booking</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="between-dates-report.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Hiring B/W Report
               </p>
            </a>
        
          </li>
      <li class="nav-item">
            <a href="search.php" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                search request
               </p>
            </a>
        
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>