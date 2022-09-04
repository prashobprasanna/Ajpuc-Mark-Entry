<?php include('header.php');
include('sidebar.php');
extract($_REQUEST);?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Send SMS to Students
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
             <a href="listsubs.php" class="btn btn-primary pull-right">List Subjects</a>
         <br/><br/>
            <div class="panel panel-info">
               <div class="panel-heading">Select sem to send SMS</div>
               <div class="panel-body">
                   <form class="form-horizontal" role="form" method="post" action="sms.php" enctype="multipart/form-data">
                 
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="sem" class="control-label">SEM </label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                              
                            <select name="sem">
                                <option disabled selected value> -- select an option -- </option>
                                 <option value="1P">1 Physics</option>
                                 <option value="1C">1 Chemistry</option>
                                <option value="2P">2 Physics</option>
                                <option value="2C">2 Chemistry</option>
                                <option>3</option>
                                <option>4</option>
                                 <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                            </select>


                        </div>
                        
                     </div>
                     <br>
                     
                     
                     <div class="col-md-10 col-sm-10 col-sx-12">
                        <input id="submit" name="submit" type="submit" value="Send SMS" class="btn btn-success pull-right">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<?php include("footer.php");?>