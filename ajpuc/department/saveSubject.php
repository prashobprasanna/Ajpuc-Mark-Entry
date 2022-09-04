<?php
extract($_REQUEST);
include("dbconfig.php");
$qu="UPDATE faculty SET subject="."'".$status."'"." WHERE Name="."'".$fac."'";
$result = $con->query($qu);
$last_id = $con->insert_id;
if($result == True ){
    echo "<script>window.location.assign('subfaclist.php?asuccess=true');</script>";
}
else{
    echo "<script>window.location.assign('subfaclist.php?error=true');</script>";
}
?>