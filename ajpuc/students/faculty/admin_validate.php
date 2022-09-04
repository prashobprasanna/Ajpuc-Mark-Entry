<?php
    session_start();//Starting session here.
    error_reporting(0);
    
   
    extract($_REQUEST); // Extracting the Request.
    
    
    include("dbconfig.php");
    
    
    $sql = "SELECT * FROM users WHERE (email='$usrnm' OR username='$usrnm') AND password='$pwd'";
    $result = $con2->query($sql);
    $row1 = $result->fetch_assoc();
    
    
    
   if(is_array($row1)) {
       
        // setting the session variables.
        $_SESSION['start_time'] = time();
        $_SESSION["email"] = $row1['email'];
        $_SESSION["aid"] = $row1['idn'];
        $_SESSION["username"] = $row1['Name'];
       
    }  
   
   
    else 
	{
        //echo "Error: " . $sql . "<br>" . $con->error;
	  echo "<script>window.location.assign('../index.php?login=error')</script>"; 
        

    }
   $staff=$_SESSION["username"];
     if(isset($_SESSION["username"]) && $staff=="staff") {
        echo "<script>window.location.assign('dashstaff.php')</script>"; 
    }

	// If session is set and user credentials are correct then it redirects to dashboard.
   else if(isset($_SESSION["username"])) {
        echo "<script>window.location.assign('dashboard.php')</script>"; 
    }
 ?>