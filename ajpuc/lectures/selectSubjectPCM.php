<?php 

include('header.php');
include('sidebar.php');
include('dbconfig.php');
extract($_REQUEST);
$facmail=$_SESSION["email"];
$dep=$_SESSION["dbnamez"];
$snm;


//$_SESSION["subcde"]=$subcodezz;
//$_SESSION["sems"]=$semzz;
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
 
<?php
//$res=$con->query($ql);
?>



<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Add Internal Assessment Marks
      </h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Add IA Marks</li>
      </ol>
      <div class="content">
         <div class="container-fluid">
            <?php
            if(isset($success)){?>
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>IA marks are added sucessfully</strong>
            </div>
            <?php }
            ?>
            <?php
            if(isset($error)){?>
            <div class="alert alert-warning" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>IA marks are not added at this time try again!</strong>
            </div>
            <?php }
            ?>
             <a href="selectSem.php" class="btn btn-primary pull-right">List IA marks</a>
         <br/><br/>
        
        
            <div class="panel panel-info">
               <div class="panel-heading">Select Subject</div>
               <div class="panel-body box-body">
                   
    
    <?php
    
//Other Branch Subjects - login PCM faculty

if($dep=="admin")
{
    ?>
     <form action="otherStudents.php" method="post">
    <div class="col-sm-2">
        <label>Other Branch Subjects : </label>
    </div>
    <div class="col-sm-3">
    <?php
$sql11="SELECT * FROM subfac,faculty  WHERE faculty.idn=subfac.idn and faculty.email='$facmail'";
 $result11 = $con->query($sql11);
 ?>
 <select name="subject1"><?php
    while($row11 = $result11->fetch_assoc())
          { 
           $snm=$row11['sdept']; 
            echo "<script>alert('$snm');</script>";
            $_SESSION["sbdept"]=$snm;
            $sq1zz="SELECT $snm.subjects.Name AS 'Sub Name', $snm.subjects.subcode FROM $snm.subjects,kvgenggco_admin.faculty,kvgenggco_admin.subfac WHERE $snm.subjects.subcode=subfac.subcode AND faculty.idn=subfac.idn AND faculty.email="."'$facmail'";   
            $result12 = $con->query($sq1zz);
           if($row12 = $result12->fetch_assoc())
                        {
           echo "<option value='".$row12['subcode']."'>".$row12['Sub Name']."  [".$row12['subcode']."]</option>"; 
           }
          }
        ?>  </select>
        </div>
         <div class="col-sm-3">
            <input type="submit" value="submit">
         </div>
                         
        <div class="clearfix"></div><br/>
        </form>
        </br>
        <?php
}
 ?>

    
                  
                  
               </div>
            </div>
         </div>
      </div>
       
   </section>
</div>

<style>
    
        
.box-body::-webkit-scrollbar
{
	-webkit-appearance: none;
	width: 14px;
	height: 14px;
}

.box-body::-webkit-scrollbar-thumb
{
	border-radius: 8px;
	border: 3px solid #fff;
	background-color: rgba(0, 0, 0, .3);
}
.box-body {
    width: 100%;
    overflow-y: auto;
    _overflow: auto;
    margin: 0 0 1em;
}

.box-body::-webkit-scrollbar-thumb {
    border-radius: 8px;
    border: 3px solid #fff;
    background-color: rgba(0, 0, 0, .3);
}
    
</style>
<?php include("footer.php");?>