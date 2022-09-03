<?php
  include "connection.php";
  if( session_id()=='')
   session_start();
  if(isset($_POST['addNew']))
  {
    $Name=$_POST['brandname'];
    $desc=$_POST['desc'];
    $sql="INSERT into tblbrand(companyName,Description)values('$Name','$desc')";
    if($con->query($sql))
    {

        $_SESSION['success']='Pattern added successfully';
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }

    header('location: brands.php');

  }
  else
  {
	header('location: index.php');
  }
  
?>