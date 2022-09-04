<?php include("header.php");
      include('sidebar.php');
extract($_REQUEST);
  $facmail=$_SESSION["email"];
   
 $dbname1= "kvgenggco_".$_SESSION["dbnamez"];
      $branch=$dbname1;
      $branchs=strtoupper($_SESSION["dbnamez"]);
      
      
      $_SESSION["intern"]="1";
     
      $sems=$sem;
      if($sems>3)
       $sems=$sems."th";
       else if($sems==2)
       $sems=$sems."nd";
         else if($sems==3)
       $sems=$sems."rd";
         else if($sems==1)
       $sems=$sems."st";
      echo "<script>alert('$dbname1');</script>";
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
               <a href="selectSubject.php" class="btn btn-primary pull-right"> Add IA</a>
               
                     
               <?php 
               
               
               if($sem<3)
             {
            //  $sqlsub= "SELECT distinct(marks.subcode) From $dbname1.marks,$dbname1.subjects, $dbname1.faculty, $dbname1.subfac where $dbname1.subjects.subcode=$dbname1.marks.subcode and $dbname1.subjects.sem=$dbname1.marks.sem and $dbname1.marks.sem='$sem' and $dbname1.subjects.elective=0 and $dbname1.faculty.idn=$dbname1.subfac.idn and $dbname1.subjects.subcode=$dbname1.subfac.subcode and $dbname1.subjects.sem=$dbname1.subfac.sem and  $dbname1.faculty.email='$facmail' and $dbname1.marks.subcode not like '%L%'";
              $sqlsub= "SELECT distinct(subjects.subcode) From $dbname1.subjects, $dbname1.faculty, $dbname1.subfac where $dbname1.subjects.sem='$sem' and $dbname1.subjects.elective=0 and $dbname1.faculty.idn=$dbname1.subfac.idn and $dbname1.subjects.subcode=$dbname1.subfac.subcode and $dbname1.subjects.sem=$dbname1.subfac.sem and  $dbname1.faculty.email='$facmail'";
                $resultsub = $con->query($sqlsub);
                                   $s1=mysqli_num_rows($resultsub);
                                 //  unset($arry);
                         //    echo "<script>alert('regular my value: $s1');</script>";
                                
                                   while($rowsub = $resultsub->fetch_assoc())
                                   {
                                       $arry[]=$rowsub['subcode'];
                                       
                                   }
                                   
             }
             else if($sem>2)
             {
                
              
              $sqlsub= "SELECT distinct(subjects.subcode) From $deptbr.subjects, $dbname1.faculty, $dbname1.subfac where $deptbr.subjects.sem='$sem' and $deptbr.subjects.elective=0 and $dbname1.faculty.idn=$dbname1.subfac.idn and $deptbr.subjects.subcode=$dbname1.subfac.subcode and $deptbr.subjects.sem=$dbname1.subfac.sem and  $dbname1.faculty.email='$facmail'";    
            
            
                                  $resultsub = $con->query($sqlsub);
                                   $s1=mysqli_num_rows($resultsub);
                                 //  unset($arry);
                          //   echo "<script>alert('regular my value: $s1');</script>";
                                
                                   while($rowsub = $resultsub->fetch_assoc())
                                   {
                                       $arry[]=$rowsub['subcode'];
                                       
                                   }
                                   
                                    
             }
                             //      echo "<script>alert('my value: 0 $arry[0]  $arr[1] $arry[2]  $arry[3] $arry[4] $arry[5] $arry[6] );</script>"; 
                                   
                                    usort($arry, function ($a, $b){
                                        return substr($a, -2) - substr($b, -2);
                                    });
                                   
                               //     echo "<script>alert('my value: 0 $arry[0]  $arr[1] $arry[2]  $arry[3] $arry[4] $arry[5] $arry[6] $arry[7] 8= $arry[8]');</script>"; 
                                   
                                   
                                   
                                   
                     //******************************lab code
                             //   $sqllab= "SELECT distinct(marks.subcode) From $dbname1.marks,$dbname1.subjects,$dbname1.students where $dbname1.subjects.subcode=$dbname1.marks.subcode and $dbname1.marks.sem='$sem' and $dbname1.subjects.elective=0 and $dbname1.marks.USN=$dbname1.students.USN  and $dbname1.marks.subcode like '%L%'";
                           
                             /*     $sqllab= "SELECT distinct(subjects.subcode) From $dbname1.subjects, $dbname1.faculty, $dbname1.subfac where $dbname1.subjects.sem='$sem' and $dbname1.subjects.elective=0 and $dbname1.faculty.idn=$dbname1.subfac.idn and $dbname1.subjects.subcode=$dbname1.subfac.subcode and $dbname1.subjects.sem=$dbname1.subfac.sem and  $dbname1.faculty.email='$facmail' and $dbname1.subjects.subcode like '%L%'";
                                  $resultlab = $con->query($sqllab);
                                   $s2=mysqli_num_rows($resultlab);
                              
                                  
                                   while($rowlab = $resultlab->fetch_assoc())
                                   {                
                                       $labbbb=$rowlab['subcode'];
                                      
                                     $arry1[]=$rowlab['subcode'];
                                   }
                                    sort($arry1);
                                    
                                  // echo "<script>alert('arry $arry[0] ');</script>";
                                 
                                    if(!empty($arry) && !empty($arry1)) 
                                    {
                                   $arry= array_merge($arry,$arry1);
                                 
                                    }
                                    else if (empty($arry)) 
                                    $arry=$arry1;
                               
                                    
                            
                             
                                    $counter=0;
                                    $tot=0;
                                    $s1=$s1+$s2;
                                 
                         
                                   
                //********************** All student subject , elective and open electives**********************
                                
                                   $i=1;
                                  
                            // all subjects     
                               
                                  
                                  */
                                  
                                  ?>
                         

                                   
                                   
                                   
                                   
                                   
   <br/><br/>
         <div class="panel panel-info">
	          <div class="panel-heading">Internal Assessement Marks of <?=$sems?> Sem  [<?=$branchs?>] </div>
		         <div class="panel-body">
             <div class="table-responsive">
              <div class="box-body">
                           <table id="example1" class="table table-bordered table-striped">
                               
                             
                              
                              <?php if($ol<1 && $el<1)
                              {
                              
                            //   echo "<script>alert('both ella heading=$el');</script>";
                              ?>
                              <thead> 
                              <tr>
                              <th>USN </th>
                              <th>Student Name</th>
                               <th>Sec</th>
                            <?php   $kk=0;
                               
                                while($kk<$s1)
                               {
                            //     echo "<script>alert('my lab: $kk / $arry[$kk]');</script>";
                               ?>
                                  <th colspan=2><?=$arry[$kk]?> </th>
                                  <?php 
                                   
                                   $kk++;
                               } 
                                  
                                  ?>  
                              </tr>
                              
                              <tr>
                                    <th></th>
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
                               <th>Sec</th>
                              
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
                               <th>Sec</th>
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
                               <th>Sec</th>
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
                                  $semold=$sem;
                                  if($sem=='1C')
                                  {
                                  $sem=1;
                                  $cycle='Chemistry';
                                  }
                                  else if($sem=='1P')
                                  {
                                  $sem=1;
                                  $cycle='Physics';
                                  }
                                  
                                  else if($sem=='2C')
                                  {
                                  $sem=2;
                                  $cycle='Chemistry';
                                  }
                                  else if($sem=='2P')
                                  {
                                  $sem=2;
                                  $cycle='Physics';
                                  }
                                // $deptbr='kvgenggco_csis';
                          //         echo "<script>alert('branch=$deptbr / sem=$sem / cycle=$cycle / oldsem=$semold');</script>";
                                   
                                   
                            // all subjects     
                                //  $branch="kvgenggco_".$branch;
                              
                               if($sem<3)
                                {
                                       $sql = "SELECT DISTINCT(students.usn),students.Name,students.sem,students.sec From $deptbr.students,$deptbr.marks where $deptbr.marks.usn=$deptbr.students.usn and $deptbr.students.sem='$sem' and $deptbr.students.cycle='$cycle' and $deptbr.marks.sem='$semold' order by $deptbr.students.usn";
                                }
                                
                                else if($sem > 2)
                                {
                                 $sql = "SELECT DISTINCT(students.usn),students.Name,students.sem,students.sec From $deptbr.students,$deptbr.marks where $deptbr.marks.usn=$deptbr.students.usn and $deptbr.students.sem='$sem' and $deptbr.marks.sem='$semold' order by $deptbr.students.usn, $deptbr.students.sec ";
                                }
                                
                                 
                                  $result = $con->query($sql);
                                  $st2=mysqli_num_rows($result);
                             //      echo "<script>alert('tot stu =$st2');</script>";
                                  while($row = $result->fetch_assoc())
                                  {
                                     
                                     $uss= $row['usn']; ?>
                                     <tr>
                                      <td><?=$uss?></td>
                                    <td><?=$row['Name'];?></td>
                                    <td><?=strtoupper($row['sec'])?></td>
                                    
                                    <?php
                                    $counter=0;
                                  while($counter<$s1)
                                  {
                                    
                                 $sql2= "SELECT marks.int1,marks.att1,marks.tatt1 From $deptbr.marks,$deptbr.students where  $deptbr.marks.usn=$deptbr.students.usn and $deptbr.marks.usn='$uss'  and $deptbr.students.sem='$sem' and $deptbr.marks.sem='$semold' and $deptbr.marks.subcode='$arry[$counter]' ORDER BY $deptbr.students.usn ASC";
                                  $result2 = $con->query($sql2);
                                   $m=mysqli_num_rows($result2);
                                //    echo "<script>alert('all sub=$m');</script>";
                                  if($m>0)
                                  {
                                  if($row2 = $result2->fetch_assoc())
                                  {
                                     $mark1= $row2['int1'];
                                  //    echo "<script>alert('mark sub=$mark1');</script>";
                                      if($mark1<9){ ?>
                                       <td style="color: #f00;text-shadow: 0px 0px 0px;"><?=$row2['int1'];?></td>
                                      <?php   }
                                      else
                                      {?>
                                      <td style="color: #000;"><?=$row2['int1'];?></td>   
                                     <?php }
                                      ?> 
                                 
                                <?php    if($row2['att1']!="")
                                { ?>
                                <td>  
                                <?php  $valz=(int)$row2['att1']*100/(int)$row2['tatt1'];
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
                                              
                                              echo $row2['att1']."/".$row2['tatt1']." ".$finval;
                                              
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
                                  
                                  
                                  
                                  
                                  
                                  // elective subject
                                 if($sem>4)
                                 {
                                  //  $ssub= "SELECT electiveDetails.subcode from $branch.electiveDetails,$branch.electiveStudent where  $branch.electiveStudent.esusn='$uss'";                                 
                                     
                                      $tsub=0;
                                 //    $el=0;
                               while($tsub<$el)
                               {
                            
                        $sqlel= "SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks,$branch.electiveStudent where $branch.marks.usn=$branch.electiveStudent.esusn  and $branch.electiveStudent.esusn='$uss' and $branch.marks.subcode='$esub1[$tsub]'";
            
                                  $resultel = $con->query($sqlel);
                                   $ell=mysqli_num_rows($resultel);
                               //     echo "<script>alert('elective: $ell');</script>";
                                  if($ell>0){   
                                    if($rowel = $resultel->fetch_assoc())
                                  { 
                                      
                                      $mark1= $rowel['int1'];
                                  //    echo "<script>alert('mark sub=$mark1');</script>";
                                      if($mark1<9){ ?>
                                       <td style="color: #f00;text-shadow: 0px 0px 0px;"><?=$rowel['int1'];?></td>
                                      <?php   }
                                      else
                                      {?>
                                      <td style="color: #000;"><?=$rowel['int1'];?></td>   
                                     <?php }
                                      ?> 
                                 
                                <?php    if($rowel['att1']!="")
                                { ?>
                                <td>  
                                <?php  $valz=(int)$rowel['att1']*100/(int)$rowel['tatt1'];
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
                                              
                                              echo $rowel['att1']."/".$rowel['tatt1']." ".$finval;
                                              
                                              ?>
                                  
                                  </td>
                                  <?php }
                                    else
                                    { ?>
                                    <td>&nbsp;</td>
                                      
                             <?php  }   
                                      
                                  }
                                  }
                                  else 
                                  {
                                  ?>
                                    <td>&nbsp;</td><td>&nbsp;</td>
                                    
                                   <?php } 
                                   
                             $tsub++;  }
                             
                             
                            // echo "<script>alert('before open elective=$uss');</script>";
                             //open elective subject
                              //  $sqlol="select * from kvgenggco_admin.electiveStudent,kvgenggco_admin.electiveDetails, $dbname1.subjects, kvgenggco_csis.marks where kvgenggco_admin.electiveStudent.eselectid=kvgenggco_admin.electiveDetails.electId and kvgenggco_admin.electiveStudent.dept='$dbname1' and $dbname1.subjects.subcode=electiveDetails.esubcode and $dbname1.subjects.sem='$sem' and $dbname1.subjects.elective=2 kvgenggco_admin.electiveStudent.esusn='$uss' and kvgenggco_csis.marks.subcode=electiveDetails.esubcode and kvgenggco_csis.marks.usn=electiveStudent.esusn";
                                
                             // $sqlol= "SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks,$branch.students,$branch.subjects,kvgenggco_admin.electiveStudent where $branch.subjects.subcode=$branch.marks.subcode and $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.subjects.elective=2 and kvgenggco_admin.electiveStudent.esusn='$uss'";
                            
                              $sqlol= "SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks,$branch.students,$branch.subjects,kvgenggco_admin.electiveStudent,kvgenggco_admin.electiveDetails, $branch.faculty  where $branch.subjects.subcode=$branch.marks.subcode and $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.subjects.elective=2 and kvgenggco_admin.electiveStudent.esusn='$uss' and $branch.faculty.idn=kvgenggco_admin.electiveDetails.eidn and $branch.subjects.subcode=kvgenggco_admin.electiveDetails.esubcode and $branch.faculty.email='$facmail'";

                                  $resultol = $con->query($sqlol);
                                   $oll=mysqli_num_rows($resultol);
                          //         echo "<script>alert('open elective 2=$oll');</script>";
                                    if($rowol = $resultol->fetch_assoc())
                                  { 
                                      
                                      $mark1= $rowol['int1'];
                                  //    echo "<script>alert('mark sub=$mark1');</script>";
                                      if($mark1<9){ ?>
                                       <td style="color: #f00;text-shadow: 0px 0px 0px;"><?=$rowol['int1'];?></td>
                                      <?php   }
                                      else
                                      {?>
                                      <td style="color: #000;"><?=$rowol['int1'];?></td>   
                                     <?php }
                                      ?> 
                                 
                                <?php    if($rowol['att1']!="")
                                { ?>
                                <td>  
                                <?php  $valz=(int)$rowol['att1']*100/(int)$rowol['tatt1'];
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
                                              
                                              echo $rowol['att1']."/".$rowol['tatt1']." ".$finval;
                                              
                                              ?>
                                  
                                  </td>
                                  <?php }
                                    else{ ?>
                                    <td>&nbsp;</td>
                                      
                             <?php  }   
                                      
                                  }
                                if($ol>0 && $oll==0){
                                    ?> <td></td>
                                    <td></td>
                                    <?php
                                } 
                               else {
                                   
                                } 
                                   } ?>
                                   
                               </tr>
                               <div class="clearfix"></div>
                               <?php  $i++; } ?>
                              </tbody>
                              
                              
                              
                               <?php 
                               
                               
                               
                            

                              ?>
                              
                              
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