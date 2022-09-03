<?php
  include "connection.php";
  if( session_id()=='')
  session_start();
  if(isset($_POST['addNew']))
  {
    $Name=$_POST['patname'];
    $desc=$_POST['desc'];
    $sql="INSERT into tbltyrepattern(patternName,Description)values('$Name','$desc')";
    if($con->query($sql))
    {

        $_SESSION['success']='Pattern added successfully';
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }

    header('location: patterns.php');

  }
  else
  {
	header('location: index.php');
  }
  
?>