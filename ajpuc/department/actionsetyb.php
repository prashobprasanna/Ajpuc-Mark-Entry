<?php
extract($_REQUEST);
include("dbconfig.php");

$prefix="yb";


$sql = "UPDATE students SET sem='$prefix' where USN='$usn'";
$result = $con->query($sql);
$last_id = $con->insert_id;
if($result == True ){
    echo "<script>alert('Yearback Set Sucessfuly!!'); window.location.assign('dashboard.php');</script>";
}
else{
    echo "<script>alert('Yearback Set Failed!!'); window.location.assign('dashboard.php');</script>";
}