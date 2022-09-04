<?php
extract($_REQUEST);
include("dbconfig.php");
$arr=explode('@',$id);
$id=$arr[0];
$sub=$arr[1];



$sql1 = "select * FROM subfac WHERE idn=$id and subcode='$sub'";
$result1 = $con->query($sql1);

if($row1 = $result1->fetch_assoc())
{
    

    $sql = "DELETE FROM subfac WHERE idn=$id and subcode='$sub'";
    $result = $con->query($sql);

    if($result == True )
    {
     echo "<script>window.location.assign('subfaclist.php?delsuccess=true');</script>";
    }
    else
    {
    echo "<script>window.location.assign('subfaclist.php?delsuccess=true');</script>";
    }

}
else
{
    $sql2 = "DELETE FROM kvgenggco_admin.subfac WHERE idn=$id and subcode='$sub'";
     $result2 = $con->query($sql2);
      
      if($result2 == True )
   {
   echo "<script>window.location.assign('subfaclist.php?delsuccess=true');</script>";
   }
   else
   {
    echo "<script>window.location.assign('subfaclist.php?delsuccess=true');</script>";
   }
}