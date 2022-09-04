
<?php
extract($_REQUEST);
include("dbconfig.php");
$type = explode('@',$id);
    $usn=$type[0];
     $eselectid=$type[1];
$sql = "DELETE FROM electiveStudent WHERE  eselectid='$eselectid' and esusn='$usn'";
$result = $con->query($sql);

if($result == True ){
   echo "<script>window.location.assign('listElective.php?success=true');</script>";
}
else{
    echo "<script>window.location.assign('listElective.php?deasucc=true');</script>";
}