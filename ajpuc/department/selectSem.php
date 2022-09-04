<?php include("header.php");
      include('sidebar.php');
   
      extract($_REQUEST); 
      
        $dbname1= "kvgenggco_".$_SESSION["dbnamez"];
      $branch=$_SESSION["dbnamez"];
      
      ?>
      
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
        Student Information By Sem and Marks
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
       
      </ol>
       
        <div class="content">
	   <div class="container-fluid">
           <?php if(isset($asuccess)){ ?>
   <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Approved Successfully.</strong>
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
  <strong>Already Approved.</strong>
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
  <strong>Approval Unsuccessful.</strong>
</div>
   <?php } ?>
               
   <br/><br/>
   <div class="panel panel-info">
               <div class="panel-heading">Student Information by Sem </div>
               <div class="panel-body">
                   <form class="form-horizontal" role="form" method="post" action="listia.php" enctype="multipart/form-data">
                       
                 
                  <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="sem" class="control-label">SEM </label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-2 col-sm-2 col-sx-2">
                            <select class="form-control" name="sem" required>
                                <option value="1C">1 Chemistry</option>
                                 <option value="1P">1 Physics</option>
                                <option value="2C">2 Chemistry</option>
                                <option value="2P">2 Physics</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                     </div>
           
                     <div class="form-group">
                      <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="sem" class="control-label">Internal </label><span id="sp">:</span> 
                        </div>
                          <div class="col-md-2 col-sm-2 col-sx-2">
                   
                            <select name="yestane">
                                <option value="1">1st Internal</option>
                                <option value="2">2nd Internal</option>
                                <option value="3">3rd Internal</option>
                                <option value="4">4th Internal</option>
        
                            </select>
                        </div>
                    </div>    
                  
                      <div class="col-sm-4">
                         
                     </div>
                     <div class="col-md-1 col-sm-3 col-sx-12">
                        <input id="submit" name="submit" type="submit" value="Search" class="btn btn-success">
                     </div>
                    
                  </form>
               </div>
            </div>
          <center>  <table border=1  width="30%">
            <tr>               <thead>
                                   <th style="text-align:center">Sem</th>
                                   <th style="text-align:center">Internal</th>
                                   <th style="text-align:center">Remark</th>
                                   </tr>
                                   </thead>
       <?php      $sqlsub= "SELECT sem,intern,remark from kvgenggco_admin.approved where branch='$branch' order by sem";
                                  $resultsub = $con->query($sqlsub);
                                   $s1=mysqli_num_rows($resultsub);
                                   
                                 echo "<script>alert('my value: $s1');</script>";
                                   while($rowsub = $resultsub->fetch_assoc())
                                   { ?>
                                   <tr>
                                   <td align="center"> <?=$rowsub['sem'];?></td>   
                                   <td align="center"> <?=$rowsub['intern'];?></td>  
                                   <td align="center"> <?=$rowsub['remark'];?></td>  
                                   </tr>
                                  <?php }
                                   
                                   ?>
                                   </table></center>
                                   
                                    
         </div>
      </div>
   </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
      


<?php include('footer.php');?>