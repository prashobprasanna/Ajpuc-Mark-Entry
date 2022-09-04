<?php
extract($_REQUEST);
include("dbconfig.php");

$sql = "update students set sem='$newsem' where USN='$usn'";
$result = $con->query($sql);
$last_id = $con->insert_id;
if($result == True ){
    echo "<script>alert('Reset Yearback Sucessfuly!!'); window.location.assign('dashboard.php');</script>";
}
else{
    echo "<script>alert('Reset Yearback Failed!!'); window.location.assign('dashboard.php');</script>";
}