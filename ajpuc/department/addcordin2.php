 <?php include('header.php');
include('sidebar.php');
extract($_REQUEST);?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Add Team_Leaders
      </h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Team_Leaders</li>
      </ol>
      <div class="content">
         <div class="container-fluid">
            <?php
            if(isset($success)){?>
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Team_Leaders is added sucessfully</strong>
            </div>
            <?php }
            ?>
            <?php
            if(isset($error)){?>
            <div class="alert alert-warning" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Team_Leaders is not added at this time try again!</strong>
            </div>
            <?php }
            ?>
            <a href="Team_Leaders_List.php" class="btn btn-primary pull-right">List Of Team Leaders</a>
         
          <br/><br/>
         
           <div class="panel panel-primary">
               <div class="panel-heading">Add Team_Leaders </div>
               <div class="panel-body">
                    <?php 
                      $tm = "SELECT Name FROM students WHERE sem=".$sem;
                        $sm = $con->query($tm);
                        while($row = $sm->fetch_assoc()){
                             echo "<input type='checkbox' name='students[]' value='".$row['Name']."'>".$row['Name'];}        
                      ?>
                           
                 </div>
               </div>
           </div>
         </div>
      </div>
   </section>
</div>
