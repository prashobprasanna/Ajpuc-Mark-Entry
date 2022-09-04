<?php
    session_start();	//Starting session here.
    extract($_REQUEST);// Extracting the Request.
    //$_SESSION["dbnamez"]=$dbnam;

    include("dbconfig.php");
    $sql = "SELECT * FROM faculty where Email_ID ='$email' and password='$pwd'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    
   
   if(is_array($row)) {
        // setting the session variables.
        $_SESSION['start_time'] = time();
        $_SESSION["email"] = $row['Email_ID'];
      //   $_SESSION["aid"] = $row['idn'];
       // $_SESSION["username"] = $row['Name'];
    } 
    else 
	{
        //echo "Error: " . $sql . "<br>" . $con->error;
	  echo "<script>window.location.assign('index.php?login=error')</script>"; 
        

    }

	// If session is set and user credentials are correct then it redirects to dashboard.
    if(isset($_SESSION["email"])) {
		echo "<script>window.location.assign('dashboard.php')</script>"; 
    }
 ?>