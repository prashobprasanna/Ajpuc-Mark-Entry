<?php
extract($_REQUEST);
include("dbconfig.php");
$type = explode('.', $_FILES['userImage']['name']);
    $type = $type[count($type) - 1];

$url = "../img/students/$usn.$type";
move_uploaded_file($_FILES['userImage']['tmp_name'], $url);

if(empty($studnum))
{
    $studnum=0;
}

$sql = "INSERT INTO `students` (`Name`, `sec`, `sem`, `addl1`, `addl2`, `addl3`, `pincode`, `studnum`,`email`, `parnum`, `caddl1`, `caddl2`, `caddl3`, `cpincode`, `USN`, `parname`,`url`,`cycle`) 
        VALUES ('$sname','$sec', $sem, '$addl1', '$addl2', '$addl3', $pinc, $studnum,'$email', $parnum, '$caddl1', '$caddl2', '$caddl3', $cpinc, '$usn', '$parname','$url','$cycle')";
$result = $con->query($sql);





$last_id = $con->insert_id;
if($result == True ){
	echo "<script>window.location.assign('Student_list.php?asuccess=true');</script>";
}
else{
	echo "<script>window.location.assign('Student_list.php?error=true');</script>";
}
?>