<?php include('header.php');
include('sidebar.php');
extract($_REQUEST); ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Adding Faculties
      </h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Faculty Enroll</li>
      </ol>
      <div class="content">
         <div class="container-fluid">
            <?php
            if (isset($success)) { ?>
               <div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Faculty is added sucessfully</strong>
               </div>
            <?php }
            ?>
            <?php
            if (isset($error)) { ?>
               <div class="alert alert-warning" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Faculty is not added at this time try again!</strong>
               </div>
            <?php }
            ?>
            <a href="Faculty_List.php" class="btn btn-primary pull-right">List Faculties</a>
            <br /><br />
            <div class="panel panel-info">
               <div class="panel-heading">Add Faculty </div>
               <div class="panel-body">
                  <form class="form-horizontal" role="form" method="post" action="saveFaculty.php" enctype="multipart/form-data">

                     <!-- <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label>Photo</label>
                        </div>
                        <div class="col-md-6 col-sm-4 col-sx-12">
                           <div id="kv-avatar-errors-2" class="center-block" style="width:800px;display:none"></div>

                           <div class="kv-avatar center-block" style="width:200px">
                              <div class="file-loading">
                                 <input id="avatar-2" name="userImage" type="file" class="file-loading">
                              </div>
                           </div>
                        </div>
                     </div> -->



                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">FName </label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="fname" required>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">LName </label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="lname" required>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Phone_No</label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="number" maxlength="10" class="form-control" name="fnum" required>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="fcemail" class="control-label">Email_ID</label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="fcemail" autocomplete="off" required>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Status</label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="status">
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Gender</label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="gender">
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="highqual" class="control-label">Qualification</label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <select name="highqual">

                              <option value="B.Sc/M.Sc/B.Ed">B.Sc/M.Sc/B.Ed</option>
                              <option value="B.Com/M.Com/B.Ed">B.Com/M.Com/B.Ed</option>
                              <option value="B.A/M.A/B.Ed">B.A/M.A/B.Ed</option>
                              <option value="BCA/MCA/B.Ed">BCA/MCA/B.Ed</option>
                              <!-- <option value="MBA">MBA</option>
                              <option value="MCA">MCA</option>
                              <option value="M.Tech">M.Tech</option>
                              <option value="M.Arch">M.Arch</option>
                              <option value="Msc">Msc</option>
                              <option value="Msc.Engg">Msc.Engg</option> -->
                              <option value="Ph.D">Ph.D</option>
                              <option value="Ph.D">other</option>
                           </select>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="fcpass" class="control-label">Password</label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="password" minlength="5" class="form-control" name="fcpass" autocomplete="off" required>
                        </div>
                     </div>





                     <!-- <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Address Line 1 </label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="faddl1" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Address Line 2 </label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="faddl2" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Address Line 3 </label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="faddl3" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Pin Code </label><span id="sp">:</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-sx-2">
                           <input type="text" size="6" maxlength="6" class="form-control" name="fpinc" required>
                        </div>
                     </div>
                     

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="desig" class="control-label">Faculty Designation</label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <select name="desig">
                              <option value="Principal">Principal</option>
                              <option value="Professor">Professor</option>
                              <option value="Asst.Professor">Asst.Professor</option>
                              <option value="Assoc.Professor">Assoc.Professor</option>
                              <option value="Lecturer">Lecturer</option>
                           </select>
                        </div>
                     </div> -->

                     

                  

                     <!-- <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="expr" class="control-label">Experience in Years</label><span id="sp">:</span>
                        </div>
                        <div class="col-md-1 col-sm-1 col-sx-12">
                           <input type="number" class="form-control" name="expr" autocomplete="off" required>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="doj" class="control-label">Date Of Join</label><span id="sp">:</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-sx-12">
                           <input type="date" name="doj" data-date-inline-picker="true" required>
                        </div>
                     </div> -->


                    
                     <br>
                     <div class="col-md-10 col-sm-10 col-sx-12">
                        <input id="submit" name="submit" type="submit" value="Add Faculties" class="btn btn-success pull-right">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<?php include("footer.php"); ?>