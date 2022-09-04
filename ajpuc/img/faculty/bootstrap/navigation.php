<head>
<style>
/* Modal Header */
.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

/* Modal Body */
.modal-body {padding: 2px 16px;}

/* Modal Footer */
.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@keyframes animatetop {
    from {top: -300px; opacity: 0}
    to {top: 0; opacity: 1}
}
</style>

<script type="text/javascript">


function myFunction() {
    var Tmodal = document.getElementById('myModal');

    Tmodal.style.display = 'block';            
    return;
}

function myFunctiona() {
    var Tmodal = document.getElementById('myModal');
    Tmodal.style.display = 'none';          
    return;
}

</script>
</head>


<button id="myBtn" onclick='show();'>Open Modal</button>
<div id='myModal' style='display:none'>
<div class="modal-content" >
  <div class="modal-header">
    <span class="close">&times;</span>
    <h2>Your File is being Downloaded!</h2>
  </div>
  <div class="modal-body">
    <p>Please Wait For Few Seconds</p>
    <p>The File is Being Processed For Download...</p>
  </div>
  <div class="modal-footer">
    <h3>This will Automatically Close</h3>
  </div>
</div>
</div>   

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
        if($exten!="")
        {
            echo "<td><a href='$Reqstr?pathex=$value&downloaderinvoke=0' onclick=''>Download</a></td>";    
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


?>
<script type="text/javascript">
var modal = document.getElementById('myModal');
    

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>
