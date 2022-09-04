<?php
if(isset($_POST["dir"]))
{
    $work_directory = $_POST["dir"];
}
else
{
    if(isset($_POST['submit']))
    {
           $work_directory = getcwd(); 
    }
}

if(isset($_POST['process'])&& (!empty($_POST['action']))){
    //if(!empty($_POST['action'])){
        $action = $_POST['action'];
    //}
    if($action == 1){
        $newFileName = $_POST['fname'];
        $newFileType = $_POST['ftype'];
        $thisNewFile = $work_directory."/".$newFileName.".".$newFileType;
        if (!file_exists($thisNewFile)) {
           $filler = "";
          switch ($newFileType){
            case "php":
            $filler .='<?php ';
            $filler .="\n\n";
            $filler .='##fileName: '.$newFileName.'.'.$newFileType.'##';
            $filler .="\n\n";
            $filler .='echo "hello World";';
            $filler .="\n\n";
            $filler .='?>';
            break;
            ## our html file
            case "html":
            $filler .='<html>';
            $filler .="\n\n";
            $filler .='<!-- '.$newFileName.'.'.$newFileType.'-->';
            $filler .="\n\n";
            $filler .='<head>';
            $filler .="\n\n";
            $filler .='</head>';
            $filler .="\n\n";
            $filler .='<body>';
            $filler .="\n\n";
            $filler .='<!-- Type your html tags below -->';
            $filler .="\n\n";
            $filler .='</body>';
            $filler .="\n\n";
            $filler .='</html>';
            break;
            default:
            $filler .= "## type your codes here";
            break;
        }
         $writeThisFile = fopen($thisNewFile,"w");
         fwrite($writeThisFile,$filler);
         fclose($writeThisFile); 
      } 
      
      $fileToRead = $newFileName.".".$newFileType;
      $fileLink = $newFileName.".".$newFileType;
    }

    elseif($action == 2){
        $thisNewFile = $work_directory."".$_POST['editFile'];
        $fileLink = $_POST['editFile'];
        $fileToRead = $fileLink;
    }

if (file_exists($thisNewFile)) {
//$thisFile = $thisNewFile; 
$readThisFile = $thisNewFile;
$thisNewFileLink = $thisNewFile;
}
}
//$loadcontent = $readThisFile; 
    if(isset($_POST['submit'])) {
     $readThisFile = $_POST['nFile'];
     $thisNewFileLink = $_POST['nFile'];
     $codesUpdate = $_POST['string'];
         $codesUpdate = stripslashes($codesUpdate);
        $fp = @fopen($readThisFile, "w");
        if ($fp) {
            fwrite($fp, $codesUpdate);
            fclose($fp);
                               }
                }
    $fp = @fopen($readThisFile, "r");
        $readThisFile = fread($fp, filesize($readThisFile));
        $readThisFile = htmlspecialchars($readThisFile);
        fclose($fp);
?>


<html>
<head>
<style>
textarea{
    width: 700px;
    color: #ffffff;
    border: 3px solid grey;
    padding: 5px;
    font-family: Tahoma, sans-serif;
    background: #000000;
}
</style>
</head>
<body>
<div>
<a href="<?php echo str_replace("home/kvgenggco/public_html/","",$thisNewFileLink);?>" target="_Blank">Preview</a>
<br/>
<form method=post action="<?php echo $_SERVER['PHP_SELF']?>">
<input type="text" name="dir" value="<?php echo $_POST['dir']?>" style='display:none' >
<input type="hidden" name="nFile" value="<?php echo $thisNewFileLink;?>">
<input type="hidden" name="thisFile" value="<?php echo $readThisFile?>">
<pre class="brush: php; highlight: [5, 15]; html-script: true">
<textarea name="string" cols="70" rows="25"><?php echo $readThisFile?></textarea>
</pre>
<br>
<input type="submit" name="submit" value="Save Changes">  
</form>

<?php if(isset($_POST["dir"])) { $OldPathtoGoback=$_POST["dir"];  ?>

<form action='../NavMenu.php' method="POST">
    <input type="text" name="pathex" value='<?php echo  $OldPathtoGoback ?>' style='display:none'>
    <input type="text" name="navold" value=1 style='display:none'>
    <input type='submit' value='Back'>
</form>

<?php } ?>

</div>
</body>
</help>