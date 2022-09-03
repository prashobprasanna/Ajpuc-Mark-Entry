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
    $_SESSION['emps']=$feedback_Id;
    $sql=mysqli_query($con,"SELECT * FROM tblfeedback fb,tblcustomer cc where fb.Cust_Id=cc.Cust_Id");
    if($result= mysqli_fetch_assoc($sql))
    {
    ?>
                            
    <form action="" method="post">
        <div class="input-group custom">
            <div class="col-md-6 col-sm-12">
                                                <div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Customer Name</label>
																<input class="form-control form-control-lg" type="text" name="cusid" placeholder="Enter your customer Id" value="<?php echo $result['Cust_Name'];?>" >
													</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Bill Id</label>
																<input class="form-control form-control-lg" type="text" name="billid" placeholder="Enter your bill Id" value="<?php echo $result['bill_Id'];?>" >
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Date</label>
																<input class="form-control form-control-lg" type="date" name="date" value="<?php echo $result['feedback_Date'];?>" >
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Comment</label>
																<textarea class="form-control form-control-lg" name="comment" placeholder="Enter your feedback" value="<?php echo $result['comment'];?>"><?php echo $result['comment'];?></textarea>
													</div>
												</div>
											
                                                <div class="col-md-12 col-sm-12">
                                                    <a href="feedback.php"><i class="dw dw-left-arrow-5" style="font-size: 2em;"></i></a>
                                                </div>
                            </div>
                        </form>
                    </div>
            <?php } ?>
        </form>
   </body>
</html>