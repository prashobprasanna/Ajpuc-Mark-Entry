<?php
    session_start();//Starting session here.
    

    extract($_REQUEST); // Extracting the Request.
    
    
    $dbnam=strtolower(substr($usn,5,2));
   
   
    if($dbnam=="cv")
    {   
        $_SESSION["dbname"]="civil";
    }
    else if($dbnam=="cs")
    {
    
        
        $_SESSION["dbname"]="csis";
    }
    else if($dbnam=="is")
    {
        
        $_SESSION["dbname"]="csis";
    }
    else if($dbnam=="ec")
    {
        
        $_SESSION["dbname"]="ec";
    }
    else if($dbnam=="ee")
    {
        
        $_SESSION["dbname"]="ee";
    }
    else if($dbnam=="me")
    {
        
        $_SESSION["dbname"]="mech";
    }

    include("dbconfig.php");
 
    
        
        $sql = "SELECT * FROM students WHERE (USN='$usn' AND parnum='$pwd')";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
   
   if(is_array($row)) {
       
        // setting the session variables.
        $_SESSION['start_time'] = time();
        $_SESSION["email"] = $row['parname'];
        $_SESSION["aid"] = $row['idn'];
        $_SESSION["username"] = $row['Name'];
        $_SESSION["usn"] = $row['USN'];
       
    } 
    else 
	{
        //echo "Error: " . $sql . "<br>" . $con->error;
	  echo "<script>window.location.assign('index.php?login=error')</script>"; 
        

    }

	// If session is set and user credentials are correct then it redirects to dashboard.
    if(isset($_SESSION["username"])) {
            echo "<script>window.location.assign('dashboard.php')</script>"; 
             
    }
 ?>