<?php
  include "connection.php";
  // extract($_REQUEST);
  if(isset($_POST['addnew']))
  {
    $name=$_POST['supName'];
    $address=$_POST['supAdd'];
    $contact=$_POST['supPhone'];
    $desc=$_POST['supdesc'];
    $email=$_POST['supmail'];
    $profile=$_POST['supprofile'];
    $sql="INSERT into tblsupplier(Sup_Name,Sup_Address,Sup_Phone,Sup_Desc,Sup_Email,Sup_Img) values('$name','$address','$contact','$desc','$email','$profile')";
    if($con->query($sql))
    {

        $_SESSION['success']='Supplier added successfully';
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }

    header('location: supplier.php');

  }
  else
  {
	header('location: index.php');
  }
  
?>