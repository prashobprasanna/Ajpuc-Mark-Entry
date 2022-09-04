<?php include("header.php");
      include('sidebar.php');
extract($_REQUEST); ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
        Subject List
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Subject List</li>
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
  <strong>Cannot be.</strong>
</div>
   <?php } ?>
            <?php if(isset($updsucc)){ ?>
   <div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Subject Code already exists.</strong>
</div>
   <?php } ?>
   <?php if(isset($upderr)){ ?>
   <div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Subject Code already exists.</strong>
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
  <strong>Error Please retry.</strong>
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


               <a href="addSubs.php" class="btn btn-primary pull-right"> Add Subjects</a>
   <br/><br/>
         <div class="panel panel-info">
	          <div class="panel-heading">Subject List </div>
		         <div class="panel-body">
             <div class="table-responsive">
              <div class="box-body">
                   <div id="divToPrint" >
  <div>
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th>Subject Name </th>
                                     <th>Subject Code</th>
                                     <th>Sem</th>
                                      <th> Action </th>
                                 </tr>
                              </thead>
                              <tbody>
                                  
                                 
                                   
                                 <?php
                                  $i=1;
                                  $sql = "SELECT * From subjects ORDER BY sem ASC";
                                  $result = $con->query($sql);
                                  while($row = $result->fetch_assoc())
                                  { 
                                  ?> 
                                   
                                  
                                  <tr>  <style>
                                      .elect{
                                          color: darkviolet !important;
                                      }
                                       .oelect{
                                          color: blue !important;
                                      }
                                   </style>
                                 <?php if($row['elective'] == 1) 
                                  { ?>
                                     
                                      
                                     <td class="elect"><?=$row['Name'];?></td>
                                    <td class="elect"><?=$row['subcode'];?> [Professional Elective]</td>
                                    <td class="elect"><?=$row['sem'];?></td>
                                  
                                      <?php
                                  } 
                                  
                                  else if($row['elective'] == 2) 
                                 { ?>
                                     <td class="oelect"><?=$row['Name'];?></td>
                                    <td class="oelect"><?=$row['subcode'];?> [Open Elective]</td>
                                    <td class="oelect"><?=$row['sem'];?></td>
                                  
                                  <?php  }
                                  
                                  else 
                                 { ?>
                                  
                                  
                                  <td><?=$row['Name'];?></td>
                                    <td><?=$row['subcode'];?></td>
                                    <td><?=$row['sem'];?></td>
                                  <?php  }?>
                                    	<td role="cell"><a href="del_sub.php?subcode=<?php echo $row['subcode'];?>"><button>DELETE</button></a></td>
                               </tr>
                               <?php  $i++; } ?>
                               
                           <?php
                           $dbz=$_SESSION["dbnamez"];
                           if($dbz != "admin"){
                                 $i=1;
                                  $sql1 = "SELECT * From kvgenggco_admin.subjects ORDER BY sem ASC";
                                  $result1 = $con->query($sql1);
                                  while($row1 = $result1->fetch_assoc())
                                  { ?>
                                  <tr>
                                  <td><?=$row1['Name'];?></td>
                                    <td><?=$row1['subcode'];?></td>
                                    <td><?=$row1['sem'];?></td>
                                    	<td role="cell"><a href="del_sub.php?subcode=<?php echo $row1['subcode'];?>"><button>DELETE</button></a></td>
                               </tr>
                               <?php $i++; } 
                               } ?>
                               
                              </tbody>
                              <tfoot>
                                 <tr>
                                     <th>Subject Name </th>
                                     <th>Subject Code</th>
                                     <th>Sem</th>
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