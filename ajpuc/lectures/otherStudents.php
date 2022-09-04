<?php 

include('header.php');
include('sidebar.php');
include('dbconfig.php');
extract($_REQUEST);
$facmail=$_SESSION["email"];


 
if($_POST["subject1"]!="")
{
    $sub=explode('@',$subject1);
    $sbcde=$sub[0];
    $sdeptt=$sub[1];
    
    $_SESSION["subcodee"]=$sbcde;
    $_SESSION["sdept"]=$sdeptt;
    
    $ssubcodee= $_SESSION["subcodee"];
    $sdeptt= $_SESSION["sdept"];
} 


else{
   $sdeptt= $_SESSION["sdept"];
   $ssubcodee= $_SESSION["subcodee"];
}



$sbdept=$sdeptt;                            // $_SESSION["sbdept"]; //selected subject name
$ldept="kvgenggco_".$_SESSION["dbnamez"];   //login department name

 $_SESSION["sbdept"]=$sbdept;
echo "<script>alert('$sbdept');</script>";



 if($yestane==1)
 $yes="1st";
 else if(($yestane==2))
 $yes="2nd";
else if(($yestane==3))
 $yes="3rd";
else if(($yestane==4))
 $yes="4th";

$inter;

//$sq1zz="SELECT `subjects`.`Name` AS 'Sub Name',`subjects`.`subcode` AS 'Sub Code',`subjects`.sem,`faculty`.`Name` AS 'Faculty Name',subfac.sec FROM `subjects`,`faculty`,subfac WHERE subjects.subcode=subfac.subcode AND faculty.idn=subfac.idn AND faculty.email="."'$facmail'";
//$sq1zz="SELECT `subjects`.`Name` AS 'Sub Name' FROM `subjects`,`faculty`,subfac WHERE subjects.subcode=subfac.subcode AND faculty.idn=subfac.idn AND faculty.email="."'$facmail'";
//$_SESSION["subcde"]=$subcodezz;
//$_SESSION["sems"]=$semzz;
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 

<?php
//$res=$con->query($ql);
?>



<script>
function savemrk()
{
   

                var susn = [];
                var scode = [];
                var sint1 = [];
                var sint2 = [];
                var sint3 = [];
                var sint4=[];
                var savgint=[];
                var satt1 = [];
                var satt2 = [];
                var satt3 = [];
                var savgatt=[];
                var statt1 = [];
                var statt2 = [];
                var statt3 = [];
                
                    var sasgmt = [];
                var stotIA=[]; 
                
                var sumarks=[];
                var stmarks=[];
                var ssem = [];
               
            
                $('.usn').each(function(){
                    susn.push($(this).text());
                });
                 $('.subcode').each(function(){
                    scode.push($(this).text());
                });
                
                 $('.sem').each(function(){
                    ssem.push($(this).text());
                });
                
                $('.int1').each(function(){
                    sint1.push($(this).text());
                });
                $('.int2').each(function(){
                    sint2.push($(this).text());
                });
                $('.int3').each(function(){
                    sint3.push($(this).text());
                    
                });
                
                $('.aint4').each(function(){
                    sint4.push($(this).text());
                    
                });
                
                $('.avgint').each(function(){
                    savgint.push($(this).text());
                });
                
                $('.att1').each(function(){
                    satt1.push($(this).text());
                });
                $('.att2').each(function(){
                    satt2.push($(this).text());
                });
                $('.att3').each(function(){
                    satt3.push($(this).text());
                });
                
                $('.avgatt').each(function(){
                    savgatt.push($(this).text());
                });
                
                $('.tatt1').each(function(){
                    statt1.push($(this).text());
                });
                $('.tatt2').each(function(){
                    statt2.push($(this).text());
                });
                $('.tatt3').each(function(){
                    statt3.push($(this).text());
                });
                
                
                      $('.asgmt').each(function(){
                    sasgmt.push($(this).text());
                });
                
                 $('.totIA').each(function(){
                    stotIA.push($(this).text());
                });
                
                
                $('.umarks').each(function(){
                    sumarks.push($(this).text());
                });
                
                $('.tmarks').each(function(){
                    stmarks.push($(this).text());
                });
                
                
               
                
                $.ajax({
                    url:"insertOtherMarks.php",
                    method:"POST",
                //    data:{ondu:ondu}, 
        data:{susn:susn,scode:scode,ssem:ssem,sint1:sint1,sint2:sint2,sint3:sint3,sint4:sint4,savgint:savgint,savgatt:savgatt,satt1:satt1,satt2:satt2,satt3:satt3,statt1:statt1,statt2:statt2,statt3:statt3,sasgmt:sasgmt,stotIA:stotIA,sumarks:sumarks,stmarks:stmarks},
                    success:function(data)
                    {
                        alert("Marks Updated Succesfully");
                        document.location.reload();
                    },
                    error: function(err) {
        alert(err);
        }
        
                });
}
</script>

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Add Internal Assessment Marks
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
         
         
<!-- Internal On selection change script start-->

<script type="text/javascript">
   function myfunction(){
    internal = document.getElementById('myselect').value;
    location.href="?internal="+internal;
   }
  </script>
  
<!-- Internal On selection change script end-->

            <div class="panel panel-info">
               <div class="panel-heading">Add IA Marks </div>
               <div class="panel-body box-body">
                   
                
                   <p>
                     <table>
                       <?php
                       
                      
                       
                                   $sq1z="SELECT $sbdept.subjects.`Name` AS 'Sub Name', $sbdept.subjects.`subcode` AS 'Sub Code', $sbdept.subjects.sem, $ldept.faculty.`Name` AS 'Faculty Name', $ldept.subfac.sec FROM $sbdept.subjects, $ldept.faculty,$ldept.subfac WHERE $sbdept.subjects.subcode=$ldept.subfac.subcode AND $ldept.faculty.idn=$ldept.subfac.idn AND $ldept.faculty.email="."'$facmail' and $sbdept.subjects.subcode="."'$ssubcodee' and $ldept.subfac.sdept='$sdeptt'";
                                    $abc=0;
                                  $resultz = $con->query($sq1z);
                                  while($rowz = $resultz->fetch_assoc()){
                                       $secs[]=$rowz['sec'];
                                       $semm = $rowz['sem'];
                                      if($abc==0)
                                      {
                                       $abc=1;  
                                      $secs=$rowz['sec'];
                                  $subs=$rowz['Sub Code'];?>
                                  
                                    <div class="col-sm-2">
                                          <label>Subject Name :</label>
                                    </div>
                                    <div class="col-sm-6">
                                          <label><?=$rowz['Sub Name'];?></label>
                                   </div>
                                       <div class="clearfix"></div>                             
                                    <div class="col-sm-2">
                                          <label>Subject Code :</label>
                                    </div>
                                    <div class="col-sm-6">
                                          <label><?=$rowz['Sub Code'];?></label>
                                   </div>
                                       <div class="clearfix"></div>    
                                                                    
                                    <div class="col-sm-2">
                                          <label>Sem :</label>
                                    </div>
                                    <div class="col-sm-6">
                                          <label><?=$rowz['sem'];?></label>
                                   </div>
                                       <div class="clearfix"></div>    
                                  
                                 <div class="col-sm-2">
                                          <label>Section :</label>
                                    </div>
                                    <?php }?>
                                    <div class="col-sm-1">
                                          <label><?=$rowz['sec'];?></label>
                                   </div>
                                  
                                <?php
                                     
                                }
                               
                                ?>
                                       
                                   <div class="clearfix"></div>  
                                    <div class="col-sm-2">
                                         <label>Internal :</label>    
                                    </div>
                                       <div class="col-sm-3">
                                          
                                         <label style="color: #0074da;font-size: 17px;"><?= $yes ?> Internal </label>    
                                    </div>   
                                    
                                      <div class="clearfix"></div>  
                                
                                </table>     
                   
                  
                  
                  
                                <table>
                                    
                                    <div style="display:none"></div>
                                     <div class="col-sm-2">
                                          <label>Select Internal :</label>
                                    </div>
                                    <div class="col-sm-4">
                                        
                                         <select id="myselect" name="intern" onchange="myfunction()">
                                            <option value="5" <?php if($_GET['internal']== 5 ) echo "selected";  ?> > All </option>
                                            <option value="1" <?php if($_GET['internal']== 1 ) echo "selected"; ?> > 1st Internal </option>
                                            <option value="2" <?php if($_GET['internal']== 2 ) echo "selected"; ?> > 2nd Internal </option>
                                            <option value="3" <?php if($_GET['internal']== 3 ) echo "selected"; ?> > 3rd Internal </option>
                                            <option value="4" <?php if($_GET['internal']== 4 ) echo "selected"; ?> > 4th Internal </option>
                                        </select> 
                                
                                   </div>
                                   
                                   
                                    <div class="col-sm-2">
                                          <label>Total Classes:</label>
                                    </div>
                                    <div class="col-sm-4" >
                                         
                                       
                                                <input type="text" class="className" id="t" value="" style="padding:5px 10px;"><br><br>
                                            <?php    if($yestane==1)
                                            {?>
                                                <script>$(document).ready(function () {$('.className').change(function () {$('.tatt1').text(this.value);});});</script>
                                        <?php    }
                                          else if($yestane==2)
                                          {
                                        ?>    
                                              <script>$(document).ready(function () {$('.className').change(function () {$('.tatt2').text(this.value);});});</script>
                                                <?php    }
                                            else if($yestane==3)
                                          {
                                        ?>    
                                              <script>$(document).ready(function () {$('.className').change(function () {$('.tatt3').text(this.value);});});</script>
                                                <?php    }
                                                ?>
                                        
                                   </div>
                                   
                                 <div class="clearfix"></div>  
                           <br />
                           
                               <!-- Internal On selection change start-->
                               
                                               
                                
                                 <?php
                                if (isset($_GET['internal'])) {
                                    $internn = $_GET['internal'];
                                    $tota=$_GET['tota'];
                                }
                                else{
                                    $internn = 5;
                                    $tota=$_GET['tota'];
                                    //echo $val;
                                }
                                ?>
                                
                                <!-- Internal On selection change end-->
                           
                      
                   </table>
                   
                   
                   
                   </p>
                     <table id="example1" class="table table-bordered table-striped">
                          <tr>
                                <th>USN</th>
                              <th>Name</th>
                                <?php 
                               
                                if($sem==1 || $sem==3)
                                $outof="/30";
                                else
                                $outof="/15";
                               
                              if($internn == 5 )
                              {?>
                                
                                <th style="color:blue">IA1 <span style="color: #ff0000;font-size: 17px;"><?=$outof?></span></th>
                                <th style="color:blue">TOT_CLS</th>                              
                                <th style="color:blue">AT1</th>
                                
                                <th style="color:green">IA2 <span style="color: #ff0000;font-size: 17px;"><?=$outof?></span></th>
                                <th style="color:green">TOT_CLS</th>                              
                                <th style="color:green">AT2</th>                              
                              
                                <th style="color:violet">IA3 <span style="color: #ff0000;font-size: 17px;"><?=$outof?></span></th>
                                <th style="color:violet">TOT_CLS</th>                              
                                <th style="color:violet">AT3</th>
                              
                                <th style="color:green">IA4</th>                              
                              
                                  <th style="color:#7E354D">AVG_IA</th>
                                  
                                  
                                       <th style="color:#7E354D">ASGMT</th>
                                      <th style="color:#7E354D">TOT_IA</th>
                                  
                                <th style="color:#7E354D">% AT</th>                              
                                <th style="color:olive">SEE_MARKS</th>
                                <th style="color:steelblue">TOT_MARKS</th>
                        
                        <?php }
                               
                                 else if($internn == 1)
                                 { ?>
                                <th style="color:blue">IA1 <span style="color: #ff0000;font-size: 17px;"><?=$outof?></span></th>
                                <th style="color:blue">TOT_CLS</th>                              
                                <th style="color:blue">AT1</th>
                             <?php } 
                             
                              else if($internn == 2)
                                 { ?>
                                  <th style="color:green">IA2 <span style="color: #ff0000;font-size: 17px;"><?=$outof?></span></th>
                                <th style="color:green">TOT_CLS</th>                              
                                <th style="color:green">AT2</th>    
                             <?php } 
                                                          
                              else if($internn == 3)
                                 { ?>
                                 <th style="color:violet">IA3 <span style="color: #ff0000;font-size: 17px;"><?=$outof?></span></th>
                                <th style="color:violet">TOT_CLS</th>                              
                                <th style="color:violet">AT3</th>
                             <?php } 
                             
                                                          
                              else if($internn == 4)
                                 { ?>
                                  <th style="color:green">IA4</th>    
                             <?php } ?>
                             
                             
                           
                          </tr>
                 
                               
                              <?php    
                               
                                $len1=strlen($secs);
                               //  echo "<script>alert('$len1');</script>";
                                if($len1==0)
                                  $sq1q="SELECT $sbdept.students.Name as 'Student Name', $sbdept.students.`USN`,$sbdept.subjects.`Name` AS 'Sub Name',$sbdept.subjects.`subcode` AS 'Sub Code',$sbdept.subjects.sem,$ldept.faculty.`Name` AS 'Faculty Name',$ldept.subfac.sec FROM $sbdept.students,$sbdept.subjects,$ldept.faculty,$ldept.subfac  WHERE $sbdept.subjects.sem=$sbdept.students.sem AND $sbdept.subjects.sem=$ldept.subfac.sem and $ldept.faculty.idn=$ldept.subfac.idn and $ldept.subfac.subcode=$sbdept.subjects.subcode and $sbdept.students.sec=$ldept.subfac.sec and $ldept.subfac.subcode='$ssubcodee' and $ldept.faculty.email="."'$facmail' and $sbdept.students.sec='$secs[0]'  ORDER BY students.sec, students.USN"; 
                                 else if($len1==1)
                                  $sq1q="SELECT $sbdept.students.Name as 'Student Name', $sbdept.students.`USN`,$sbdept.subjects.`Name` AS 'Sub Name',$sbdept.subjects.`subcode` AS 'Sub Code',$sbdept.subjects.sem,$ldept.faculty.`Name` AS 'Faculty Name',$ldept.subfac.sec FROM $sbdept.students,$sbdept.subjects,$ldept.faculty,$ldept.subfac  WHERE $sbdept.subjects.sem=$sbdept.students.sem AND $sbdept.subjects.sem=$ldept.subfac.sem and $ldept.faculty.idn=$ldept.subfac.idn and $ldept.subfac.subcode=$sbdept.subjects.subcode and $sbdept.students.sec=$ldept.subfac.sec and $ldept.subfac.subcode='$ssubcodee' and $ldept.faculty.email="."'$facmail' and $sbdept.students.sec='$secs[0]' or $sbdept.students.sec='$secs[1]'  ORDER BY students.sec, students.USN"; 
                                 else if($len1==2)
                                  $sq1q="SELECT $sbdept.students.Name as 'Student Name', $sbdept.students.`USN`,$sbdept.subjects.`Name` AS 'Sub Name',$sbdept.subjects.`subcode` AS 'Sub Code',$sbdept.subjects.sem,$ldept.faculty.`Name` AS 'Faculty Name',$ldept.subfac.sec FROM $sbdept.students,$sbdept.subjects,$ldept.faculty,$ldept.subfac  WHERE $sbdept.subjects.sem=$sbdept.students.sem AND $sbdept.subjects.sem=$ldept.subfac.sem and $ldept.faculty.idn=$ldept.subfac.idn and $ldept.subfac.subcode=$sbdept.subjects.subcode and $sbdept.students.sec=$ldept.subfac.sec and $ldept.subfac.subcode='$ssubcodee' and $ldept.faculty.email="."'$facmail' and $sbdept.students.sec='$secs[0]' or $sbdept.students.sec='$secs[1]' or $sbdept.students.sec='$secs[2]'  ORDER BY students.sec, students.USN "; 
                                  
                                  //kvgenggco_admin.subjects.sem=$csis.students.sem AND kvgenggco_admin.subjects.sem=kvgenggco_admin.subfac.sem and faculty.idn=kvgenggco_admin.subfac.idn and kvgenggco_admin.subfac.subcode='$subs' and kvgenggco_admin.subfac.subcode=kvgenggco_admin.subjects.subcode and $csis.students.sec=kvgenggco_admin.subfac.sec and faculty.email="."'$facmail'";
                                  
                                // $sq1q="SELECT students.Name as 'Student Name', students.`USN`,`subjects`.`Name` AS 'Sub Name',`subjects`.`subcode` AS 'Sub Code',`subjects`.sem,`faculty`.`Name` AS 'Faculty Name',subfac.sec FROM students,`subjects`,`faculty`,subfac WHERE subjects.sem=students.sem AND subjects.sem=subfac.sem and faculty.idn=subfac.idn and subfac.subcode='$subs' and subfac.subcode=subjects.subcode and students.sec=subfac.sec and faculty.email="."'$facmail'";
                                  
                                  $resultq = $con->query($sq1q);
                                  while($row1 = $resultq->fetch_assoc())
                                  { ?>
                                  
                                  <tr>
                                      <td class="usn"><?=$row1['USN'];?></td>
                                  <td><?=$row1['Student Name']."[".$row1['sec']."]";?></td>
                                  
                                 
                              
                              <?php 
                              $newsubc=$row1['Sub Code'];
                              $newusn=$row1['USN'];
                              $newsem=$row1['sem'];
                              
                
                           
                            // if($dbz=="admin")
                           //  {
                                
                               
                             $qz="SELECT `int1`,`att1`,`int2`,`att2`,`int3`,`att3`,`tatt1`,`tatt2`,`tatt3`,`aint4`,`avgint`,`asgmt`,`totIA`,`avgatt`,`umarks`,`tmarks` FROM $sbdept.marks where `usn`='$newusn' AND `subcode`='$newsubc' AND `sem`='$newsem'";
                              
                              
                           //  }
                           //  else
                          //   {
                          //       $qz="SELECT `int1`,`att1`,`int2`,`att2`,`int3`,`att3`,`tatt1`,`tatt2`,`tatt3`,`aint4`,`avgint`,`avgatt`,`umarks`,`tmarks` FROM marks where `usn`='$newusn' AND `subcode`='$newsubc' AND `sem`='$newsem'";
                                 
                           //  }
                              $resz=$con->query($qz);
                              $rowz=$resz->fetch_assoc();
                                  
                              ?>
                              
                              
                      
                 
                              
                                
                               <td contenteditable="true" class="subcode" style="color:blue;display:none"><?=$newsubc?></td>
                              <td contenteditable="true" class="sem" style="color:blue;display:none"><?=$newsem?></td>
                              
                              
                                
                              <?php 
                              if($internn == 5 )
                              {?>
                              <td contenteditable="true" class="int1" style="color:blue"><?=$rowz['int1'];?></td>
                              <td contenteditable="true" class="tatt1" style="color:blue"><?=$rowz['tatt1'];?></td>
                              <td contenteditable="true" class="att1" style="color:blue"><?=$rowz['att1'];?></td>
                              
                              <td contenteditable="true" class="int2" style="color:green"><?=$rowz['int2'];?></td>
                              <td contenteditable="true" class="tatt2" style="color:green"><?=$rowz['tatt2'];?></td>
                              <td contenteditable="true" class="att2" style="color:green"><?=$rowz['att2'];?></td>
                              
                              <td contenteditable="true" class="int3" style="color:violet"><?=$rowz['int3'];?></td>
                              <td contenteditable="true" class="tatt3" style="color:violet"><?=$rowz['tatt3'];?></td>  
                              
                              <td contenteditable="true" class="att3" style="color:violet"><?=$rowz['att3'];?></td>
                              
                              <td contenteditable="true" class="aint4" style="color:violet"><?=$rowz['aint4'];?></td>  
                               
                              <td contenteditable="true"  class="avgint" style="color:violet"><?=$rowz['avgint'];?></td>
                              
                              
                              <td contenteditable="true"  class="asgmt" style="color:violet"><?=$rowz['asgmt'];?></td>
                              
                              <td contenteditable="true"  class="totIA" style="color:violet"><?=$rowz['totIA'];?></td>   
                              
                              
                              
                             <td contenteditable="true"  class="avgatt" style="color:violet"><?=$rowz['avgatt'];?></td>  
                              
                              <td contenteditable="true" class="umarks" style="color:violet"><?=$rowz['umarks'];?></td>
                                  
                              <td contenteditable="true" class="tmarks" style="color:violet"><?=$rowz['tmarks'];?></td>
                             
                               <?php }
                               
                                 else if($internn == 1)
                                 { ?>
                              <td contenteditable="true" class="int1" style="color:blue"><?=$rowz['int1'];?></td>
                              <td contenteditable="true" class="tatt1" style="color:blue"><?=$rowz['tatt1'];?></td>
                              <td contenteditable="true" class="att1" style="color:blue"><?=$rowz['att1'];?></td>
                             <?php } 
                             
                             else if($internn == 2)
                             { ?>
                               <td contenteditable="true" class="int2" style="color:green"><?=$rowz['int2'];?></td>
                              <td contenteditable="true" class="tatt2" style="color:green"><?=$rowz['tatt2'];?></td>
                              <td contenteditable="true" class="att2" style="color:green"><?=$rowz['att2'];?></td>
                             <?php } 
                             
                              else if($internn == 3)
                             { ?>
                               <td contenteditable="true" class="int3" style="color:violet"><?=$rowz['int3'];?></td>
                              <td contenteditable="true" class="tatt3" style="color:violet"><?=$rowz['tatt3'];?></td> 
                              <td contenteditable="true" class="att3" style="color:violet"><?=$rowz['att3'];?></td>
                             <?php } 
                             
                              else if($internn == 4)
                             { ?>
                              <td contenteditable="true" class="aint4" style="color:violet"><?=$rowz['aint4'];?></td>  
                             <?php } ?>
                             
                            
                                  </tr>
                               <?php $i++; } ?>
                      </table>

                     <br>
                     <div class="col-md-10 col-sm-10 col-sx-12">
                        
                         <input type="submit" class="btn btn-success pull-right" onclick="savemrk()" value="submit">
                     </div>
                  
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