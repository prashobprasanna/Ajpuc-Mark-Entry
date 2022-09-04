<?php
extract($_REQUEST);
include("dbconfig.php");

 
// if($sem == '1P' || $sem == '1C' || $sem == '2P' || $sem == '2C')

// {
//   $sql1 = "SELECT * From kvgenggco_admin.subjects where subcode='$subcode' and sem='$sem'";
//   $result1 = $con->query($sql1);
//    if($row = $result1->fetch_assoc())
//    {
//        echo "<script>window.location.assign('listsubs.php?upderr=true');</script>";
//    }
//    else
//    {
//         echo "<script>alert('$subcode $subname $sem');</script>";
       
//     $sql = "INSERT INTO kvgenggco_admin.subjects (`subcode`, `Name`, `sem`) VALUES ('$subcode', '$subname', '$sem')";
//    }
// }
// else
// {
//       $sql2 = "SELECT * From subjects where subcode='$subcode'";
//   $result2 = $con->query($sql2);
//    if($row = $result2->fetch_assoc())
//    {
//        echo "<script>window.location.assign('listsubs.php?upderr=true');</script>";
//    }
//   else
//    $sql = "INSERT INTO `subjects` (`Name`, `subcode`, `sem`,`elective`) VALUES ('$subname', '$subcode', '$sem',$elect)";
// }

$sql="INSERT INTO `subject` (`Sub_Name`, `Description`, `Br_Details_ID`, `Sub_Code`, `Status`) VALUES ('$subname', '$Description', '$class', '$subcode', '$Status')";

$result = $con->query($sql);
$last_id = $con->insert_id;


if($result == True ){
    echo "<script>window.location.assign('listsubs.php?asuccess=true');</script>";
}
else{
    echo "<script>window.location.assign('listsubs.php?error=true');</script>";
}