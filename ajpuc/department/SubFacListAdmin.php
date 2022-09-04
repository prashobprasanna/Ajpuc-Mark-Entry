<?php include("header.php");
      include('sidebar.php');
extract($_REQUEST);?>
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
   <a href="assign_Sub_Fac.php" class="btn btn-primary pull-right">Assign Subject</a>
   <br/><br/>
         <div class="panel panel-info">
	          <div class="panel-heading"> Subject Faculty  </div>
		         <div class="panel-body">

           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                   <th> Faculty </th>
                                    <th> Subject </th>
                                    <th> Subject Code </th>
                                    <th> Sem </th>
                                    <th> Section </th>
                                    <th> Dept </th>
                                 </tr>
                              </thead>
                              <tbody>
                                     <?php
                                     $i=1;
                                     $sql1="select distinct(dept) from subfac where dept!='pcm'";
                           $result1 = $con->query($sql1);  
                           while($row1 = $result1->fetch_assoc())
                           {
                             $dep= $row1['dept'];
                             echo "<script> alert('$dep')</script>";
//$sql = "SELECT  $dep.faculty.Name as 'Faculty Name',subjects.Name as 'Subject Name',subjects.subcode as 'Subject Code', subfac.sem,subfac.sec,subfac.dept FROM $dep.faculty,`subjects`,subfac WHERE  $dep.faculty.idn=subfac.idn and subjects.subcode=subfac.subcode and subfac.sem not in('1P','1C','2C','2P')
//";  
$sql="select $dep.faculty.Name as 'Faculty Name',subjects.Name as 'Subject Name',subjects.subcode as 'Subject Code', subfac.sem,subfac.sec,subfac.dept from $dep.faculty,subfac,subjects where $dep.faculty.idn=subfac.idn and subjects.subcode=subfac.subcode and subfac.dept='$dep'";
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
                                      <td><?=$row['dept'];?></td>
                             </tr>
                             <?php  $i++; } 
                              echo "<script> alert('pidayi batthe');</script>";
                             }
                             
                             ?>
                              </tbody>
                              
                              
                               <tbody>
                                     <?php
                                     $i=1;
$sql = "SELECT faculty.Name as 'Faculty Name',subjects.Name,subfac.subcode, subfac.sem,subfac.sec FROM faculty, subfac, subjects WHERE faculty.idn=subfac.idn and subfac.subcode=subjects.subcode and subfac.sem in('1P','1C','2P','2C') ORDER BY  faculty.Name ASC";
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
                                    <th> Dept </th>
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