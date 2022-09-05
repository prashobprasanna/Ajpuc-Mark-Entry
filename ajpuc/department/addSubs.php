<?php include('header.php');
include('sidebar.php');
extract($_REQUEST); ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Subjects
      </h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Add Subjects</li>
      </ol>
      <div class="content">
         <div class="container-fluid">
            <?php
            if (isset($success)) { ?>
               <div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Subject added sucessfully</strong>
               </div>
            <?php }
            ?>
            <?php
            if (isset($error)) { ?>
               <div class="alert alert-warning" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Subject is not added at this time try again!</strong>
               </div>
            <?php }
            ?>
            <a href="listsubs.php" class="btn btn-primary pull-right">List Subjects</a>
            <br /><br />
            <div class="panel panel-info">
               <div class="panel-heading">Add Subject </div>
               <div class="panel-body">
                  <form class="form-horizontal" role="form" method="post" action="Savesubs.php" enctype="multipart/form-data">

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="subname" class="control-label">Subject Name </label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="subname" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="subcode" class="control-label">Subject Code </label><span id="sp">:</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-sx-2">
                           <input type="text" size="6" maxlength="15" class="form-control" name="subcode" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="sem" class="control-label">CLASS</label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">

                           <select name="class">
                              <option disabled selected value> -- select an option -- </option>
                              <option value="2">Science PCMB</option>
                              <option value="3">Science PCMC</option>
                              <option value="4">Commerce SEBA</option>
                              <option value="5">Commerce CEBA</option>
                           </select>


                        </div>

                     </div>
                     <br>


                     <!-- <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="subcode" class="control-label">Elective Subject </label><span id="sp">:</span>
                        </div>
                        <div class="col-md-1 col-sm-1 col-sx-1">
                           <input type="radio" name="elect" checked value="0">No
                        </div>
                        <div class="col-md-2 col-sm-2 col-sx-2">
                           <input type="radio" name="elect" value="1">Professional Elective
                        </div>
                        <div class="col-md-1 col-sm-1 col-sx-1">
                           <input type="radio" name="elect" value="2">Open Elective
                        </div>
                        <div class="col-md-1 col-sm-1 col-sx-1">
                           <input type="radio" name="elect" value="3">Lab
                        </div>
                     </div> -->

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="Description" class="control-label">Description</label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="Description" required>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="status" class="control-label">Status </label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="Status" required placeholder="Enter the subject is active or">
                        </div>
                     </div>


                     <div class="col-md-10 col-sm-10 col-sx-12">
                        <input id="submit" name="submit" type="submit" value="Add Subject" class="btn btn-success pull-right">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<?php include("footer.php"); ?>