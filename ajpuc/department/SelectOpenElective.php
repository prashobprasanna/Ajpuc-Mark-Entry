<?php include('header.php');
include('sidebar.php');
extract($_REQUEST);?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Assign Open Elective Subject To Faculty
      </h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Assign Subject to Faculty</li>
      </ol>
      <div class="content">
         <div class="container-fluid">
            <?php
            if(isset($success)){?>
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Subject is assigned sucessfully</strong>
            </div>
            <?php }
            ?>
            <?php
            if(isset($error)){?>
            <div class="alert alert-warning" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Subject is not assigned at this time try again!</strong>
            </div>
            <?php }
            ?>
            <a href="listOElective.php" class="btn btn-primary pull-right">List of Students for Open Elective</a>
         <br/><br/>
         
                 
<!-- Internal On selection change script start-->

<script type="text/javascript">
   function myfunction(){
    internal = document.getElementById('myselect').value;
    location.href="?internal="+internal;
   }
  </script>
  
<!-- Internal On selection change script end-->

         
         
            <div class="panel panel-info">
               <div class="panel-heading">Assign Subject to Faculty </div>
               <div class="panel-body">
                  <form class="form-horizontal" role="form" method="post" action="SaveSubFacOElective.php" enctype="multipart/form-data">
                      
                    <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="fac" class="control-label">Department</label><span id="sp">:</span> 
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <select id="myselect" name="abcd" onchange="myfunction()"> 
                                <option disabled selected value> -- Select a Department -- </option>
                                <option value="kvgenggco_admin" <?php if($_GET['internal']== "kvgenggco_admin" ) echo "selected"; ?>>PCM</option>
                                <option value="kvgenggco_civil" <?php if($_GET['internal']== "kvgenggco_civil" ) echo "selected"; ?>>CV</option>
                                <option value="kvgenggco_csis" <?php if($_GET['internal']== "kvgenggco_csis" ) echo "selected"; ?>>CS & IS</option>
                                <option value="kvgenggco_ec" <?php if($_GET['internal']== "kvgenggco_ec" ) echo "selected"; ?>>EC</option>
                                <option value="kvgenggco_ee" <?php if($_GET['internal']== "kvgenggco_ee" ) echo "selected"; ?>>EE</option>
                                <option value="kvgenggco_mech" <?php if($_GET['internal']== "kvgenggco_mech" ) echo "selected"; ?>>ME</option>
                            </select>
                        </div>
                    </div>
                     <?php
                                if (isset($_GET['internal'])) {
                                    $internn = $_GET['internal'];
                                    
                                    //echo $val;
                                }
                                else{
                                    $internn = 5;
                                    //echo $val;
                                }
                                ?>
                    
                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="fac" class="control-label">Faculty</label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <select name="fac">
                            <?php 
                      $qu = "SELECT Name,idn FROM ".$internn.".faculty";
                        $quresult = $con->query($qu); 
                       while($row = $quresult->fetch_assoc()){
                             echo "<option value='".$row['idn']."'>".$row['Name']."</option>";}        
                      ?>
                            
                              
                            </select>
                        </div>
                     </div>
                     
                      
                    

                   
                   
                      <div class="clearfix"></div>
                         <?php 
                         $s3    = "SELECT * FROM subjects where elective=2";
                         $result3 = $con->query($s3); 
                         $rowcount3=mysqli_num_rows($result3);
                                if($rowcount3>=1)
                                {
                        
                        ?>
                        
                       
                       <div class="form-group">
                      <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="fac" class="control-label">Open Elective Subjects</label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-4 col-sm-4 col-sx-12">
                            <select name="subso">
                          <?php
                       while($row3 = $result3->fetch_assoc()){
                             echo "<option value='".$row3['subcode']."@".$row3['sem']."'>".$row3['Name']." [".$row3['subcode']."]</option>  ";}        
                      ?>
                            
                              
                            </select>
                        </div>
                       
                     </div>
                     
                    
                      <br><br>
                    <?php }  ?>
                     
                     
                     
                  
                  
                     <br>
                     <div class="col-md-10 col-sm-10 col-sx-12">
                        <input id="submit" name="submit" type="submit" value="Assign Subject" class="btn btn-success pull-right">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<?php include("footer.php");?>