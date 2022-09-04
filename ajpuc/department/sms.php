<?php 
$ch = curl_init();
$user="anasoft@live.com:Geleyageleya";
$receipientno="9886794742"; 
$senderID="KVGCES";
$sem=7;
$dept="CSIS";
$msgtxt="Dear Prashob, How are you man.?? .  From: KVGCE."; 
curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
$buffer = curl_exec($ch);
if(empty ($buffer))
{ echo " buffer is empty "; }
else
{ echo $buffer; } 
curl_close($ch);


                             
 




?>