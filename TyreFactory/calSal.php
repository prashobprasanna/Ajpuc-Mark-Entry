<?php
 if( session_id()=='')
 session_start();
extract($_REQUEST);
include("connection.php");


if(isset($_POST['addSal']))
  {
    $empid=$_POST['empid'];
    $amount=$_POST['sal'];
   // $amt=$_POST['amtt'];
    $doi=$_POST['doi'];
    
    $month = date("m",strtotime($doi));
    $year=date('Y', strtotime($doi));

 $amount=$amount * $_POST['nod'];
 if(isset($_SESSION['already']))
 {
   
  echo '<script language="javascript">';
  echo 'alert("Salary Details aready exists")';
  echo '</script>'; 

 unset($_SESSION['already']);
  header('location: attendence.php');
 }
  else
  {


    $sql="INSERT into tblsalary(Emp_Id,amount,doi) values('$empid',$amount,'$doi')";
    if($con->query($sql))
    {

        $_SESSION['success']='Salary added successfully';
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }

  }
    header('location: attendence.php');

  }
 
?>

   <!DOCTYPE html>
   <html lang="en">
   <head>


  
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Tyre Resole Factory Management System</title>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   </head>
   <body>
    <br>
    <br>
    <?php
                	include('connection.php');
                    $i=1;
                     if(isset($_POST['calsal']))
                      $MONYEAR=$_POST['attdate'];
                    //  echo $MONYEAR;
                       
                      $empid=$_POST['empids'];
                    //  echo $empid;
                      $month = date("m",strtotime($MONYEAR));
                      $year=date('Y', strtotime($MONYEAR));
                     // $time=strtotime($MONYEAR);
                    //   $month=date("m",$time);
                    //   $year=date("Y",$time);

      $sql1=mysqli_query($con,"select * from tblsalary where Emp_Id='$empid' and month(doi)='$month' and year(doi)='$year'");

 if($result1= mysqli_fetch_assoc($sql1))
  {
  
      
     echo '<script language="javascript">';
     echo 'alert("Salary Details aready exists")';
     echo '</script>'; 
    $_SESSION['already']="notok";
   // unset($_SESSION['atten1']);

 // header('location: attendence.php');

  }
                      
?>
     <form action="" method="post">
    <div class="container-fluid" style="max-width:50%">
    <div class="col-md-12 col-sm-12">
	<div class="form-group">
                                                
<?php        $sql=mysqli_query($con,"SELECT * FROM tblattendence,tblemployee,tblgrade WHERE  tblemployee.grade_id=tblgrade.grade_id and  YEAR(AttDate) =$year and MONTH( AttDate ) =$month and tblattendence.Emp_Id=tblemployee.Emp_Id and tblattendence.Emp_Id=$empid and (AttStatus='present' or AttStatus='holiday')");
                    if($result= mysqli_fetch_assoc($sql))
                    {
                        
                ?>
                <label>Salary</label>
                <input type="text" value="<?php echo $result['Emp_Id']?>" name="empid">
            <input type="text" value="<?php echo $result['Emp_sal'] ?>" name="sal">
            <label>Employee Name</label>
            <input type="text" value="<?php echo $result['Emp_Name']?>" name="empname">
            <label>Date of Issue</label>
            <input  type="date" name="doi">

           <!-- <option value="<?php echo $result['AttDate'] ?>"><?php echo $result['AttDate'] ?></option> -->
           <?php
             }
            ?>
            </ul>
		</div>
	</div>
    <div class="col-md-12 col-sm-12">
		<div class="form-group">
			<label>Date</label>
            <ul>
           <?php                    
           $sql=mysqli_query($con,"SELECT AttDate FROM tblattendence,tblemployee,tblgrade WHERE  tblemployee.grade_id=tblgrade.grade_id and  YEAR(AttDate) =$year and MONTH( AttDate ) =$month and tblattendence.Emp_Id=tblemployee.Emp_Id and tblattendence.Emp_Id=$empid and (AttStatus='present'or AttStatus='holiday')");
            $j=0;
                    while($result= mysqli_fetch_assoc($sql))
                    {
                        $j++;    
                ?>

    <li> <label> <input type="checkbox" name="foo[]" value="<?php echo $result['AttDate'] ?>"> <?php echo $result['AttDate'] ?> </label> </li>
    
			
													<!-- <option value="<?php echo $result['AttDate'] ?>"><?php echo $result['AttDate'] ?></option> -->

                                                    <?php
                                               
                                                
                                                } ?>
                    </ul>
												</div>
									</div>
                                    <div class="col-md-12 col-sm-12">
										<div class="form-group">
													<label>Total Attendence</label>
                                                    <?php
                                    $sql=mysqli_query($con,"SELECT count(AttDate) as nod FROM tblattendence,tblemployee,tblgrade WHERE  tblemployee.grade_id=tblgrade.grade_id and  YEAR(AttDate) =$year and MONTH( AttDate ) =$month and tblattendence.Emp_Id=tblemployee.Emp_Id and tblattendence.Emp_Id=$empid and (AttStatus='present'or AttStatus='holiday')");
    $j=0;
                    if($result= mysqli_fetch_assoc($sql))
                    {?>
                        <input type="text" value="<?php echo $result['nod']?>" name="nod">
                      <?php }  ?>
                    </div>
                    </div>
<div class="col-md-12 col-sm-12">
    <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add Salary" name="addSal"></br></br>
                <a href="attendence.php"><i class="dw dw-left-arrow-5" style="font-size: 2em;"></i></a>
            </div>
</div>
</div>
                                            </form>

</div>
</div>
<!-- Simple Datatable End -->
</div>
</div>

   </body>
   </html>