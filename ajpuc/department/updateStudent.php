<?php
extract($_REQUEST);
include("dbconfig.php");

$ousn= $_SESSION["oldusn"];

$type = explode('.', $_FILES['userImage']['name']);

    $type = $type[count($type) - 1];
    
    if(!empty($type))
    {


$url = "../img/students/$usn.$type";

move_uploaded_file($_FILES['userImage']['tmp_name'], $url);

$sql = "update students set Name='$sname', sec='$sec', sem=$sem, addl1='$addl1', addl2='$addl2', addl3= '$addl3', pincode=$pinc, studnum=$studnum,email='$email', parnum=$parnum, caddl1='$caddl1',caddl2='$caddl2',caddl3='$caddl3',cpincode=$cpinc,USN='$usn',parname='$parname',url='$url' where USN='$ousn'"; 
}
else
{

$sql = "update students set Name='$sname', sec='$sec', sem=$sem, addl1='$addl1', addl2='$addl2', addl3= '$addl3', pincode=$pinc, studnum=$studnum,email='$email', parnum=$parnum, caddl1='$caddl1',caddl2='$caddl2',caddl3='$caddl3',cpincode=$cpinc,USN='$usn',parname='$parname' where USN='$ousn'"; 

}


     
$result = $con->query($sql);

if($result == True ){
	echo "<script>window.location.assign('Student_list.php?usuccess=true');</script>";
}
else{
	echo "<script>window.location.assign('Student_list.php?error=true');</script>";
}
?>