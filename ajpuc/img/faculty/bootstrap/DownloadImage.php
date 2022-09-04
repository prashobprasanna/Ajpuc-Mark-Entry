<?php

if(isset($_POST["fname"])&&isset($_POST["ext"]))
$file = $_POST["fname"].".".$_POST["ext"];

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
?>


<form method="POST">
    Name Path:<input type="text" name="fname" required>
    Extention:<input type="text" name="ext" required>
    <input type="submit">
</form>
