<?php
$SourceFile=$_POST["fnameS"];
$SourceExt=$_POST["extS"];
$DestFile=$_POST["fnameD"];
$DestExt=$_POST["extD"];

if(isset($SourceFile)&&isset($SourceExt)&&isset($DestFile)&&isset($DestExt))
{
copy($SourceFile.".".$SourceExt, $DestFile.".".$DestExt);
}
?>

<form method="POST">
    Source<br>
    Name Path:<input type="text" name="fnameS" required>
    Extention:<input type="text" name="extS" required><br>
    Destinaion<br>
    Name Path:<input type="text" name="fnameD" required>
    Extention:<input type="text" name="extD" required>
    <input type="submit">
</form>
