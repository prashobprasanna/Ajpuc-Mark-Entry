<?php include('header.php');
include('sidebar.php');
extract($_REQUEST);?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Manage Year back students
      </h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Year Back</li>
      </ol>
      <div class="content">
         <div class="container-fluid">
            <?php
            if(isset($success)){?>
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>set sem Sucessfully</strong>
            </div>
            <?php }
            ?>
            <?php
            if(isset($error)){?>
            <div class="alert alert-warning" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Semester cannot be set at this time try again!</strong>
            </div>
            <?php }
            ?>
             
         <br/><br/>
            <div class="panel panel-info">
               <div class="panel-heading" style="color:red;">Set YearBack To Student</div>
               <div class="panel-body">
                   <form class="form-horizontal" role="form" method="post" action="actionsetyb.php" enctype="multipart/form-data">
                  
                  <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="subname" class="control-label">USN</label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <input type="text" maxlength="10" class="form-control" name="usn" required>
                        </div>
                     </div>
                       <div class="col-md-10 col-sm-10 col-sx-12">
                        <input id="submit" name="submit" type="submit" value="Set Yearback" class="btn btn-success pull-right">
                     </div>
                      
                  </form>
               </div>
            </div>
         <div class="panel panel-info">
             <div class="panel-heading" style="color:green;">Reset YearBack To Student</div>
               <div class="panel-body">
                   <form class="form-horizontal" role="form" method="post" action="actionresetyb.php" enctype="multipart/form-data">
                  
                  <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="usn" class="control-label">USN</label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <input type="text" maxlength="10" class="form-control" name="usn" required>
                        </div>
                     </div>
                       <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="newsem" class="control-label">New Sem</label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-2 col-sm-2 col-sx-12">
                            <input type="text" maxlength="1" class="form-control" name="newsem" required>
                        </div>
                     </div>
                       <div class="col-md-10 col-sm-10 col-sx-12">
                        <input id="submit" name="submit" type="submit" value="Reset Yearback" class="btn btn-success pull-right">
                     </div>
                      
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<?php include("footer.php");?>