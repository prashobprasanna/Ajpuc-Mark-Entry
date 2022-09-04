<?php include("header.php");
      include('sidebar.php');
      $dbname1= "kvgenggco_".$_SESSION["dbnamez"];
      $branch=$dbname1;
   //   $branchs=strtoupper($_SESSION["dbnamez"]);
   
   $_SESSION["semss"]=$sem;
  $_SESSION["intern"]=$yestane;

      $sems=$sem;
      if($sems=="1P")
      $cy="Physics";
      else if($sems=="1C")
       $cy="Chemistry";
       else if($sems=="2P")
      $cy="Physics";
      else if($sems=="2C")
      $cy="Chemistry";
    //  echo "<script>alert('$dbname1');</script>";
      ?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> 
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>

  <script type="text/javascript" language="javascript" >
$(document).ready(function(){
    $('#employee_data').editable({
  container: 'body',
  selector: 'td.name',
  url: "update.php",
  title: 'Employee Name',
  type: "POST",
  //dataType: 'json',
  validate: function(value){
   if($.trim(value) == '')
   {
    return 'This field is required';
   }
  }
 });

});
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
        Internal Assessment
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">IA List</li>
      </ol>
       
        <div class="content">
	   <div class="container-fluid">
           <?php if(isset($asuccess)){ ?>
   <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>IA marks Added successfully.</strong>
</div>
   <?php } ?>
   <?php if(isset($deasucc)){ ?>
   <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Deactivated Successfully.</strong>
</div>
   <?php } ?>
            <?php if(isset($updsucc)){ ?>
   <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Updated successfully.</strong>
</div>
   <?php } ?>
   <?php if(isset($upderr)){ ?>
   <div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Updated Unsuccessfully.</strong>
</div>
   <?php } ?>
           <?php if(isset($success)){ ?>
   <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Deleted successfully.</strong>
</div>
   <?php } ?>
   <?php if(isset($error)){ ?>
   <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Deleted Unsuccessfully.</strong>
</div>
   <?php } ?>
 
                           
  <script type="text/javascript">     
    function ApproveDiv() {    
       window.location.href = "http://www.kvgengg.co.in/department/approved.php";
            }
 </script>     
               
               
               <?php 
               
                $sqlsub= "SELECT distinct(subcode),subjects.Name from subjects where $dbname1.subjects.sem='$sem' and $dbname1.subjects.elective=0 and $dbname1.subjects.subcode in(select subcode from kvgenggco_admin.subfac) ";          
               
           
                                  $resultsub = $con->query($sqlsub);
                                   $s1=mysqli_num_rows($resultsub);
                                  echo "<script>alert('my value: $s1');</script>";
                                   while($rowsub = $resultsub->fetch_assoc())
                                   {
                                       $arry[]=$rowsub['subcode'];
                                       $subnames[]=$rowsub['Name'];
                                       $subsub[]=$rowsub['subcode']." - ".$rowsub['Name'];
                                       
                                   }
                                 // echo "<script>alert('my value: 0 $arry[0]= $subnames[0] ,$arry[1]= $subnames[1] ,$arry[2]= $subnames[2] ,$arry[3]= $subnames[3] ,$arry[4]= $subnames[4] ,');</script>"; 
                                  
                                   usort($arry, function ($a, $b){
                                         return substr($a, -2) - substr($b, -2);
                                    });
                                     
                                    
                                   //   echo "<script>alert('my value: 0 $arry[0]= $subnames[0] ,$arry[1]= $subnames[1] ,$arry[2]= $subnames[2] ,$arry[3]= $subnames[3] ,$arry[4]= $subnames[4] ,');</script>"; 
                                    
                                     $sqllab= "SELECT distinct(subcode),subjects.Name from kvgenggco_admin.subjects where kvgenggco_admin.subjects.sem like '$sem%' and kvgenggco_admin.subjects.elective=3 "; 
                               
                               
                                $resultlab = $con->query($sqllab);
                                   $s2=mysqli_num_rows($resultlab);
                            //    echo "<script>alert('my lab: $s2');</script>";
                                  
                                   while($rowlab = $resultlab->fetch_assoc())
                                   {                
                                     $arry1[]=$rowlab['subcode'];
                                     $subnamelab[]=$rowlab['Name'];
                                     $subsublab[]=$rowlab['subcode']." - ".$rowlab['Name'];
                                     
                                   }
                                    sort($arry1);
                                   $arry= array_merge($arry,$arry1);
                                   
                                   $subnames=array_merge($subnames,$subnamelab);
                                    $subsub=array_merge($subsub,$subsublab);
                                  //    echo "<script>alert('my value: 0 $arry[0]  $arr[1] $arry[2]  $arry[3] $arry[4] $arry[5] $arry[6] $arry[7] 8= $arry[8]');</script>";  
// echo "<script>alert('my value: 0 $arry[0]= $subnames[0] ,$arry[1]= $subnames[1] ,$arry[2]= $subnames[2] ,$arry[3]= $subnames[3] ,$arry[4]= $subnames[4] ,');</script>";
                                    $counter=0;
                                    $tot=0;
                                    $s1=$s1+$s2;
                                   
                                   ?>
                                   
                                   
   <br/>
   
         <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=window.width,height=window.height');
       popupWin.document.open();
       popupWin.document.write('<html><link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>

<br/><br/>



                             
                                   
   <br/>
   
    <div class="col-sm-8">
        </div>
   <div class="col-sm-2">
  <input type="button" class="btn btn-primary pull-right" value="Print" onclick="PrintDiv();" />
</div>
   
   <div class="col-sm-2">
  <input type="button" class="btn btn-secondary pull-right" value="Approve" onclick="ApproveDiv();">
</div>

<div class="clearfix"></div>
   <br/>
   
         <div class="panel panel-info">
	          <div class="panel-heading">Internal Assessment Marks of <?=$sems?>  Sem   </div>
		         <div class="panel-body">
             <div class="table-responsive">
              <div class="box-body">
                  
                  
                   
                   <div id="divToPrint" >
                      <div>
                          
                          <?php 
                          
                          /* Reg sub and lab */
                          $wosm=0;
                          
                          while($wosm<$s1)
                          { ?>
                          <a class="col-sm-4" style="text-decoration:none">
                               <h5><b><?php echo $wosm+1 . ".  ".  $subsub[$wosm];   ?></b></h5>
                          </a>
                             
                              <?php 
                         
                              $wosm++;
                          }
                         ?> 
                          
                           <table id="example1" class="table table-bordered table-striped">
                               
                            
                              
                              <?php if($ol<1 && $el<1)
                              {
                              
                            //   echo "<script>alert('both ella heading=$el');</script>";
                              ?>
                              <thead> 
                              <tr>
                              <th>USN </th>
                              <th>Student Name</th>
                            <?php   $kk=0;
                               
                                while($kk<$s1)
                               {?>
                                  <th colspan=2><?=$arry[$kk]?> </th>
                                  <?php 
                                   
                                   $kk++;
                               } 
                                  
                                  ?>  
                              </tr>
                              
                              <tr>
                                    <th></th>
                                     <th></th>
                                     
                                     <?php   $kk=0;
                               
                                while($kk<$s1)
                               
                               {?>
                                      <th>IA </th>
                                      <th>AT</th>
                                  <?php
                                  $kk++;
                                  } ?>
                                  
                                  
                                   <!-- 12 -->
                                 </tr>
                              </thead>
                            <?php   }?>
                            
                            
                            <!--elective edre -->
                            
                            
                            <?php if($ol<1 && $el>0)
                              {
                            //   echo "<script>alert('elective=$el');</script>";
                              ?>
                              <thead> 
                              <tr>
                              <th>USN </th>
                              <th>Student Name</th>
                            <?php   $kk=0;
                               
                                while($kk<$s1)
                               {?>
                                  <th colspan=2><?=$arry[$kk]?> </th>
                                  
                                  <?php 
                                   $kk++;
                               }
                                  $ek=0;
                                  while($ek<$el)
                                  {?>
                                     <th colspan=2 class="elect"><?=$esub1[$ek]?>(E)</th> 
                                  <?php
                                  
                                  $ek++;    
                                  }
                                  ?>  
                              </tr>
                              
                              <tr>
                                    <th></th>
                                     <th></th>
                                     
                                     <?php   $kk=0;
                               
                                while($kk<($s1+$el))
                               
                               {?>
                                      <th>IA </th>
                                      <th>AT</th>
                                  <?php
                                  $kk++;
                                  } ?>
                                  
                                  
                                   <!-- 12 -->
                                 </tr>
                                 
                                 
                              </thead>
                            <?php   }?>
                            
                            <!--open elective edre -->
                            
                            
                            <?php if($ol>0 && $el<1)
                              { 
                              
                             //  echo "<script>alert('ol untu  heading=$ol');</script>";
                              ?>
                              <thead> 
                              <tr>
                              <th>USN </th>
                              <th>Student Name</th>
                            <?php   $kk=0;
                               
                                while($kk<$s1)
                               {?>
                                  <th colspan=2><?=$arry[$kk]?> </th>
                                  
                                  <?php
                                  
                                   $kk++;
                               }
                                  $ek=0;
                                  while($ek<$ol)
                                  {?>
                                     <th colspan=2 class="elect">Open Elective</th> 
                                  <?php $ek++; }
                                  ?>  
                              </tr>
                              
                              <tr>
                                    <th></th>
                                     <th></th>
                                     
                                     <?php   $kk=0;
                               
                                while($kk<($s1+$ol))
                               
                               {?>
                                      <th>IA </th>
                                      <th>AT</th>
                                  <?php $kk++; } ?>
                                  
                                  
                                   <!-- 12 -->
                                 </tr>
                                 
                                 
                              </thead>
                            <?php   }?>
                            
                            
                            <!--el and ol edre -->
                            
                            
                            <?php if($ol>0 && $el>0)
                              { ?>
                              <thead> 
                              <tr>
                              <th>USN </th>
                              <th>Student Name</th>
                            <?php   $kk=0;
                               
                                while($kk<$s1)
                               {?>
                                  <th colspan=2><?=$arry[$kk]?> </th>
                                  
                                  <?php
                                  
                                   $kk++;
                               }
                                  $ek=0;
                                  while($ek<$el)
                                  {?>
                                     <th colspan=2 ><?=$esub1[$ek]?>(E)</th> 
                                  <?php  $ek++; }
                                  $ok=0;
                                  while($ok<$ol)
                                  {?>
                                     <th colspan=2 class="elect">Open Elective</th> 
                                  <?php $ok++; }
                                  ?>  
                              </tr>
                              
                              <tr>
                                    <th></th>
                                     <th></th>
                                     
                                     <?php   $kk=0;
                               
                                while($kk<($s1+$ol+$el))
                               
                               {?>
                                      <th>IA </th>
                                      <th>AT</th>
                                  <?php $kk++; } ?>
                                  
                                  
                                   <!-- 12 -->
                                 </tr>
                                 
                                 
                              </thead>
                            <?php   }?>
                              
                                   
                              
                              <tbody id="employee_data">
                                 <?php
                                  $i=1;
                                  $c=0;
                    $branches = array('kvgenggco_civil', 'kvgenggco_csis', 'kvgenggco_ec','kvgenggco_ee','kvgenggco_mech');
                       while($c<5)
                       {  
                            // all subjects     
                               //   $branch="kvgenggco_".$branch;
                                  $sql = "SELECT DISTINCT(students.usn),students.Name,students.sem From $branches[$c].students where  $branches[$c].students.sem='$sem' and $branches[$c].students.cycle='$cy' order by $branches[$c].students.usn asc";
                                  $result4 = $con->query($sql);
                                   $s2=mysqli_num_rows($result4);
                                 //   echo "<script>alert('$branches[$c]');</script>";
                               //  echo "<script>alert('$s2');</script>";
                                  while($row = $result4->fetch_assoc())
                                  {
                                     
                                     $uss= $row['usn']; ?>
                                     <tr>
                                      <td><?=$uss?></td>
                                    <td><?=$row['Name'];?></td>
                                   
                                    
                                    <?php
                                    $counter=0;
                                  while($counter<$s1)
                                  {
                                    
                                     if($_SESSION["intern"]==1)  
                                 $sql2= "SELECT marks.int1,marks.att1,marks.tatt1 From $branches[$c].marks,$branches[$c].students where  $branches[$c].marks.usn=$branches[$c].students.usn and $branches[$c].marks.usn='$uss'  and $branches[$c].students.sem='$sem' and $branches[$c].marks.subcode='$arry[$counter]' ORDER BY $branches[$c].students.usn ASC";
                                           if($_SESSION["intern"]==2)  
                                 $sql2= "SELECT marks.int2,marks.att2,marks.tatt2 From $branches[$c].marks,$branches[$c].students where  $branches[$c].marks.usn=$branches[$c].students.usn and $branches[$c].marks.usn='$uss'  and $branches[$c].students.sem='$sem' and $branches[$c].marks.subcode='$arry[$counter]' ORDER BY $branches[$c].students.usn ASC";
                                           if($_SESSION["intern"]==3)  
                                 $sql2= "SELECT marks.int3,marks.att3,marks.tatt3 From $branches[$c].marks,$branches[$c].students where  $branches[$c].marks.usn=$branches[$c].students.usn and $branches[$c].marks.usn='$uss'  and $branches[$c].students.sem='$sem' and $branches[$c].marks.subcode='$arry[$counter]' ORDER BY $branches[$c].students.usn ASC";
                             
                                    
                             //    $sql2= "SELECT marks.int1,marks.att1,marks.tatt1 From $branches[$c].marks,$branches[$c].students where  $branches[$c].marks.usn=$branches[$c].students.usn and $branches[$c].marks.usn='$uss'  and $branches[$c].students.sem='$sem' and $branches[$c].marks.subcode='$arry[$counter]' ORDER BY $branches[$c].students.usn ASC";
                                  $result2 = $con->query($sql2);
                                   $m=mysqli_num_rows($result2);
                              //      echo "<script>alert('all sub=$m');</script>";
                                  if($m>0)
                                  {
                                  if($row2 = $result2->fetch_array())
                                  {
                                      
                                     $mark1=(int) $row2[0];
                                     // echo "<script>alert('mark sub=$mark1');</script>";
                                      if($mark1<9){ ?>
                                       <td style="color: #f00;text-shadow: 0px 0px 0px;"><?=$row2[0];?></td>
                                      <?php   }
                                      else
                                      {?>
                                      <td style="color: #000;"><?=$row2[0];?></td>   
                                     <?php }
                                      ?> 
                                <?php    if((int)$row2[1]!="")
                                {?>
                                     <td>  
                                <?php  $valz=(int)$row2[1]*100/(int)$row2[2];
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
                                              
                                              echo $row2[1]."/".$row2[2]." ".$finval;
                                              
                                              ?>
                                  
                                  </td>
                             
                                    <?php }
                                    else{ ?>
                                    <td>&nbsp;</td>
                                      
                             <?php  }   }
                                  }   
                                  else
                                  { ?>
                                     <td>&nbsp;</td><td>&nbsp;</td> 
                                 <?php }
                                       $counter++;
                                  }
                                 ?>
                             
                                                </tr>
                               <div class="clearfix"></div>
                               <?php $i++;
                               
                                      
                                  }
                               
                               $c++;
                               } ?>
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