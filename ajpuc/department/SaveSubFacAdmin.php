<?php
extract($_REQUEST);
include("dbconfig.php");
$type = explode('@',$fac);
print_r($type[0]);
print_r($type[1]);
$iddept=$type[0].$dept;
$dept=$abcd;
$sdept="kvgenggco_".$_SESSION["dbnamez"];

//if($sem=='1P' or $sem=='1C' or $sem=='2P' or $sem=='2C')
$sql = "INSERT INTO kvgenggco_admin.subfac (`idn`, `subcode`, `sem`,`sec`,`dept`,`sdept`) VALUES ('$iddept', '$status', '$sem','$sec','$dept','$sdept')";

$result = $con->query($sql);
$last_id = $con->insert_id;
if($result == True ){
    echo "<script>window.location.assign('SubFacListAdmin.php?asuccess=true');</script>";
}
else{
    echo "<script>window.location.assign('SubFacListAdmin.php?error=true');</script>";
}