
<?php
extract($_REQUEST);
include("dbconfig.php");
$dbz=$_SESSION["dbnamez"];

 $brnch=$_SESSION["brnc"];
 
//session.starts();
for($cnt=0;$cnt<count($susn);$cnt++)
{
   
$usn=$susn[$cnt];
$subcode=$scode[$cnt];
$sem=$ssem[$cnt];
$int1 = $sint1[$cnt];
$int2=$sint2[$cnt];
$int3=$sint3[$cnt];
$att1=$satt1[$cnt];
$att2=$satt2[$cnt];
$att3=$satt3[$cnt];
$tatt1=$statt1[$cnt];
$tatt2=$statt2[$cnt];
$tatt3=$statt3[$cnt];
$aint4=$sint4[$cnt];
$avgint=$savgint[$cnt];

$asgmt=$sasgmt[$cnt];
$totIA=$stotIA[$cnt];

$avgatt=$savgatt[$cnt];
$umarks=$sumarks[$cnt];
$tmarks=$stmarks[$cnt];


    
                            if($brnch == "Civil")
                                $csis = "kvgenggco_civil";
                                else if($brnch == "CSIS")
                                $csis = "kvgenggco_csis";
                                else if($brnch == "EC")
                                $csis = "kvgenggco_ec";
                                else if($brnch == "EE")
                                $csis = "kvgenggco_ee";
                                else if($brnch == "Mech")
                                $csis = "kvgenggco_mech";
                                 else
                                 $csis = "kvgenggco_civil";
    
    $qr="SELECT `int1`,`att1`,`int2`,`att2`,`int3`,`att3`,`tatt1`,`tatt2`,`tatt3`,`aint4`,`avgint`,`asgmt`,`totIA`,`avgatt`,`umarks`,`tmarks` FROM $csis.marks where `usn`='$usn' AND subcode='$subcode' AND `sem`='$sem'";


$resz=$con->query($qr);
$rwcount = mysqli_num_rows($resz);

if($rwcount==0)
{ 
    $qfin="INSERT INTO $csis.marks (`usn`, `subcode`, `sem`, `int1`, `att1`, `int2`, `att2`, `int3`, `att3`, `tatt1`, `tatt2`, `tatt3`,`aint4`,`avgint`,`asgmt`,`totIA`,`avgatt`,`umarks`,`tmarks`) VALUES ('$usn', '$subcode', '$sem', '$int1', '$att1', '$int2', '$att2', '$int3', '$att3', '$tatt1', '$tatt2', '$tatt3','$aint4','$avgint','$asgmt','$totIA','$avgatt','$umarks','$tmarks')";
    $resfin=$con->query($qfin);
    
}
else if ($rwcount>0)
{
    $qfin="UPDATE $csis.marks SET `int1`='$int1',`int2`='$int2',`int3`='$int3', `att1`='$att1',`att2`='$att2',`att3`='$att3',`tatt1`='$tatt1',`tatt2`='$tatt2',`tatt3`='$tatt3',`aint4`='$aint4',`avgint`='$avgint',`asgmt`='$asgmt',`totIA`='$totIA',`avgatt`='$avgatt',`umarks`='$umarks',`tmarks`='$tmarks' WHERE `usn`='$usn' AND `subcode`='$subcode'";
    $resfin=$con->query($qfin);
}


}
?>