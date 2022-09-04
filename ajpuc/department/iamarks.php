<?php include('header.php');
include('sidebar.php');
extract($_REQUEST);?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Add Internal Assessment Marks
      </h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Add IA Marks</li>
      </ol>
      <div class="content">
         <div class="container-fluid">
            <?php
            if(isset($success)){?>
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>IA marks are added sucessfully</strong>
            </div>
            <?php }
            ?>
            <?php
            if(isset($error)){?>
            <div class="alert alert-warning" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>IA marks are not added at this time try again!</strong>
            </div>
            <?php }
            ?>
             <a href="listia.php" class="btn btn-primary pull-right">List IA marks</a>
         <br/><br/>
            <div class="panel panel-info">
               <div class="panel-heading">Add IA Marks </div>
               <div class="panel-body">
                   <form class="form-horizontal" role="form" method="post" action="iamarkslist.php" enctype="multipart/form-data">
                    
                     
                      
                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Faculty </label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                              
                            <select id="source" name="facmail">
                                <option disabled selected value> -- select an option -- </option>
                                 <?php
                                  $facq="SELECT Name,email FROM `faculty`";
                                  $facres=$con->query($facq);
                                  while($row=$facres->fetch_assoc()){
                                      $em=$row['email'];
                                 ?>
                                <option value="<?=$em?>"><?=$row['Name'];?></option>
                                  <?php } ?>
                            </select>


                        </div>
                     </div>
                                          
                     
                      
                      
          
                    
                      
                     <br>
                     <div class="col-md-10 col-sm-10 col-sx-12">
                        <input id="submit" name="submit" type="submit" value="Update Marks" class="btn btn-success pull-right">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>


<?php include("footer.php");?>