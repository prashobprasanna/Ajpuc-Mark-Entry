<?php
extract($_REQUEST);
include("dbconfig.php");
$sql="";
$result="";
$last_id="";

$subno="SELECT faculty.Name as facname,subjects.Name as subname,subjects.sem FROM subjects,faculty WHERE faculty.subject=subjects.Name AND (faculty.Name="."'".$email."'"." OR faculty.email="."'".$email."'".")";

$snum = $con->query($subno);
$row = $snum->fetch_assoc();

if($intrnl==1){
    $sql = "UPDATE marks SET int1="."'".$marks."',"." subname="."'".$row['subname']."',"." sem="."'".$row['sem']."',"." att1="."'".$att."',"." tatt1="."'".$tatt."',"." usn="."'".$usn."'".";";
   
    $result = $con->query($sql);
    $last_id = $con->insert_id;

    
}else if($intrnl==2){
     $sql = "UPDATE marks SET int2="."'".$marks."',"." subname="."'".$row['subname']."',"." sem="."'".$row['sem']."',"." att2="."'".$att."',"." tatt2="."'".$tatt."',"." usn="."'".$usn."'".";";
    $result = $con->query($sql);
    $last_id = $con->insert_id;

    
    
}else if($intrnl==3){
     $sql = "UPDATE marks SET int3="."'".$marks."',"." subname="."'".$row['subname']."',"." sem="."'".$row['sem']."',"." att3="."'".$att."',"." tatt3="."'".$tatt."',"." usn="."'".$usn."'".";";
    $result = $con->query($sql);
    $last_id = $con->insert_id;

    
    
}

if($result == True ){
	echo "<script>window.location.assign('listia.php?asuccess=true');</script>";
}
else{
	echo "<script>window.location.assign('listia.php?error=true');</script>";
}
?>