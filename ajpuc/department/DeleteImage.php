<?php 
if(isset($_POST["direx"]))
{
$dir=$_POST["direx"];
$ext=$_POST["ext"];
unlink(realpath($dir.".".$ext));

    
}
?>

<form method="POST">
    Name:<input type="text" name="direx" required>
    Ext:<input type="text" name="ext" required>
    <input type="submit">
    </form>