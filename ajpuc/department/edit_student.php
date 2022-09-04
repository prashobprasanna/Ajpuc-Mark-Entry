<?php include('header.php');
include('sidebar.php');
include('dbconfig.php');
extract($_REQUEST);
$ssql="SELECT * FROM students where USN='$oldusn'";
$result=$con->query($ssql);
$row=$result->fetch_assoc();

$_SESSION["oldusn"]=$oldusn;
?>
<?php include('header.php');
   include('sidebar.php');
   extract($_REQUEST);?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Students
      </h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Edit Student </li>
      </ol>
      <div class="content">
         <div class="container-fluid">
            <?php
            $b = '.jpg';
               if(isset($success)){?>
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>General Manager  is added sucessfully</strong> 
            </div>
            <?php }
               ?>
            <?php
               if(isset($error)){?>
            <div class="alert alert-warning" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>General Manager  is not added at this time try again!</strong> 
            </div>
            <?php }
               ?>
             <a href="Student_list.php" class="btn btn-primary pull-right">List Students</a>
         <br/><br/>
            <div class="panel panel-info">
               <div class="panel-heading">Edit Students </div>
               <div class="panel-body">
                   <form class="form-horizontal" role="form" method="post" action="updateStudent.php" enctype="multipart/form-data">
                    
                    
            <div class="form-group">
           <div class="col-md-4 col-sm-4 col-sx-12">
            <label>Photo</label>  
            </div>
          <div class="col-md-6 col-sm-4 col-sx-12">
            <div id="kv-avatar-errors-2" class="center-block" 
            style="width:800px;display:none"></div>
   
            <div class="kv-avatar center-block" style="width:200px">
                <div class="file-loading">
                <input id="avatar-2" name="userImage" type="file" class="file-loading">
                </div>
            </div>
            </div>
          </div>
          
                   <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Photo</label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                    <img src="<?php echo $row['url'];?>" style="height:4.5cm;width:3.5cm;">
                     </div>
                     </div>
                     
                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Name </label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="sname" value="<?php echo $row['Name'];?>" required>
                        </div>
                     </div>

                        <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">USN </label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="usn" value="<?php echo $row['USN'];?>" required>
                        </div>
                     </div>    

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Section </label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                             <input type="text" class="form-control" name="sec" value="<?php echo $row['sec'];?>" required>
                        </div>
                     </div>
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">SEM</label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <input type="text" class="form-control" name="sem" value="<?php echo $row['sem'];?>" required>
                        </div>
                     </div>
                    <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="email" class="control-label">Email </label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" value="<?php echo $row['email'];?>" name="email">
                        </div>
                     </div>
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Address Line 1 </label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" value="<?php echo $row['addl1'];?>" name="addl1" required>
                        </div>
                     </div>
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Address Line 2 </label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="addl2" value="<?php echo $row['addl2'];?>" required>
                        </div>
                     </div>
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Address Line 3 </label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="addl3" value="<?php echo $row['addl3'];?>">
                        </div>
                     </div>
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Pin Code </label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-2 col-sm-2 col-sx-2">
                            <input type="number"  size="6" maxlength="6" class="form-control" name="pinc" value="<?php echo $row['pincode'];?>" required>
                        </div>
                     </div>
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Contact number of Student </label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <input type="tel" maxlength="10" class="form-control" name="studnum" value="<?php echo $row['studnum'];?>" required>
                        </div>
                     </div>
                        <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Name of Parent/Gaurdian </label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="parname" value="<?php echo $row['parname'];?>" required>
                        </div>
                     </div>   
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Contact number of Parent </label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <input type="tel" maxlength="10" class="form-control" name="parnum" value="<?php echo $row['parnum'];?>" required>
                        </div>
                     </div>
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Campus Address Line 1 </label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="caddl1" value="<?php echo $row['caddl1'];?>"  required>
                        </div>
                     </div>
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Campus Address Line 2 </label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="caddl2" value="<?php echo $row['caddl2'];?>" >
                        </div>
                     </div>
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Campus Address Line 3 </label><span id="sp">:</span> 
                        </div>
                         
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" value="<?php echo $row['caddl3'];?>"  name="caddl3">
                        </div>
                          </div>
                          <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Campus Pin Code </label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-2 col-sm-2 col-sx-2">
                           <input type="text"  size="6" maxlength="6" class="form-control" name="cpinc" value="<?php echo $row['cpincode'];?>"  required>
                        </div>
                     </div>
                        
                         
                     <br>
                     <div class="col-md-10 col-sm-10 col-sx-12">
                       <input id="submit" name="submit" type="submit" value="Update Student " class="btn btn-success pull-right">
                     </div>
                  </form>
               
            </div>
         </div>
      </div>
   </section>
</div>
<?php include("footer.php");?>