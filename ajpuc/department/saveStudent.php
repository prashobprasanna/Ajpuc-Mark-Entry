<?php
extract($_REQUEST);
include("dbconfig.php");
// $type = explode('.', $_FILES['userImage']['name']);
//     $type = $type[count($type) - 1];

// $url = "../img/students/$usn.$type";
// move_uploaded_file($_FILES['userImage']['tmp_name'], $url);

// if(empty($studnum))
// {
//     $studnum=0;
// }

$sql = "INSERT INTO `student` (`Fname`, `Lname`, `Roll_No`, `DOB`, `Gender`, `SATS_No`,`Enroll_No`,`Reg_No`, `Address_1`, `Address_2`,`City`,`Pincode`,`Phone_No`, `Fathers_Name`, `Mothers_Name`, `Email_ID`) 
        VALUES ('$fname','$lname','$rollno','$dob','$ge', '$sno','$eno','$regno','$add1', '$add2', '$add3', '$pincode', '$contactno', '$fathersame', '$mothersname', '$email')";
$result = $con->query($sql);





// $last_id = $con->insert_id;
if($result == True ){
	echo "<script>window.location.assign('Student_list.php?asuccess=true');</script>";
}
else{
	echo "<script>window.location.assign('Student_list.php?error=true');</script>";
}
?>