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
$pic=$_FILES["pic"]["name"];
$idproof=$_FILES["idproof"]["name"];
$extension = substr($pic,strlen($pic)-4,strlen($pic));
$extension1 = substr($idproof,strlen($idproof)-4,strlen($idproof));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
$allowed_extensions1 = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Pic has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$picnew=md5($pic).time().$extension;
 move_uploaded_file($_FILES["pic"]["tmp_name"],"images/".$picnew);


if(!in_array($extension1,$allowed_extensions1))
{
echo "<script>alert('Id proof has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$idproof=md5($idproof).time().$extension1;
 move_uploaded_file($_FILES["idproof"]["tmp_name"],"idproofimages/".$idproof);
$ret="select Email from tblmaid where Email=:email || ContactNumber=:contno || MaidId=:maidid";
 $query= $dbh -> prepare($ret);
$query->bindParam(':maidid',$maidid,PDO::PARAM_STR);
$query->bindParam(':contno',$contno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query-> execute();
     $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{

$sql="insert into tblmaid(CatID,MaidId,Name,Email,ContactNumber,Gender,Experience,Dateofbirth,Address,Description,ProfilePic,IdProof)values(:catid,:maidid,:name,:email,:contno,:gender,:exp,:dob,:add,:desc,:pic,:idproof)";
$query=$dbh->prepare($sql);
$query->bindParam(':catid',$catid,PDO::PARAM_STR);
$query->bindParam(':maidid',$maidid,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':contno',$contno,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':exp',$exp,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':add',$add,PDO::PARAM_STR);
$query->bindParam(':desc',$desc,PDO::PARAM_STR);
$query->bindParam(':pic',$picnew,PDO::PARAM_STR);
$query->bindParam(':idproof',$idproof,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Maid detail has been added.")</script>';
echo "<script>window.location.href ='add-maid.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
else
{

echo "<script>alert('Email-id,Employee Id or Mobile Number already exist. Please try again');</script>";
}
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Maid Hirirng Management System || Add Maid</title>
    
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
                              <h2>Add Maid</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column8 graph">
                      
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Add Maid</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="full">
                                          <div class="padding_infor_info">
                                             <div class="alert alert-primary" role="alert">
                                                <form method="post" enctype="multipart/form-data">
                        <fieldset>
                            
                           <div class="field">
                              <label class="label_field">Category Name</label>
                              <select type="text" name="catid" value="" class="form-control" required='true'>
                                 <option value="">Select Category</option>
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
                              <input type="text" name="maidid" value="" class="form-control" required='true'>
                           </div>
                          

                           <br>
                           <div class="field">
                              <label class="label_field">Name</label>
                              <input type="text" name="name" value="" class="form-control" required='true'>
                           </div>
                          

                           <br>
                           <div class="field">
                              <label class="label_field">Email</label>
                              <input type="email" name="email" value="" class="form-control" required='true'>
                           </div>
                          

                           <br>
                           <div class="field">
                              <label class="label_field">Gender</label>
                              <select type="text" name="gender" value="" class="form-control" required='true'>
                                 <option value="">Select Gender</option>
                                 <option value="Male">Male</option>
                                <option value="Female">Female</option>

                              </select>
                           </div>
                           <br>
                           <div class="field">
                              <label class="label_field">Contact Number</label>
                              <input type="text" name="contno" value="" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                           </div>
                          <br>
                           <div class="field">
                              <label class="label_field">Experience</label>
                              <input type="text" name="experience" value="" class="form-control" required='true'>
                           </div>

                           <br>
                           <div class="field">
                              <label class="label_field">Date of Birth</label>
                              <input type="date" name="dob" value="" class="form-control" required='true'>
                           </div>
                          

                           <br>
                           <div class="field">
                              <label class="label_field">Address</label>
                              <textarea type="text" name="add" value="" class="form-control" required='true'></textarea>
                           </div>
                          

                           <br>
                           
                           <div class="field">
                              <label class="label_field">Description(if any)</label>
                              <textarea type="text" name="desc" value="" class="form-control"></textarea>
                           </div>
                          

                           
                           <br>
                           <div class="field">
                              <label class="label_field">Maid Pic</label>
                              <input type="file" name="pic" value="" class="form-control" required='true'>
                           </div>
<br>
                           <div class="field">
                              <label class="label_field">ID Proof</label>
                              <input type="file" name="idproof" value="" class="form-control" required='true'>
                           </div>
                           <br>
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button class="main_bt" type="submit" name="submit" id="submit">Add</button>
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