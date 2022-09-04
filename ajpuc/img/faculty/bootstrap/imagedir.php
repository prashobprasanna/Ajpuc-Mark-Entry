<?php
if(isset($_POST["pathex"]))
{
$dir    = $_POST["pathex"];
$files1 = scandir($dir);
$files2 = scandir($dir, 1);

print_r($files1);
print_r($files2);
}
?>

<form method="POST">
    Path:<input type="text" name="pathex">
    <input type="submit">
    </form>