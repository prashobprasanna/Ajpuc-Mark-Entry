<?php 

include('header.php');
include('sidebar.php');
include('dbconfig.php');
extract($_REQUEST);
$facmail=$_SESSION["email"];

if (isset($_POST["subnameo"]) && !empty($_POST["subnameo"])) {
    $_SESSION["sname"]=$_POST["subnameo"];
    
}

 $subname=$_SESSION["sname"];
  $subdept=$_SESSION["osdept"];


 if($yestane==1)
 $yes="1st";
 else if(($yestane==2))
 $yes="2nd";
else if(($yestane==3))
 $yes="3rd";
else if(($yestane==4))
 $yes="4th";

//$sq1zz="SELECT `subjects`.`Name` AS 'Sub Name',`subjects`.`subcode` AS 'Sub Code',`subjects`.sem,`faculty`.`Name` AS 'Faculty Name',subfac.sec FROM `subjects`,`faculty`,subfac WHERE subjects.subcode=subfac.subcode AND faculty.idn=subfac.idn AND faculty.email="."'$facmail'";
//$sq1zz="SELECT `subjects`.`Name` AS 'Sub Name' FROM `subjects`,`faculty`,subfac WHERE subjects.subcode=subfac.subcode AND faculty.idn=subfac.idn AND faculty.email="."'$facmail'";

$inter;
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
                var sstdept = [];
            
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
                
                 $('.stdept').each(function(){
                    sstdept.push($(this).text());
                });
                
               
                
                $.ajax({
                    url:"insertOpenEMarks.php",
                    method:"POST",
                //    data:{ondu:ondu}, 
        data:{susn:susn,scode:scode,ssem:ssem,sint1:sint1,sint2:sint2,sint3:sint3,sint4:sint4,savgint:savgint,savgatt:savgatt,satt1:satt1,satt2:satt2,satt3:satt3,statt1:statt1,statt2:statt2,statt3:statt3,sasgmt:sasgmt,stotIA:stotIA,sumarks:sumarks,stmarks:stmarks,sstdept:sstdept},
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
             <a href="listia.php" class="btn btn-primary pull-right">List IA marks</a>
         <br/><br/>
         
 
            <div class="panel panel-info">
               <div class="panel-heading">Add IA Marks </div>
               <div class="panel-body box-body">
                   
    
                   <p>
                     <table>
                       <?php
                     //  echo "<script type='text/javascript'>alert('$subname');</script>";
                       
                                   $sq1z="SELECT $subdept.subjects.`Name` AS 'Sub Name',$subdept.subjects.`subcode` AS 'Sub Code',$subdept.subjects.sem,`faculty`.`Name` AS 'Faculty Name' FROM $subdept.subjects,`faculty`,kvgenggco_admin.electiveDetails WHERE faculty.idn=kvgenggco_admin.electiveDetails.eidn AND faculty.email="."'$facmail' and $subdept.subjects.subcode="."'$subname' and kvgenggco_admin.electiveDetails.esubcode=$subdept.subjects.subcode";
                                    $abc=0;
                                  $resultz = $con->query($sq1z);
                                  while($rowz = $resultz->fetch_assoc()){
                                      
                                      if($abc==0)
                                      {
                                       $abc=1;  
                                      $sem=$rowz['sem'];
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
                                          <label><?=$sem?></label>
                                   </div>
                                       <div class="clearfix"></div>    
                                  
                                
                                <?php
                                     
                                }
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
                                     
                                   
                                    <div class="col-sm-2">
                                          <label>Total Classes:</label>
                                    </div>
                                    <div class="col-sm-6" >
                                         
                                     
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
                           
                      
                   </table>
                                
                                
                                
                                
                
                   </p>
                   
                   
                   <!-- CIVIL Students-->
                      <table id="example1" class="table table-bordered table-striped">
                          <tr>
                                <th>USN</th>
                              <th>Name</th>
                             
                                
                               <?php 
                               
                                if($sem==1 || $sem==3)
                                $outof="/30";
                                else
                                $outof="/15";
                                ?>
                                
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
                        
                      
                             
                           
                          </tr>
 
                        
                          <?php 
                                  $i=1;
                                  $facmail=$_SESSION["email"];
                                  $j=0;
                                  
                                  while($j<5)
                                  {
                                  if($j==0)
                                $stdept="kvgenggco_civil";
                                else if($j==1)
                                 $stdept="kvgenggco_csis";
                                 else  if($j==2)
                                $stdept="kvgenggco_ee";
                                else if($j==3)
                                 $stdept="kvgenggco_ec";
                                  else if($j==4)
                                 $stdept="kvgenggco_mech";
                                 
                                $sq1q="SELECT $stdept.students.Name as 'Student Name', $stdept.students.`USN`,$subdept.subjects.`Name` AS 'Sub Name',$subdept.subjects.`subcode` AS 'Sub Code',$subdept.subjects.sem FROM $stdept.students,$subdept.subjects,`faculty`,kvgenggco_admin.electiveDetails,kvgenggco_admin.electiveStudent WHERE $subdept.subjects.sem=$stdept.students.sem and faculty.email='$facmail' and $stdept.students.usn=kvgenggco_admin.electiveStudent.esusn and faculty.idn=kvgenggco_admin.electiveDetails.eidn and kvgenggco_admin.electiveDetails.esubcode=$subdept.subjects.subcode and kvgenggco_admin.electiveDetails.electId=kvgenggco_admin.electiveStudent.eselectid and kvgenggco_admin.electiveDetails.esubcode='$subnameo' ORDER BY students.sec, students.USN";
                                 /* }*/
                                  $resultq = $con->query($sq1q);
                                  while($row1 = $resultq->fetch_assoc())
                                  { ?>
                                  <tr>
                                  <td><?=$row1['Student Name'];?></td>
                                  <td class="usn"><?=$row1['USN'];?></td>
                                 
                              
                              <?php 
                              $newsubc=$row1['Sub Code'];
                              $newusn=$row1['USN'];
                              $newsem=$row1['sem'];
                              
                
                        
                                 $qz="SELECT `int1`,`att1`,`int2`,`att2`,`int3`,`att3`,`tatt1`,`tatt2`,`tatt3`,`aint4`,`avgint`,`asgmt`,`totIA`,`avgatt`,`umarks`,`tmarks` FROM $stdept.marks where `usn`='$newusn' AND `subcode`='$newsubc' AND `sem`='$newsem'";
                                 
                         
                              $resz=$con->query($qz);
                              $rowz=$resz->fetch_assoc();
                              
                              ?>
                              
                              
                              
                                
                               <td contenteditable="true" class="subcode" style="color:blue;display:none"><?=$newsubc?></td>
                              <td contenteditable="true" class="sem" style="color:blue;display:none"><?=$newsem?></td>
                                <td contenteditable="true" class="stdept" style="color:blue;display:none"><?=$stdept?></td>
                              
                           
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
                             
                            
                                  </tr>
                               <?php $i++;
                               }
                               $j++;
                               } ?>
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