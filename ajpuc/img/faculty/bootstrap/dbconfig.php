<html>
<body>
<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);



$filename = "del_fac.php";
$fd = fopen($filename,"r");
$textFileContents = fread($fd,filesize($filename));
fclose($fd);

echo "$textFileContents";

$writedata = $_GET['newdata'];

if ($_POST['frmSub']) {
$fd=fopen($filename ,"w");
fwrite($fd, $writedata);
fclose($fd);
}
?>


<form action="<? echo $PHP_SELF; ?>" method="POST" >
<textarea name="newdata" rows="10" cols="40">
<?
echo stripslashes($textFileContents);
?>
</textarea>

<input type="submit" name="frmSub" value="submit">
</form>

</body>
</html>