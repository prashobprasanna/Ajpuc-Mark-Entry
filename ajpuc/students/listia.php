<?php include("header.php");
      include('sidebar.php');
      error_reporting(0);
extract($_REQUEST); 
$susn=$_SESSION["usn"];
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
        Internal Assasment Marks and Attendences
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">IA marks<li>
      </ol>
       
        <div class="content">
	   <div class="container-fluid">
           
 
               
   <br/> 

         <div class="panel panel-info">
	          <div class="panel-heading">1st Semester</div>
		         <div class="panel-body">
             <div class="table-responsive">
              <div class="box-body">
                           <table  class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    
                                     <th>Subject Code</th>
                                     
                                     <th>1st Internal </th>
                                     <th>attendance </th>
                                     <th>2nd Internal </th>
                                     <th>attendance </th>
                                     <th>3rd Internal </th>
                                     <th>attendance </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                  $i=1;
                                  $sql = "select `subjects`.`Name` AS subname,`int1`,`int2`,`int3`,`att1`,`att2`,`att3`,`tatt1`,`tatt2`,`tatt3` from `subjects`,`marks` where marks.subcode=`subjects`.`subcode` AND usn='$susn'  AND `marks`.sem=1";
                                  $result = $con->query($sql);
                                  while($row = $result->fetch_assoc())
                                  { ?>
                                  <tr>
                                  
                                    <td><?=$row['subname'];?></td>
                                    
                                    <td><?=$row['int1'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att1']*100/(int)$row['tatt1'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att1']."/".$row['tatt1']." ".$finval;
                                              
                                              ?>
                                    
                                    </td>
                                    <td><?=$row['int2'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att2']*100/(int)$row['tatt2'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att2']."/".$row['tatt2']." ".$finval;
                                              
                                              ?></td>
                                    <td><?=$row['int3'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att3']*100/(int)$row['tatt3'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att3']."/".$row['tatt3']." ".$finval;
                                              
                                              ?></td>
                               </tr>
                               <?php $i++; } ?>
                              </tbody>
                              
                           </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                  </div>
                  <!-- /.col -->
               </div>
   
  <div class="panel panel-info">
	          <div class="panel-heading">2nd Semester</div>
		         <div class="panel-body">
             <div class="table-responsive">
              <div class="box-body">
                           <table  class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    
                                     <th>Subject Name</th>
                                     
                                     <th>1st Internal </th>
                                     <th>attendance </th>
                                     <th>2nd Internal </th>
                                     <th>attendance </th>
                                     <th>3rd Internal </th>
                                     <th>attendance </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                  $i=1;
                                  $sql = "select `subjects`.`Name` AS subname,`int1`,`int2`,`int3`,`att1`,`att2`,`att3`,`tatt1`,`tatt2`,`tatt3` from `subjects`,`marks` where marks.subcode=`subjects`.`subcode` AND usn='$susn' AND `marks`.sem=2";
                                  $result = $con->query($sql);
                                  while($row = $result->fetch_assoc())
                                  { ?>
                                  <tr>
                                  
                                    <td><?=$row['subname'];?></td>
                                    
                                    <td><?=$row['int1'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att1']*100/(int)$row['tatt1'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att1']."/".$row['tatt1']." ".$finval;
                                              
                                              ?>
                                    
                                    </td>
                                    <td><?=$row['int2'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att2']*100/(int)$row['tatt2'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att2']."/".$row['tatt2']." ".$finval;
                                              
                                              ?></td>
                                    <td><?=$row['int3'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att3']*100/(int)$row['tatt3'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att3']."/".$row['tatt3']." ".$finval;
                                              
                                              ?></td>
                               </tr>
                               <?php $i++; } ?>
                              </tbody>
                              
                           </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                  </div>
                  <!-- /.col -->
               </div>
   <div class="panel panel-info">
	          <div class="panel-heading">3rd Semester</div>
		         <div class="panel-body">
             <div class="table-responsive">
              <div class="box-body">
                           <table  class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    
                                     <th>Subject Name</th>
                                     
                                     <th>1st Internal </th>
                                     <th>attendance </th>
                                     <th>2nd Internal </th>
                                     <th>attendance </th>
                                     <th>3rd Internal </th>
                                     <th>attendance </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                  $i=1;
                                  $sql = "select `subjects`.`Name` AS subname,`int1`,`int2`,`int3`,`att1`,`att2`,`att3`,`tatt1`,`tatt2`,`tatt3` from `subjects`,`marks` where marks.subcode=`subjects`.`subcode` AND usn='$susn' AND `marks`.sem=3";
                                  $result = $con->query($sql);
                                  while($row = $result->fetch_assoc())
                                  { ?>
                                  <tr>
                                  
                                    <td><?=$row['subname'];?></td>
                                    
                                    <td><?=$row['int1'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att1']*100/(int)$row['tatt1'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att1']."/".$row['tatt1']." ".$finval;
                                              
                                              ?>
                                    
                                    </td>
                                    <td><?=$row['int2'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att2']*100/(int)$row['tatt2'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att2']."/".$row['tatt2']." ".$finval;
                                              
                                              ?></td>
                                    <td><?=$row['int3'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att3']*100/(int)$row['tatt3'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att3']."/".$row['tatt3']." ".$finval;
                                              
                                              ?></td>
                               </tr>
                               <?php $i++; } ?>
                              </tbody>
                              
                           </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                  </div>
                  <!-- /.col -->
               </div>
   <div class="panel panel-info">
	          <div class="panel-heading">4th Semester</div>
		         <div class="panel-body">
             <div class="table-responsive">
              <div class="box-body">
                           <table  class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    
                                     <th>Subject Name</th>
                                     
                                     <th>1st Internal </th>
                                     <th>attendance </th>
                                     <th>2nd Internal </th>
                                     <th>attendance </th>
                                     <th>3rd Internal </th>
                                     <th>attendance </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                  $i=1;
                                  $sql = "select `subjects`.`Name` AS subname,`int1`,`int2`,`int3`,`att1`,`att2`,`att3`,`tatt1`,`tatt2`,`tatt3` from `subjects`,`marks` where marks.subcode=`subjects`.`subcode` AND usn='$susn' AND `marks`.sem=4";
                                  $result = $con->query($sql);
                                  while($row = $result->fetch_assoc())
                                  { ?>
                                  <tr>
                                  
                                    <td><?=$row['subname'];?></td>
                                    
                                    <td><?=$row['int1'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att1']*100/(int)$row['tatt1'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att1']."/".$row['tatt1']." ".$finval;
                                              
                                              ?>
                                    
                                    </td>
                                    <td><?=$row['int2'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att2']*100/(int)$row['tatt2'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att2']."/".$row['tatt2']." ".$finval;
                                              
                                              ?></td>
                                    <td><?=$row['int3'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att3']*100/(int)$row['tatt3'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att3']."/".$row['tatt3']." ".$finval;
                                              
                                              ?></td>
                               </tr>
                               <?php $i++; } ?>
                              </tbody>
                              
                           </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                  </div>
                  <!-- /.col -->
               </div>
   <div class="panel panel-info">
	          <div class="panel-heading">5th Semester</div>
		         <div class="panel-body">
             <div class="table-responsive">
              <div class="box-body">
                           <table  class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    
                                     <th>Subject Name</th>
                                     
                                     <th>1st Internal </th>
                                     <th>attendance </th>
                                     <th>2nd Internal </th>
                                     <th>attendance </th>
                                     <th>3rd Internal </th>
                                     <th>attendance </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                  $i=1;
                                  $sql = "select `subjects`.`Name` AS subname,`int1`,`int2`,`int3`,`att1`,`att2`,`att3`,`tatt1`,`tatt2`,`tatt3` from `subjects`,`marks` where marks.subcode=`subjects`.`subcode` AND usn='$susn' AND `marks`.sem=5";
                                  $result = $con->query($sql);
                                  while($row = $result->fetch_assoc())
                                  { ?>
                                  <tr>
                                  
                                    <td><?=$row['subname'];?></td>
                                    
                                    <td><?=$row['int1'];?></td>
                                    <td><?php  
                                              $valu=(int)$row['att1']*100/(int)$row['tatt1'];
                                              $valz=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att1']."/".$row['tatt1']." ".$finval;
                                              
                                              ?>
                                    
                                    </td>
                                    <td><?=$row['int2'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att2']*100/(int)$row['tatt2'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att2']."/".$row['tatt2']." ".$finval;
                                              
                                              ?></td>
                                    <td><?=$row['int3'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att3']*100/(int)$row['tatt3'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att3']."/".$row['tatt3']." ".$finval;
                                              
                                              ?></td>
                               </tr>
                               <?php $i++; } ?>
                              </tbody>
                              
                           </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                  </div>
                  <!-- /.col -->
               </div>
   <div class="panel panel-info">
	          <div class="panel-heading">6th Semester</div>
		         <div class="panel-body">
             <div class="table-responsive">
              <div class="box-body">
                           <table  class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    
                                     <th>Subject Name</th>
                                     
                                     <th>1st Internal </th>
                                     <th>attendance </th>
                                     <th>2nd Internal </th>
                                     <th>attendance </th>
                                     <th>3rd Internal </th>
                                     <th>attendance </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                  $i=1;
                                  $sql = "select `subjects`.`Name` AS subname,`int1`,`int2`,`int3`,`att1`,`att2`,`att3`,`tatt1`,`tatt2`,`tatt3` from `subjects`,`marks` where marks.subcode=`subjects`.`subcode` AND usn='$susn' AND `marks`.sem=6";
                                  $result = $con->query($sql);
                                  while($row = $result->fetch_assoc())
                                  { ?>
                                  <tr>
                                  
                                    <td><?=$row['subname'];?></td>
                                    
                                    <td><?=$row['int1'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att1']*100/(int)$row['tatt1'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att1']."/".$row['tatt1']." ".$finval;
                                              
                                              ?>
                                    
                                    </td>
                                    <td><?=$row['int2'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att2']*100/(int)$row['tatt2'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att2']."/".$row['tatt2']." ".$finval;
                                              
                                              ?></td>
                                    <td><?=$row['int3'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att3']*100/(int)$row['tatt3'];
                                              $valu=round($valz,2);
                                              
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att3']."/".$row['tatt3']." ".$finval;
                                              
                                              ?></td>
                               </tr>
                               <?php $i++; } ?>
                              </tbody>
                              
                           </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                  </div>
                  <!-- /.col -->
               </div>
   <div class="panel panel-info">
	          <div class="panel-heading">7th Semester</div>
		         <div class="panel-body">
             <div class="table-responsive">
              <div class="box-body">
                           <table  class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    
                                     <th>Subject Name</th>
                                     
                                     <th>1st Internal </th>
                                     <th>attendance </th>
                                     <th>2nd Internal </th>
                                     <th>attendance </th>
                                     <th>3rd Internal </th>
                                     <th>attendance </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                  $i=1;
                                  $sql = "select `subjects`.`Name` AS subname,`int1`,`int2`,`int3`,`att1`,`att2`,`att3`,`tatt1`,`tatt2`,`tatt3` from `subjects`,`marks` where marks.subcode=`subjects`.`subcode` AND usn='$susn' AND `marks`.sem=7";
                                  $result = $con->query($sql);
                                  while($row = $result->fetch_assoc())
                                  { ?>
                                  <tr>
                                  
                                    <td><?=$row['subname'];?></td>
                                    
                                    <td><?=$row['int1'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att1']*100/(int)$row['tatt1'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att1']."/".$row['tatt1']." ".$finval;
                                              
                                              ?>
                                    
                                    </td>
                                    <td><?=$row['int2'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att2']*100/(int)$row['tatt2'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att2']."/".$row['tatt2']." ".$finval;
                                              
                                              ?></td>
                                    <td><?=$row['int3'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att3']*100/(int)$row['tatt3'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att3']."/".$row['tatt3']." ".$finval;
                                              
                                              ?></td>
                               </tr>
                               <?php $i++; } ?>
                              </tbody>
                              
                           </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                  </div>
                  <!-- /.col -->
               </div>
   <div class="panel panel-info">
	          <div class="panel-heading">8th Semester</div>
		         <div class="panel-body">
             <div class="table-responsive">
              <div class="box-body">
                           <table  class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    
                                     <th>Subject Name</th>
                                     
                                     <th>1st Internal </th>
                                     <th>attendance </th>
                                     <th>2nd Internal </th>
                                     <th>attendance </th>
                                     <th>3rd Internal </th>
                                     <th>attendance </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                  $i=1;
                                  $sql = "select `subjects`.`Name` AS subname,`int1`,`int2`,`int3`,`att1`,`att2`,`att3`,`tatt1`,`tatt2`,`tatt3` from `subjects`,`marks` where marks.subcode=`subjects`.`subcode` AND usn='$susn' AND `marks`.sem=8";
                                  $result = $con->query($sql);
                                  while($row = $result->fetch_assoc())
                                  { ?>
                                  <tr>
                                  
                                    <td><?=$row['subname'];?></td>
                                    
                                    <td><?=$row['int1'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att1']*100/(int)$row['tatt1'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att1']."/".$row['tatt1']." ".$finval;
                                              
                                              ?>
                                    
                                    </td>
                                    <td><?=$row['int2'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att2']*100/(int)$row['tatt2'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att2']."/".$row['tatt2']." ".$finval;
                                              
                                              ?></td>
                                    <td><?=$row['int3'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att3']*100/(int)$row['tatt3'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att3']."/".$row['tatt3']." ".$finval;
                                              
                                              ?></td>
                               </tr>
                               <?php $i++; } ?>
                              </tbody>
                              
                           </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                  </div>
                  <!-- /.col -->
               </div>
   
               <!-- /.row -->
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
      


<?php include('footer.php');?>