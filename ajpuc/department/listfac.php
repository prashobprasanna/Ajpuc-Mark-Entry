<?php
extract($_REQUEST);
session_start();
$_SESSION["dbnamez"]="csis";
include("dbconfig.php");


$sql="SELECT * FROM faculty";
$result=$con->query($sql);
while($row=$result->fetch_assoc())
{
	echo "<li>".$row["Name"]."</li>";
}

?>