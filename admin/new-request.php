<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['mhmsaid']==0)) {
  header('location:logout.php');
  } else{


  ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      
      <title>Maid Hiring Management System || New Request</title>
   
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="js/semantic.min.css" />
      <!-- fancy box js -->
      <link rel="stylesheet" href="css/jquery.fancybox.css" />
      
   </head>
   <body class="inner_page tables_page">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
          <?php include_once('includes/sidebar.php');?>
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
              <?php include_once('includes/header.php');?>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>New Request</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                     
                      
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>New Request</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table table-bordered">
                                       <thead>
                                          <tr>
                                             <tr>
                                        <th class="text-center"></th>
                                        <th>Booking ID</th>
                                        <th class="d-none d-sm-table-cell">Name</th>
                                        <th class="d-none d-sm-table-cell">Mobile Number</th>
                                        <th class="d-none d-sm-table-cell">Email</th>
                                        <th class="d-none d-sm-table-cell">Booking Date</th>
                                        <th class="d-none d-sm-table-cell">Status</th>
                                        <th class="d-none d-sm-table-cell">Assign To</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Action</th>
                                       
                                       </thead>
                                       <tbody>
                                          <?php
$sql="SELECT * from tblmaidbooking where Status is null";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                          <tr>
                                        <td class="text-center"><?php echo htmlentities($cnt);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->BookingID);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->Name);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->ContactNumber);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->Email);?></td>
                                        <td class="font-w600">
                                            <span class="badge badge-primary"><?php  echo htmlentities($row->BookingDate);?></span>
                                        </td>
                                        <?php if($row->Status==""){ ?>

                     <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="badge badge-primary"><?php  echo htmlentities($row->Status);?></span>
                                        </td>
<?php } ?> 
 <?php if($row->AssignTo==""){ ?>

                     <td class="font-w600"><?php echo "Not Assign Yet"; ?></td>
<?php } else { ?>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="badge badge-primary"><?php  echo htmlentities($row->AssignTo);?></span>
                                        </td>
<?php } ?> 
                                         <td class="d-none d-sm-table-cell"><a href="view-booking-detail.php?editid=<?php echo htmlentities ($row->ID);?>&&bookingid=<?php echo htmlentities ($row->BookingID);?>" class="btn btn-primary btn-sm">View Details</a></td>
                                    </tr><?php $cnt=$cnt+1;}} ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- footer -->
                 <?php include_once('includes/footer.php');?>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
         <!-- model popup -->
       
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- fancy box js -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
   </body>
</html><?php } ?>