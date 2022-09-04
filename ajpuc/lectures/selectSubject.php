<?php 

include('header.php');
include('sidebar.php');
include('dbconfig.php');
extract($_REQUEST);
$facmail=$_SESSION["email"];
$dep=$_SESSION["dbnamez"];
$snm;


//$_SESSION["subcde"]=$subcodezz;
//$_SESSION["sems"]=$semzz;
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
 
<?php
//$res=$con->query($ql);
?>



<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Select Subject to Add Internal Assessment Marks
      </h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Add IA Marks</li>
      </ol>
      <div class="content">
         <div class="container-fluid">
            <?php
            if(isset($success)){?>
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>IA marks are added sucessfully</strong>
            </div>
            <?php }
            ?>
            <?php
            if(isset($error)){?>
            <div class="alert alert-warning" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>IA marks are not added at this time try again!</strong>
            </div>
            <?php }
            ?>
             <a href="selectSem.php" class="btn btn-primary pull-right">List IA marks</a>
         <br/><br/>
        
        
            <div class="panel panel-info">
               <div class="panel-heading">Select Subject</div>
               <div class="panel-body box-body">
     
    
    <?php
//Other Branch Subjects - login PCM faculty

if($dep=="admin")
{
    ?>
     <form action="otherStudents.php" method="post">
    <div class="col-sm-2">
        <label>Other Branch Subjects : </label>
    </div>
    <div class="col-sm-4">
    <?php
$sql11="SELECT * FROM subfac,faculty  WHERE faculty.idn=subfac.idn and faculty.email='$facmail'";
 $result11 = $con->query($sql11);
 ?>
 <select name="subject1"><?php
    while($row11 = $result11->fetch_assoc())
          { 
            $snm=$row11['sdept']; 
            echo "<script>alert('$snm');</script>";
            $_SESSION["sbdept"]=$snm;
            if($snm!="kvgenggco_admin")
            {
            $sq1zz="SELECT $snm.subjects.Name AS 'Sub Name', $snm.subjects.subcode FROM $snm.subjects,kvgenggco_admin.faculty,kvgenggco_admin.subfac WHERE $snm.subjects.subcode=subfac.subcode AND faculty.idn=subfac.idn AND faculty.email="."'$facmail'";   
            
            $result12 = $con->query($sq1zz);
           if($row12 = $result12->fetch_assoc())
            {
           echo "<option value='".$row12['subcode'].'@'.$snm."'>".$row12['Sub Name']."  [".$row12['subcode']."]</option>"; 
            }
            }
          }
        ?>  </select>
        </div>
        <div class="col-sm-2">
                   
    <select name="yestane">
        <option value="1">1st Internal</option>
        <option value="2">2nd Internal</option>
        <option value="3">3rd Internal</option>
        <option value="4">4th Internal</option>
        
    </select>
     </div>
         <div class="col-sm-3">
            <input type="submit" value="submit">
         </div>
                         
        <div class="clearfix"></div><br/>
        </form>
        </br>
        <?php
}

//$sq1zz="SELECT `subjects`.`Name` AS 'Sub Name',`subjects`.`subcode` AS 'Sub Code',`subjects`.sem,`faculty`.`Name` AS 'Faculty Name',subfac.sec FROM `subjects`,`faculty`,subfac WHERE subjects.subcode=subfac.subcode AND faculty.idn=subfac.idn AND faculty.email="."'$facmail'";


//Same Branch Subjects and faculty starts *********
else
{
$sq1zz="SELECT distinct(subjects.Name) AS 'Sub Name', subjects.subcode FROM `subjects`,`faculty`,subfac WHERE subjects.subcode=subfac.subcode and subjects.elective in(0,3)  AND faculty.idn=subfac.idn AND faculty.email="."'$facmail'";



$inter;

                       $resultzz = $con->query($sq1zz);
                        
                        $rowcount=mysqli_num_rows($resultzz);
}
    ?>
    
                   <p>
                       <table>
                        <?php   
                       
                        if($rowcount>=1)
                        {
                        ?>
                        
                        <form action="iamarks.php" method="post">
                            
                             <div class="col-sm-2">
                              <label><span style="text-transform:uppercase"><?php echo "$dep "; ?></span> Subjects : </label>
                              </div>
                             <div class="col-sm-4">
                            
                             <select name="subname">
                                <?php    while($rowzz = $resultzz->fetch_assoc())
                                  { 
                                      $snm=$rowzz['Sub Name'];
                                      
                                      if($snm!='')
                                       {
                                         echo "<option value='".$rowzz['subcode']."'>".$rowzz['Sub Name']." [".$rowzz['subcode']."]</option>"; 
                                       }
                                    
                                 
                                  } 
                                  ?>
                            </select>
                         </div>
                         <div class="col-sm-2">
                   
    <select name="yestane">
        <option value="1">1st Internal</option>
        <option value="2">2nd Internal</option>
        <option value="3">3rd Internal</option>
        <option value="4">4th Internal</option>
        
    </select>
     </div>
                         <div class="col-sm-3">
                             <input type="submit" value="submit">
                         </div>
                          <div class="clearfix"></div>
                          <br><br>
                            </form>
                            <?php }?>
                            
                            <div class="clearfix"></div>
                              <!--   PCM Subjects  starts    -->
                            
                             <?php
                                  $sq11="SELECT kvgenggco_admin.subjects.`Name` AS 'Sub Name',  kvgenggco_admin.subjects.`subcode` AS 'Sub Code' FROM kvgenggco_admin.subjects,faculty,subfac WHERE kvgenggco_admin.subjects.subcode=subfac.subcode AND faculty.idn=subfac.idn AND faculty.email="."'$facmail'";
                                  $result1 = $con->query($sq11);
                                  $rowcount1=mysqli_num_rows($result1);
                                if($rowcount1>=1)
                        {
                        
                           ?> 
                            <form action="iiaamarks.php" method="post">
                                
                                 <div class="col-sm-2">
                                    <label>PCM Subjects : </label>
                                  </div>
                                   <div class="col-sm-4">
                             <select name="subname2">
                            <?php
                            
                                while($row1 = $result1->fetch_assoc())
                                    { ?>
                            
                                    
                              
                                  
                                   <?php 
                                     // $_SESSION["secs"]=$row1['sec'];
                                    echo "<option value='".$row1['Sub Code']."'>".$row1['Sub Name']." [".$row1['Sub Code']."]</option>";
                                    ?>
                               
                           
                        <?php } ?>
                           
                          </select>
                            </div>
                            <div class="col-sm-2">
                   
    <select name="yestane">
        <option value="1">1st Internal</option>
        <option value="2">2nd Internal</option>
        <option value="3">3rd Internal</option>
        <option value="4">4th Internal</option>
        
    </select>
     </div>
                         <div class="col-sm-3">
                             <input type="submit" value="submit">
                         </div>
                        
                        </form>
                        <div class="clearfix"></div> <br /> <br />
                 <?php     }  ?>
                 
                         <div class="clearfix"></div>
                         
                         
                         
                           <!--   PCM Subjects  login faculty    -->
                            
                             <?php
                             if($dep!="admin")
                             {
                                   $dep1="kvgenggco_".$dep;
                                 echo "<script type='text/javascript'>alert('$dep  / $dep1');</script>";
                             
                                  $sq11="SELECT kvgenggco_admin.subjects.`Name` AS 'Sub Name',  kvgenggco_admin.subjects.`subcode` AS 'Sub Code' FROM kvgenggco_admin.subjects,$dep1.faculty,kvgenggco_admin.subfac WHERE kvgenggco_admin.subjects.subcode=kvgenggco_admin.subfac.subcode AND $dep1.faculty.idn=kvgenggco_admin.subfac.idn AND $dep1.faculty.email="."'$facmail' and kvgenggco_admin.subfac.dept='$dep1'";
                                  $result1 = $con->query($sq11);
                                  $rowcount1=mysqli_num_rows($result1);
                                   echo "<script type='text/javascript'>alert('rows=$rowcount1 / $dep  / $dep1');</script>";
                                if($rowcount1>=1)
                        {
                        
                           ?> 
                            <form action="iiaamarks.php" method="post">
                                
                                 <div class="col-sm-2">
                                    <label>PCM Subjects : </label>
                                  </div>
                                   <div class="col-sm-4">
                             <select name="subname2">
                            <?php
                            
                                while($row1 = $result1->fetch_assoc())
                                    { ?>
                            
                                    
                              
                                  
                                   <?php 
                                     // $_SESSION["secs"]=$row1['sec'];
                                    echo "<option value='".$row1['Sub Code']."'>".$row1['Sub Name']." [".$row1['Sub Code']."]</option>";
                                    ?>
                               
                           
                        <?php } ?>
                           
                          </select>
                            </div>
                            <div class="col-sm-2">
                   
    <select name="yestane">
        <option value="1">1st Internal</option>
        <option value="2">2nd Internal</option>
        <option value="3">3rd Internal</option>
        <option value="4">4th Internal</option>
        
    </select>
     </div>
                         <div class="col-sm-3">
                             <input type="submit" value="submit">
                         </div>
                        
                        </form>
                                                  <div class="clearfix"></div> <br /> <br />
                 <?php     }  ?>
                          <div class="clearfix"></div>
                          <?php } ?>
                         
                        <!--   Elective Subjects  starts    -->
                     
                             <?php
                                  $sqle="SELECT subjects.`Name` AS 'Sub Name', subjects.`subcode` AS 'Sub Code' FROM subjects,faculty,electiveDetails WHERE subjects.subcode=electiveDetails.esubcode and subjects.elective=1 AND faculty.idn=electiveDetails.eidn  AND   faculty.email='$facmail'";
                                  $resulte = $con->query($sqle);
                                  
                                   $rowcount2=mysqli_num_rows($resulte);
                                if($rowcount2>=1)
                        {
                           ?> 
                            <form action="iomarks.php" method="post">
                                
                        <div class="col-sm-2">
                             <label>Elective Subjects : </label>
                        </div>
                             <div class="col-sm-4">
                                    
                               <select name="subnamee">
                            
                            <?php
                                while($rowe = $resulte->fetch_assoc())
                                    { ?>
                              
                                  
                                   <?php 
                                     // $_SESSION["secs"]=$row1['sec'];
                                    echo "<option value='".$rowe['Sub Code']."'>".$rowe['Sub Name']." [".$rowe['Sub Code']."]</option>";
                                    ?>
                               
                        <?php } ?>
                         </select>
                         </div>
                         <div class="col-sm-2">
                   
    <select name="yestane">
        <option value="1">1st Internal</option>
        <option value="2">2nd Internal</option>
        <option value="3">3rd Internal</option>
        <option value="4">4th Internal</option>
        
    </select>
     </div>
                         <div class="col-sm-3">
                             <input type="submit" value="submit">
                         </div>
                          <div class="clearfix"></div>
                        </form>       
                        
                         <div class="clearfix"></div> <br /> <br />
                        
                        <?php }?>
                      
                          <div class="clearfix"></div>
                          
                      
                            <!-- Open  Elective Subjects  starts    -->
                     
                             <?php
                             
                             $deps="kvgenggco_".$dep;
                             $sqleo="Select distinct(kvgenggco_admin.electiveDetails.sdept) FROM kvgenggco_admin.electiveDetails,$deps.faculty where $deps.faculty.idn=kvgenggco_admin.electiveDetails.eidn and  kvgenggco_admin.electiveDetails.fdept='$deps' and $deps.faculty.email='$facmail'";
                             $resulteo = $con->query($sqleo);
                                  
                                   $rowcount2=mysqli_num_rows($resulteo);
                                  
                                while($roweo = $resulteo->fetch_assoc())
                                {
                                    $subdept=$roweo['sdept'];
                                $_SESSION["osdept"]=$subdept;
                                  $sqle="SELECT $subdept.subjects.`Name` AS 'Sub Name', $subdept.subjects.`subcode` AS 'Sub Code' FROM $subdept.subjects,$deps.faculty,kvgenggco_admin.electiveDetails WHERE $subdept.subjects.subcode=kvgenggco_admin.electiveDetails.esubcode and $subdept.subjects.elective=2 AND $deps.faculty.idn=kvgenggco_admin.electiveDetails.eidn  AND   $deps.faculty.email='$facmail'";
                                  $resulte = $con->query($sqle);
                                  
                                   $rowcount2=mysqli_num_rows($resulte);
                                if($rowcount2>=1)
                        {
                           ?> 
                            <form action="openio.php" method="post">
                                
                        <div class="col-sm-2">
                             <label>Open Elective Subjects : </label>
                        </div>
                             <div class="col-sm-4">
                                    
                               <select name="subnameo">
                            
                            <?php
                                while($rowe = $resulte->fetch_assoc())
                                    { ?>
                              
                                  
                                   <?php 
                                     // $_SESSION["secs"]=$row1['sec'];
                                    echo "<option value='".$rowe['Sub Code']."'>".$rowe['Sub Name']." [".$rowe['Sub Code']."]</option>";
                                    ?>
                               
                        <?php } ?>
                         </select>
                         </div>
                         <div class="col-sm-2">
                   
    <select name="yestane">
        <option value="1">1st Internal</option>
        <option value="2">2nd Internal</option>
        <option value="3">3rd Internal</option>
        <option value="4">4th Internal</option>
        
    </select>
     </div>
                         <div class="col-sm-3">
                             <input type="submit" value="submit">
                         </div>
                          <div class="clearfix"></div><br>
                        </form>       
                        
                        <div class="clearfix"></div> <br /> <br />
                        
                        <?php }
                                }
                        ?>
                            <div class="clearfix"></div>
                   </table>


                   
                   </p>
                     


                  
               </div>
            </div>
         </div>
      </div>
       
   </section>
</div>

<style>
    
        
.box-body::-webkit-scrollbar
{
	-webkit-appearance: none;
	width: 14px;
	height: 14px;
}

.box-body::-webkit-scrollbar-thumb
{
	border-radius: 8px;
	border: 3px solid #fff;
	background-color: rgba(0, 0, 0, .3);
}
.box-body {
    width: 100%;
    overflow-y: auto;
    _overflow: auto;
    margin: 0 0 1em;
}

.box-body::-webkit-scrollbar-thumb {
    border-radius: 8px;
    border: 3px solid #fff;
    background-color: rgba(0, 0, 0, .3);
}
    
</style>
<?php include("footer.php");?>