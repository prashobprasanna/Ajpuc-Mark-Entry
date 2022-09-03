<?php
if(session_id()=='')
session_start();
include "connection.php";
if(isset($_POST['register']))
{
    $cName=$_POST['Cust_Name'];
    $cAdd=$_POST['Cust_Address'];
    $cPhone=$_POST['Cust_Phone'];
    $cEmail=$_POST['Cust_Email'];
    $cPass=$_POST['Cust_Password'];
    $cDesc=$_POST['Cust_Desc'];
    

    $sql1=mysqli_query($con,"select * from tblcustomer where Cust_Email='$cEmail'");
    if($result=mysqli_fetch_assoc($sql1))
    {
     $_SESSION['error1']="no";
    header('location: registerC.php');

    }
    else
    {
$sql="INSERT into tblcustomer(Cust_Name,Cust_Address,Cust_Phone,Cust_Email,Cust_Password,Cust_Desc)
values('$cName','$cAdd','$cPhone','$cEmail','$cPass','$cDesc')";
if($con->query($sql))
{
    $_SESSION['success']='Customer info added successfully';
}
else
{
    $_SESSION['error']='Please check the values';
    echo'Customer info not added';
}
echo'Enter values';
header('location: login1.php');

}
}
else
{
  header('location: index.php');
}

?>