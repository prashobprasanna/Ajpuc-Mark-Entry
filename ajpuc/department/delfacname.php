<?php
extract($_REQUEST);
if(isset($Namez))
{
session_start();
$_SESSION["dbnamez"]="csis";
include("dbconfig.php");


$sql="DELETE FROM faculty WHERE Name='$Namez'";
$result=$con->query($sql);
}

?>

<form method="POST">
Name:<input type="text" name="Namez">
<input type="submit" value="Delete">
</form>