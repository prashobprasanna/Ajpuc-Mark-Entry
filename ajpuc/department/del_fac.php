<?php
extract($_REQUEST);
include("dbconfig.php");

$sql = "DELETE FROM faculty WHERE Fac_id=$id";
$result = $con->query($sql);

if($result == True ){
   echo "<script>window.location.assign('Faculty_List.php?delsuccess=true');</script>";
}
else{
    echo "<script>window.location.assign('Faculty_List.php?delerror=true');</script>";
}