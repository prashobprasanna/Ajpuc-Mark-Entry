<?php
extract($_REQUEST);
include("dbconfig.php");

$sql = "UPDATE students SET sem=sem+1 where sem!='0'";
$result = $con->query($sql);
$last_id = $con->insert_id;
if($result == True ){
    echo "<script>alert('Semester Incremented Sucessfully'); window.location.assign('dashboard.php');</script>";
}
else{
    echo "<script>alert('Semester Incremented Failed!!');window.location.assign('dashboard.php');</script>";
}