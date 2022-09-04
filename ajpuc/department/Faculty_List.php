<?php include("header.php");
      include('sidebar.php');
extract($_REQUEST); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
        Faculty List
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Faculty List</li>
      </ol>
       
        <div class="content">
	   <div class="container-fluid">

        <?php
            if(isset($delsuccess)){?>
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Faculty Deleted sucessfully</strong>
            </div>
            <?php }
            ?>
           <?php
            if(isset($delerror)){?>
            <div class="alert alert-danger" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Faculty Delete Failed</strong>
            </div>
            <?php }
            ?>

           <?php
            if(isset($upsuccess)){?>
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Faculty Updated sucessfully</strong>
            </div>
            <?php }
            ?>
           <?php
            if(isset($uperror)){?>
            <div class="alert alert-danger" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Faculty Update Failed</strong>
            </div>
            <?php }
            ?>
           <?php if(isset($asuccess)){ ?>
   <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Faculty Added successfully.</strong>
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


   
   
               <a href="add_Faculty.php" class="btn btn-primary pull-right"> Add Faculty</a>
   <br/><br/>
         <div class="panel panel-info">
	          <div class="panel-heading">Faculty List </div>
		         <div class="panel-body">
             <div class="table-responsive">
              <div class="box-body">
                   <div id="divToPrint" >
  <div>
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                     <th>Photo</th>
                                    <th>Name </th>
                                     <th>Contact Number </th> 
                                    <th>Address</th>
                                      <th>Email</th>
				   <th>Designation</th>
				   <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                  $i=1;
                                  $sql = "SELECT * From faculty ORDER BY  Name ASC";
                                  $result = $con->query($sql);
                                  while($row = $result->fetch_assoc())
                                  { ?>
                                  <tr>
                                      <td><img src="<?php echo $row['url'];?>" style="height:4.5cm;width:3.5cm;"></td>
                                  <td><?=$row['Name'];?></td>
                                    <td><?=$row['num'];?></td>
                                    <td><?=$row['addl1'].'<br>'.$row['addl2'].'<br>'.$row['addl3'].'<br>'.$row['pinc'];?></td>
				 <td><?=$row['email'];?></td>
                                  <td><?=$row['designation'];?></td>
                                  <td><a href="edit_fac.php?oldid=<?php echo $row['idn'];?>"><button>EDIT</button></a><span> </span><a href="del_fac.php?id=<?php echo $row['idn'];?>"><button>DELETE</button></a></td>
                               </tr>
                               <?php $i++; } ?>
                              </tbody>
                              <tfoot>
                                 <tr>
                                      <th>Photo</th>
                                    <th>Name </th>
                                     <th>Contact Number </th> 
                                    <th>Address</th>
                                      <th>Email</th>
				   <th>Designation</th>
				   <th>Action</th>
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