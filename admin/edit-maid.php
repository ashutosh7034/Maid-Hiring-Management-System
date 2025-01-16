<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['mhmsaid']==0)) {
  header('location:picut.php');
  } else{
    if(isset($_POST['submit']))
  {

 $catid=$_POST['catid'];
 $maidid=$_POST['maidid'];
 $name=$_POST['name'];
 $email=$_POST['email'];
 $contno=$_POST['contno'];
 $exp=$_POST['experience'];
 $dob=$_POST['dob'];
 $add=$_POST['add'];
 $desc=$_POST['desc'];
 $gender=$_POST['gender'];
$eid=$_GET['editid'];

$sql="update tblmaid set CatID=:catid,MaidId=:maidid,Name=:name,Email=:email,ContactNumber=:contno,Experience=:exp,Dateofbirth=:dob,Address=:add,Description=:desc, Gender=:gender where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':catid',$catid,PDO::PARAM_STR);
$query->bindParam(':maidid',$maidid,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':contno',$contno,PDO::PARAM_STR);
$query->bindParam(':exp',$exp,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':add',$add,PDO::PARAM_STR);
$query->bindParam(':desc',$desc,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
 echo '<script>alert("Maid detail has been updated")</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Maid Hirirng Management System || Update Maid Details</title>
    
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
     
   </head>
   <body class="inner_page general_elements">
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
                              <h2>Update Maid Details</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column8 graph">
                      
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Update Maid Details</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="full">
                                          <div class="padding_infor_info">
                                             <div class="alert alert-primary" role="alert">
                                                <form method="post" enctype="multipart/form-data">
                                                   <?php
$eid=$_GET['editid'];
$sql="SELECT tblcategory.ID as did, tblcategory.CategoryName,tblmaid.ID as eid,tblmaid.CatID,tblmaid.MaidId,tblmaid.Name,tblmaid.Email,tblmaid.Gender,tblmaid.ContactNumber,tblmaid.Experience,tblmaid.Dateofbirth,tblmaid.Address,tblmaid.Description,tblmaid.ProfilePic,tblmaid.IdProof,tblmaid.RegDate from tblmaid join tblcategory on tblcategory.ID=tblmaid.CatID where tblmaid.ID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                        <fieldset>
                            
                           <div class="field">
                              <label class="label_field">Category Name</label>
                              <select type="text" name="catid" value="" class="form-control" required='true'>
                                 <option value="<?php echo $row->did;?>"><?php echo $row->CategoryName;?></option>
                                  <?php 

$sql2 = "SELECT * from   tblcategory ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row2)
{          
    ?>  
   
<option value="<?php echo htmlentities($row2->ID);?>"><?php echo htmlentities($row2->CategoryName
    );?></option>
 <?php } ?>
                              </select>
                           </div>
                          

                           <br>

                           <div class="field">
                              <label class="label_field">Maid ID</label>
                              <input type="text" name="maidid" value="<?php echo $row->MaidId;?>" class="form-control" required='true'>
                           </div>
                           <br>
                           <div class="field">
                              <label class="label_field">Name</label>
                              <input type="text" name="name" value="<?php echo $row->Name;?>" class="form-control" required='true'>
                           </div>
                           <br>
                           <div class="field">
                              <label class="label_field">Email</label>
                              <input type="email" name="email" value="<?php echo $row->Email;?>" class="form-control" required='true'>
                           </div>
                           <br>
                           <div class="field">
                              <label class="label_field">Contact Number</label>
                              <input type="text" name="contno" value="<?php echo $row->ContactNumber;?>" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                           </div>
                          <br>
                          <br>
                           <div class="field">
                              <label class="label_field">Gender</label>
                              <select type="text" name="gender" value="" class="form-control" required='true'>
                                 <option value="<?php echo $row->Gender;?>"><?php echo $row->Gender;?></option>
                                 <option value="Male">Male</option>
                                <option value="Female">Female</option>

                              </select>
                           </div>
                           <div class="field">
                              <label class="label_field">Experience</label>
                              <input type="text" name="experience" value="<?php echo $row->Experience;?>" class="form-control" required='true'>
                           </div>
                           <br>
                           <div class="field">
                              <label class="label_field">Date of Birth</label>
                              <input type="date" name="dob" value="<?php echo $row->Dateofbirth;?>" class="form-control" required='true'>
                           </div>
                           <br>
                           <div class="field">
                              <label class="label_field">Address</label>
                              <textarea type="text" name="add" value="" class="form-control" required='true'><?php echo $row->Address;?></textarea>
                           </div>
                           <br>
                           <div class="field">
                              <label class="label_field">Description(if any)</label>
                              <textarea type="text" name="desc" value="" class="form-control"><?php echo $row->Description;?></textarea>
                           </div>
                           <br>
                           <div class="field">
                              <label class="label_field">Maid Pic</label>
                              
                              <img src="images/<?php echo $row->ProfilePic;?>" width="100" height="100" value="<?php  echo $row->ProfilePic;?>"><a href="changeimage.php?editid=<?php echo $row->eid;?>"> &nbsp; Edit Image</a>
                           </div>
<br>
                           <div class="field">
                              <label class="label_field">ID Proof</label>
                              <img src="idproofimages/<?php echo $row->IdProof;?>" width="100" height="100" value="<?php  echo $row->IdProof;?>"><a href="changeidproof.php?editid=<?php echo $row->eid;?>"> &nbsp; Upload New</a>
                           </div>
                           <br><?php $cnt=$cnt+1;}} ?>
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button class="main_bt" type="submit" name="submit" id="submit">Update</button>
                           </div>
                        </fieldset>
                     </form></div>
                                            
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- funcation section -->
                     
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
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
   </body>
</html><?php } ?>