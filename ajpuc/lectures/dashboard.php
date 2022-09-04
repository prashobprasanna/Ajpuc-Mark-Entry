<?php include("header.php");
   include("sidebar.php");
   ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Dashboard
         <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Dashboard</li>
      </ol>
      <!-- Main content -->
      <section class="content">
         <!-- Small boxes (Stat box) -->
         <div class="row">
            <div class="col-lg-3 col-xs-6">
               <!-- small box -->
               <div class="small-box bg-aqua">
                  <div class="inner">
                      <?php 
                 //     $dbs=$_SESSION["dbnamez"];
                   // echo "<script type='text/javascript'>alert('$dbs');</script>";
                       $tm    = "SELECT * FROM student";
                        $tmresult = $con->query($tm);
                        $tmcount  = mysqli_num_rows($tmresult);
                        ?>
                     <!-- <h3></h3>  -->
                     <p>Students</p>
                  </div>
                  <div class="icon">
                     <i class="ion-ios-people"></i>
                  </div>
                   <a href="listia.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
               </div>
            </div>
            <!-- ./col -->
            
            
         </div>
         <!-- /.row -->
         <!-- Main row -->
      </section>
</div>
<?php include("footer.php");?>