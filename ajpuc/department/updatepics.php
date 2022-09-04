<?php
extract($_REQUEST);
include("dbconfig.php");

 

$type = explode('.', $_FILES['userImage']['name']);

    $type = $type[count($type) - 1];
    
    if(!empty($type))
    {


$url = "../img/faculty/$fnum.$type";

move_uploaded_file($_FILES['userImage']['tmp_name'], $url);
if(empty($desig)=='' && $highqual=='')
$sql = "UPDATE faculty SET name='$fname',email='$fcemail',url='$url',addl1='$faddl1',addl2='$faddl2',addl3='$faddl3',pinc='$fpinc',num='$fnum',pass='$fcpass',expr='$expr',doj='$doj' where idn='$oldid'"; 
else if($highqual=='')
$sql = "UPDATE faculty SET name='$fname',email='$fcemail',url='$url',addl1='$faddl1',addl2='$faddl2',addl3='$faddl3',pinc='$fpinc',num='$fnum',pass='$fcpass',designation='$desig',expr='$expr',doj='$doj' where idn='$oldid'"; 
else if($desig=='')
$sql = "UPDATE faculty SET name='$fname',email='$fcemail',url='$url',addl1='$faddl1',addl2='$faddl2',addl3='$faddl3',pinc='$fpinc',num='$fnum',pass='$fcpass',high_quali='$highqual',expr='$expr',doj='$doj' where idn='$oldid'"; 
else
$sql = "UPDATE faculty SET name='$fname',email='$fcemail',url='$url',addl1='$faddl1',addl2='$faddl2',addl3='$faddl3',pinc='$fpinc',num='$fnum',pass='$fcpass',designation='$desig',high_quali='$highqual',expr='$expr',doj='$doj' where idn='$oldid'";
}
else
{
if($desig=='' && $highqual=='')
$sql = "UPDATE faculty SET name='$fname',email='$fcemail',addl1='$faddl1',addl2='$faddl2',addl3='$faddl3',pinc='$fpinc',num='$fnum',pass='$fcpass',expr='$expr',doj='$doj' where idn='$oldid'"; 
else if($highqual=='')
$sql = "UPDATE faculty SET name='$fname',email='$fcemail',addl1='$faddl1',addl2='$faddl2',addl3='$faddl3',pinc='$fpinc',num='$fnum',pass='$fcpass',designation='$desig',expr='$expr',doj='$doj' where idn='$oldid'"; 
else if($desig=='')
$sql = "UPDATE faculty SET name='$fname',email='$fcemail',$url',addl1='$faddl1',addl2='$faddl2',addl3='$faddl3',pinc='$fpinc',num='$fnum',pass='$fcpass',high_quali='$highqual',expr='$expr',doj='$doj' where idn='$oldid'"; 
else
$sql = "UPDATE faculty SET name='$fname',email='$fcemail',addl1='$faddl1',addl2='$faddl2',addl3='$faddl3',pinc='$fpinc',num='$fnum',pass='$fcpass',designation='$desig',high_quali='$highqual',expr='$expr',doj='$doj' where idn='$oldid'";

}


     
$result = $con->query($sql);

if($result == True ){
	echo "<script>window.location.assign('Faculty_List.php?upsuccess=true');</script>";
}
else{
	echo "<script>window.location.assign('Faculty_List.php?uperror=true');</script>";
}
?>














