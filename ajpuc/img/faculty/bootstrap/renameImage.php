<?php

if(isset($_POST["rename"]))
{
    $old_name = $_POST["rename1"];
    $oldext=$_POST["oldext"];
    $new_name = $_POST["rename2"]; 
    $newext=$_POST["newext"];
    rename($old_name.".".$oldext,$new_name.".".$newext);
    echo $new_name.".".$newext." ".$old_name.".".$oldext;

}
?>
<html>
    <body>
        <form action="renameImage.php" method="POST">
            old name<input type="text" name="rename1" required>
            old ext<input type="text" name="oldext" required>
            new name<input type="text" name="rename2" required>
            new ext<input type="text" name="newext" required>
            <input type="text" name="rename" value=1>
             <input type="SUBMIT">
        </form>
    </body>
</html>