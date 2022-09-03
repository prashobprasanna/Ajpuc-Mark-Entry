<?php
  include "connection.php";

  if(isset($_POST['addNew']))
  {
    $Name=$_POST['sizename'];
    $desc=$_POST['desc'];
    $sql="INSERT into tbltyresize(sizeName,Description)values('$Name','$desc')";
    if($con->query($sql))
    {

        $_SESSION['success']='Items added successfully';
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }

    header('location: sizes.php');

  }
  else
  {
	header('location: index.php');
  }
  
?>