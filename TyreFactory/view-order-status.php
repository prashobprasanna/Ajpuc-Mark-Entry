<?php
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
    <div class="container-fluid" style="max-width:50%">

    <?php
                session_start();
                extract($_REQUEST);
                include("connection.php");
                $i=1;
                $_SESSION['order_Id']=$order_Id;
                    $sql=mysqli_query($con,"SELECT * FROM tblworkorder wo,tblbrand b,tblvehicletype vt,tblservice tss,tbltyrepattern tp,tbltyresize ts,tblemployee e,tblcustomer tc WHERE wo.company_Id=b.company_Id and wo.vehicletype_id=vt.vehicletype_id and wo.pattern_Id=tp.pattern_Id and wo.size_Id=ts.size_Id and wo.Emp_Id=e.Emp_Id and wo.Cust_Id=tc.Cust_Id  and wo.service_id=tss.service_id and order_Id=$order_Id");
                    if($result= mysqli_fetch_assoc($sql))
                    {
                ?>
            <form action="" method="post">

                <div class="input-group custom">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Ordered Date</label>
                            <input class="form-control form-control-lg" type="date" name="Odate" value="<?php echo $result['orderDate'] ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Customer Id</label>
                            <input class="form-control form-control-lg" type="text" name="custid"  value="<?php echo $result['Cust_Name']  ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Expected Date</label>
                            <input class="form-control form-control-lg" type="date" name="expDate" value="<?php echo $result['orderExpected']  ?>">
                        </div>
                    </div>  
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Service Name</label>
                            <input class="form-control form-control-lg" type="text" name="serviceType"  value="<?php echo $result['serviceName']  ?>">
                        </div>
                    </div>  
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Service Type</label>
                            <input class="form-control form-control-lg" type="text" name="serviceType"  value="<?php echo $result['service_type']  ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Quantity</label>
                            <input class="form-control form-control-lg" type="text" name="qty"  value="<?php echo $result['qty']  ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Vehicle Type</label>
                            <input class="form-control form-control-lg" type="text" name="vechicletype"  value="<?php echo $result['typeName']  ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Vehicle Number</label>
                            <input class="form-control form-control-lg" type="text" name="Vnum"  value="<?php echo $result['vehicleNumber']  ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Tyre Number</label>
                            <input class="form-control form-control-lg" type="text" name="Tnum"  value="<?php echo $result['tyreNumber']  ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Techinician</label>
                            <input class="form-control form-control-lg" type="text" name="empid" value="<?php echo $result['Emp_Name']  ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                                    <label>Tyre Brand</label>
                                    <input class="form-control form-control-lg" type="text" name="company" value="<?php echo $result['companyName']  ?>">
                                </div>
                    </div> 
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Tyre Size</label>
                            <input class="form-control form-control-lg" type="text" name="Tnum"  value="<?php echo $result['sizeName']  ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Tyre Pattern</label>
                            <input class="form-control form-control-lg" type="text" name="pattern"  value="<?php echo $result['patternName']  ?>">
                        </div>
                    </div> 
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Estimated Amount</label>
                            <input class="form-control form-control-lg" type="text" name="amt" placeholder="Please enter amt" value="<?php echo $result['estimatedAmt']  ?>">
                        </div>
                    </div> 
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Status</label>
                            <input class="form-control form-control-lg" type="text" name="status"  value="<?php echo $result['status']  ?>">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <a href="work-order-status.php"><i class="dw dw-left-arrow-5" style="font-size: 2em;"></i></a>
                    </div>
                    </div>
                </form>
            </div>
        <?php } ?>
        </form>
   </body>
</html>