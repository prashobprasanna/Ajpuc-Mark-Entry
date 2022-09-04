<?php
    session_start();	//Starting session here.
    extract($_REQUEST); // Extracting the Request.
    $_SESSION["dbnamez"]=$dbnam;
    include("dbconfig.php");
   
    $sql = "SELECT * FROM admins where (admin_email ='$email' OR admin_username='$email') and admin_password='$pwd'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    
   
   if(is_array($row)) {
        // setting the session variables.
        $_SESSION['start_time'] = time();
        $_SESSION["email"] = $row['admin_email'];
        $_SESSION["aid"] = $row['admin_id'];
        $_SESSION["username"] = $row['admin_username'];
        
    } 
    else 
	{
        //echo "Error: " . $sql . "<br>" . $con->error;
	  echo "<script>window.location.assign('index.php?login=error')</script>"; 
        

    }

	// If session is set and user credentials are correct then it redirects to dashboard.
	 if(isset($_SESSION["username"]) && $dbnam=="admin") 
	 {
	    	echo "<script>window.location.assign('dashPCM.php')</script>";  
	 }
   else if(isset($_SESSION["email"])) {
		echo "<script>window.location.assign('dashboard.php')</script>"; 
    }
 ?>