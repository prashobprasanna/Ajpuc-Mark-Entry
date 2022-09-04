<?php
include("dbconfig.php");
//$type = explode('.', $_FILES['userImage']['name']);
  //  $type = $type[count($type) - 1];

//$url = "../img/test1.jpg";
//move_uploaded_file($_FILES['userImage']['tmp_name'], $url)
$qrr="select `USN` from `students` WHERE 1";
$res=$con->query($qrr);

while($row=$res->fetch_assoc())
{
$usn=$row['USN'];
echo $usn;
$qup="UPDATE `students` SET  `url`='../img/students/$usn.jpg' WHERE `USN`='$usn'";
$resa=$con->query($qup);
}
        ?>

