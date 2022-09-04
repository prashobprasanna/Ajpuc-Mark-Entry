<?php
extract($_REQUEST);
include("dbconfig.php");
$dbz=$_SESSION["dbnamez"];


if($dbz!="admin")
{
foreach($_POST['students'] as $instrument)
{   
    $qu="UPDATE students SET cordinator='$fac' WHERE USN='$instrument'";
    $result1 = $con->query($qu);
}
}
else

{
    
   
foreach($_POST['maklu'] as $maklausn)
{   
    
    
    $type = explode('@',$maklausn);

$usns=$type[0];
$b1=$type[1];
    $qu1="UPDATE $b1.students SET cordinator='$fac' WHERE USN='$usns'";
    $result = $con->query($qu1);
}    
    
}




if($result == True ){
	echo "<script>window.location.assign('Cordinator_List.php?asuccess=true');</script>";
}
else{
	echo "<script>window.location.assign('Cordinator_List.php?error=true');</script>";
}
?>