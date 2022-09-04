<?php extract($_REQUEST);
$dbs=$_SESSION["dbnamez"]

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
                   
                 
                  
                        <?php if($dbs=="admin")
                        {?>
                       
                           <li class="treeview">
                          <a href=selectSubject.php>
                         <i class="fa fa-list-ol"></i> <span>IA Marks</span></a>
                         </li>
                          <li>
                        <a href=mentorStudentpcm.php>
                         <i class="fa fa-list-ol"></i> <span>Mentor-Student</span></a>
                         </li>
                          <li>
                         <a href=selectSem.php>
                         <i class="fa fa-list-ol"></i> <span>List IA</span></a>
                         </li>
                      <?php   
                        }
                        else
                        {?>
                          <li class="treeview">
                        <a href=selectSubject.php>
                         <i class="fa fa-list-ol"></i> <span>IA Marks</span></a>
                         </li>
                         <li>
                        <a href=mentorStudent.php>
                         <i class="fa fa-list-ol"></i> <span>Mentor-Student</span></a>
                         </li>
                          <li>
                        <a href=selectSem.php>
                         <i class="fa fa-list-ol"></i> <span>List IA</span></a>
                         </li>
                      <?php  }?>
                  </li>
                  
 
                  
              </ul>
            </section>
            <!-- /.sidebar -->
         </aside>