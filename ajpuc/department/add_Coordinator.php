<?php include('header.php');
include('sidebar.php');
extract($_REQUEST);
$dbz=$_SESSION["dbnamez"];


?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Assign Mentors
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
               <strong>Mentors is added sucessfully</strong>
            </div>
            <?php }
            ?>
            <?php
            if(isset($error)){?>
            <div class="alert alert-warning" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Mentors is not added at this time try again!</strong>
            </div>
            <?php }
            ?>
            <a href="Cordinator_List.php" class="btn btn-primary pull-right">List Of Mentors</a>
         <br/><br/>
         
           <div class="panel panel-primary">
               <div class="panel-heading">Add Mentors </div>
               <div class="panel-body">
                   <div class="button-container">
                       <form class="form-horizontal" role="form" method="post" action="saveCordinator.php" enctype="multipart/form-data">
                    
                     
                        <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="fac" class="control-label">Faculty</label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <select name="fac">
                            <?php 
                      $tm    = "SELECT Name FROM faculty";
                        $tmresult = $con->query($tm); 
                       while($row = $tmresult->fetch_assoc()){
                             echo "<option value='".$row['Name']."'>".$row['Name']."</option>  ";}        
                      ?>
                            
                              
                            </select>
                        </div>
                     </div>
                      
                  <?php   if($dbz !="admin")
                     {
                      ?>
                      <div class="panel panel-primary">
               <div class="panel-heading">4th Year </div>
               <div class="panel-body"style="max-height: 10;overflow-y: scroll;">
                    <?php 
                      $tm = "SELECT Name,USN FROM students WHERE sem=7 OR sem=8 ORDER BY Name ASC";
                        $sm = $con->query($tm);
                        while($row = $sm->fetch_assoc()){
                            ?>
                            <div class="col-sm-2 cordinate">
                                <?php
                             echo "<input type='checkbox' name='students[]' value='".$row['USN']."'>".$row['Name'];
                             ?>
                             </div>
                             <?php }        
                      ?>
                           
                 </div>
               </div>      
                      
                           <div class="panel panel-primary">
               <div class="panel-heading">3rd Year</div>
               <div class="panel-body" style="max-height: 10;overflow-y: scroll;">
                    <?php 
                      $tm = "SELECT Name,USN FROM students WHERE sem=5 OR sem=6 ORDER BY Name ASC";
                        $sm = $con->query($tm);
                        while($row = $sm->fetch_assoc()){
                            ?>
                            <div class="col-sm-2 cordinate">
                                <?php
                             echo "<input type='checkbox' name='students[]' value='".$row['USN']."'>".$row['Name'];
                             ?>
                             </div>
                             <?php }        
                      ?>
                           
                 </div>
               </div>
                           <div class="panel panel-primary">
               <div class="panel-heading">2nd Year</div>
               <div class="panel-body" style="max-height: 10;overflow-y: scroll;">
                    <?php 
                      $tm = "SELECT Name,USN FROM students WHERE sem=3 OR sem=4 ORDER BY Name ASC";
                        $sm = $con->query($tm);
                        while($row = $sm->fetch_assoc()){
                            ?>
                            <div class="col-sm-2 cordinate">
                                <?php
                             echo "<input type='checkbox' name='students[]' value='".$row['USN']."'>".$row['Name'];
                             ?>
                             </div>
                             <?php }               
                      ?>
                           
                 </div>
               </div>
                           
                           <div class="panel panel-primary">
               <div class="panel-heading">1st Year </div>
               <div class="panel-body" style=" max-height: 10;overflow-y: scroll;">
                    <?php 
                      $tm = "SELECT Name,USN FROM students WHERE sem=1 OR sem=2 ORDER BY Name ASC";
                        $sm = $con->query($tm);
                        while($row = $sm->fetch_assoc()){
                            ?>
                            <div class="col-sm-2 cordinate">
                                <?php
                             echo "<input type='checkbox' name='students[]' value='".$row['USN']."'>".$row['Name'];
                             ?>
                             </div>
                             <?php }                
                    
                    
                      ?>
                 </div>
               </div>
                           
                     <br>
                     
                     <?php }
                     
                     else
                     
                     {
                                        $c=0;
                    $branches = array('kvgenggco_civil', 'kvgenggco_csis', 'kvgenggco_ec','kvgenggco_ee','kvgenggco_mech');
                    $branches1 = array('CIVIL', 'CSIS', 'EC','EE','MECH');
                       while($c<5)
                       {  
                     
                     ?>
                      <div class="panel panel-primary">
               <div class="panel-heading">1st Year Physics Cycle - <?=$branches1[$c] ?></div>
               <div class="panel-body"style="max-height: 10;overflow-y: scroll;">
                    <?php 
                      $tm = "SELECT Name,USN FROM $branches[$c].students WHERE (sem=1 OR sem=2) and cycle='Physics' ORDER BY Name ASC";
                        $sm = $con->query($tm);
                        while($row = $sm->fetch_assoc()){
                            $abc=$branches[$c];
                            ?>
                            <div class="col-sm-2 cordinate">
                                <?php
                             echo "<input type='checkbox' name='maklu[]' value='".$row['USN']."@".$abc."'>".$row['Name'];
                             echo "<input type='text' class='hidden' name='bc' value='".$branches[$c]."'>";
                             ?>
                             </div>
                             <?php }        
                      ?>
                           
                 </div>
               </div>    
               
                      <div class="panel panel-primary">
               <div class="panel-heading">1st Year Chemistry Cycle - <?=$branches1[$c] ?></div>
               <div class="panel-body"style="max-height: 10;overflow-y: scroll;">
                    <?php 
                      $tm = "SELECT Name,USN FROM $branches[$c].students WHERE (sem=1 OR sem=2) and cycle='Chemistry' ORDER BY Name ASC";
                        $sm = $con->query($tm);
                        while($row = $sm->fetch_assoc()){
                            ?>
                            <div class="col-sm-2 cordinate">
                                <?php
                             echo "<input type='checkbox' name='maklu[]' value='".$row['USN']."@".$abc."'>".$row['Name'];
                             echo "<input type='text' class='hidden' name='bc' value='".$branches[$c]."'>";
                             
                              ?>
                              
                             </div>
                             <?php }        
                      ?>
                           
                 </div>
               </div>      
               
               
               <?php
                       $c++; }
               } ?>
                     
                     
                     <div class="col-md-10 col-sm-10 col-sx-12">
                        <input id="submit" name="submit" type="submit" value="Assign Mentor" class="btn btn-success pull-right">
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
