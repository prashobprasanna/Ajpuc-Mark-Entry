<?php
extract($_REQUEST);
include("dbconfig.php");

//$type = explode('@',$subs);
//$sub = $type[0];
//$sem = $type[1];
$sdept="kvgenggco_".$_SESSION["dbnamez"];
$subcode=$_SESSION["subcode"];
    $sems=$_SESSION["sems"];
    $facId=$_SESSION["fac"];
    $fdept=$_SESSION["fdept"];
    
//echo "<script>alert('$sems');</script>";
//echo "<script>alert('$facId');</script>";
//echo "<script>alert('$fdept');</script>";

 //$sql1 = "INSERT INTO electiveDetails (`esubcode`, `eidn`) VALUES ('$sub', '$fac')";
 $sql1 = "INSERT INTO kvgenggco_admin.electiveDetails (`esubcode`, `eidn`,fdept,sdept) VALUES ('$subcode', '$facId','$fdept','$sdept')";

$result = $con->query($sql1);
$last_id = $con->insert_id;


 
echo "<script>alert('$last_id');</script>";
foreach($_POST['studentscv'] as $instrument)
{   
    $qu="insert into kvgenggco_admin.electiveStudent(`eselectid`, `esusn`,dept) VALUES ('$last_id', '$instrument','kvgenggco_civil')";
    $result = $con->query($qu);
}

foreach($_POST['studentscs'] as $instrument)
{   
    $qu1="insert into kvgenggco_admin.electiveStudent(`eselectid`, `esusn`,dept) VALUES ('$last_id', '$instrument','kvgenggco_csis')";
    $result1 = $con->query($qu1);
}
foreach($_POST['studentsee'] as $instrument)
{   
    $qu2="insert into kvgenggco_admin.electiveStudent(`eselectid`, `esusn`,dept) VALUES ('$last_id', '$instrument','kvgenggco_ee')";
    $result2 = $con->query($qu2);
}

foreach($_POST['studentsec'] as $instrument)
{   
    $qu3="insert into kvgenggco_admin.electiveStudent(`eselectid`, `esusn`,dept) VALUES ('$last_id', '$instrument','kvgenggco_ec')";
    $result3 = $con->query($qu3);
}
foreach($_POST['studentsme'] as $instrument)
{   
    $qu4="insert into kvgenggco_admin.electiveStudent(`eselectid`, `esusn`,dept) VALUES ('$last_id', '$instrument','kvgenggco_mech')";
    $result4 = $con->query($qu4);
}


if($result == True ){
	echo "<script>window.location.assign('index.php?asuccess=true');</script>";
}
else{
	echo "<script>window.location.assign('index.php?error=true');</script>";
}
?>