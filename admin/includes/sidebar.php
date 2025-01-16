 <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
                        <div class="user_info">
                           <?php
$aid=$_SESSION['mhmsaid'];
$sql="SELECT AdminName,Email from  tbladmin where ID=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                           <h6><?php  echo $row->AdminName;?></h6>
                           <p><span class="online_animation"></span> <?php  echo $row->Email;?></p><?php $cnt=$cnt+1;}} ?>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                    
                     <li><a href="dashboard.php"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>
                     <li class="active">
                        <a href="#dashboard1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clock-o orange_color"></i> <span>Category</span></a>
                        <ul class="collapse list-unstyled" id="dashboard1">
                           <li>
                              <a href="add-category.php">> <span>Add</span></a>
                           </li>
                           <li>
                              <a href="manage-category.php">> <span>Manage</span></a>
                           </li>
                        </ul>
                     </li>
                     
                     <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users purple_color"></i> <span>Maid</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="add-maid.php">> <span>Add Maid</span></a></li>
                           <li><a href="manage-maid.php">> <span>Manage Maid</span></a></li>
                           
                        </ul>
                     </li>
                     
                     <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-files-o blue2_color"></i> <span>Maid Hiring Request</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                           <li><a href="new-request.php">> <span>New Request</span></a></li>
                           <li><a href="assign-request.php">> <span>Assign Request</span></a></li>
                          <li><a href="cancel-request.php">> <span>Cancel Request</span></a></li>
                          <li><a href="all-request.php">> <span>All Request</span></a></li>
                        </ul>
                     </li>
                    
                     <li class="active">
                        <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span> Pages</span></a>
                        <ul class="collapse list-unstyled" id="additional_page">
                           <li>
                              <a href="aboutus.php">> <span>About Us</span></a>
                           </li>
                           <li>
                              <a href="contactus.php">> <span>Contact Us</span></a>
                           </li>
                           
                        </ul>
                     </li>
                     <li class="active">
                        <a href="#additional_page1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span> Search</span></a>
                        <ul class="collapse list-unstyled" id="additional_page1">
                           <li>
                              <a href="search-booking-request.php">> <span>Booking Request</span></a>
                           </li>
                           <li>
                              <a href="search-maid.php">> <span>Search Maid</span></a>
                           </li>
                           
                        </ul>
                     </li>
                    
                  </ul>
               </div>
            </nav>