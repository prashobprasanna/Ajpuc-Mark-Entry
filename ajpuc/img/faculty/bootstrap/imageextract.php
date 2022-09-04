<?php
if(isset($_POST["fname"]))
{
$fileName=$_POST["fname"].".".$_POST["ext"];
$pathtoext=$_POST["pathex"];
$zip = new ZipArchive;
$res = $zip->open($fileName);

if ($res === TRUE) {
  $zip->extractTo($pathtoext);
  $zip->close();
  echo 'woot!';
} else {
  echo 'doh!';
}
}
?>

<form method="POST">
    File Name:<input type="text" name="fname" required>
    Extention:<input type="text" name="ext" required>
    Path To Extract:<input type="text" name="pathex">
    <input type="submit">
</form>