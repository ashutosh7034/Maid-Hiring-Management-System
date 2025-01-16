<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['mhmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      
      <title>Maid Hiring Management System||Dashboard</title>
      
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
      
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
          <?php include_once('includes/sidebar.php');?>
            <!-- end sidebar -->
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
                              <h2>Dashboard</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-file purple_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <?php 
$sql1 ="SELECT * from  tblcategory";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totcat=$query1->rowCount();
?>
                                    <p class="total_no"><?php echo htmlentities($totcat);?></p>
                                    <p class="head_couter">Total Category<br /><br />
                                       <a href="manage-category.php" class="btn btn-primary btn-sm">View Details</a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-users yellow_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <?php 
                        $sql2 ="SELECT * from  tblmaid";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$totmaid=$query2->rowCount();
?>
                                   <p class="total_no"><?php echo htmlentities($totmaid);?></p>
                                    <p class="head_couter">Listed Maids<br /><br />
                                       <a href="manage-maid.php" class="btn btn-primary btn-sm">View Details</a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-files-o yellow_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                     <?php 
                                  
$sql3 ="SELECT * from  tblmaidbooking where Status='' || Status is null";
$query3 = $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$newreq=$query3->rowCount();
?>
                                   <p class="total_no"><?php echo htmlentities($newreq);?></p>
                                    <p class="head_couter">New Request<br /><br />

                                       <a href="new-request.php" class="btn btn-primary btn-sm">View Details</a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-files-o green_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <?php 
                        $sql4 ="SELECT * from  tblmaidbooking where Status='Approved'";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$assreq=$query4->rowCount();
?>
                                   <p class="total_no"><?php echo htmlentities($assreq);?></p>
                                    <p class="head_couter">Assign Request<br /><br />
                                       <a href="assign-request.php" class="btn btn-primary btn-sm">View Detail</a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                   
                   <div class="row column1">
                        
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-files-o red_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                     <?php 
                                  
                        $sql3 ="SELECT * from  tblmaidbooking where Status='Cancelled'";
$query3 = $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$canreq=$query3->rowCount();
?>
                                   <p class="total_no"><?php echo htmlentities($canreq);?></p>
                                    <p class="head_couter">Canceled / Rejected Requests<br /><br />

                                       <a href="cancel-request.php" class="btn btn-primary btn-sm">View Details</a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-files-o purple_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <?php 
                        $sql4 ="SELECT * from  tblmaidbooking ";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$totreq=$query4->rowCount();
?>
                                   <p class="total_no"><?php echo htmlentities($totreq);?></p>
                                    <p class="head_couter">Total Request<br /><br /><br />
                                       <a href="all-request.php" class="btn btn-primary btn-sm">View Details</a></p>
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
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <script src="js/chart_custom_style1.js"></script>
   </body>
</html><?php } ?>