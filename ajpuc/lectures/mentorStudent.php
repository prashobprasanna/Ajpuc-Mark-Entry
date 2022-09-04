<?php include("header.php");
      include('sidebar.php');
   extract($_REQUEST);
      $dbname1= "kvgenggco_".$_SESSION["dbnamez"];
      $branch=$dbname1;
      
      $branchs=strtoupper($_SESSION["dbnamez"]); //Only to display the department name
      
 //   $_SESSION["semss"]=$sem;
    $_SESSION["intern"]="1";
    $facname=$_SESSION['facname'];
$email=$_SESSION['email'];
         
//$dbname1 = "kvgenggco_".$branch;
//$branchs=strtoupper($branch);
//$con = new mysqli($servername1, $username1, $password1, $dbname1);


//if (isset($_POST["branch"]) && !empty($_POST["branch"])) {
//   $_SESSION["branch"]=$branch;    
//}else{  
//   $branch= $_SESSION["branch"];
//}

//$_SESSION["sem"]=$sem;
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
               
          
               
               <?php 
            
              //  $branch="kvgenggco_".$branch;
                                 // $sql1 = "SELECT students.USN,students.Name,students.sem From $branch.students,$branch.faculty where $branch.faculty.email='$email' and $branch.students.cordinator='$facname'";
                                   $sql1 ="SELECT students.USN,students.cordinator,sem From students,faculty WHERE faculty.Name='$facname' and cordinator='$facname' and  students.sem<9 and students.sem>0";
                                  $result10 = $con->query($sql1);
                                  $s10=mysqli_num_rows($result10);
                            //      echo "<script>alert('$s10');</script>";
                                 $var1=0;
                                  while($row10 = $result10->fetch_assoc())
                                  {
                                     $usnm[$var1]= $row10['USN'];
                                     $sem=$row10['sem'];
                                      $var1++;
                                  }
                    
               
                                     $_SESSION["sem"]=$sem;
                   $sqlsub= "SELECT distinct(marks.subcode) From $dbname1.marks,$dbname1.subjects where $dbname1.subjects.subcode=$dbname1.marks.subcode and $dbname1.marks.sem='$sem' and $dbname1.subjects.elective=0 ";
                                  $resultsub = $con->query($sqlsub);
                                   $s1=mysqli_num_rows($resultsub);
                             //   echo "<script>alert('my value: $s1');</script>";
                                
                                   while($rowsub = $resultsub->fetch_assoc())
                                   {
                                       $arry[]=$rowsub['subcode'];
                                       
                                   }
                                //   echo "<script>alert('my value: 0 $arry[0]  $arr[1] $arry[2]  $arry[3] $arry[4] $arry[5] $arry[6] );</script>"; 
                                   
                                    usort($arry, function ($a, $b){
                                        return substr($a, -2) - substr($b, -2);
                                    });
                                   
                               //     echo "<script>alert('my value: 0 $arry[0]  $arr[1] $arry[2]  $arry[3] $arry[4] $arry[5] $arry[6] $arry[7] 8= $arry[8]');</script>"; 
                                   
                                   
                                   
                                   
                                   //lab code
                                    $sqllab= "SELECT distinct(marks.subcode) From $dbname1.marks,$dbname1.subjects,$dbname1.students where $dbname1.subjects.subcode=$dbname1.marks.subcode and $dbname1.marks.sem='$sem' and $dbname1.subjects.elective=3 and $dbname1.marks.USN=$dbname1.students.USN ";
                                  $resultlab = $con->query($sqllab);
                                   $s2=mysqli_num_rows($resultlab);
                            //    echo "<script>alert('my lab: $s2');</script>";
                                  
                                   while($rowlab = $resultlab->fetch_assoc())
                                   {                
                                     $arry1[]=$rowlab['subcode'];
                                   }
                                    sort($arry1);
                                   $arry= array_merge($arry,$arry1);
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
                                  
                                  //  echo "<script>alert('dbname =$dbname / sem= $sem /');</script>";
                                 //$ssub= "SELECT DISTINCT($dbname1.electiveDetails.esubcode) FROM $dbname1.electiveDetails, $dbname1.subjects, $dbname1.marks where subjects.subcode=electiveDetails.esubcode and subjects.sem='$sem' and marks.subcode=subjects.subcode and marks.sem=subjects.sem and $dbname1.subjects.elective=1 and $dbname1.subjects.subcode in(select subcode from $dbname1.subfac,$dbname1.electiveDetails )";  
                                 $ssub= "SELECT DISTINCT($dbname1.electiveDetails.esubcode) FROM $dbname1.electiveDetails, $dbname1.subjects, $dbname1.marks where subjects.subcode=electiveDetails.esubcode and subjects.sem='$sem' and marks.subcode=subjects.subcode and marks.sem=subjects.sem and $dbname1.subjects.elective=1";
                                $rsub1 = $con->query($ssub);
                                $el=mysqli_num_rows($rsub1);
                                    // echo "<script>alert('elective=$el');</script>";
                                    unset($esub1);
                                    $sub1=0;
                                while($rsub = $rsub1->fetch_assoc())
                                  {
                                      $esub1[$sub1]=$rsub['esubcode'];
                                      $sub1++;  
                                  }
                                     
                                    
                                
                            //     $sqlel= "SELECT * from electiveDetails,electiveStudent where  electiveStudent.esusn='4KV14EC020' and electiveStudent.eselectid=electiveDetails.electId";
                              //    $resultel = $con->query($sqlel);
                                 //  $el=mysqli_num_rows($resultel);
                                //    echo "<script>alert('elective: $el usn= $uss  ');</script>";
                                     
                               
                             
                             //open elective subject
                              
                             $sqlol= "SELECT DISTINCT(kvgenggco_admin.electiveDetails.esubcode) FROM kvgenggco_admin.electiveDetails, $dbname1.subjects,$dbname1.marks where $dbname1.subjects.subcode=kvgenggco_admin.electiveDetails.esubcode and $dbname1.subjects.sem='$sem' and $dbname1.marks.subcode=$dbname1.subjects.subcode and $dbname1.marks.sem=$dbname1.subjects.sem and $dbname1.subjects.elective=2 and kvgenggco_admin.electiveDetails.fdept='$dbname1'";  
                             // $sqlol= "SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks,$branch.students,$branch.subjects,kvgenggco_admin.electiveStudent where $branch.subjects.subcode=$branch.marks.subcode and $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.subjects.elective=2 ";
                                  $resultol = $con->query($sqlol);
                                   $ol=mysqli_num_rows($resultol);
                          //        echo "<script>alert('open elective=$ol');</script>";
                                      //  unset($osub1);
                                      //  $oesub1=0;
                                     //   while($rosub = $resultol->fetch_assoc())
                                     //   {
                                     //       $osub1[$oesub1]=$rosub['esubcode'];
                                     //       $oesub1++;  
                                     //   }
                               
                               }  ?>

                                   
                                   
                                   
                                   
                                   
   <br/><br/>
         <div class="panel panel-info">
	          <div class="panel-heading">Internal Assessment Marks of <?=$sems?> Sem  [<?=$branchs?>] </div>
		         <div class="panel-body">
             <div class="table-responsive">
              <div class="box-body">
                  
                   <?php        if(isset($_POST["intern"]))
        {
          
        $_SESSION["intern"]=$_POST["intern"];
             
        } ?>        
               
                  <br>
                  <div class="col-sm-4">
                  <form action="mentorStudent.php" method="post">
                      <div class="col-sm-4">
                         <label style="font-size:16px; color:navy">Select Internal: </label>
                    </div>
                      <div class="col-sm-4">
                  <select name="intern">
                      
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
                  </div>
                  
                  
                  <div class="col-sm-4">
                      <label>
                         <?php if(isset($_POST["intern"]))
        { $internnnn=$_SESSION["intern"]; 
                      echo "$internnnn"; ?> Internal </label>
                        <?php } ?>
                  </div>
                   
                   
                   
                  <div class="col-sm-4">
                  <a href="graph.php" class="btn btn-secondary">Student Performance Analysis</a>
                  
                  <style>
                         .btn-secondary { 
                             float: right;
                              padding: 10px;
                              background: linear-gradient(#c671f1,#5b2577);
                              color: #ffffff;
                              font-weight: 600;
                              font-size: 15px;
                         }
                  </style>
                   </div>
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
                                   <th>Action</th>
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
                                  
                                  <td></td>
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
                                   <th>Action</th> 
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
                                  
                                  
                                  <td></td>
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
                                   <th>Action</th>
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
                                  
                                  <td></td>
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
                                   <th>Action</th> 
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
                                  
                                  
                                  <td></td>
                                   <!-- 12 -->
                                 </tr>
                                 
                                 
                              </thead>
                            <?php   }?>
                              
                                   
                                    
                                                            
                                  <tbody id="employee_data">
                                 <?php
                                  $i=1;
                                  
                            // all subjects     
                            $ms=0;
                                while($ms<$s10)
                                {
                                // $branch="kvgenggco_".$branch;
                               
                                  $sql = "SELECT students.usn,students.Name,students.sem From $branch.students,$branch.marks where $branch.marks.usn=$branch.students.usn and $branch.students.sem='$sem' and $branch.students.USN='$usnm[$ms]'";
                                  $result = $con->query($sql);
                                  
                                  if($row = $result->fetch_assoc())
                                  {
                                     $uss= $row['usn']; ?>
                                     <tr>
                                      <td><?=$uss?></td>
                                    <td><?=$row['Name'];?></td>
                                   
                                    
                                    <?php
                                    $counter=0;
                                  while($counter<$s1)
                                  {
                                      $inter=$_SESSION["intern"];
                                  //  echo "<script>alert('ifsj=$inter');</script>";
                                    
                                    if($inter==1)
                                 $sql2= "SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks,$branch.students where  $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.marks.subcode='$arry[$counter]' ORDER BY $branch.students.usn ASC";
                                 else if($inter==2)
                                 $sql2= "SELECT marks.int2,marks.att2,marks.tatt2 From $branch.marks,$branch.students where  $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.marks.subcode='$arry[$counter]' ORDER BY $branch.students.usn ASC";
                                 else if($inter==3)
                                 $sql2= "SELECT marks.int3,marks.att3,marks.tatt3 From $branch.marks,$branch.students where  $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.marks.subcode='$arry[$counter]' ORDER BY $branch.students.usn ASC";
                                 
                                 else if($inter==4)
                                 $sql2= "SELECT marks.int4 From $branch.marks,$branch.students where  $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.marks.subcode='$arry[$counter]' ORDER BY $branch.students.usn ASC";
                                    
                                    
                                    
                                 //$sql2= "SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks,$branch.students where  $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.marks.subcode='$arry[$counter]' ORDER BY $branch.students.usn ASC";
                                  $result2 = $con->query($sql2);
                                   $m=mysqli_num_rows($result2);
                                //    echo "<script>alert('all sub=$m');</script>";
                                  if($m>0)
                                  {
                                  if($row2 = $result2->fetch_array())
                                  {
                                     $mark1= $row2[0];
                                  //    echo "<script>alert('mark sub=$mark1');</script>";
                                      if($mark1<9){ ?>
                                       <td style="color: #f00;text-shadow: 0px 0px 0px;"><?=$row2[0];?></td>
                                      <?php   }
                                      else
                                      {?>
                                      <td style="color: #000;"><?=$row2[0];?></td>   
                                     <?php }
                                      ?> 
                                 
                                <?php    if($row2[1]!="")
                                { ?>
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
                                  
                                  
                                  
                                  
                                  
                                  // elective subject
                                 if($sem>4)
                                 {
                                  //  $ssub= "SELECT electiveDetails.subcode from $branch.electiveDetails,$branch.electiveStudent where  $branch.electiveStudent.esusn='$uss'";                                 
                                     
                                      $tsub=0;
                                 //    $el=0;
                               while($tsub<$el)
                               {
                               if($inter==1)
                        $sqlel= "SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks,$branch.electiveStudent where $branch.marks.usn=$branch.electiveStudent.esusn  and $branch.electiveStudent.esusn='$uss' and $branch.marks.subcode='$esub1[$tsub]'";
                 else if($inter==2)
                        $sqlel= "SELECT marks.int2,marks.att2,marks.tatt2 From $branch.marks,$branch.electiveStudent where $branch.marks.usn=$branch.electiveStudent.esusn  and $branch.electiveStudent.esusn='$uss' and $branch.marks.subcode='$esub1[$tsub]'";
                 else if($inter==3)
                        $sqlel= "SELECT marks.int3,marks.att3,marks.tatt3 From $branch.marks,$branch.electiveStudent where $branch.marks.usn=$branch.electiveStudent.esusn  and $branch.electiveStudent.esusn='$uss' and $branch.marks.subcode='$esub1[$tsub]'";
              else if($inter==4)
                        $sqlel= "SELECT marks.int4 From $branch.marks,$branch.electiveStudent where $branch.marks.usn=$branch.electiveStudent.esusn  and $branch.electiveStudent.esusn='$uss' and $branch.marks.subcode='$esub1[$tsub]'";
            
                                  $resultel = $con->query($sqlel);
                                   $ell=mysqli_num_rows($resultel);
                               //     echo "<script>alert('elective: $ell');</script>";
                                  if($ell>0){   
                                    if($rowel = $resultel->fetch_array())
                                  { 
                                      
                                      $mark1= $rowel[0];
                                  //    echo "<script>alert('mark sub=$mark1');</script>";
                                      if($mark1<9){ ?>
                                       <td style="color: #f00;text-shadow: 0px 0px 0px;"><?=$rowel[0];?></td>
                                      <?php   }
                                      else
                                      {?>
                                      <td style="color: #000;"><?=$rowel[0];?></td>   
                                     <?php }
                                      ?> 
                                 
                                <?php    if($rowel[1]!="")
                                { ?>
                                <td>  
                                <?php  $valz=(int)$rowel[1]*100/(int)$rowel[2];
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
                                              
                                              echo $rowel[1]."/".$rowel[2]." ".$finval;
                                              
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
                             
                             
                             
                             //open elective subject
                               if($inter==1)
                              $sqlol= "SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks,$branch.students,$branch.subjects,kvgenggco_admin.electiveStudent where $branch.subjects.subcode=$branch.marks.subcode and $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.subjects.elective=2 and kvgenggco_admin.electiveStudent.esusn='$uss'";
                                 else if($inter==2)
                              $sqlol= "SELECT marks.int2,marks.att2,marks.tatt2 From $branch.marks,$branch.students,$branch.subjects,kvgenggco_admin.electiveStudent where $branch.subjects.subcode=$branch.marks.subcode and $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.subjects.elective=2 and kvgenggco_admin.electiveStudent.esusn='$uss'";
                                    else if($inter==3)
                              $sqlol= "SELECT marks.int3,marks.att3,marks.tatt3 From $branch.marks,$branch.students,$branch.subjects,kvgenggco_admin.electiveStudent where $branch.subjects.subcode=$branch.marks.subcode and $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.subjects.elective=2 and kvgenggco_admin.electiveStudent.esusn='$uss'";
                                    else if($inter==4)
                              $sqlol= "SELECT marks.int4 From $branch.marks,$branch.students,$branch.subjects,kvgenggco_admin.electiveStudent where $branch.subjects.subcode=$branch.marks.subcode and $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.subjects.elective=2 and kvgenggco_admin.electiveStudent.esusn='$uss'";
                                  
                                  $resultol = $con->query($sqlol);
                                   $ol=mysqli_num_rows($resultol);
                                //   echo "<script>alert('open elective=$ol');</script>";
                                    if($rowol = $resultol->fetch_array())
                                  { 
                                      
                                      $mark1= $rowol[0];
                                  //    echo "<script>alert('mark sub=$mark1');</script>";
                                      if($mark1<9){ ?>
                                       <td style="color: #f00;text-shadow: 0px 0px 0px;"><?=$rowol[0];?></td>
                                      <?php   }
                                      else
                                      {?>
                                      <td style="color: #000;"><?=$rowol[0];?></td>   
                                     <?php }
                                      ?> 
                                 
                                <?php    if($rowol[1]!="")
                                { ?>
                                <td>  
                                <?php  $valz=(int)$rowol[1]*100/(int)$rowol[2];
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
                                              
                                              echo $rowol[1]."/".$rowol[2]." ".$finval;
                                              
                                              ?>
                                  
                                  </td>
                                  <?php }
                                    else{ ?>
                                    <td>&nbsp;</td>
                                      
                             <?php  }   
                                      
                                  }
                                if($ol==0){} 
                                   } ?>
                                   
                                   
                                     <td><a href="studentPerforma.php?susn=<?php echo $uss?>"><button>View Marks</button></a></td>
                               </tr>
                               <div class="clearfix"></div>
                               <?php  $i++; }
                               
                                $ms++; }
                               ?>
                               
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