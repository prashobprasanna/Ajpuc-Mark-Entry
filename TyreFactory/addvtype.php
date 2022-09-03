<?php
  include "connection.php";
  if( session_id()=='')
   session_start();
  if(isset($_POST['addNew']))
  {
    $Name=$_POST['vtypename'];
    $desc=$_POST['desc'];
    $sql="INSERT into tblvehicletype(typeName,Description)values('$Name','$desc')";
    if($con->query($sql))
    {

        $_SESSION['success']='Type added successfully';
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }

    header('location: vehicletype.php');

  }
  else
  {
	header('location: index.php');
  }
  
?>