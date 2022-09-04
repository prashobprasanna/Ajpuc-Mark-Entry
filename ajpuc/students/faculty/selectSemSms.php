<?php include('header.php');
include('sidebar.php');
extract($_REQUEST);
 $servername1 = "localhost";
$username1 = "kvgenggco_admin";
$password1 = "Geleyageleya";
$dbname1 = "kvgenggco_"."admin";
$con = new mysqli($servername1, $username1, $password1, $dbname1);


?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Send SMS to Parents
      </h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Select sem</li>
      </ol>
      <div class="content">
         <div class="container-fluid">
            <?php
            if(isset($success)){?>
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Subject is added sucessfully</strong>
            </div>
            <?php }
            ?>
            <?php
            if(isset($error)){?>
            <div class="alert alert-warning" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Subject is not added at this time try again!</strong>
            </div>
            <?php }
            ?>
            
         <br/><br/>
           
                
           
           
           
             <div class="panel panel-info">
	         <div class="panel-heading"> <b style="font-size: 18px;color: #5f00c7;">Send SMS To Parents</b></div>
		         <div class="panel-body">
             <div class="table-responsive">
              <div class="box-body">
                   <div id="divToPrint" >
  <div>
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th>Department</th>
                                     <th>Sem</th>
                                     <th>Internal</th>
                                     <th>Status</th>
                                     <th>Sent Date</th>
                                     <th> Action </th>
                                 </tr>
                              </thead>
                              <tbody>
                                  <style>
                                       .tdcenter td{
                                          text-align: center !important;
                                      }
                                  </style>
                                 
                                   
                                 <?php
                                  $i=1;
                                  $sql = "SELECT * From kvgenggco_admin.approved ORDER BY branch asc,sem ASC";
                                  $result = $con->query($sql);
                                  while($row = $result->fetch_assoc())
                                  { 
                                     
                                      $br1=$row['branch'];
                                      $br2=strtoupper($br1);
                                    ?>   <tr class="tdcenter">
                                      
                                         <td style="text-align: center !important;"><?=$br2;?></td>
                                         <td style="text-align: center !important;"><?=$row['sem'];?> </td>
                                         <td style="text-align: center !important;"><?=$row['intern'];?> </td>
                                         <td style="text-align: center !important;"><?=$row['remark'];?> </td>
                                         <td style="text-align: center !important;"><?=$row['dos'];?> </td>
                                  
                                  
                                 <?php if($row['remark']=="approved")
                                 { ?>
                                  <td style="text-align: center !important;"><a href="sms.php?r1=<?php echo $row['branch'].'@'.$row['sem'].'@'.$row['intern'];?>"><button class="btn btn-primary">SEND</button></a></td>
                                 <?php }
                                 else
                                 { ?>
                                 <td>&nbsp;&nbsp;</td>
                                <?php } ?>
                              
                                    
                               </tr>
                               <?php  $i++; } ?>
                               
                          
                               
                              </tbody>
                              <tfoot>
                                 <tr>
                                       <th>Department</th>
                                     <th>Sem</th>
                                     <th>Internal</th>
                                     <th>Status</th>
                                     <th>Sent Date</th>
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
           
           
           
           
            
         </div>
      </div>
   </section>
</div>
<?php include("footer.php");?>