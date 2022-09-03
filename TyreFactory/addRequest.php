<?php
  include "connection.php";
   extract($_REQUEST);
  if(isset($_POST['addnew']))
  {
    $odate=$_POST['Odate'];
    $custid=$_POST['custid'];
    $service=$_POST['one'];
    $qty=$_POST['qty'];
    $stype=$_POST['stype'];
    $vtype=$_POST['vtype'];
    $vnum=$_POST['Vnum'];
    $tnum=$_POST['Tnum'];
    $tsize=$_POST['tsize'];


    $tbrand=$_POST['tbrand'];
    $tpattern=$_POST['tpattern'];
    
    $sql1=mysqli_query($con,"SELECT * FROM tblservice where serviceName='$service'");
    if($result1= mysqli_fetch_assoc($sql1))
     $service= $result1['service_id'];

     $sql="INSERT into tblworkorder(orderDate,tyreNumber,vehicleNumber,size_Id,company_Id,pattern_Id,Cust_Id,service_id,vehicletype_id,service_type,qty)
                             values('$odate','$tnum','$vnum','$tsize','$tbrand','$tpattern',$custid,$service,'$vtype','$stype','$qty')";

    if($con->query($sql))
    {
       
        $_SESSION['success']='Order  added successfully';
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }

    header('location:work-order-status.php');

  }
  else
  {
	header('location: index.php');
  }
  
?>