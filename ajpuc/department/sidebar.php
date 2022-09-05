


<?php
extract($_REQUEST); // Extracting the Request.
  // $dbname= $_SESSION["dbnamez"]; 
    
    if($dbname == "admin") { ?>
    <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
               <!-- sidebar menu: : style can be found in sidebar.less -->
               <ul class="sidebar-menu">
                  <li class="header">MAIN NAVIGATION</li>
                  <li class="treeview">
                     <a href="dashPCM.php">
                     <i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                  </li>
                   <li>
                     <a href="#">
                     <i class="fa fa-users"></i><span>Enrollment</span>
                     <i class="fa fa-angle-left pull-right"></i>
                     </a>
                       <ul class="treeview-menu">
                     <li class="treeview">
                     <a href="#">
                     <i class="fa fa-male"></i><span>Student Enroll</span>
                      <i class="fa fa-angle-left pull-right"></i> </a>
                       <ul class="treeview-menu">
                      
                        <li><a href="StudentPCM_list.php">List Students</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                    <i class="fa fa-black-tie"></i> <span>Factulty Enroll</span> 
                    <i class="fa fa-angle-left pull-right"></i></a>
                       <ul class="treeview-menu">
                           <li><a href="add_Faculty.php">Add Faculty  </a></li>
                           <li><a href="Faculty_List.php">List Faculty</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-comments"></i> <span>Mentor Enroll</span>
                     <i class="fa fa-angle-left pull-right"></i></a>
                       <ul class="treeview-menu">
                        <li><a href="add_Coordinator.php">Assign Mentor</a></li>
                        <li><a href="Cordinator_List.php">List Mentors</a></li>
                     </ul>
                  </li>
                   <li class="treeview">
                     <a href="#">
                     <i class="fa fa-exchange"></i><span>Sub-Fac Enroll</span>
                      <i class="fa fa-angle-left pull-right"></i> </a>
                       <ul class="treeview-menu">
                           
                           <li><a href="assign_Sub_Fac.php">Assign subject to faculty </a></li>
                           <li><a href="AssignSubFacAdmin.php">Assign Subject to Other Branches </a></li>
                           <li><a href="subfaclistPCM.php">List Assignment</a></li>
                     </ul>
                  </li>
                       
                  </ul>
                   
                    <li class="treeview">
                    <a href="#">
                     <i class="fa fa-exchange"></i><span>Student Result</span>
                      <i class="fa fa-angle-left pull-right"></i> </a>
                       <ul class="treeview-menu">
                           
                           <li><a href="select1yrSem.php">List Marks</a></li>
                     </ul>
                  </li>
               
                  <li class="treeview">
                     <a href="addSubs.php">
                     <i class="fa fa-inbox"></i><span>Add Subject</span> </a>
                  </li>
                   <li class="treeview">
                     <!--  <a href="incrsem.php">  </a>-->
                      <a>
                     <i class="fa fa-arrow-circle-right" ></i><span>Increment Sem</span>
                     </a>
                  </li>
                  <li class="treeview">
                       <a href="yb.php">
                     <i class="fa fa-tasks"></i><span>Manage Year Back</span> </a>
                  </li>
                  </li>
              </ul>
            </section>
            <!-- /.sidebar -->
         </aside>
  <?php }
  
  else{
  ?>
  
<aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
               <!-- sidebar menu: : style can be found in sidebar.less -->
               <ul class="sidebar-menu">
                  <li class="header">MAIN NAVIGATION</li>
                  <li class="treeview">
                     <a href="dashboard.php">
                     <i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                  </li>
                   <li>
                     <a href="#">
                     <i class="fa fa-users"></i><span>Enrollment</span>
                     <i class="fa fa-angle-left pull-right"></i>
                     </a>
                       <ul class="treeview-menu">
                     <li class="treeview">
                     <a href="#">
                     <i class="fa fa-male"></i><span>Student Enroll</span>
                      <i class="fa fa-angle-left pull-right"></i> </a>
                       <ul class="treeview-menu">
                        <li><a href="add_Student.php">Add Student </a></li> 
                        <li><a href="Student_list.php">List Students</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                    <i class="fa fa-black-tie"></i> <span>Factulty Enroll</span> 
                    <i class="fa fa-angle-left pull-right"></i></a>
                       <ul class="treeview-menu">
                           <li><a href="add_Faculty.php">Add Faculty  </a></li>
                           <li><a href="Faculty_List.php">List Faculty</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-comments"></i> <span>Mentor Enroll</span>
                     <i class="fa fa-angle-left pull-right"></i></a>
                       <ul class="treeview-menu">
                        <li><a href="add_Coordinator.php">Assign Mentor</a></li>
                        <li><a href="Cordinator_List.php">List Mentors</a></li>
                     </ul>
                  </li>
                   <li class="treeview">
                     <a href="#">
                     <i class="fa fa-exchange"></i><span>Sub-Fac Enroll</span>
                      <i class="fa fa-angle-left pull-right"></i> </a>
                       <ul class="treeview-menu">
                           
                           <li><a href="assign_Sub_Fac.php">Assign subject to faculty </a></li>
                           <li><a href="selectElective.php">Assign Elective Subject </a></li>
                           <li><a href="SelectOpenElective.php">Assign Open Elective Subject </a></li>
                            <li><a href="AssignSubFacAdmin.php">Assign Subject to Other Branches </a></li>
                           <li><a href="subfaclist.php">List Assignment</a></li>
                     </ul>
                  </li>
                       
                  </ul>
                   
                    <li class="treeview">
                    <a href="#">
                     <i class="fa fa-exchange"></i><span>Student Result</span>
                      <i class="fa fa-angle-left pull-right"></i> </a>
                       <ul class="treeview-menu">
                           
                           <li><a href="selectSem.php">List Marks</a></li>
                          
                     </ul>
                  </li>
               
                  <li class="treeview">
                     <a href="addSubs.php">
                     <i class="fa fa-inbox"></i><span>Add Subject</span> </a>
                  </li>
                   <li class="treeview">
                     <!--  <a href="incrsem.php">  </a>-->
                      <a>
                     <i class="fa fa-arrow-circle-right" ></i><span>Increment Sem</span>
                     </a>
                  </li>
                  <li class="treeview">
                       <a href="yb.php">
                     <i class="fa fa-tasks"></i><span>Manage Year Back</span> </a>
                  </li>
                  </li>
              </ul>
            </section>
            <!-- /.sidebar -->
         </aside>
         
         <?php } ?>
         
         