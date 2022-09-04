<?php
if(isset($_POST["fname"]))
{
    $filename=$_POST["fname"];
if (!file_exists($filename)) {
    mkdir($filename, 0755, true);
}
}
?>

<form action="newimagefolder.php" method="POST">
    <input type="text" name="fname" required>
    <input type="submit">
</form>