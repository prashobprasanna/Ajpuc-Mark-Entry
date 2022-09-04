<?php include("header.php");
      include('sidebar1.php');
      //$ssl="SELECT faculty.Name as Name,faculty.addl1 as addl1,faculty.addl2 as addl2,faculty.addl3 as addl3,faculty.pinc as pinc,faculty.num as num,faculty.email as email FROM faculty,students where faculty.Name=students.cordinator AND students.USN="."'".$_SESSION['usn']."'";
      //$result = $con->query($ssl);
      //$row = $result->fetch_assoc();
      extract($_REQUEST); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
        Student Information By Sem
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Councilor Information</li>
      </ol>
       
        <div class="content">
	   <div class="container-fluid">
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
               
   <br/><br/>
   <div class="panel panel-info">
               <div class="panel-heading">Student Information -Departmentwise </div>
               <div class="panel-body">
                   <form class="form-horizontal" role="form" method="post" action="liststudent.php" enctype="multipart/form-data">
                       
                  <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="branch" class="control-label">Branch</label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-2 col-sm-2 col-sx-2">
                            <select class="form-control" name="branch" required>
                                <option value="civil">Civil</option>
                                <option value="csis">CS & IS</option>
                                <option value="ec">EC</option>
                                <option value="ee">EE</option>
                                <option value="mech">Mechanical</option>
                                
                            </select>
                        </div>
                     </div>
              
                     <br>
                     
                  
                     
                     <div class="col-md-1 col-sm-3 col-sx-12">
                        <input id="submit" name="submit" type="submit" value="Search" class="btn btn-success pull-right">
                     </div>
                     <div class="col-sm-6">
                         
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
      


<?php include('footer.php');?>