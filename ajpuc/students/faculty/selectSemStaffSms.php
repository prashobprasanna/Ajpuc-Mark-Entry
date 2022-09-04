<?php include('header.php');
include('sidebar1.php');
extract($_REQUEST);?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Send SMS 
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
            
         <br/><br/>
            <div class="panel panel-info">
               <div class="panel-heading">Select sem to send SMS</div>
               <div class="panel-body">
                   <form class="form-horizontal" role="form" method="post" action="staffsms.php" enctype="multipart/form-data">
                 
                 
                  <div class="form-group">
                        <div class="col-md-1 col-sm-1 col-sx-2">
                           <label class="control-label">Dear </label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-1 col-sm-1 col-sx-1">
                            <select class="form-control" name="stupar" required>
                                <option value="par">Parents</option>
                                <option value="stu">Students</option>
                                
                            </select>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-sx-6">
                            <select class="form-control" name="templates" required>
                       <option value="temp1">Dear XXXX Enter your message From: Principal-KVGCE</option>
                       <option value="temp1">Dear Sir/Madam, Your ward XXXX was absent for the preparatory examination. From: Principal-KVGCE</option>
                       <option value="temp1">Dear XXXX For more academic information about your ward |B| , Sem-|I| , Branch-|H| , please keep touch with his/her counselor, Name |F| , Ph |G|, From: Principal-KVGCE</option>
                       <option value="temp1">Dear XXXX It is informed you that your ward XXXX is irregular for the class. Hence kindly meet his/her counselor XXXX before 04-03-2015 From: HOD, Dept of CSE, KVGCE.</option>
                       
                       
                       
                       
                       
                           For more academic information about your ward |B| , Sem-|I| , Branch-|H| , please keep touch with his/her counselor, Name |F| , Ph |G|
                           Dear XXXX It is informed you that your ward XXXX is irregular for the class. Hence kindly meet his/her counselor XXXX before 04-03-2015, otherwise they will not be permitted to write the semester exams. From: HOD, Dept of CSE, KVGCE.
                            Dear Sir/Madam, Your ward XXXX was absent for the preparatory examination. From: Principal-KVGCE
                           
                           
                            Dear Parents, The classes for II Semester students commenced from 01-02-2016. It is found that your ward XXXX is not attending the classes, Advice him/her to attend the classes regularly. From: Principal-KVGCE.
                           
                           Dear Students, XXXX Exam for MBA/MCA/MTech course 2015-16. Last date for Registering XXXX Examination date on 8th and 9th August 2015. From: Principal- KVGCE
                            
                         This is to inform you that Infosys Soft Skills Training will commence from 01-08-2016 to 05-08-2016.  Defaulters will be levied fine. <!-- From: TAP-KVGCE.-->
                       
                           Dear XXXX We are happy to inform you that, in the academic year 2015-16 total 32 students selected in campus recruitment from Computer Science & Information Science Engineering branch, Total 139 students selected from our college till date. From: HOD-Dept CSE&ISE, KVGCE.
                           
                          
                           Dear XXXX The registration date of the 6th semester BE students is postponed from 27-01-2016 to 01-02-2016. All are required to register on 01-02-2016. From: Principal- KVGCE.
                          
                         
                          
                           Dear XXXX The Students who have balance of tuition fees to be paid to the college are required to pay the same immediately on or before 29-10-2014 to avoid any further consequences. Due Amount: Rs XXXX From: Principal-KVGCE
                           
                           
                           Dear Sir/Madam, Your ward XXXX was absent for the preparatory examination. From: Principal-KVGCE
                            
                            
                         
                           </select>
                        </div>
                        <div class="col-md-3 col-sm-3 col-sx-3">
                             <select class="form-control" name="froms" required>
                                <option value="From: Principal-KVGCE ">From: Principal-KVGCE </option>
                                <option value="From: Principal-KVGCE ">From: TAP-KVGCE.</option>
                             </select>
                        </div>
                       
                     </div>
                 
                 
                 <div class="clearfix"></div><br />
                 
                  <div class="form-group">
                        <div class="col-md-2 col-sm-2 col-sx-6">
                           <label class="control-label">Selected Template</label><span id="sp">:</span> 
                        </div>
                        
                          <div class="col-md-6 col-sm-6 col-sx-6">
                            <input type="text" class="form-control" value="" name="txttemp" id="txttmp">
                        </div>
                       
                       
                     </div>
                     
                    <div class="clearfix"></div><br />
                    
               
                 
                  <div class="form-group">
                        <div class="col-md-2 col-sm-2 col-sx-12">
                           <label for="branch" class="control-label">Branch</label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-2 col-sm-2 col-sx-2">
                            <select class="form-control" name="branch" required>
                                <option value="civil">Civil</option>
                                <option value="csis">CS & IS</option>
                                <option value="ec">EC</option>
                                <option value="ee">EE</option>
                                <option value="mech">Mechanical</option>
                                
                            </select>
                        </div>
                     </div>
                 
                  <div class="clearfix"></div><br />
                    
                      <div class="form-group">
                        <div class="col-md-2 col-sm-2 col-sx-12">
                           <label for="sem" class="control-label">SEM </label><span id="sp">:</span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-sx-2">
                              
                            <select name="sem" class="form-control">
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
                         <center>
                        <input id="submit" name="submit" type="submit" value="Send SMS" class="btn btn-success">
                        </center>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<?php include("footer.php");?>