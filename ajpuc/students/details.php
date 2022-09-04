<?php include("header.php");
      include('sidebar.php');
extract($_REQUEST); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
        Student Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i>Student Details</a></li>
        
      </ol>
       
        <div class="content">
	   <div class="container-fluid">
           <?php if(isset($asuccess)){ ?>
   <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Subject Added successfully.</strong>
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
               <a href="addSubs.php" class="btn btn-primary pull-right"> Add Subjects</a>
   <br/><br/>
         <div class="panel panel-info">
	          <div class="panel-heading">Subject List </div>
		         <div class="panel-body">
             <div class="table-responsive">
              <div class="box-body">
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th>USN </th>
                                     <th>Subject Name</th>
                                     <th>Sem</th>
                                     <th>1st Internal </th>
                                     <th>attendance </th>
                                     <th>2nd Internal </th>
                                     <th>attendance </th>
                                     <th>3rd Internal </th>
                                     <th>attendance </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                  $i=1;
                                  $sql = "SELECT * From marks ORDER BY usn ASC";
                                  $result = $con->query($sql);
                                  while($row = $result->fetch_assoc())
                                  { ?>
                                  <tr>
                                  <td><?=$row['usn'];?></td>
                                    <td><?=$row['subname'];?></td>
                                    <td><?=$row['sem'];?></td>
                                    <td><?=$row['int1'];?></td>
                                    <td><?=$row['att1']."/".$row['tatt1'];?></td>
                                    <td><?=$row['int2'];?></td>
                                    <td><?=$row['att2']."/".$row['tatt2'];?></td>
                                    <td><?=$row['int3'];?></td>
                                    <td><?=$row['att3']."/".$row['tatt3'];?></td>
                               </tr>
                               <?php $i++; } ?>
                              </tbody>
                              <tfoot>
                                 <tr>
                                     <th>USN </th>
                                     <th>Subject Name</th>
                                     <th>Sem</th>
                                     <th>1st Internal </th>
                                     <th>attendance </th>
                                     <th>2nd Internal </th>
                                     <th>attendance </th>
                                     <th>3rd Internal </th>
                                     <th>attendance </th>
                                 </tr>
                              </tfoot>
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