<?php
session_start();
extract($_REQUEST);
include("connection.php");
if(isset($_POST['update']))

{
  $invoiceid=$_SESSION['invoiceid'];
  $invoiceno=$_POST['invoiceno'];
  $itemid=$_POST['itemid'];
  $qty=$_POST['qty'];
  $price=$_POST['pricee'];
  $sup=$_POST['supid'];
  $sql="update tblinvoice set  invoicenumber='$invoiceno', itemid='$itemid',qty='$qty', price='$price' ,Sup_Id='$sup' where invoice_id=$invoiceid";
  $result=$con->query($sql);
   if($result==true)
   {
    $sql1="update tblstock set  Quantity=Quantity+$qty where itemId=$itemid";
      $result=$con->query($sql1);
      echo "<script> alert('Record Updated');</script>";
      header('location: invoice.php');
    }
    else {
    echo "<script> alert('Could not Update the record');</script>";
    }
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
    <div class="container-fluid" style="max-width:50%">
  
<?php
              
                    $i=1;
                    $_SESSION['invoiceid']=$itemId;
                    $sql=mysqli_query($con,"SELECT * FROM tblinvoice ti,tblitem it, tblsupplier ts where ti.itemid=it.itemid and ti.Sup_Id=ts.Sup_Id and  invoice_id=$itemId");
                    if($result= mysqli_fetch_assoc($sql))
                    {
                ?>

                            <form action="" method="post">
                            <div class="input-group custom">
                            <div class="input-group custom">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Invoice Number</label>
																<input class="form-control form-control-lg" type="text" name="invoiceno" readonly value="<?php echo $result['invoicenumber']?>">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Item </label>
																<input type="text" class="form-control form-control-lg" name="itemid" readonly value="<?php echo $result['itemName']?>">
															</div>
												</div>
                        <div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Supplier </label>
																<input type="text" class="form-control form-control-lg" name="supid" readonly value="<?php echo $result['Sup_Name']?>">
															</div>
												</div>
                        <div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Quantity</label>
                                <input class="form-control form-control-lg" type="text" name="qty"  value="<?php echo $result['qty']?>">
															</div>
												</div>
                        <div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Price</label>
                                <input class="form-control form-control-lg" type="text" name="pricee"  value="<?php echo $result['price']?>">
															</div>
												</div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Update" name="update" >
                                            </br>
                                            </br>
                                            <a href="invoice.php"><i class="dw dw-left-arrow-5" style="font-size: 2em;"></i></a>
                                        </div>
                            </div>
                            </div>
                        </form>
                    </div>
    <?php } ?>
</form>
   </body>
   </html>