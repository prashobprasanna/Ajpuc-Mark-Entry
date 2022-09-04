<?php
extract($_REQUEST);
include("dbconfig.php");




$sql = "DELETE FROM students WHERE idn=$id";
$result = $con->query($sql);

if($result == True ){
   echo "<script>window.location.assign('Student_list.php?delsuccess=true');</script>";
}
else{
    echo "<script>window.location.assign('Student_list.php?delerror=true');</script>";
}