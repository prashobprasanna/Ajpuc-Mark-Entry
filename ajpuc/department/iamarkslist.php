<?php 

include('header.php');
include('sidebar.php');
extract($_REQUEST);?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
<script>
function savemrk()
{

var susn = [];
                var ssubcode = [];
                var sint1 = [];
                var sint2 = [];
                var sint3 = [];
                var satt1 = [];
                var satt2 = [];
                var satt3 = [];
                var statt1 = [];
                var statt2 = [];
                var statt3 = [];
                var ssem = [];
                $('.usn').each(function(){
                    susn.push($(this).text());
                });
                 $('.subcode').each(function(){
                    ssubcode.push($(this).text());
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
                $('.att1').each(function(){
                    satt1.push($(this).text());
                });
                $('.att2').each(function(){
                    satt2.push($(this).text());
                });
                $('.att3').each(function(){
                    satt3.push($(this).text());
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
                $('.sem').each(function(){
                    ssem.push($(this).text());
                });
                
                $.ajax({
                   
                    url:"insert.php",
                    method:"POST",
                    data:{susn:susn,ssubcode:ssubcode,ssem:ssem,sint1:sint1,sint2:sint2,sint3:sint3,satt1:satt1,satt2:satt2,satt3:satt3,statt1:statt1,statt2:statt2,statt3:statt3},
                    success:function(data)
                    {
                        alert(data+"Marks Updated");
                        //document.location.reload();
                    }
                    
                });
}
</script>

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Add Internal Assasment Marks
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
               <div class="panel-body">
                  
                      <table id="example1" class="table table-bordered table-striped">
                          <tr>
                              <th>Name</th>
                              <th>USN</th>
                              
                              <th>Subject Name</th>
                              <th>Subject Code</th>
                              
                              <th>Sem</th>
                              <th>Faculty Name</th>
                             
                              <th style="color:blue">int1</th>
                              <th style="color:blue">tatt1</th>                              
                              <th style="color:blue">att1</th>
                              
                              <th style="color:green">int2</th>
                              <th style="color:green">tatt2</th>                              
                              <th style="color:green">att2</th>                              
                              
                              <th style="color:violet">int3</th>
                              <th style="color:violet">tatt3</th>                              
                              <th style="color:violet">att3</th>
                              
                              <th style="color:red">int4</th>
                              <th style="color:red">avg mark</th>
                              <th style="color:red">avg attendance</th>

                          </tr>
                          <?php
                                  $i=1;
                                  
                                  //$sq1q="SELECT `students`.`Name`,`students`.`USN`,`faculty`.`Name` AS 'Faculty Name',`faculty`.`subject` AS 'Subject Code',`subjects`.`Name` AS 'Subject Name',`marks`.`int1`,`marks`.`int2`,`marks`.`int3`,`marks`.`att1`,`marks`.`att2`,`marks`.`att3`,`marks`.`tatt1`,`marks`.`tatt2`,`marks`.`tatt3` FROM `students`,`faculty`,`subjects`,`marks` WHERE students.sem=subjects.sem AND subjects.subcode=faculty.subject AND faculty.email="."'$facmail'";
                                  $sq1q="SELECT `students`.`Name` as 'Student Name',`students`.`USN`,`subjects`.`Name` AS 'Sub Name',`subjects`.`subcode` AS 'Sub Code',`subjects`.sem,`Faculty`.`Name` AS 'Faculty Name' FROM `students`,`subjects`,`faculty` WHERE subjects.subcode IN (SELECT `subject_faculty`.`subcode` FROM `subject_faculty`,`faculty` WHERE `subject_faculty`.`facid`=`faculty`.`idn` AND `faculty`.`email`='$facmail') AND subjects.sem=students.sem";
                                  $resultq = $con->query($sq1q);
                                  
                                  while($row1 = $resultq->fetch_assoc())
                                  { ?>
                                  
                          <tr>
                                  <td><?=$row1['Student Name'];?></td>
                                  <td class="usn"><?=$row1['USN'];?></td>
                            
                                  <td><?=$row1['Sub Name'];?></td>
                                  <td class="subcode"><?=$row1['Sub Code'];?></td>
                             
                                  <td class="sem"><?=$row1['sem'];?></td>
                                  <td><?=$row1['Faculty Name'];?></td>
                              
                              <?php 
                              $newsubc=$row1['Sub Code'];
                              $newusn=$row1['USN'];
                              $newsem=$row1['sem'];
                              $qz="SELECT `int1`,`att1`,`int2`,`att2`,`int3`,`att3`,`tatt1`,`tatt2`,`tatt3`,`int4`,`avgmarks`,`avgatt` FROM `marks` where `usn`='$newusn' AND `subcode`='$newsubc' AND `sem`='$newsem'";
                              $resz=$con->query($qz);
                              $rowz=$resz->fetch_assoc();
                              ?>
                              
                              
                              <td contenteditable="true" class="int1" style="color:blue"><?=$rowz['int1'];?></td>
                              <td contenteditable="true" class="tatt1" style="color:blue"><?=$rowz['tatt1'];?></td>
                              <td contenteditable="true" class="att1" style="color:blue"><?=$rowz['att1'];?></td>
                              
                              <td contenteditable="true" class="int2" style="color:green"><?=$rowz['int2'];?></td>
                              <td contenteditable="true" class="tatt2" style="color:green"><?=$rowz['tatt2'];?></td>
                              <td contenteditable="true" class="att2" style="color:green"><?=$rowz['att2'];?></td>
                              
                              <td contenteditable="true" class="int3" style="color:violet"><?=$rowz['int3'];?></td>
                              <td contenteditable="true" class="tatt3" style="color:violet"><?=$rowz['tatt3'];?></td>                              
                              <td contenteditable="true" class="att3" style="color:violet"><?=$rowz['att3'];?></td>
                              
                              <td contenteditable="true" class="int3" style="color:red"><?=$rowz['int4'];?></td>
                              <td contenteditable="true" class="tatt3" style="color:red"><?=$rowz['avgmarks'];?></td>                              
                              <td contenteditable="true" class="att3" style="color:red"><?=$rowz['avgatt'];?></td>
                              
                              
                                  
                                  
                                  </tr>
                               <?php $i++; } ?>
                      </table>

                     <br>
                     <div class="col-md-10 col-sm-10 col-sx-12">
                        
                         <input type="submit" class="btn btn-success pull-right" onclick="savemrk()" value="Save Marks">
                     </div>
                  
               </div>
            </div>
         </div>
      </div>
       
   </section>
</div>


<?php include("footer.php");?>