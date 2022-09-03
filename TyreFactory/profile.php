
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
		</div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="src/images/admin.png" width="50">
						</span>
						<?php
                        if( session_id()=='')
                        session_start();
						//session_start();
						extract($_REQUEST); 
	//   echo $_SESSION['custname'];
    //   echo $_SESSION['empname'];
    //   echo $_SESSION['admin'];
	if(isset($_SESSION['users1']))
	{
        $username=$_SESSION['users1'];
		$user5=$_SESSION['user'];
?>
						<span class="user-name"><?php echo $username;?> </span>

	
     
    
					</a>
					
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
					<?php if($user5=='tblcustomer')
					{?>
						<a class="dropdown-item" href="viewProfile.php"><i class="dw dw-user1"></i>Profile</a>
						<?php } ?>
						<a class="dropdown-item" href="changePass.php"><i class="fa fa-lock" style="font-size:25px"></i>Change Password</a>
						<hr>
						<a class="dropdown-item" href="login1.php"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>

