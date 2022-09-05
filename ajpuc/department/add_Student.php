<?php include('header.php');
include('sidebar.php');
extract($_REQUEST); ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
   function hidecycle(select) {

      var sem = document.getElementById('sem');

      if (select.value == "1" || select.value == "2") {

         document.getElementById('cyclehide').style.display = "block";
      } else {
         document.getElementById('cyclehide').style.display = "none";
      }
   }
</script>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Students
      </h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Student Enroll </li>
      </ol>
      <div class="content">
         <div class="container-fluid">
            <?php
            if (isset($success)) { ?>
               <div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>General Manager is added sucessfully</strong>
               </div>
            <?php }
            ?>
            <?php
            if (isset($error)) { ?>
               <div class="alert alert-warning" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>General Manager is not added at this time try again!</strong>
               </div>
            <?php }
            ?>
            <a href="Student_list.php" class="btn btn-primary pull-right">List Students</a>
            <br /><br />
            <div class="panel panel-info">
               <div class="panel-heading">Add Students </div>
               <div class="panel-body">
                  <form class="form-horizontal" role="form" method="post" action="saveStudent.php" enctype="multipart/form-data">

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
                           <label for="name" class="control-label">FName
                           </label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="sname" required>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">LName
                           </label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="sname" required>
                        </div>
                     </div>


                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Roll No </label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="usn" required>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">DOB</label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="date" class="form-control" name="usn" required>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           
                           <label for="name" class="control-label">Gender
                           </label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <!-- <input type="text" class="form-control" name="sname" required> -->
                           <select name="Gender">
                              <option disabled selected value> -- select an option -- </option>
                              <option value="m">Male</option>
                              <option value="f">Female</option>
                              <option value="o">Others</option>
                           </select>
                        </div>
                     </div>

                     <!-- <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Phone No
                           </label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="sname" required>
                        </div>
                     </div> -->

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">SATS No
                           </label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="sname" required>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Enrollment No
                           </label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="sname" required>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Reg No
                           </label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="sname" required>
                        </div>
                     </div>





                     <!-- <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Section </label><span id="sp">:</span>
                           <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <label><input type="radio" name="sec" checked="checked" value="a">A</label>
                           <label><input type="radio" name="sec" value="b">B</label>
                           <label><input type="radio" name="sec" value="c">C</label>
                           <label><input type="radio" name="sec" value="d">D</label>
                           <label><input type="radio" name="sec" value="e">E</label>

                           <label><input type="radio" name="sec" value="f">F</label>


                        </div>
                     </div> -->
                     <!-- <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="sem" class="control-label">SEM</label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <select name="sem" id="sem" onchange="hidecycle(this);">
                              <option disabled selected value> -- select an option -- </option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                           </select>
                        </div>
                     </div> -->


                     <!-- <div class="form-group" id="cyclehide" style="display:none">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="cycle" class="control-label">Cycle</label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <select name="cycle" id="cycle">

                              <option>Physics</option>
                              <option>Chemistry</option>

                           </select>
                        </div>
                     </div> -->


                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Address Line 1 </label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="addl1" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Address Line 2 </label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="add12" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">City </label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="addl3">
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">State </label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="addl3">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Pin Code </label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-sx-2">
                           <input type="number" size="6" maxlength="6" class="form-control" name="pinc" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Contact number of Student </label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="tel" maxlength="15" class="form-control" name="studnum">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Father's Name </label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="parname" required>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Mother's Name </label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="parname" required>
                        </div>
                     </div>

                     
                     <!-- <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Contact number of Parent </label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="tel" maxlength="15" class="form-control" name="parnum" required>
                        </div>
                     </div> -->

                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Email Id </label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="email" class="form-control" name="email">
                        </div>
                     </div>

                     <!-- <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Campus Address Line 1 </label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="caddl1" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Campus Address Line 2 </label><span id="sp">:</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="caddl2">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Campus Address Line 3 </label><span id="sp">:</span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-sx-12">
                           <input type="text" class="form-control" name="caddl3">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12 row-4">
                           <label for="name" class="control-label">Campus Pin Code </label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-sx-2">
                           <input type="text" size="6" maxlength="6" class="form-control" name="cpinc" value="574327">
                        </div>
                     </div> -->


                     <br>
                     <div class="col-md-10 col-sm-10 col-sx-12">
                        <input id="submit" name="submit" type="submit" value="Add Student " class="btn btn-success pull-right">
                     </div>
                  </form>

               </div>
            </div>
         </div>
   </section>
</div>
<?php include("footer.php"); ?>