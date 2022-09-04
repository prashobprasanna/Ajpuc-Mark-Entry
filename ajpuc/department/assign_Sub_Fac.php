<?php include('header.php');
include('sidebar.php');
extract($_REQUEST);?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php 

    $tm = "SELECT Name,subcode FROM kvgenggco_admin.subjects where sem='1C'";
    $sm = $con->query($tm);
    $res1c='';
    while($row = $sm->fetch_assoc()){
        $res1c=$res1c."<option value=".$row['subcode'].">".$row['Name']." [".$row['subcode']."]</option>"; 
        }
  ?>
  <?php 

    $tm = "SELECT Name,subcode FROM kvgenggco_admin.subjects where sem='1P'";
    $sm = $con->query($tm);
    $res1p='';
    while($row = $sm->fetch_assoc()){
        $res1p=$res1p."<option value=".$row['subcode'].">".$row['Name']." [".$row['subcode']."]</option>"; 
        }
  ?>
  
  <?php 

    $tm = "SELECT Name,subcode FROM kvgenggco_admin.subjects where sem='2P'";
    $sm = $con->query($tm);
    $res2p='';
    while($row = $sm->fetch_assoc()){
        $res2p=$res2p."<option value=".$row['subcode'].">".$row['Name']." [".$row['subcode']."]</option>"; 
        }
  ?>
  <?php 

    $tm = "SELECT Name,subcode FROM kvgenggco_admin.subjects where sem='2C'";
    $sm = $con->query($tm);
    $res2c='';
    while($row = $sm->fetch_assoc()){
        $res2c=$res2c."<option value=".$row['subcode'].">".$row['Name']." [".$row['subcode']."]</option>"; 
        }
  ?>
  
<?php 
    $tm = "SELECT Name,subcode FROM subjects WHERE sem=3 and elective=0";
    $sm = $con->query($tm);
    $res3='';
    while($row = $sm->fetch_assoc()){
        $res3=$res3."<option value=".$row['subcode'].">".$row['Name']." [".$row['subcode']."]</option>"; 
        }
  ?>
  <?php 
    $tm = "SELECT Name,subcode FROM subjects WHERE sem=4 and elective=0";
    $sm = $con->query($tm);
    $res4='';
    while($row = $sm->fetch_assoc()){
        $res4=$res4."<option value=".$row['subcode'].">".$row['Name']." [".$row['subcode']."]</option>"; 
        }
  ?>
<?php 
    $tm = "SELECT Name,subcode FROM subjects WHERE sem=5 and elective=0";
    $sm = $con->query($tm);
    $res5='';
    while($row = $sm->fetch_assoc()){
        $res5=$res5."<option value=".$row['subcode'].">".$row['Name']." [".$row['subcode']."]</option>"; 
        }
  ?>
<?php 
    $tm = "SELECT Name,subcode FROM subjects WHERE sem=6 and elective=0";
    $sm = $con->query($tm);
    $res6='';
    while($row = $sm->fetch_assoc()){
        $res6=$res6."<option value=".$row['subcode'].">".$row['Name']." [".$row['subcode']."]</option>"; 
        }
  ?>
<?php 
    $tm = "SELECT Name,subcode FROM subjects WHERE sem=7 and elective=0";
    $sm = $con->query($tm);
    $res7='';
    while($row = $sm->fetch_assoc()){
        $res7=$res7."<option value=".$row['subcode'].">".$row['Name']." [".$row['subcode']."]</option>"; 
        }
  ?>
<?php 
    $tm = "SELECT Name,subcode FROM subjects WHERE sem=8 and elective=0";
    $sm = $con->query($tm);
    $res8='';
    while($row = $sm->fetch_assoc()){
        $res8=$res8."<option value=".$row['subcode'].">".$row['Name']." [".$row['subcode']."]</option>"; 
        }
        
        
  ?>
  
  
<script type="text/javascript">
    $(document).ready(function() {
  $("#sem").change(function() {

    var el = $(this) ;

    if(el.val() === "1P") {
      var app='<?php echo $res1p ;?>';
      $("#status option").remove()
    $("#status").append(app);
    }
    
    else if(el.val() === "1C") {
      var app='<?php echo $res1c ;?>';
      $("#status option").remove()
    $("#status").append(app);
    }
    else if(el.val() === "2P" ) {
        var app1='<?php echo $res2p ;?>';
        $("#status option").remove()
    $("#status").append(app1); }
    
    else if(el.val() === "2C" ) {
        var app1='<?php echo $res2c ;?>';
        $("#status option").remove()
    $("#status").append(app1); }
    
    else if(el.val() === "3" ) {
       var app2='<?php echo $res3 ;?>';
       $("#status option").remove()
    $("#status").append(app2); ; }
    
    else if(el.val() === "4" ) {
        var app3='<?php echo $res4 ;?>';
        $("#status option").remove()
    $("#status").append(app3); }
    
    else if(el.val() === "5" ) {
        var app3='<?php echo $res5 ;?>';
        $("#status option").remove()
    $("#status").append(app3); }
    
    else if(el.val() === "6" ) {
        var app3='<?php echo $res6 ;?>';
        $("#status option").remove()
    $("#status").append(app3); }
    
    else if(el.val() === "7" ) {
        var app3='<?php echo $res7 ;?>';
        $("#status option").remove()
    $("#status").append(app3); }
    
    else if(el.val() === "8" ) {
        var app3='<?php echo $res8 ;?>';
        $("#status option").remove()
    $("#status").append(app3); }
  });

});
 
</script>

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Assign Subject To Faculty
      </h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Assign Subject to Faculty</li>
      </ol>
      <div class="content">
         <div class="container-fluid">
            <?php
            if(isset($success)){?>
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Subject is assigned sucessfully</strong>
            </div>
            <?php }
            ?>
            <?php
            if(isset($error)){?>
            <div class="alert alert-warning" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Subject is not assigned at this time try again!</strong>
            </div>
            <?php }
            ?>
            <a href="subfaclist.php" class="btn btn-primary pull-right">List of Subjects Assigned</a>
         <br/><br/>
         


         
         
            <div class="panel panel-info">
               <div class="panel-heading">Assign Subject to Faculty </div>
               <div class="panel-body">
                  <form class="form-horizontal" role="form" method="post" action="SaveSabFac.php" enctype="multipart/form-data">
                   
                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="fac" class="control-label">Faculty</label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <select name="fac">
                            <?php 
                      $qu = "SELECT Name,idn FROM faculty";
                        $quresult = $con->query($qu); 
                       while($row = $quresult->fetch_assoc()){
                             echo "<option value='".$row['idn']."'>".$row['Name']."</option>";}        
                      ?>
                            
                              
                            </select>
                        </div>
                     </div>
                     
                      
                        <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="sem" class="control-label">SEM</label><span id="sp">:</span> <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <select name="sem" id="sem" onchange="hidecycle(this);">
                                <option disabled selected value> -- select an option -- </option>
                                <option value="1P">1 Physics</option>
                                <option value="1C">1 Chemistry</option>
                                <option value="2P">2 Physics</option>
                                <option value="2C">2 Chemistry</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                 <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                      </div>

                     
                      <!--<div class="form-group" id="cyclehide" style="display:none">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="cycle" class="control-label">Cycle</label><span id="sp">:</span> 
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <select name="cycle" id="cycle" onchange="changeCycle(this);">
                                
                                
                                
                                 <option value="1P">1 Physics</option>
                                <option value="1C">1 Chemistry</option>
                                <option value="2P">2 Physics</option>
                                <option value="2C">2 Chemistry</option>
                                <option>Physics</option>
                                <option>Chemistry</option>
                                
                            </select>
                        </div>
                     </div>-->
                     
                     
                     
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Section </label><span id="sp">:</span> 
                           <span style="color:#f00">*</span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            <label><input type="radio" name="sec" checked="checked" value="A">A</label>
                             <label><input type="radio"  name="sec" value="B">B</label>
                             <label><input type="radio"  name="sec" value="C">C</label>
                             <label><input type="radio"  name="sec" value="D">D</label>
                            <label><input type="radio"  name="sec" value="E">E</label>
                            <label><input type="radio"  name="sec" value="F">F</label>

                             
                        </div>
                     </div>
                     
                     
                     <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-sx-12">
                           <label for="name" class="control-label">Subject </label><span id="sp">:</span>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-sx-12">
                            
                            <select id="status" name="status">
                                <option>please select</option>

                              
                            </select>
                        </div>
                     </div>
                     
                  
                     <br>
                     <div class="col-md-10 col-sm-10 col-sx-12">
                        <input id="submit" name="submit" type="submit" value="Assign Subject" class="btn btn-success pull-right">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<?php include("footer.php");?>