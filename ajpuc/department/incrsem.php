<?php include('header.php');
include('sidebar.php');
extract($_REQUEST);?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Increment Semester!!
      </h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Increment Sem</li>
      </ol>
      <div class="content">
         <div class="container-fluid">
            <?php
            if(isset($success)){?>
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Semester Incremented Sucessfully</strong>
            </div>
            <?php }
            ?>
            <?php
            if(isset($error)){?>
            <div class="alert alert-warning" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Semester cannot be incremented at this time try again!</strong>
            </div>
            <?php }
            ?>
             
         <br/><br/>
            <div class="panel panel-info">
               <div class="panel-heading">Increment Semester!!</div>
               <div class="panel-body">
                   <form class="form-horizontal" role="form" method="post" action="actionincr.php" enctype="multipart/form-data">
                  
                  <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="subname" class="control-label">Are You Sure You Want to Increment Sem? </label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <input type="submit" class="form-control" value="Yes, Im Sure!" name="submit" required>
                        </div>
                     </div>
                      
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<?php include("footer.php");?>