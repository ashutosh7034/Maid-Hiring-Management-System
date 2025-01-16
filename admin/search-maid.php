<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['mhmsaid']==0)) {
  header('location:logout.php');
  } else{

// Code for deletion
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql="delete from tblmaid where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'manage-maid.php'</script>";     


}

  ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      
      <title>Maid Hiring Management System || Search Employee</title>
   
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
                              <h2>Search Maid</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                     
                      
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Search Maid</h2>
                                 </div>
                              </div>
                              
                              <div class="table_section padding_infor_info">
                 <br>
               <form id="basic-form" method="post">
                                <div class="form-group">
                                   
                                    <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Enter Maid ID or Name"></div>
                                
                              
                                <button type="submit" class="btn btn-primary" name="search" id="submit">Search</button>
                            </form>
                                 <div class="table-responsive-sm">
                                    <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
                                    <table class="table table-bordered">
                                       <thead>
                                           <tr>
                                             <th>S.No</th>
                                             <th>Category Name</th>
                                             <th>Name</th>
                                             <th>Email</th>
                                             <th>Contact Number</th>
                                             <th>Date of Registration</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php
$sql="SELECT tblcategory.ID as cid, tblcategory.CategoryName,tblmaid.ID as mid,tblmaid.CatID,tblmaid.MaidId,tblmaid.Name,tblmaid.Email,tblmaid.ContactNumber,tblmaid.RegDate from tblmaid join tblcategory on tblcategory.ID=tblmaid.CatID where tblmaid.MaidId like '$sdata%' || tblmaid.Name like '$sdata%'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?> 
                                         <tr>
                                              
                                             <td><?php echo htmlentities($cnt);?></td>
                                             <td><?php  echo htmlentities($row->CategoryName);?></td>
                                             <td><?php  echo htmlentities($row->Name);?></td>
                                             <td><?php  echo htmlentities($row->Email);?></td>
                                             <td><?php  echo htmlentities($row->ContactNumber);?></td>
                                             <td><?php  echo htmlentities($row->RegDate);?></td>
                                             <td><a href="edit-maid.php?editid=<?php echo htmlentities ($row->mid);?>"><i class="btn btn-success" aria-hidden="true">Edit</i></a> <a href="manage-maid.php?delid=<?php echo ($row->mid);?>" onclick="return confirm('Do you really want to Delete ?');"><i class="btn btn-danger"> Delete</i></a></td>
                                          </tr>
                                          <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
  <?php } }?>

                                         
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