<head>

</head>

<form method="POST">
    Path:<input type="text" name="pathex">
    <input type="text" name="navold" value=1 style='display:none'>
    <input type="submit">
    </form>
 
<?php
session_start();
extract($_REQUEST);
if(isset($downloaderinvoke))
{
    Downloader($_SESSION["PathToNavigate"].'/'.$pathex);
    $downloaderinvoke=null;
}
else 
{
    if(isset($navold))
    {
        if($navold==0)
        {
            $_SESSION["Oldpath"]=null;
            $navold=null;
        }
        if($navold==1)
        {
            $_SESSION["Oldpath"]=$pathex;
            $navold=null;
        }
    }
    if(!isset($_SESSION["Oldpath"])&&isset($_SESSION["PathToNavigate"]))
    {
        $pathtomove=$_SESSION["PathToNavigate"].'/'.$pathex;
        Navigate($pathtomove);
        $_SESSION["Oldpath"]=$pathtomove;
    }
    else if(isset($_SESSION["Oldpath"])&&isset($_SESSION["PathToNavigate"])&& $_SESSION["Oldpath"]==$_SESSION["PathToNavigate"])
    {
        
        Navigate($pathex);
        $_SESSION["Oldpath"]=$pathex;
        $_SESSION["PathToNavigate"]='';
    }
    else if(isset($pathex))
    {
       
        Navigate($pathex);
        $_SESSION["Oldpath"]=$pathex;
        $_SESSION["PathToNavigate"]='';
    }
}
function Navigate($Pathtoshow)
{

$dir= $Pathtoshow;

$Actualdir =  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
;

$files1 = scandir($dir);
$files2 = scandir($dir, 1);

//print_r($files1);
//print_r($files2);

if($dir=='/')
{
    $_SESSION["PathToNavigate"]='';
}
else $_SESSION["PathToNavigate"]=$dir;
echo "<table style='border-spacing: 20px;'>";
foreach ($files1 as $key => $value) {
   
    if($value[0] != '.' )
    {
         echo "<tr>";
        echo "<td><a href='$Reqstr?pathex=$value&navold=0' onclick=''>$value</a></td><td></td>";
        $findext=pathinfo($value);
        $exten=pathinfo($value, PATHINFO_EXTENSION);
        $FullOldPath=$_SESSION["Oldpath"];
        if($exten!="")
        {
            echo "<td><a href='$Reqstr?pathex=$value&downloaderinvoke=0' onclick=''>Download</a> 
            <form method = 'post' action ='Editor.php'>
            <input type='text' value='$FullOldPath' name='dir' style='display:none'>
            <input type='text' value='2' name='action' style='display:none'>
            <input type='text' value='$value' name='editFile' style='display:none'>
            <input type='text' value='$exten' name='ftype' style='display:none'>
            <input type='submit' name='process' value='Edit'></form></td>";    
        }
         echo "</tr>";
    }
    else if($value == '..' )
    {
         echo "<tr>";
        echo "<td><a href='$Reqstr?pathex=$value&navold=0' onclick=''><< Back</a></td><td></td>";
         echo "</tr>";
    }else
    {
        
    }
   

    
}

echo "</table>";
    return true;
}

function Downloader($file)
{
    echo '<script language="javascript">';
    echo "return myFunction()";
    echo '</script>';
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
    return;
   
}


