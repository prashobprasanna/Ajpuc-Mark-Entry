<?php include("header.php");
   include("sidebar.php");
   ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Welcome!
         
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Notifications</li>
      </ol>
      <!-- Main content -->
      <section class="content">
         <!-- Small boxes (Stat box) -->
          <div class="panel panel-info">
	          <div class="panel-heading">Notifications </div>
		         <div class="panel-body">
             <div class="table-responsive">
              <div class="box-body">
                           <table  class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    
                                    <th>Notifications</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                  $i=1;
                                  $sql = "SELECT `Notification` FROM `notification` order by `num` DESC;";
                                  $result = $con->query($sql);
                                  while($row = $result->fetch_assoc())
                                  { ?>
                                  <tr>
                                  <td><?=$row['Notification'];?></td>
                                    
                               </tr>
                               <?php $i++; } ?>
                              </tbody>
                             
                           </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                  </div>
                  <!-- /.col -->
               </div>
         <!-- /.row -->
         <!-- Main row -->
      </section>
</div>
<?php include("footer.php");?>