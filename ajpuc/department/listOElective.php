<?php include("header.php");
      include('sidebar.php');
extract($_REQUEST);
$email=$_SESSION["email"]
?>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        Assigned Open Elective Subject - Faculty - Students Details
        
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
  <strong>Already Added.</strong>
</div>
   <?php } ?>
   
   
   
     <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=window.width,height=window.height');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>

<br/><br/>



<div>
  <input type="button" class="btn btn-primary pull-right" value="Print" onclick="PrintDiv();" />
</div>
<div class="clearfix"></div> <br /> <br />
   <a href="SelectOpenElective.php" class="btn btn-primary pull-right">Assign Open Elective</a>
   <br/><br/>
         <div class="panel panel-info">
	          <div class="panel-heading"> Subject Faculty  </div>
		         <div class="panel-body">

                   <div id="divToPrint" >
  <div>
                        <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                   <th> USN </th>
                                    <th> Student Name </th>
                                    <th> Faculty Name </th>
                                    <th> Subject </th>
                                     <th>Sem</th>
                                      <th>Sec</th>
                                    <th> Action </th>
                                 </tr>
                              </thead>
                              
                                 <tbody>
                                     <?php
                                     $i=1;
        $sql = "SELECT students.Name,students.USN,students.sem,electiveStudent.eselectid, faculty.Name as 'Faculty Name',students.sec, subjects.subcode, subjects.Name as 'subname'  FROM kvgenggco_admin.electiveStudent,kvgenggco_admin.electiveDetails,students,faculty,subjects where faculty.idn=electiveDetails.eidn and electiveDetails.electId=electiveStudent.eselectid and electiveStudent.esusn=students.USN and electiveDetails.esubcode=subjects.subcode and subjects.elective=2 order by students.sec asc" ;

                                $result = $con->query($sql);
                                while($row = $result->fetch_assoc())
                                {
                                ?>
                                <tr>
                                <td><?=$row['USN'];?></td>
                                <td><?=$row['Name'];?></td>
                                 <td><?=$row['Faculty Name'];?></td>
                                 <td><?=$row['subname'].'  ( '.$row['subcode'].' )'?></td>
                                  <td><?=$row['sem'];?></td>
                                   <td><?=$row['sec'];?></td>
                                   	<td role="cell"><a href="del_electiveStudent.php?id=<?php echo $row['USN'].'@'.$row['eselectid'];?>"><button>DELETE</button></a></td>
                             </tr>
                             <?php  $i++; }  ?>
                              </tbody>
                              
                              
                    
                              <tfoot>
                                 <tr>
                                  <th> USN </th>
                                    <th> Student Name </th>
                                    <th> Faculty Name </th>
                                    <th> Subject </th>
                                    <th>Sem</th>
                                     <th>Sec</th>
                                    <th> Action </th>
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