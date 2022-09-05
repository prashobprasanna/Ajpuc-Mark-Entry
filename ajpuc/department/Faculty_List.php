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
  <strong>Inserted successfully.</strong>
</div>
   <?php } ?>
   <?php if(isset($error)){ ?>
   <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Inserted Unsuccessfully.</strong>
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
                                     <th>Fname</th>
                                    <th>Lname</th>
                                     <th>phone_number</th> 
                                    <th>Email</th>
                                      <th>Status</th>
				   <th>Gender</th>
				   <th>Qalification</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                  $i=1;
                                  $sql = "SELECT * From faculty ORDER BY  Fname ASC";
                                  $result = $con->query($sql);
                                  while($row = $result->fetch_assoc())
                                  { ?>
                                  <tr>  
                                  <td><?=$row['Fname'];?></td>
                                    <td><?=$row['Lname'];?></td>
                                    <td><?=$row['Phone_No'];?></td>
                                    <td><?=$row['Email_ID'];?></td>
                                    <td><?=$row['Status'];?></td>
                                    <td><?=$row['Gender'];?></td>
                                  <td><?=$row['Qualification'];?></td>
                                  <td><a href="edit_fac.php?oldid=<?php echo $row['idn'];?>"><button>EDIT</button></a><span> </span><a href="del_fac.php?id=<?php echo $row['idn'];?>"><button>DELETE</button></a></td>
                               </tr>
                               <?php $i++; } ?>
                              </tbody>
                              <tfoot>
                                 <tr>
                                      <th>Photo</th>
                                    <th>Name </th>
                                     <th>ContactNumber </th> 
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