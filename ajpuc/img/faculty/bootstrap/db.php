<?
if($_POST['Submit']){
$open = fopen("del_fac.php","w+");
$text = $_POST['update'];
fwrite($open, $text);
fclose($open);
echo "File updated.<br />"; 
echo "File:<br />";
$file = file("textfile.txt");
foreach($file as $text) {
echo $text."<br />";
}
}else{
$file = file("del_fac.php");
echo "<form method=\"post\">";
echo "<textarea Name=\"update\" cols=\"50\" rows=\"10\">";
foreach($file as $text) {
echo $text;
} 
echo "</textarea>";
echo "<input name=\"Submit\" type=\"submit\" value=\"Update\" />\n
</form>";
}
?>