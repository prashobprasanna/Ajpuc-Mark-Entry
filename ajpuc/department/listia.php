<?php include("header.php");
      include('sidebar.php');
      extract($_REQUEST);
      $dbname1= "kvgenggco_".$_SESSION["dbnamez"];
      $branch=$dbname1;
      
      $branchs=strtoupper($_SESSION["dbnamez"]); //Only to display the department name
      
    $_SESSION["semss"]=$sem;
    $_SESSION["intern"]=$yestane;

  $sems=$sem;
 // echo "<script>alert('my value: $sem');</script>";
        if($sem=="1C")
        $sems="1st Chemistry";
       else if($sem=="2C")
       $sems="2nd Chemistry";
           else if($sem=="1P")
       $sems="1st Physics";
           else if($sem=="2P")
       $sems="2nd Physics";
     
     
     
      if($sems>3)
       $sems=$sems."th";
       else if($sems==2)
       $sems=$sems."nd";
         else if($sems==3)
       $sems=$sems."rd";
        // else if($sems==1)
       //$sems=$sems."st";
         
//$dbname1 = "kvgenggco_".$branch;
//$branchs=strtoupper($branch);
//$con = new mysqli($servername1, $username1, $password1, $dbname1);


//if (isset($_POST["branch"]) && !empty($_POST["branch"])) {
//   $_SESSION["branch"]=$branch;    
//}else{  
//   $branch= $_SESSION["branch"];
//}

$_SESSION["sem"]=$sem;
//echo "<script>alert('$sem');</script>";
//echo "<script>alert('$branch');</script>";
?>


<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> 
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.2/css/mdb.min.css">
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
  <strong>Already Approved.</strong>
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
                if($sem<3)
               {
              $sqlsub= "SELECT distinct(subcode),kvgenggco_admin.subjects.Name from kvgenggco_admin.subjects where kvgenggco_admin.subjects.sem like '$sem' and kvgenggco_admin.subjects.elective=0 and kvgenggco_admin.subjects.subcode in(select subcode from kvgenggco_admin.subfac) ";          
                   
               }
               else
              $sqlsub= "SELECT distinct(marks.subcode),$dbname1.subjects.Name From $dbname1.marks,$dbname1.subjects where $dbname1.subjects.subcode=$dbname1.marks.subcode and $dbname1.marks.sem = '$sem' and $dbname1.subjects.elective=0";
                                  $resultsub = $con->query($sqlsub);
                                   $s1=mysqli_num_rows($resultsub);
                                echo "<script>alert('my reg svalue: $s1');</script>";
                                
                                   while($rowsub = $resultsub->fetch_assoc())
                                   {
                                       $arry[]=$rowsub['subcode'];
                                       $subnames[]=$rowsub['Name'];
                                          $subsub[]=$rowsub['subcode']." - ".$rowsub['Name']; 
                                   }
                                   //echo "<script>alert('my value: 0 $subnames[0]  $subnames[1] $subnames[2]  $subnames[3] $subnames[4] $subnames[5] $subnames[6] ');</script>"; 
                                   
                                    usort($arry, function ($a, $b){
                                        return substr($a, -2) - substr($b, -2);
                                    });
                                   
                               //     echo "<script>alert('my value: 0 $arry[0]  $arr[1] $arry[2]  $arry[3] $arry[4] $arry[5] $arry[6] $arry[7] 8= $arry[8]');</script>"; 
                                   
                                   
                                   
                                   
                                   //lab code
                                   if($sem<3)
               {
              $sqllab= "SELECT distinct(subcode),kvgenggco_admin.subjects.Name from kvgenggco_admin.subjects where kvgenggco_admin.subjects.sem like '$sem' and kvgenggco_admin.subjects.elective=3 AND kvgenggco_admin.subjects.subcode in(select subcode from kvgenggco_admin.subfac) "; 
                   
               }
               else        
                                    $sqllab= "SELECT distinct(marks.subcode),$dbname1.subjects.Name From $dbname1.marks,$dbname1.subjects,$dbname1.students where $dbname1.subjects.subcode=$dbname1.marks.subcode and $dbname1.marks.sem='$sem' and $dbname1.subjects.elective=3 and $dbname1.marks.USN=$dbname1.students.USN";
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
                                    $counter=0;
                                    $tot=0;
                                    $s1=$s1+$s2;
                                   
                                //    echo "<script>alert('my value: $s1');</script>";
                                   
                //********************** All student subject , elective and open electives**********************
                                
                                   $i=1;
                                  
                            // all subjects     
                               
                                  
                                  
                                  
                                  
                                  
                                  // elective subject
                                 if($sem>4)
                              {
                                 $ssub= "SELECT DISTINCT(esubcode),subjects.Name FROM `electiveDetails`,subjects,marks where subjects.subcode=electiveDetails.esubcode and subjects.sem='$sem' and marks.subcode=subjects.subcode and marks.sem=subjects.sem";  
                           $rsub1 = $con->query($ssub);
                           $el=mysqli_num_rows($rsub1);
                             unset($esub1);
                              $sub1=0;
                                while($rsub = $rsub1->fetch_assoc())
                                  {
                                      $esub1[$sub1]=$rsub['esubcode'];
                                       $subnameelective[$sub1]=$rsub['Name'];
                                        $subsubelective[]=$rsub['esubcode']." - ".$rsub['Name'];;
                                      $sub1++;  
                                  }
                                     if($sub1!=0)
                                    $subsub=array_merge($subsub,$subsubelective); 
                                
                            //     $sqlel= "SELECT * from electiveDetails,electiveStudent where  electiveStudent.esusn='4KV14EC020' and electiveStudent.eselectid=electiveDetails.electId";
                              //    $resultel = $con->query($sqlel);
                                 //  $el=mysqli_num_rows($resultel);
                                //    echo "<script>alert('elective: $el usn= $uss  ');</script>";
                                     
                               
                             
                             //open elective subject
                          
                             
                             $sqlol= "SELECT DISTINCT(kvgenggco_admin.electiveDetails.esubcode),$dbname1.subjects.Name FROM kvgenggco_admin.electiveDetails, $dbname1.subjects,$dbname1.marks where $dbname1.subjects.subcode=kvgenggco_admin.electiveDetails.esubcode and $dbname1.subjects.sem='$sem' and $dbname1.marks.subcode=$dbname1.subjects.subcode and $dbname1.marks.sem=$dbname1.subjects.sem and $dbname1.subjects.elective=2 and kvgenggco_admin.electiveDetails.fdept='$dbname1'";  
                              //$sqlol= "SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks,$branch.students,$branch.subjects,kvgenggco_admin.electiveStudent where $branch.subjects.subcode=$branch.marks.subcode and $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.subjects.elective=2 and kvgenggco_admin.electiveStudent.esusn='$uss'";
                                  $resultol = $con->query($sqlol);
                                   $ol=mysqli_num_rows($resultol);
                               //    echo "<script>alert('open elective=$ol');</script>";
                                    
                                    if($ol > 0)
                                    {
                                        $ol=1;
                                   if($rsube = $resultol->fetch_assoc())
                                  {
                                    $subopencode=$rsube['esubcode'];
                                    $suboelective=$rsube['Name'];
                                     $subsubopen[]=$rsube['esubcode']." - ".$rsube['Name'];
                                    }
                                    }
                                    
                                    if($ol!=0)
                                     $subsub=array_merge($subsub,$subsubopen); 
                               } 
                               
                               ?>

                                   
                                   
                                   
      
      
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
             
	          <div class="panel-heading">Internal Assessment Marks of <?=$sems?> Sem  [<?=$branchs?>] </div>
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
                          <a class="col-sm-4">
                               <h5><b><?php echo $wosm+1 . ".  ". $subsub[$wosm]; ?></b></h5>
                          </a>
                             
                              <?php 
                         
                              $wosm++;
                          }
                          
                          
                           /* Elective */
                          $wosm1=0;
                           $wosmsl1=$wosm ;
                          while($wosm1<$el)
                          { 
                          ?>
                          <a class="col-sm-4">
                               <h5><b><?php echo  $wosmsl1+1 . ".  ". $esub1[$wosm1] . " (E)  -  ". $subnameelective[$wosm1]; ?></b></h5>
                          </a>
                             
                              <?php 
                         
                              $wosm1++;
                              $wosmsl1++;
                          }
                         
                         
                         /* Open Elective */
                          $wosm2=0;
                          
                          if($wosm2<$ol)
                          {
                          $wosmsl2=$wosmsl1 ; ?>
                          <a class="col-sm-4">
                               <h5><b><?php echo $wosmsl2+1 . ".  ". $subopencode . " (OE)  -  ". $suboelective; ?></b></h5>
                          </a>
                             
                              <?php 
                         
                              $wosm2++;
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
                                     <th colspan=2 class="elect"><?= $subopencode  ?> (OE)</th> 
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
                                     <th colspan=2 class="elect"><?= $subopencode  ?> (OE)</th> 
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
                                  
                            // all subjects     
                                //  $branch="kvgenggco_".$branch;
                                 if( $sem=="1P")
                              { 
                                  $sem1="1";
                              
                                  $sql = "SELECT DISTINCT(students.usn),students.Name,students.sem,students.sec From $branch.students,$branch.marks where $branch.marks.usn=$branch.students.usn and $branch.students.sem='$sem1' AND $branch.marks.sem like '$sem1%' and $branch.students.cycle='Physics' order by $branch.students.sec asc";
                              }
                             else if( $sem=="1C")
                              { 
                                  $sem1="1";
                                  $sql = "SELECT DISTINCT(students.usn),students.Name,students.sem,students.sec From $branch.students,$branch.marks where $branch.marks.usn=$branch.students.usn and $branch.students.sem='$sem1' AND $branch.marks.sem like '$sem1%' and $branch.students.cycle='Chemistry' order by $branch.students.sec asc";
                              }
                              else if( $sem=="2P")
                              { 
                                  $sem1="2";
                              
                                  $sql = "SELECT DISTINCT(students.usn),students.Name,students.sem,students.sec From $branch.students,$branch.marks where $branch.marks.usn=$branch.students.usn and $branch.students.sem='$sem1' AND $branch.marks.sem like '$sem1%' and $branch.students.cycle='Physics' order by $branch.students.sec asc";
                              }
                             else if( $sem=="2C")
                              { 
                                  $sem1="2";
                                  $sql = "SELECT DISTINCT(students.usn),students.Name,students.sem,students.sec From $branch.students,$branch.marks where $branch.marks.usn=$branch.students.usn and $branch.students.sem='$sem1' AND $branch.marks.sem like '$sem1%' and $branch.students.cycle='Chemistry' order by $branch.students.sec asc";
                              }
                              else
                                  $sql = "SELECT DISTINCT(students.usn),students.Name,students.sem From $branch.students,$branch.marks where $branch.marks.usn=$branch.students.usn and $branch.students.sem='$sem'";
                                  $result = $con->query($sql);
                                
                                  $st2=mysqli_num_rows($result2);
                                //    echo "<script>alert('tot stu =$st2');</script>";
                                  while($row = $result->fetch_assoc())
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
                                 $sql2= "SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks,$branch.students where  $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.marks.subcode='$arry[$counter]' ORDER BY $branch.students.usn ASC";
                                 else if($_SESSION["intern"]==2)
                                 $sql2= "SELECT marks.int2,marks.att2,marks.tatt2 From $branch.marks,$branch.students where  $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.marks.subcode='$arry[$counter]' ORDER BY $branch.students.usn ASC";
                                 else if($_SESSION["intern"]==3)
                                 $sql2= "SELECT marks.int3,marks.att3,marks.tatt3 From $branch.marks,$branch.students where  $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.marks.subcode='$arry[$counter]' ORDER BY $branch.students.usn ASC";
                                 
                                  $result2 = $con->query($sql2);
                                   $m=mysqli_num_rows($result2);
                                //    echo "<script>alert('all sub=$m');</script>";
                                  if($m>0)
                                  {
                                  if($row2 = $result2->fetch_assoc())
                                  {
                                      if($_SESSION["intern"]==1)
                                    {
                                        $mark1= $row2['int1'];
                                        $ats=$row2['att1'];
                                        $tats=$row2['tatt1'];
                                    }
                                      else if($_SESSION["intern"]==2)
                                      {
                                       $mark1= $row2['int2'];
                                        $ats=$row2['att2'];
                                        $tats=$row2['tatt2'];
                                      }
                                        else if($_SESSION["intern"]==3)
                                        {
                                       $mark1= $row2['int3']; 
                                        $ats=$row2['att3'];
                                        $tats=$row2['tatt3'];
                                        }
                                   //   echo "<script>alert('mark sub=$mark1');</script>";
                                      if($mark1<9){ ?>
                                       <td style="color: #f00;text-shadow: 0px 0px 0px;"><?=$mark1;?></td>
                                      <?php   }
                                      else
                                      {?>
                                      <td style="color: #000;"><?=$mark1;?></td>   
                                     <?php }
                                      ?> 
                                 
                                <?php    if($ats!="")
                                { ?>
                                <td>  
                                <?php  $valz=(int)$ats*100/(int)$tats;
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
                                              
                                              echo $ats."/".$tats." ".$finval;
                                              
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
                               if($_SESSION["intern"]==1)
                        $sqlel= "SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks,$branch.electiveStudent where $branch.marks.usn=$branch.electiveStudent.esusn  and $branch.electiveStudent.esusn='$uss' and $branch.marks.subcode='$esub1[$tsub]'";
                          else if($_SESSION["intern"]==2)
                        $sqlel= "SELECT marks.int2,marks.att2,marks.tatt2 From $branch.marks,$branch.electiveStudent where $branch.marks.usn=$branch.electiveStudent.esusn  and $branch.electiveStudent.esusn='$uss' and $branch.marks.subcode='$esub1[$tsub]'";
                         else if($_SESSION["intern"]==3)
                        $sqlel= "SELECT marks.int3,marks.att3,marks.tatt3 From $branch.marks,$branch.electiveStudent where $branch.marks.usn=$branch.electiveStudent.esusn  and $branch.electiveStudent.esusn='$uss' and $branch.marks.subcode='$esub1[$tsub]'";
                        
            
                                  $resultel = $con->query($sqlel);
                                   $ell=mysqli_num_rows($resultel);
                               //     echo "<script>alert('elective: $ell');</script>";
                                  if($ell>0){   
                                    if($rowel = $resultel->fetch_assoc())
                                  { 
                                      
                                        if($_SESSION["intern"]==1)
                                    {
                                        $mark1= $rowel['int1'];
                                        $ats=$rowel['att1'];
                                        $tats=$rowel['tatt1'];
                                    }
                                      else if($_SESSION["intern"]==2)
                                      {
                                       $mark1= $rowel['int2'];
                                        $ats=$rowel['att2'];
                                        $tats=$rowel['tatt2'];
                                      }
                                        else if($_SESSION["intern"]==3)
                                        {
                                       $mark1= $rowel['int3']; 
                                        $ats=$rowel['att3'];
                                        $tats=$rowel['tatt3'];
                                        }
                                      
                                      
                                //      $mark1= $rowel['int1'];
                                  //    echo "<script>alert('mark sub=$mark1');</script>";
                                      if($mark1<9){ ?>
                                       <td style="color: #f00;text-shadow: 0px 0px 0px;"><?=$mark1;?></td>
                                      <?php   }
                                      else
                                      {?>
                                      <td style="color: #000;"><?=$mark1;?></td>   
                                     <?php }
                                      ?> 
                                 
                                <?php    if($ats!="")
                                { ?>
                                <td>  
                                <?php  $valz=(int)$ats*100/(int)$tats;
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
                                              
                                              echo $ats."/".$tats." ".$finval;
                                              
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
                                  if($_SESSION["intern"]==1) 
                              $sqlol= "SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks,$branch.students,$branch.subjects,kvgenggco_admin.electiveStudent where $branch.subjects.subcode=$branch.marks.subcode and $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.subjects.elective=2 and kvgenggco_admin.electiveStudent.esusn='$uss'";
                                 if($_SESSION["intern"]==2) 
                              $sqlol= "SELECT marks.int2,marks.att2,marks.tatt2 From $branch.marks,$branch.students,$branch.subjects,kvgenggco_admin.electiveStudent where $branch.subjects.subcode=$branch.marks.subcode and $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.subjects.elective=2 and kvgenggco_admin.electiveStudent.esusn='$uss'";
                                  else if($_SESSION["intern"]==3) 
                              $sqlol= "SELECT marks.int3,marks.att3,marks.tatt3 From $branch.marks,$branch.students,$branch.subjects,kvgenggco_admin.electiveStudent where $branch.subjects.subcode=$branch.marks.subcode and $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.subjects.elective=2 and kvgenggco_admin.electiveStudent.esusn='$uss'";
                               
                                  $resultol = $con->query($sqlol);
                                   $ol=mysqli_num_rows($resultol);
                                //   echo "<script>alert('open elective=$ol');</script>";
                                    if($rowol = $resultol->fetch_assoc())
                                  { 
                                     
                                          if($_SESSION["intern"]==1)
                                    {
                                        $mark1= $rowol['int1'];
                                        $ats=$rowol['att1'];
                                        $tats=$rowol['tatt1'];
                                    }
                                      else if($_SESSION["intern"]==2)
                                      {
                                       $mark1= $rowol['int2'];
                                        $ats=$rowol['att2'];
                                        $tats=$rowol['tatt2'];
                                      }
                                        else if($_SESSION["intern"]==3)
                                        {
                                       $mark1= $rowol['int3']; 
                                        $ats=$rowol['att3'];
                                        $tats=$rowol['tatt3'];
                                        } 
                                    //  $mark1= $rowol['int1'];
                                  //    echo "<script>alert('mark sub=$mark1');</script>";
                                      if($mark1<9){ ?>
                                       <td style="color: #f00;text-shadow: 0px 0px 0px;"><?=$mark1;?></td>
                                      <?php   }
                                      else
                                      {?>
                                      <td style="color: #000;"><?=$mark1;?></td>   
                                     <?php }
                                      ?> 
                                 
                                <?php    if($ats!="")
                                { ?>
                                <td>  
                                <?php  $valz=(int)$ats*100/(int)$tats;
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
                                              
                                              echo $ats."/".$tats." ".$finval;
                                              
                                              ?>
                                  
                                  </td>
                                  <?php }
                                    else{ ?>
                                    <td>&nbsp;</td>
                                      
                             <?php  }   
                                      
                                  }
                                if($ol==0){} 
                                   } ?>
                                   
                               </tr>
                               <div class="clearfix"></div>
                               <?php  $i++; } ?>
                              </tbody>
                              
                              
                              
                               <?php 
                               
                               
                               
                            

                              ?>
                              
                              
                           </table>
                           
                           </div>
                           </div>
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