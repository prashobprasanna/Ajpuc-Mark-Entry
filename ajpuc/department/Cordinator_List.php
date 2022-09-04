<?php include("header.php");
      include('sidebar.php');
extract($_REQUEST);
$dbz=$_SESSION["dbnamez"];


?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

     <h1>
        Mentor List 
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mentors</li>
      </ol>
       
        <div class="content">
	   <div class="container-fluid">
           <?php if(isset($asuccess)){ ?>
   <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Added Mentors successfully.</strong>
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
    <a href="add_Coordinator.php" class="btn btn-primary pull-right">Add Mentor</a>

               
   
               
   
         <div class="panel panel-info">
	          <div class="panel-heading"> Mentors  </div>
		         <div class="panel-body">
              <div class="box-body">
                  <div id="divToPrint" >
  <div>
    <?php  
        if($dbz !="admin")
                     {?>
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th> Student Name </th>
                                    <th> USN </th>
                                    <th> SEM </th>
                                    <th> Mentor Name </th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  
                                
                                  
                                  $i=1;
                                  $sql = "SELECT * FROM `students` where sem<9 ";
                                  $result = $con->query($sql);
                                  while($row = $result->fetch_assoc())
                                  { 
                                  ?>
                                  <tr>
                                   <td><?=$row['Name'];?></td>
                                  <td><?=$row['USN'];?></td>
                                   <td><?=$row['sem'];?></td>
                                    <td><?=$row['cordinator'];?></td>
                                    <td><a href="changeMentor.php?id=<?php echo $row['idn'].'@'.$row['Subject Code'];?>"><button>Change Mentor</button></a></td>
                               </tr>
                               <?php $i++; } ?>
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <th> Student Name </th>
                                    <th> USN </th>
                                    <th> SEM </th>
                                    <th> Mentor Name </th>
                                 </tr>
                              </tfoot>
                           </table>
                          <?php }
                          
                          else
                          {
                          
                          
                          ?>
                              
                               <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th> Student Name </th>
                                    <th> USN </th>
                                    <th> SEM </th>
                                    <th> Mentor Name </th>
                                     
                                 </tr>
                              </thead>
                              <tbody>
                                  
                                  
                                  <form action="changeMentor.php">
                                  <?php
                                  
                               $c=0;
                    $branches = array('kvgenggco_civil', 'kvgenggco_csis', 'kvgenggco_ec','kvgenggco_ee','kvgenggco_mech');
                    $branches1 = array('CIVIL', 'CSIS', 'EC','EE','MECH');
                       while($c<5)
                       {        
                                  
                                  $i=1;
                                  $sql = "SELECT * FROM $branches[$c].students where sem<9 and students.cordinator in(select faculty.name from kvgenggco_admin.faculty)";
                                  $result = $con->query($sql);
                                  while($row = $result->fetch_assoc())
                                  { 
                                  ?>
                                  <tr>
                                   <td><?=$row['Name'];?></td>
                                  <td><?=$row['USN'];?></td>
                                   <td><?=$row['sem'];?></td>
                                    <td><?=$row['cordinator'];?></td>
                                     
                               </tr>
                               <?php $i++; }  $c++; }?>
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <th> Student Name </th>
                                    <th> USN </th>
                                    <th> SEM </th>
                                    <th> Mentor Name </th>
                                 </tr>
                              </tfoot>
                           </table>
                              
                       <?php   }
                          
                          ?>
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