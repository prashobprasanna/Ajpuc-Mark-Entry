<?php include("header.php");
      include('sidebar.php');
      error_reporting(0);
extract($_REQUEST); 
$susn=$_SESSION["usn"];
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
        Internal Assasment Marks and Attendences
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">IA marks<li>
      </ol>
       
        <div class="content">
	   <div class="container-fluid">
           
 
               
   <br/> 

         <div class="panel panel-info">
	          <div class="panel-heading">Enter USN</div>
		         <div class="panel-body">
             <div class="table-responsive">
              <div class="box-body">
                           
                  <form class="form-horizontal" role="form" method="post" action="listia.php" enctype="multipart/form-data">
                      
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Enter USN </label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <input type="text" class="form-control" name="usn" required>
                        </div>
                     </div>
                      
                      <div class="col-md-10 col-sm-10 col-sx-12">
                        <input id="submit" name="submit" type="submit" value="Submit" class="btn btn-success pull-right">
                     </div>
                      
                      
                  </form>
                  
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                  </div>
                  <!-- /.col -->
               </div>
   
               <!-- /.row -->
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
      


<?php include('footer.php');?>