<?php include("header.php");
      include('sidebar.php');
extract($_REQUEST);

$dbzz="kvgenggco_".$_SESSION["dbnamez"];
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        Subject-Faculty List
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Subject Faculty List </li>
      </ol>
       
        <div class="content">
	   <div class="container-fluid">
           <?php if(isset($asuccess)){ ?>
   <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Assigned Subject successfully.</strong>
</div>
   <?php } ?>
   
   <?php if(isset($success)){ ?>
   <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Deleted successfully.</strong>
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
  <strong>Added successfully.</strong>
</div>
   <?php } ?>
   <?php if(isset($error)){ ?>
   <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Deleted Unsuccessfully.</strong>
</div>
   <?php } ?>
   
   
   
     <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=window.width,height=window.height');
       popupWin.document.open();
       popupWin.document.write('<html><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><style>td{ font-size:12px !important; }.action { display :none !important; }</style><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
<br/><br/>



<div>
  <input type="button" class="btn btn-primary pull-right" value="Print" onclick="PrintDiv();" />
</div>
<div class="clearfix"></div> <br /> <br />
   <a href="assign_Sub_Fac.php" class="btn btn-primary pull-right">Assign Subject</a>
   <br/><br/>
         <div class="panel panel-info">
	          <div class="panel-heading"> Subject Faculty  </div>
		         <div class="panel-body">



                   <div id="divToPrint" >
  <div>
                        <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                   <th> Faculty </th>
                                    <th> Subject </th>
                                    <th> Subject Code </th>
                                    <th> Sem </th>
                                    <th> Section </th>
                                    <th class="action"> Action </th>
                                 </tr>
                              </thead>
              
                              
           <!-- same dept and subject-->                   
                              <tbody>
                                     <?php
                                     $i=1;
$sql = "SELECT faculty.idn,faculty.Name as 'Faculty Name',subjects.Name as 'Subject Name',subjects.subcode as 'Subject Code', subfac.sem,subfac.sec FROM `faculty`,`subjects`,subfac WHERE faculty.idn=subfac.idn and subjects.subcode=subfac.subcode and subfac.sem!='1P' AND subfac.sem!='1C' and subfac.sem!='2P' AND subfac.sem!='2C' 
ORDER BY  faculty.Name ASC";
                                $result = $con->query($sql);
                                while($row = $result->fetch_assoc())
                                { 
                                ?>
                                <tr>
                                <td><?=$row['Faculty Name'];?></td>
                                <td><?=$row['Subject Name'];?></td>
                                <td><?=$row['Subject Code'];?></td>
                                <td><?=$row['sem'];?></td>
                                <td><?=$row['sec'];?></td>
                                <td role="cell" class="action"><a href="del_subfac.php?id=<?php echo $row['idn'].'@'.$row['Subject Code'];?>"><button>DELETE</button></a></td>
                             </tr>
                             <?php  $i++; }  ?>
                         <!--     </tbody> -->
                   
                    <!-- same dept and  subject and 1st year student-->             
                              
                           <!--    <tbody> -->
                                     <?php
                                     $i=1;
$sql = "SELECT faculty.idn,faculty.Name as 'Faculty Name',subjects.Name,subfac.subcode, subfac.sem,subfac.sec FROM faculty, subfac, subjects WHERE faculty.idn=subfac.idn and subfac.subcode=subjects.subcode and subfac.sem in('1P','1C','2P','2C') ORDER BY  faculty.Name ASC";
                                $result = $con->query($sql);
                                while($row = $result->fetch_assoc())
                                { 
                                ?>
                                <tr>
                                <td><?=$row['Faculty Name'];?></td>
                                
                                <td><?=$row['Name'];?></td>
                                  <td><?=$row['subcode'];?></td>
                            
                                <td><?=$row['sem'];?></td>
                                
                                    <td><?=$row['sec'];?></td>
                                    	<td role="cell" class="action"><a href="del_subfac.php?id=<?php echo $row['idn'].'@'.$row['Subject Code'];?>"><button>DELETE</button></a></td>
                             </tr>
                             <?php  $i++; }  ?>
                            <!--     </tbody> -->
                              
                              
                                <!-- same dept faculty and elective subject-->                 
                               <!--  <tbody> -->
                                     <?php
                                     $i=1;
$sql = "SELECT faculty.idn,faculty.Name as 'Faculty Name',subjects.Name as 'Subject Name',subjects.subcode as 'Subject Code',subjects.sem FROM `faculty`,subjects,electiveDetails WHERE faculty.idn=electiveDetails.eidn and subjects.subcode=electiveDetails.esubcode  ORDER BY  faculty.Name ASC" ;

                                $result = $con->query($sql);
                                while($row = $result->fetch_assoc())
                                {
                                ?>
                                <tr style="color: blue;">
                                    <td><?=$row['Faculty Name'];?></td>
                                    <td><?=$row['Subject Name'];?></td>
                                    <td><?=$row['Subject Code'];?> [Professional Elective]</td>
                                    <td><?=$row['sem'];?></td>
                                    <td><?=$row['sec'];?></td>
                                    <td role="cell" class="action"><a onclick='javascript:confirmationDelete($(this));return false;' href="del_electfacstud.php?id=<?php echo $row['idn'].'@'.$row['Subject Code'];?>"><button>DELETE</button></a></td>
                                </tr>
                             <?php  $i++; }  ?>
                             
                             
                             <!-- script to alert on delete -->
                             
                            <script>
                             function confirmationDelete(anchor)
                             {
                                 var conf = confirm('Are you sure want to delete this faculty and assigned students?');
                                 if(conf)
                                 window.location=anchor.attr("href");
                             }
                            </script>
                             
                              <!--     </tbody> -->
                              
                     <!-- same dept subject and pcm faculty.   -->      
                              
                               <!--    <tbody> -->
                                     <?php
                                     
              
                                     
                                     $i=1;
$sqlpcm = "SELECT faculty.idn,faculty.Name as 'Faculty Name',subjects.Name,subfac.subcode, subfac.sem,subfac.sec FROM kvgenggco_admin.faculty, kvgenggco_admin.subfac, subjects WHERE faculty.idn=subfac.idn and subfac.subcode=subjects.subcode and kvgenggco_admin.subfac.sdept='$dbzz' ORDER BY  faculty.Name ASC";
                                $result = $con->query($sqlpcm);
                                while($row = $result->fetch_assoc())
                                { 
                                    
      
                         
                                ?>
                                <tr style="color: crimson;text-shadow: 0px 0px 0px;">
                                <td><?=$row['Faculty Name'];?></td>
                                
                                <td><?=$row['Name'];?></td>
                                  <td><?=$row['subcode'];?></td>
                            
                                <td><?=$row['sem'];?></td>
                                
                                    <td><?=$row['sec'];?></td>
                                    	<td role="cell" class="action"><a href="del_subfac.php?id=<?php echo $row['idn'].'@'.$row['Subject Code'];?>"><button>DELETE</button></a></td>
                             </tr>
                             <?php  $i++; }  ?>
                              <!--     </tbody> -->
                              
                              
                                <!-- same dept faculty and PCM subject-->                 
                                <!-- <tbody> -->
                                     <?php
                                     $i=1;
$sql = "SELECT faculty.idn,faculty.Name as 'Faculty Name',kvgenggco_admin.subjects.Name as 'Subject Name',kvgenggco_admin.subjects.subcode as 'Subject Code', kvgenggco_admin.subfac.sem,kvgenggco_admin.subfac.sec FROM `faculty`,kvgenggco_admin.subjects,kvgenggco_admin.subfac WHERE faculty.idn=kvgenggco_admin.subfac.idn and kvgenggco_admin.subjects.subcode=kvgenggco_admin.subfac.subcode and subfac.sem in('1P','1C','2P','2C') ORDER BY  faculty.Name ASC" ;

                                $result = $con->query($sql);
                                while($row = $result->fetch_assoc())
                                {
                                ?>
                                <tr style="color: blueviolet;text-shadow: 0px 0px 0px;">
                                <td><?=$row['Faculty Name'];?></td>
                                <td><?=$row['Subject Name'];?></td>
                                  <td><?=$row['Subject Code'];?></td>
                                   <td><?=$row['sem'];?></td>
                                    <td><?=$row['sec'];?></td>
                                    	<td role="cell" class="action"><a href="del_subfac.php?id=<?php echo $row['idn'].'@'.$row['Subject Code'];?>"><button>DELETE</button></a></td>
                             </tr>
                             <?php  $i++; }  ?>
                              <!--     </tbody> -->
                              
                              
                              
                              
                                <!-- open elective subject-->                 
                                <!-- <tbody> -->
                                     <?php
                                     $i=1;
                                     $sdept;
                                     $fdept;
                                     $sql1 ="select * from kvgenggco_admin.electiveDetails";
                                       $result1 = $con->query($sql1);
                                while($row1 = $result1->fetch_assoc())
                                {
                                    $sdept="kvgenggco_".$_SESSION["dbnamez"];
                                     $fdept=$row['fdept'];
                                }
$sql = "SELECT faculty.idn,faculty.Name as 'Faculty Name',subjects.Name as 'Subject Name',subjects.subcode as 'Subject Code',subjects.sem FROM $fdept.faculty,$sdept.subjects,kvgenggco_admin.electiveDetails WHERE faculty.idn=electiveDetails.eidn and subjects.subcode=electiveDetails.esubcode  ORDER BY  faculty.Name ASC" ;

                                $result = $con->query($sql);
                                while($row = $result->fetch_assoc())
                                {
                                ?>
                                <tr style="color: #23a239;    text-shadow: 0px 0px 0px;">
                                    <td><?=$row['Faculty Name'];?></td>
                                    <td><?=$row['Subject Name'];?></td>
                                    <td><?=$row['Subject Code'];?> [Open Elective]</td>
                                    <td><?=$row['sem'];?></td>
                                    <td><?=$row['sec'];?></td>
                                    <td role="cell" class="action"><a onclick='javascript:confirmationDelete($(this));return false;' href="del_electfacstud.php?id=<?php echo $row['idn'].'@'.$row['Subject Code'];?>"><button>DELETE</button></a></td>
                                </tr>
                             <?php  $i++; }  ?>
                             </tbody>
                              <tfoot>
                                 <tr>
                                  <th> Faculty </th>
                                    <th> Subject </th>
                                    <th> Subject Code </th>
                                    <th> Sem </th>
                                    <th> Section </th>
                                    <th class="action"> Action </th>
                                 </tr>
                              </tfoot>
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