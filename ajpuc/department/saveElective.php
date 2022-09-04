<?php
extract($_REQUEST);
include("dbconfig.php");

//$type = explode('@',$subs);
//$sub = $type[0];
//$sem = $type[1];

 $sub=$_SESSION["subcodes"];
   $sem= $_SESSION["sems"];
   $fac= $_SESSION["facid"];


 $sqlc = "select * from electiveDetails where esubcode='$sub' and eidn='$fac'";
 $resultc = $con->query($sqlc);
  $rowcount1=mysqli_num_rows($resultc);
        if($rowcount1>=1)
           {
               echo "<script>alert('Already Assigned Subject to Faculty ');</script>";
                if($row1 = $resultc->fetch_assoc())
                {
                      $last_id1= $row1['electId'];
                       echo "<script>alert('idn of fac=$last_id1');</script>";
                }
                
           
                
                
            foreach($_POST['students'] as $instrument)
        {  
           
            $sqlst1 = "select * from electiveStudent where eselectid='$last_id1' and esusn='$instrument'";
          $resultst1 = $con->query($sqlst1);
         $rowcount2=mysqli_num_rows($resultst1);    
         if($rowcount2<1)
           {    
           $qu2="insert into electiveStudent(`eselectid`, `esusn`) VALUES ('$last_id1', '$instrument')";
          $result = $con->query($qu2);
           echo "<script>alert('student=$last_id1');</script>";
           }
        
        }
            
            }
        else
       {
 $sql1 = "INSERT INTO `electiveDetails` (`esubcode`, `eidn`) VALUES ('$sub', $fac)";
                                

$result = $con->query($sql1);
$last_id = $con->insert_id;


 
echo "<script>alert('$last_id');</script>";

foreach($_POST['students'] as $instrument)
{   
    $qu="insert into electiveStudent(`eselectid`, `esusn`) VALUES ('$last_id', '$instrument')";
    $result = $con->query($qu);
}

}
if($result == True ){
	echo "<script>window.location.assign('listElective.php?asuccess=true');</script>";
}
else{
	echo "<script>window.location.assign('listElective.php?error=true');</script>";
}
?>