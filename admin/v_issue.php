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
         <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="is/assets/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="is/assets/css/style.css">
        <link rel="stylesheet" href="is/assets/awesome/font-awesome.css">
        <link rel="stylesheet" href="is/assets/css/animate.css">
         <link rel="stylesheet" href="is/vendors/datatables/datatables.min.css">
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            
            <!-- Page Content Holder -->
            <div id="content">
             
            
         
                
                

                <div class="line"></div>
                                           
		<div class="panel panel-default sammacmedia">
            <div class="panel-heading">CAAZ SMS All Issues</div>
        <div  class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Case Number</th>
                    <th>Employee Id</th>
                    <th>Issues</th>
                    <th>Severity</th>
                    <th>Action</th> 

                    
                    
                    </tr>
                </thead>
                    <?php
                                   $a=1;
                    $query=mysqli_query($mysqli,"select *from `cases` ");
                     while($row=mysqli_fetch_array($query))
                        {
                          
                          ?>
                          <tr>
                              <td><?php echo $a;?></td> 
                            <td><?php echo $row['case_num'];?></td>
                            <td><?php echo $row['employee_id'];?></td>
                            <td><?php echo $row['notes'];?></td>  
                            <td>
                                
                                <?php
                            if($row['severity']=="Normal"){
                            echo "<p  class='btn btn-success'>Normal</p>";   
                            }elseif($row['severity']=="Critical"){
                            echo "<p  class='btn btn-warning'>Critical</p>";
                            }else{
                            echo "<p  class='btn btn-danger'>Danger</p>";
                            }     
                            ?>  
                              
                              </td>
                            <td>
                  <a href="v_issue.php?edited=1&idx=<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger"><span class="fa fa-times"></span> Remove</a> || <a href="#samstrover<?php echo $row['employee_id']; ?>" data-toggle="modal" class="btn btn-warning"><span class="fa fa-pencil"></span> View</a> 
                              </td>
                          </tr>
                          <?php
                         require('userInfos.php');
                            $a++;
                      }
                       

          
                      if (isset($_GET['idx']) && is_numeric($_GET['idx']))
                      {
                          $id = $_GET['idx'];
                          if ($stmt = $mysqli->prepare("DELETE FROM cases WHERE id = ? LIMIT 1"))
                          {
                              $stmt->bind_param("i",$id);
                              $stmt->execute();
                              $stmt->close();
                               ?>
                    <div class="alert alert-success strover" id="sams1">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong> Successfully! </strong><?php echo'Record Successfully deleted please refresh this page';?></div>
               
                    <?php
                          }
                          else
                          {
                    ?>
                    <div class="alert alert-danger samuel" id="sams1">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong> Danger! </strong><?php echo'OOPS please try again something went wrong';?></div>
                    <?php
                          }
                          $mysqli->close();

                      }
                else

                {

                }
                      ?>
              
               
                </table>
            </div>
                </div>
                <div class="line"></div>
                <footer>
            <p class="text-center">
            CAAZ Security Matters System &copy;<?php echo date("Y ");?>Copyright. All Rights Reserved, Powered By SM Systems    
            </p>
            </footer>
            </div>
            
        </div>





         <script src="is/assets/js/jquery-1.10.2.js"></script>
         <script src="isassets/js/bootstrap.min.js"></script>
         <script src="is/vendors/datatables/datatables.min.js"></script>
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
    </script>
         <script type="text/javascript">
             
             $(document).ready( function () {
                 $('#myTable').DataTable();
             } );
         </script>
    </body>
</html>
