<?php
  include "connection.php";
  if( session_id()=='')
   session_start();
  // extract($_REQUEST);
  if(isset($_POST['addnew']))
  {
    $name=$_POST['techName'];
    $address=$_POST['techAdd'];
    $contact=$_POST['techPhone'];
    $pass=$_POST['techpass'];
    $desc=$_POST['techdesc'];
    $email=$_POST['techmail'];
    $grade=$_POST['techgrade'];
    $img=$_POST['techprofile'];
    $sql="INSERT into tblemployee(Emp_Name,Emp_Address,Emp_Phone,Emp_Password,Emp_Desc,Emp_Email,grade_Id,Emp_Img) values('$name','$address','$contact','$pass','$desc','$email','$grade','$img')";
    if($con->query($sql))
    {

        $_SESSION['success']='Items added successfully';
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }

    header('location: technician.php');

  }
  else
  {
	header('location: index.php');
  }
  
?>