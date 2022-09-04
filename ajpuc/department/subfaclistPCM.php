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
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
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
	          <div class="panel-heading"> Subject Faculty for PCM </div>
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
                                    <th> Subject Department </th>
                                    <th> Action </th>
                                 </tr>
                              </thead>
              
                              
                                  <!-- same dept and subject-->                   
                              <tbody>
                                    <?php
                                    $i=1;
                                    $subdept="select distinct(sdept) from subfac where dept='kvgenggco_admin'";
                                    $ressub = $con->query($subdept);
                                    while($row1 = $ressub->fetch_assoc())
                                    {
                                        $sdept=$row1['sdept'];
      
                                $sql = "SELECT faculty.idn,faculty.Name as 'Faculty Name',subjects.Name as 'Subject Name',subjects.subcode as 'Subject Code', subfac.sem,subfac.sec, subfac.sdept FROM `faculty`,$sdept.subjects,subfac WHERE faculty.idn=subfac.idn and $sdept.subjects.subcode=subfac.subcode and subfac.sem=$sdept.subjects.sem and subfac.dept='kvgenggco_admin' and kvgenggco_admin.subfac.sdept='$sdept' ORDER BY  faculty.Name ASC";
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
                                <td><?=$row['sdept'];?></td>
                                <td role="cell"><a href="del_subfac.php?id=<?php echo $row['idn'].'@'.$row['Subject Code'];?>"><button>DELETE</button></a></td>
                             </tr>
                             <?php  $i++; 
                                    
                                } 
    }
                             
                             ?>
                              </tbody>
                              
                              
                              <!-- same dept and  subject and 1st year student-->             
                              
                         
                  <?php                  
                                   
//$sql = "SELECT faculty.idn,faculty.Name as 'Faculty Name',subjects.Name,subfac.subcode, subfac.sem,subfac.sec,subfac.sdept FROM faculty, subfac, subjects WHERE faculty.idn=subfac.idn AND   subfac.subcode=subjects.subcode  ORDER BY  faculty.Name ASC";
                       ?>       
                           
                              
                              
       
                   
                    
                              
                       
                       
                              <tfoot>
                                 <tr>
                                  <th> Faculty </th>
                                    <th> Subject </th>
                                    <th> Subject Code </th>
                                    <th> Sem </th>
                                    <th> Section </th>
                                    <th> Subject Department </th>
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