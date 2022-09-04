<?php 
include('dbconfig.php');
extract($_REQUEST);

$servername1 = "localhost";
$username1 = "kvgenggco_admin";
$password1 = "Geleyageleya";
$dbname1 = "kvgenggco_".$branch;
$con = new mysqli($servername1, $username1, $password1, $dbname1);

$dbz=$branch;//$_SESSION["dbnamez"];
$buffer;
$ch = curl_init();
$user="anasoft@live.com:Geleyageleya";
$senderID="KVGCES"; 
$sems=$sem;
 //$dbname1= "kvgenggco_";//.$_SESSION["dbnamez"];
      $branch=$dbname1;
$ard[]="";
    $receipientno="9886794742"; //studnum


$substudent="SELECT DISTINCT(students.usn),students.Name,students.sem,students.parname,students.parnum,students.studnum From $branch.students where  $branch.students.sem='$sem' ";

                                  $resultss = $con->query($substudent);
                                   $soma=mysqli_num_rows($resultss);
                                 //  echo "<script>alert('$sem');</script>";
                               //  $soma=0;
                               while ($rowss = $resultss->fetch_assoc())
                                  {
                                  //   $soma++;
                                 //   if($soma>1)
                                  //  break;
                                     $us1= $rowss['usn']; 
                                       $uss= $rowss['usn']; 
                                     $name=$rowss['Name'];
                                    $pname=$rowss['parname'];
                                   $receipientno=$rowss['parnum'];
                            //      echo "<script>alert('usm: $us1');</script>";
                                    
      
       
         
       }
 
         
                                  
         $dbz=strtoupper($dbz); 
         


curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");


$buffer1 = curl_exec($ch);


if(empty ($buffer1))
{ 
    
    echo " buffer 1 is empty ";
    
}
else
{ 
    
  echo  substr($buffer1,0,9)." " ; 
    
} 


curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt1");

$buffer2 = curl_exec($ch);


if(empty ($buffer2))
{ 
    
    echo " buffer 2 is empty ";

    
}
else
{ 
  
     echo  substr($buffer2,0,9)."\n"." " .$receipientno ." ".$uss." " .$name   ?> <br /> <?php
} 



                             
/*     Dear XXXX From: TAP-KVGCE.              

Dear Parents, The classes for II Semester students commenced from 01-02-2016. It is found that your ward XXXX is not attending the classes, Advice him/her to attend the classes regularly. From: Principal-KVGCE.
 Dear XXXX The registration date of the 6th semester BE students is postponed from 27-01-2016 to 01-02-2016. All are required to register on 01-02-2016. From: Principal- KVGCE.
 Dear Sir/Madam, Your ward XXXX was absent for the preparatory examination. From: Principal-KVGCE
 Dear XXXX This is to inform you that Infosys Soft Skills Training under the banner of Infosys Campus Connect Programme by Stanley David & Associates Bangalore for III Semester BE & III Semester MCA students will commence from 27-01-2016 to 31-01-2016. All the students are compulsorily instructed to attend the Training. Defaulters will be levied fine of Rs. 2,000/- and not allowed to attend any campus drive in future. Participation certificate will be issued against 100% attendance. From: Principal-KVGCE.
 Dear XXXX , Good Day! Academic year 2015-16 XXXX M.Tech XXXX Please contact office XXXX From: Principal-KVGCE. */
$msgtxt5="Dear Sir, $dbz Department $sem Semester: Marks and Attendance Report Sent .  From: KVGCE."; 
curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno1[$k]&msgtxt=$msgtxt5");
$buffer5 = curl_exec($ch);
if(empty ($buffer5))
{ 
    echo " buffer is empty ";

}
else
{ 
    echo $buffer5; 
    
} 


curl_close($ch);



 echo "  Total number of Students ".$soma;
curl_close($ch);


?>