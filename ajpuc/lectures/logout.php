<?php
    session_start();
   // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
    unset($_SESSION["email"]); //unsetting the user_name from the session.
    unset($_SESSION["aid"]); //unsetting the user_email from the session.
    unset($_SESSION["dbnamez"]);
    // remove all session variables
    //session_unset();
    // destroy the session
    //session_destroy();
    // After unsetting the all session variables it will redirected to the index page.
    echo "<script>window.location.assign('index.php?logout=success')</script>"; 
?>