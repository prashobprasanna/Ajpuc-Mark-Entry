<?php
extract($_REQUEST);
include("dbconfig.php");
$flag=0;
$type = explode('@',$fac);
print_r($type[0]);
print_r($type[1]);
$iddept=$type[0].$dept;
$dept=$abcd;
$sdept="kvgenggco_".$_SESSION["dbnamez"];
$logindept=$_SESSION["dbnamez"];
//print_r (explode("@",$fac));
if($sem=='1P' or $sem=='1C' or $sem=='2P' or $sem=='2C')
{
  $flag=1;  
$sql1 = "select * from kvgenggco_admin.subfac where idn='$fac' and subcode='$status' and sem='$sem' and sec='$sec'";

}

else if($sem>2)
{
$sql1 = "select * from kvgenggco_admin.subfac where idn='$fac' and subcode='$status' and sem='$sem' and sec='$sec'";
}

else 
{
$sql1 = "select * from subfac where idn='$fac' and subcode='$status' and sem='$sem' and sec='$sec'";
}

 $quresult = $con->query($sql1); 

$count=0;

  if( $quresult->num_rows > 0)
    {
        
        print_r($sem);
   //     $count=1;
   echo '<script> alert("Faculty and subject already assigned");</script>';
   echo "<script>window.location.assign('subfaclist.php?errorr=true');</script>";

 
    }
else if($flag==1)
{
    $dept="kvgenggco_".$_SESSION["dbnamez"];
    $sdept="kvgenggco_admin";
    
$sql = "INSERT INTO kvgenggco_admin.subfac (`idn`, `subcode`, `sem`,`sec`, `dept`,`sdept`) VALUES ('$iddept', '$status', '$sem','$sec','$dept','$sdept')";
}
else
{
$sql = "INSERT INTO subfac (`idn`, `subcode`, `sem`,`sec`) VALUES ('$iddept', '$status', '$sem','$sec')";
}
 $result = $con->query($sql);
 $last_id = $con->insert_id;
 
 if($logindept=="admin")
 {
     if($result == True )
  {
    echo "<script>window.location.assign('subfaclistPCM.php?asuccess=true');</script>";
   }
  else
  {
    echo "<script>window.location.assign('subfaclistPCM.php?error=true');</script>";
  }
 }
 
 else {
     if($result == True )
  {
    echo "<script>window.location.assign('subfaclist.php?asuccess=true');</script>";
   }
  else
  {
    echo "<script>window.location.assign('subfaclist.php?error=true');</script>";
  }


 }
  