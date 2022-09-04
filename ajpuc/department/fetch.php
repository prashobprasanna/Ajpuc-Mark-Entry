<?php
//fetch.php
include("dbconfig.php");
$query = "SELECT * FROM marks";
$result = $con->query($query);
$output = array();
while($row = mysqli_fetch_assoc($result))
{
 $output[] = $row;
}
echo json_encode($output);
?>
