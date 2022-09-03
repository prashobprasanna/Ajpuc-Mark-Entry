<div class="brand-logo">
			<a href="index.php">
				<img src="src/images/logo.png" width="50px">
				<h4 style="color: #f3f3f4;font-size: 20px;padding: 15px">Tyre Shop</h4>
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">

				<?php
if( session_id()=='')
	session_start();
extract($_REQUEST); // Extracting the Request.
   $usert= $_SESSION["user"]; 
    
    if($usert == "tbladmin") 
	{
	?>
					<li>
						<a href="index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li>
						<a href="clients.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">Customer</span>
						</a>
					</li>

					<li>
						<a href="technician.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-wrench"></span><span class="mtext">Technician</span>
						</a>
					</li>
					<li>
						<a href="attendence.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-file"></span><span class="mtext">Attendence & Salary</span>
						</a>
					</li>
					<li>
						<a href="items.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-tags"></span><span class="mtext">Items</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon fa fa-cart-arrow-down"></span><span class="mtext">Order Requirements</span>
						</a>
						<ul class="submenu">
							<li><a href="services.php">Services</a></li>
							<li><a href="sizes.php">Tyre Sizes</a></li>
							<li><a href="patterns.php">Tyre Patterns</a></li>
							<li><a href="brands.php">Tyre Brands</a></li>
							<li><a href="vehicletype.php">Vehicle Types</a></li>
						</ul>
					</li>
					<li>
						<a href="work-order.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-shopping-basket"></span><span class="mtext">Service Order</span>
						</a>
					</li>
					<li>
						<a href="stock.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-database"></span><span class="mtext">Stock</span>
						</a>
					</li>
					<li>
						<a href="supplier.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-handshake-o"></span><span class="mtext">Supplier</span>
						</a>
					</li>
					<li>
						<a href="invoice.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-invoice"></span><span class="mtext">Invoice Details</span>
						</a>
					</li>
					<li>
						<a href="payment.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-money"></span><span class="mtext">Payment</span>
						</a>
					</li>
					<li>
						<a href="Payment Method.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-wallet"></span><span class="mtext">Payment Method</span>
						</a>
					</li>
					<li>
						<a href="feedback.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-envelope"></span><span class="mtext">Feedbacks</span>
						</a>
					</li>
					<li>
						<a href="settings.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-settings2"></span><span class="mtext">Settings</span>
						</a>
					</li>
					
<?php } 
  else if($usert=="tblemployee")
  {
?>
					<li>
						<a href="employee.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li>
						<a href="clients.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">Clients</span>
						</a>
  					</li>
					  <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon fa fa-cart-arrow-down"></span><span class="mtext">Order Requirements</span>
						</a>
						<ul class="submenu">
							<li><a href="services.php">Services</a></li>
							<li><a href="sizes.php">Tyre Sizes</a></li>
							<li><a href="patterns.php">Tyre Patterns</a></li>
							<li><a href="brands.php">Tyre Brands</a></li>
							<li><a href="vehicletype.php">Vehicle Types</a></li>
						</ul>
					</li>
					<li>
						<a href="attendence.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-file"></span><span class="mtext">Attendence & Salary</span>
						</a>
					</li>
					<li>
						<a href="work-order.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-shopping-basket"></span><span class="mtext">Service Order</span>
						</a>
					</li>
					<li>
						<a href="stock.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-database"></span><span class="mtext">Stock</span>
						</a>
					</li>
					<li>
						<a href="feedback.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-envelope"></span><span class="mtext">Feedbacks</span>
						</a>
					</li>

					<?php } 
					
				
  else if($usert=="tblcustomer")
  {
?>
				    <li>
						<a href="customer.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li>
						<a href="customer-work-order.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-shopping-cart"></span><span class="mtext">Book Service</span>
						</a>
					</li>
					<li>
						<a href="work-order-status.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-info"></span><span class="mtext">Service Order Status</span>
						</a>
					</li>
					 <li>
						<a href="paymentClient.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-money"></span><span class="mtext">Payment Status</span>
						</a>
					</li>
					<li>
						<a href="Payment Method.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-wallet"></span><span class="mtext">Payment Method</span>
						</a>
					</li>
					<li>
						<a href="feedback.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-envelope"></span><span class="mtext">Feedbacks</span>
						</a>
					</li>

				<?php	 } ?>
				</ul>
			</div>
		</div>