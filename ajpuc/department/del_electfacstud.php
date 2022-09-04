<?php
extract($_REQUEST);
include("dbconfig.php");
$arr=explode('@',$id);
$id=$arr[0];
$sub=$arr[1];
echo "<script>alert('$id');</script>";
echo "<script>alert('$sub');</script>";
$sql1 = "select electId  FROM electiveDetails WHERE eidn=$id and esubcode='$sub'";
$result1 = $con->query($sql1);
 if($row1 = $result1->fetch_assoc())
 {
    $ids=$row1['electId'];   
    
   
echo "<script>alert('$ids');</script>";
    
   // echo "<script>window.alert('Do you really want to delete $id faculty and students from the list');</script>";
   // delete elective details 
    $sql = "DELETE FROM electiveDetails WHERE eidn=$id and esubcode='$sub'";
    $result = $con->query($sql);
    
    // delete elective students
     $sql2 = "DELETE FROM electiveStudent  WHERE eselectid=$ids";
    $result2 = $con->query($sql2);
    
 }



if($result == True ){
   echo "<script>window.location.assign('subfaclist.php?delsuccess=true');</script>";
}
else{
    echo "<script>window.location.assign('subfaclist.php?delerror=true');</script>";
}