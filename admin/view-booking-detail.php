<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['mhmsaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {


$eid=$_GET['editid'];
    $bookingid=$_GET['bookingid'];
    $status=$_POST['status'];
   $remark=$_POST['remark'];
   $assignee=$_POST['assignee'];
  

$sql= "update tblmaidbooking set Status=:status,Remark=:remark,AssignTo=:assignee where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':remark',$remark,PDO::PARAM_STR);
$query->bindParam(':assignee',$assignee,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);

 $query->execute();

  echo '<script>alert("Remark has been updated")</script>';
 echo "<script>window.location.href ='all-request.php'</script>";
}

  ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      
      <title>Maid Hiring Management System || View Maid Booking Details</title>
   
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
                              <h2>View Maid Booking Details</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                     
                      
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>View Maid Booking Details</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    
                                    <?php
                  $eid=$_GET['editid'];

$sql="SELECT tblmaidbooking.BookingID,tblmaidbooking.CatID,tblmaidbooking.Name,tblmaidbooking.ContactNumber,tblmaidbooking.Email,tblmaidbooking.Address,tblmaidbooking.Gender,tblmaidbooking.WorkingShiftFrom,tblmaidbooking.WorkingShiftTo,tblmaidbooking.StartDate,tblmaidbooking.Notes,tblmaidbooking.BookingDate,tblmaidbooking.Remark,tblmaidbooking.Status,tblmaidbooking.AssignTo,tblmaidbooking.UpdationDate,tblcategory.ID,tblcategory.CategoryName from tblmaidbooking join tblcategory on tblmaidbooking.CatID=tblcategory.ID  where tblmaidbooking.ID=:eid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':eid', $eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{  
$assignto=$row->AssignTo;
             ?> 
                                   <table class="table table-bordered">
                                    <tr>
    <th colspan="6" style="color: orange;font-weight: bold;font-size: 20px;text-align: center;">Maid Booking Details </th>
  </tr>
  <tr>
    <th>Booking ID</th>
    <td><?php  echo $row->BookingID;?></td>
     <th>Service Required</th>
    <td><?php  echo $row->CategoryName;?></td>
  </tr>
  <tr>
    <th>Name</th>
    <td><?php  echo $row->Name;?></td>
     <th>Contact Number</th>
    <td><?php  echo $row->ContactNumber;?></td>
  </tr>
  <tr>
    <th>Email</th>
    <td><?php  echo $row->Email;?></td>
     <th>Address(to be hired)</th>
    <td><?php  echo $row->Address;?></td>
  </tr>
  <tr>
    <th>Gender Required</th>
    <td><?php  echo $row->Gender;?></td>
     <th>Working Shift From</th>
    <td><?php  echo $row->WorkingShiftFrom;?></td>
  </tr>
<tr>
    <th>Working Shift To</th>
    <td><?php  echo $row->WorkingShiftTo;?></td>
     <th>Work Start Date</th>
    <td><?php  echo $row->StartDate;?></td>
  </tr>
  <tr>
    <th>Notes(if any)</th>
    <td><?php  echo $row->Notes;?></td>
     <th>Booking Date</th>
    <td><?php  echo $row->BookingDate;?></td>
  </tr>
  <tr>
   
    <th>Booking Status</th>

    <td> <?php  $status=$row->Status;
    
if($row->Status=="Approved")
{
  echo "Your maid booking request has been approved";
}

if($row->Status=="Cancelled")
{
 echo "Your maid booking request has been cancelled";
}


if($row->Status=="")
{
  echo "Not Response Yet";
}


     ;?></td>
     <th >Admin Remark</th>
    <?php if($row->Status==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>

<?php } else { ?>                 
 <td><?php  echo htmlentities($row->Remark);?>
                  </td>
                  <?php } ?>

  </tr> 

  <?php $cnt=$cnt+1;}} ?>
</table>


<?php if($assignto!=''):?>
    <table class="table table-bordered">
<?php 
$stmt = $dbh -> prepare("SELECT * from tblmaid where MaidId='$assignto'");
$stmt->execute();
$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
foreach($resultss as $rows)
{  ?>
    <tr>
        <th colspan="4" style="color:blue; font-size:20px;">Maid Details</th>
    </tr>
<tr>
    <th>Maid Name</th>
    <td><?php echo $rows->Name;?></td>
    <th>Email Id</th>
    <td><?php echo $rows->Email;?></td>
</tr>

<tr>
    <th>Contact no.</th>
    <td><?php echo $rows->ContactNumber;?></td>
    <th>Gender</th>
    <td><?php echo $rows->Gender;?></td>
</tr>

<tr>
    <th>Exp.</th>
    <td><?php echo $rows->Experience;?></td>
    <th>DOB</th>
    <td><?php echo $rows->Dateofbirth;?></td>
</tr>


<tr>
    <th>Address</th>
    <td><?php echo $rows->Address;?></td>
    <th>Photo</th>
    <td><img src="images/<?php echo $rows->ProfilePic;?>" width="100" height="100"></td>
</tr>


<tr>
    <th>ID Proof</th>
    <td><img src="idproofimages/<?php echo $rows->IdProof;?>" width="100" height="100"></td>
</tr>
<?php } ?>
    </table>

 <?php endif?>   




<?php 

if ($status==""){
?> 
<p align="center"  style="padding-top: 20px">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  

<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                <form method="post" name="submit">

                                
                               
     <tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="Remark" rows="8" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr> 

 
  <tr>
    <th>Status :</th>
    <td>

   <select name="status" id="status" class="form-control wd-450" required="true" >
    <option value="">Select</option>
     <option value="Approved">Approved</option>
     <option value="Cancelled">Cancelled</option>
   </select></td>
  </tr>


   <tr id="assigntoo">
    <th>Assign to :</th>
    <td>
    <select name="assignee" id="assignee" placeholder="Assign To"  class="form-control wd-450">
      <option value="">Assign To</option>
      <?php 

$sql2 = "SELECT * from   tblmaid ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
    ?>  
   
<option value="<?php echo htmlentities($row->MaidId);?>"><?php echo htmlentities($row->MaidId);?>(<?php echo htmlentities($row->Name);?>)</option>
 <?php } ?>
    </select>

 </td>
  </tr>


</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Update</button>
  
  </form>


</div> 
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

<script type="text/javascript">

  //For report file
  $('#assigntoo').hide();
  $(document).ready(function(){
  $('#status').change(function(){
  if($('#status').val()=='Approved')
  {
  $('#assigntoo').show();
  jQuery("#assignee").prop('required',true);  
  }
  else{
  $('#assigntoo').hide();
    jQuery("#assignee").prop('required',false);  
  }
})}) 
</script>



   </body>
</html><?php } ?>