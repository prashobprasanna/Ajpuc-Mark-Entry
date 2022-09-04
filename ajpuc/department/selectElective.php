<?php include('header.php');
include('sidebar.php');
extract($_REQUEST);?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Assign Elective subject
      </h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Mentors</li>
      </ol>
      <div class="content">
         <div class="container-fluid">
            <?php
            if(isset($success)){?>
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Subject Assigned sucessfully</strong>
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
            <a href="listElective.php" class="btn btn-primary pull-right">Assigned List</a>
         <br/><br/>
         
           <div class="panel panel-primary">
               <div class="panel-heading">Assign Elective </div>
               <div class="panel-body">
                   <div class="button-container">
                   
                      <form class="form-horizontal" role="form" method="post" action="AssignElective.php" enctype="multipart/form-data">
                      
                        <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="fac" class="control-label">Faculty</label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <select name="fac">
                            <?php 
                      $tm    = "SELECT * FROM faculty";
                        $tmresult = $con->query($tm); 
                       while($row = $tmresult->fetch_assoc()){
                             echo "<option value='".$row['idn']."'>".$row['Name']."</option>  ";}        
                      ?>
                            
                              
                            </select>
                        </div>
                     </div>
                     
                     <div class="clearfix"></div>
                        <?php 
                      $s1    = "SELECT * FROM subjects where elective=1";
                        $result2 = $con->query($s1); 
                       $rowcount1=mysqli_num_rows($result2);
                                if($rowcount1>=1)
                                {
                        
                        ?>
                        
                         
                      <div class="form-group">
                      <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="fac" class="control-label">Professional Elective Subjects</label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-4 col-sm-4 col-sx-12">
                            <select name="subs">
                        <?php
                       while($row2 = $result2->fetch_assoc()){
                             echo "<option value='".$row2['subcode']."@".$row2['sem']."'>".$row2['Name']." [".$row2['subcode']."]</option>  ";}        
                      ?>
                            
                              
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-2 col-sx-12">
                          <input type="submit" name="submit1" value="submit"/>
                        </div>
                     </div>
                     
                     <?php
                   
               /* ************post values to same page**************  
                  if(isset($_REQUEST['submit1']))
    {
       echo "<div>";
       $name = $_POST["subs"];
       echo "</br>";
       echo "ANSWER:</br></br>", $name;
       echo "</div>";
    }*/
                     
                     ?>
                     
                     
                         <?php }  ?>
                         
                    
                    
                     <div class="clearfix"></div>
                    
                      
            

                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<?php include("footer.php");?>
