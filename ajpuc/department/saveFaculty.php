<?php
extract($_REQUEST);
include("dbconfig.php");

$url = "../img/faculty/$fnum.$type";
move_uploaded_file($_FILES['userImage']['tmp_name'], $url);

$sql = "INSERT INTO `faculty` (`Name`, `addl1`, `addl2`, `addl3`, `pinc`, `num`, `pass`,`high_quali`,`designation`,`email`,`expr`,`doj`,`url`) VALUES ('$fname', '$faddl1', '$faddl2', '$faddl3', '$fpinc', '$fnum', '$fcpass','$highqual','$desig','$fcemail','$expr','$doj','$url')";
$result = $con->query($sql);
$last_id = $con->insert_id;
if($result == True ){
   echo "<script>window.location.assign('Faculty_List.php?asuccess=true');</script>";
}
else{
    echo "<script>window.location.assign('Faculty_List.php?error=true');</script>";
}