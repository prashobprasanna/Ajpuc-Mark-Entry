
<?php
extract($_REQUEST);
include("dbconfig.php");
$flag=0;
$type = explode('@',$subso);

$subcode=$type[0];
$sem=$type[1];


$dept=$abcd; //selected department
$sdept="kvgenggco_".$_SESSION["dbnamez"]; // login and subject department
$_SESSION["sems"]=$sem;
$_SESSION["subcode"]=$subcode;
$_SESSION["fac"]=$fac;
$_SESSION["fdept"]=$dept;

//print_r (explode("@",$fac));

//if($sem=='1P' or $sem=='1C' or $sem=='2P' or $sem=='2C')
//{
 // $flag=1;  
//$sql1 = "select * from kvgenggco_admin.subfac where idn='$fac' and subcode='$subcode' and sem='$sem' and sec='$sec'";

//}

$sql1 = "select * from kvgenggco_admin.subfac where idn='$fac' and subcode='$subcode' and sem='$sem' and dept='$dept' and sdept = '$sdept'";

 $quresult = $con->query($sql1); 

$count=0;

  if( $quresult->num_rows > 0)
    {
        
        print_r($sem);
   //     $count=1;
   echo '<script> alert("Faculty and subject already assigned");</script>';
   echo "<script>window.location.assign('AssignOElective.php?asuccess=true');</script>";

 
    }
else
{
   // $dept="kvgenggco_".$_SESSION["dbnamez"];
    //$sdept="kvgenggco_admin";
    $sec="";
$sql = "INSERT INTO kvgenggco_admin.subfac (`idn`, `subcode`, `sem`,`sec`, `dept`,`sdept`) VALUES ('$fac', '$subcode', '$sem','$sec','$dept','$sdept')";
}
//else
//{
//$sql = "INSERT INTO subfac (`idn`, `subcode`, `sem`,`sec`) VALUES ('$iddept', '$status', '$sem','$sec')";
//}
 $result = $con->query($sql);
 $last_id = $con->insert_id;
  if($result == True )
  {
    echo "<script>window.location.assign('AssignOElective.php?asuccess=true');</script>";
   }
  else
  {
    echo "<script>window.location.assign('AssignOElective.php?error=true');</script>";
  }
