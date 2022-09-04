<?php include('header.php');
include('sidebar.php');
extract($_REQUEST);

  
    $subcode=$_SESSION["subcode"];
    $sems=$_SESSION["sems"];
    $facId=$_SESSION["fac"];
    $fdept=$_SESSION["fdept"];
echo "<script>alert('$fdept');</script>";
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Assign Students to Open Elective subject
      </h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Mentors</li>
      </ol>
      <div class="content">
         <div class="container-fluid">
            <?php
            if(isset($success)){?>
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Subject Assigned sucessfully</strong>
            </div>
            <?php }
            ?>
            <?php
            if(isset($error)){?>
            <div class="alert alert-warning" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Subject is not added at this time try again!</strong>
            </div>
            <?php }
            ?>
            <a href="AssignElective.php" class="btn btn-primary pull-right">List Of Subjects</a>
         <br/><br/>
         
           <div class="panel panel-primary">
               <div class="panel-heading">Assign Elective </div>
               <div class="panel-body">
                   <div class="button-container">
                   
                   
                        <form class="form-horizontal" role="form" method="post" action="saveOElective.php" enctype="multipart/form-data">
                          
                     
                            <div class="panel panel-primary">
               <div class="panel-heading"><?= $sems ?>th Sem Civil</div>
               <div class="panel-body"style="max-height: 10;overflow-y: scroll;">
                    <?php 
                   $deps="kvgenggco_civil";
                      $tm = "SELECT usn,Name,sec FROM $deps.students WHERE sem=$sems ORDER BY sec asc, Name asc";
                        $sm = $con->query($tm);
                        $i=$i+1;
                        ?>
                       
                        <?php
                        while($row7 = $sm->fetch_assoc()){
                            ?>
                            
                          <?php
                            if($row7['sec']=='a')
                            {
                            ?>
                            <div class="col-sm-2 cordinate">
                                <div style="color:#b33d30;text-shadow: 0px 0px 1px;">
                                <?php
                                
                             echo "<input type='checkbox' name='studentscv[]' value='".$row7['usn']."'>".$row7['Name']?></div>
                             </div>
                             <?php
                            }
                                else if($row7['sec']=='b')
                            {?>
                              <div class="col-sm-2 cordinate">
                                <div style="color:#09403b;text-shadow: 0px 0px 1px;">
                                <?php
                                
                             echo "<input type='checkbox' name='studentscv[]' value='".$row7['usn']."'>".$row7['Name']?></div>
                             </div>  
                           <?php  
                               }
                               
                               
                               else
                            {?>
                              <div class="col-sm-2 cordinate">
                                <div style="color:#361a8c;text-shadow: 0px 0px 1px;">
                                <?php
                                
                             echo "<input type='checkbox' name='studentscv[]' value='".$row7['usn']."'>".$row7['Name']?></div>
                             </div>  
                           <?php  
                               }
                            }        
                      ?>
                           
              
                 </div>
               </div>      
               
                     <br>
                     
                     
                     
                     
                       <div class="panel panel-primary">
               <div class="panel-heading"><?= $sems ?>th Sem CSIS</div>
               <div class="panel-body"style="max-height: 10;overflow-y: scroll;">
                    <?php 
                   $deps="kvgenggco_csis";
                      $tm = "SELECT usn,Name,sec FROM $deps.students WHERE sem=$sems ORDER BY sec asc, Name asc";
                        $sm = $con->query($tm);
                        $i=$i+1;
                        ?>
                       
                        <?php
                        while($row7 = $sm->fetch_assoc()){
                            ?>
                            
                          <?php
                            if($row7['sec']=='a')
                            {
                            ?>
                            <div class="col-sm-2 cordinate">
                                <div style="color:#b33d30;text-shadow: 0px 0px 1px;">
                                <?php
                                
                             echo "<input type='checkbox' name='studentscs[]' value='".$row7['usn']."'>".$row7['Name']?></div>
                             </div>
                             <?php
                            }
                                else if($row7['sec']=='b')
                            {?>
                              <div class="col-sm-2 cordinate">
                                <div style="color:#09403b;text-shadow: 0px 0px 1px;">
                                <?php
                                
                             echo "<input type='checkbox' name='studentscs[]' value='".$row7['usn']."'>".$row7['Name']?></div>
                             </div>  
                           <?php  
                               }
                               
                               
                               else
                            {?>
                              <div class="col-sm-2 cordinate">
                                <div style="color:#361a8c;text-shadow: 0px 0px 1px;">
                                <?php
                                
                             echo "<input type='checkbox' name='studentscs[]' value='".$row7['usn']."'>".$row7['Name']?></div>
                             </div>  
                           <?php  
                               }
                            }        
                      ?>
                           
               
               
                        
              
                 </div>
               </div>      
               <br />
               
               
                 <div class="panel panel-primary">
               <div class="panel-heading"><?= $sems ?>th Sem EC</div>
               <div class="panel-body"style="max-height: 10;overflow-y: scroll;">
                    <?php 
                   $deps="kvgenggco_ec";
                      $tm = "SELECT usn,Name,sec FROM $deps.students WHERE sem=$sems ORDER BY sec asc, Name asc";
                        $sm = $con->query($tm);
                        $i=$i+1;
                        ?>
                       
                        <?php
                        while($row7 = $sm->fetch_assoc()){
                            ?>
                            
                          <?php
                            if($row7['sec']=='a')
                            {
                            ?>
                            <div class="col-sm-2 cordinate">
                                <div style="color:#b33d30;text-shadow: 0px 0px 1px;">
                                <?php
                                
                             echo "<input type='checkbox' name='studentsec[]' value='".$row7['usn']."'>".$row7['Name']?></div>
                             </div>
                             <?php
                            }
                                else if($row7['sec']=='b')
                            {?>
                              <div class="col-sm-2 cordinate">
                                <div style="color:#09403b;text-shadow: 0px 0px 1px;">
                                <?php
                                
                             echo "<input type='checkbox' name='studentsec[]' value='".$row7['usn']."'>".$row7['Name']?></div>
                             </div>  
                           <?php  
                               }
                               
                               
                               else
                            {?>
                              <div class="col-sm-2 cordinate">
                                <div style="color:#361a8c;text-shadow: 0px 0px 1px;">
                                <?php
                                
                             echo "<input type='checkbox' name='studentsec[]' value='".$row7['usn']."'>".$row7['Name']?></div>
                             </div>  
                           <?php  
                               }
                            }        
                      ?>
                           
               
               
                        
              
                 </div>
               </div>      
               
               
               <br />
               
               
               
               
                 <div class="panel panel-primary">
               <div class="panel-heading"><?= $sems ?>th Sem EE</div>
               <div class="panel-body"style="max-height: 10;overflow-y: scroll;">
                    <?php 
                   $deps="kvgenggco_ee";
                      $tm = "SELECT usn,Name,sec FROM $deps.students WHERE sem=$sems ORDER BY sec asc, Name asc";
                        $sm = $con->query($tm);
                        $i=$i+1;
                        ?>
                       
                        <?php
                        while($row7 = $sm->fetch_assoc()){
                            ?>
                            
                          <?php
                            if($row7['sec']=='a')
                            {
                            ?>
                            <div class="col-sm-2 cordinate">
                                <div style="color:#b33d30;text-shadow: 0px 0px 1px;">
                                <?php
                                
                             echo "<input type='checkbox' name='studentsee[]' value='".$row7['usn']."'>".$row7['Name']?></div>
                             </div>
                             <?php
                            }
                                else if($row7['sec']=='b')
                            {?>
                              <div class="col-sm-2 cordinate">
                                <div style="color:#09403b;text-shadow: 0px 0px 1px;">
                                <?php
                                
                             echo "<input type='checkbox' name='studentsee[]' value='".$row7['usn']."'>".$row7['Name']?></div>
                             </div>  
                           <?php  
                               }
                               
                               
                               else
                            {?>
                              <div class="col-sm-2 cordinate">
                                <div style="color:#361a8c;text-shadow: 0px 0px 1px;">
                                <?php
                                
                             echo "<input type='checkbox' name='studentsee[]' value='".$row7['usn']."'>".$row7['Name']?></div>
                             </div>  
                           <?php  
                               }
                            }        
                      ?>
                           
             
               
               
               
                        
              
                 </div>
               </div>      
               
               
               
               <br />
               
               
               
               
                 <div class="panel panel-primary">
               <div class="panel-heading"><?= $sems ?>th Sem Mech</div>
               <div class="panel-body"style="max-height: 10;overflow-y: scroll;">
                    <?php 
                   $deps="kvgenggco_mech";
                      $tm = "SELECT usn,Name,sec FROM $deps.students WHERE sem=$sems ORDER BY sec asc, Name asc";
                        $sm = $con->query($tm);
                        $i=$i+1;
                        ?>
                       
                        <?php
                        while($row7 = $sm->fetch_assoc()){
                            ?>
                            
                          <?php
                            if($row7['sec']=='a')
                            {
                            ?>
                            <div class="col-sm-2 cordinate">
                                <div style="color:#b33d30;text-shadow: 0px 0px 1px;">
                                <?php
                                
                             echo "<input type='checkbox' name='studentsme[]' value='".$row7['usn']."'>".$row7['Name']?></div>
                             </div>
                             <?php
                            }
                                else if($row7['sec']=='b')
                            {?>
                              <div class="col-sm-2 cordinate">
                                <div style="color:#09403b;text-shadow: 0px 0px 1px;">
                                <?php
                                
                             echo "<input type='checkbox' name='studentsme[]' value='".$row7['usn']."'>".$row7['Name']?></div>
                             </div>  
                           <?php  
                               }
                               
                               
                               else
                            {?>
                              <div class="col-sm-2 cordinate">
                                <div style="color:#361a8c;text-shadow: 0px 0px 1px;">
                                <?php
                                
                             echo "<input type='checkbox' name='studentsme[]' value='".$row7['usn']."'>".$row7['Name']?></div>
                             </div>  
                           <?php  
                               }
                            }        
                      ?>
                           
               
               
                        
              
                 </div>
               </div>      
               
                     <div class="col-md-10 col-sm-10 col-sx-12">
                        <input id="submit" name="submit" type="submit" value="Assign Subject" class="btn btn-success pull-right">
                     </div>
                  </form>
            

                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<?php include("footer.php");?>
