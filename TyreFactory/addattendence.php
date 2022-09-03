<?php
if(session_id()=='')
session_start();
  include "connection.php";
  // extract($_REQUEST);
  if(isset($_POST['addAtt']))
  {
    $empid=$_POST['empid'];
    $attdate=$_POST['attdate'];
    $attstatus=$_POST['attstatus'];
	
	$year = date('Y', strtotime($attdate));

$month = date('F', strtotime($attdate));

    $sql1=mysqli_query($con,
	"select * from tblattendence where Emp_Id='$empid' and month(AttDate)='$month' and year(AttDate)='$year'");
    if($result=mysqli_fetch_assoc($sql1))
    {
           $_SESSION['atten1']="exists";
      header('location: attendence.php');
    }
    else
    {
      
    $sql="INSERT INTO tblattendence(Emp_Id,AttDate,AttStatus) VALUES('$empid','$attdate','$attstatus')";
    if($con->query($sql))
    {

        $_SESSION['success']='Attendence details added successfully';
        
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }
  }
    header('location: attendence.php');
  }
  
?>