<?php
extract($_REQUEST);
include("dbconfig.php");
$dbz=$_SESSION["dbnamez"];
$sem=$_SESSION["semss"];
 echo "<script>alert('my value sem: $sem');</script>";
$intern=$_SESSION["intern"];
$sql="select * from kvgenggco_admin.approved where branch='$dbz' and sem='$sem' and intern='$intern'";
$result1 = $con->query($sql);
 if($rowsub = $result1->fetch_assoc())
 {
    if($sem<3 )
    {
     echo "<script>window.location.assign('select1yrSem.php?upderr=true');</script>";
    }
    else
    echo "<script>window.location.assign('selectSem.php?upderr=true');</script>";
    
 }
  else{
    
    
    
    $qu="insert into kvgenggco_admin.approved (branch,sem,remark,intern)values('$dbz','$sem','approved','$intern')";
    $result = $con->query($qu);
    $last_id = $con->insert_id;
    
     echo "<script>alert('my value 1: $sem');</script>";
     
     
       if($result == True && $sem<3 )
    {
     echo "<script>window.location.assign('select1yrSem.php?asuccess=true');</script>";
    }
    else if($sem<3)
    {
     echo "<script>window.location.assign('select1yrSem.php?error=true');</script>";
    } 
    
   else if($sem>2 && $result == True)
   {
  
     echo "<script>window.location.assign('selectSem.php?asuccess=true');</script>";
    }
    else if($sem>2)
    {
     echo "<script>window.location.assign('selectSem.php?error=true');</script>";
    }
  
  }
?>