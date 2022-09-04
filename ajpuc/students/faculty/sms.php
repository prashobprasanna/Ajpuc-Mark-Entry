<?php 
include('dbconfig.php');
extract($_REQUEST);
$arr=explode('@',$r1);
$branch=$arr[0];
$sem=$arr[1];
$intern=$arr[2];


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
    
    
 // echo "<script>alert('sem=$sem');</script>";
if($sem>2)
{                                                                                                                                                                                                                                                   //ME21,CS 61,CS 66
$substudent="SELECT DISTINCT(students.usn),students.Name,students.sem,students.parname,students.parnum From $branch.students,$branch.marks where $branch.marks.usn=$branch.students.usn and $branch.students.sem='$sem'";

                                  $resultss = $con->query($substudent);
                                  $totst=mysqli_num_rows($resultss);
                           //        echo "<script>alert('$sem');</script>";
                             $xyz=0;
                               while ($rowss = $resultss->fetch_assoc())
                                  {
                            //     $xyz++;
                            //   if($xyz>10)
                            //    break;
                                     $us1= $rowss['usn']; 
                                       $uss= $rowss['usn']; 
                                     $name=$rowss['Name'];
                                    $pname=$rowss['parname'];
                             //   $receipientno=$rowss['parnum'];
                            //      echo "<script>alert('usm: $us1');</script>";
$sqlsub= "SELECT distinct(marks.subcode) From $dbname1.marks,$dbname1.subjects,$dbname1.students where $dbname1.subjects.subcode=$dbname1.marks.subcode and $dbname1.marks.sem='$sem' and $dbname1.subjects.elective=0 and $dbname1.marks.USN=$dbname1.students.USN and  $dbname1.students.USN='$us1'";
                                  $resultsub = $con->query($sqlsub);
                                   $s1=mysqli_num_rows($resultsub);
                               //  echo "<script>alert('my value: $s1');</script>";
                                  $p=0;
                                   unset($arry); 
                                   while($rowsub = $resultsub->fetch_assoc())
                                   {
                                       $arry[$p]=$rowsub['subcode'];
                                         
                                        
                                        $ard[$p]=$rowsub['subcode'];   //$acronym;
                                    
                                        $p++;
                                       
                                   }
                                  
                                
                                   usort($arry, function ($a, $b){
                                        return substr($a, -2) - substr($b, -2);
                                    });
                             //lab loop
                             
                //                  echo "<script>alert('my value:0=  $arry[0]  $arr[1] $arry[2]  $arry[3] $arry[4] $arry[5] $arry[6] $arry[7]  8=$arry[8]');</script>";         
                $sqllab= "SELECT distinct(marks.subcode) From $dbname1.marks,$dbname1.subjects,$dbname1.students where $dbname1.subjects.subcode=$dbname1.marks.subcode and $dbname1.marks.sem='$sem' and $dbname1.subjects.elective=3 and $dbname1.marks.USN=$dbname1.students.USN and  $dbname1.students.USN='$us1'";
                                  $resultlab = $con->query($sqllab);
                                   $s2=mysqli_num_rows($resultlab);
                             //   echo "<script>alert('my lab: $s2');</script>";
                              //   $arry1=array();
                                 unset($lab); 
                                  $q=0;
                                   while($rowlab = $resultlab->fetch_assoc())
                                   {                
                                     $lab[$q]=$rowlab['subcode'];
                        
                                     $q++;
                                   }
                                   
                                   sort($lab);
                                 //   echo "<script>alert('my value labbbb: 0 $lab[0]  $lab[1] ');</script>"; 
                                //   $arry= array_merge($arry,$lab);
                                    //  echo "<script>alert('my value: 0 $arry[0]  $arry[1] $arry[2]  $arry[3] $arry[4] 5= $arry[5]  ');</script>"; 
                                   
                                    $tot=0;
                                    $s3=$s1+$s2;
                                 //  $mark1[]="";
                                 //  $att[]="";
                                   
                                   unset($mark1);
                                   unset($att);
                                    $counter=0;
                                   $j=0;
                                  while($counter<$s1)
                                  {
                                  if($intern==1)    
                               $sql2="SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks where   $branch.marks.usn='$uss'  and $branch.marks.sem='$sem' and $branch.marks.subcode='$arry[$counter]'";     
                                  else   if($intern==2)    
                               $sql2="SELECT marks.int2,marks.att2,marks.tatt2 From $branch.marks where   $branch.marks.usn='$uss'  and $branch.marks.sem='$sem' and $branch.marks.subcode='$arry[$counter]'";     
                              else if($intern==3)    
                               $sql2="SELECT marks.int3,marks.att3,marks.tatt3 From $branch.marks where   $branch.marks.usn='$uss'  and $branch.marks.sem='$sem' and $branch.marks.subcode='$arry[$counter]'";     
                        
                              //       $sql2="SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks,$branch.students where  $branch.marks.usn=$branch.students.usn and $branch.students.usn='$uss'  and $branch.students.sem='$sem' and $branch.marks.subcode='$arry[$counter]' ORDER BY $branch.students.usn ASC";
                                     $result2 = $con->query($sql2);
                                     $m=mysqli_num_rows($result2);
                                   //  echo "<script>alert('m = $m');</script>";
                                
                                 
                                     if($row2 = $result2->fetch_array())
                                   {
                                       
                                    // $marks=$row2['int1'];  
                                        $marks=$row2[0];  
                                     
                                     $mark1[$j]=$arry[$counter]."  -  ". $row2[0];
                                 //echo "<script>alert(' marks= $marks);</script>";
                                 
                             //    echo "<script>alert('inside loop  usn = $uss  j= $j counter= $counter  array counter =$arry[$counter] marks=$mark1[$j]');</script>";
                                  
                                 //   $tot=$tot+(int)$row2['int1'];
                                    $attend=$row2[1]."/".$row2[2];
                                   $att[$j]= $arry[$counter]."  -  ".$row2[1]."/".$row2[2];
                                     
                            //       echo "<script>alert(' attend= $attend);</script>";
                                    }
                                  
                                  $j++;
                                  $counter++;
                                //   echo "<script>alert(' counter= $counter);</script>";
                                  }
                                  unset($mark5);
                                  unset($att5);
                                    $c1=0;
                                   $j1=0;
                                   
                                   
                                   // lab marks...
                                   
                                  while($c1<$s2)
                                  {
                                     
                                if($intern==1)   
                                   $sqlab="SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks where   $branch.marks.usn='$uss'  and $branch.marks.sem='$sem' and $branch.marks.subcode='$lab[$c1]'";     
                                else if($intern==2)   
                                   $sqlab="SELECT marks.int2,marks.att2,marks.tatt2 From $branch.marks where   $branch.marks.usn='$uss'  and $branch.marks.sem='$sem' and $branch.marks.subcode='$lab[$c1]'";     
                            else if($intern==3)   
                                   $sqlab="SELECT marks.int3,marks.att3,marks.tatt3 From $branch.marks where   $branch.marks.usn='$uss'  and $branch.marks.sem='$sem' and $branch.marks.subcode='$lab[$c1]'";     
                             
                        
                                     $rlab = $con->query($sqlab);
                                     $m2=mysqli_num_rows($rlab);
                                //    echo "<script>alert('labs = $m2');</script>";
                                
                                 
                                     if($row5 = $rlab->fetch_array())
                                   {
                                       
                                   
                                     
                                     
                                     $mark5[$c1]=$lab[$c1]."  -  ". $row5[0];
                                 //echo "<script>alert(' marks= $marks);</script>";
                                 
                            //     echo "<script>alert('inside lab loop  usn = $uss  j= $j1 counter= $c1  array counter =$lab[$c1] marks=$mark5[$c]');</script>";
                                  
                                 
                                    $attend=$row5[1]."/".$row5[2];
                                   $att5[$c1]= $lab[$c1]."  -  ".$row5[1]."/".$row5[2];
                                     
                               //    echo "<script>alert(' attend= $attend);</script>";
                                    }
                                  
                                  $j1++;
                                  $c1++;
                               //    echo "<script>alert(' counter= $c1);</script>";
                                  }
                                  
                                  // elective subject
                                  if($sem>4)
                                  {
                           $ssub= "SELECT DISTINCT(esubcode) FROM `electiveDetails`,$branch.subjects,$branch.marks where subjects.subcode=electiveDetails.esubcode and subjects.sem='$sem' and marks.subcode=subjects.subcode and marks.sem=subjects.sem and marks.usn='$uss' ";  
                           $rsub1 = $con->query($ssub);
                           $el=mysqli_num_rows($rsub1);
                        //   echo "<script>alert(' elective subjects= $el');</script>";
                             unset($esub1);
                              $sub1=0;
                                while($rsub = $rsub1->fetch_assoc())
                                  {
                                      $esub1[$sub1]=$rsub['esubcode'];
                                      $sub1++;  
                                  }
                                    $tsub=0; 
                                     unset($eatt1);
                                     unset($etatt1);
                                     unset($eint1);
                                    unset($elattend);
                                while($tsub<$el)
                               {       
                                   
                                  if($intern==1)     
                               $sqlel= "SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks,$branch.electiveStudent where $branch.marks.usn=$branch.electiveStudent.esusn  and $branch.electiveStudent.esusn='$uss' and $branch.marks.subcode='$esub1[$tsub]'";       
                              else if($intern==2)     
                               $sqlel= "SELECT marks.int2,marks.att2,marks.tatt2 From $branch.marks,$branch.electiveStudent where $branch.marks.usn=$branch.electiveStudent.esusn  and $branch.electiveStudent.esusn='$uss' and $branch.marks.subcode='$esub1[$tsub]'";       
                              else if($intern==3)     
                               $sqlel= "SELECT marks.int3,marks.att3,marks.tatt3 From $branch.marks,$branch.electiveStudent where $branch.marks.usn=$branch.electiveStudent.esusn  and $branch.electiveStudent.esusn='$uss' and $branch.marks.subcode='$esub1[$tsub]'";       
                             
                               //  $sqlel= "SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks,$branch.students,$branch.subjects where $branch.subjects.subcode=$branch.marks.subcode and $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.subjects.elective=1";
                                  $resultel = $con->query($sqlel);
                                  // $el=mysqli_num_rows($resultel);
                                
                                     
                                    if($rowel = $resultel->fetch_array())
                                     {
                                      
                                 
                                        $eint1[$tsub]= $esub1[$tsub] ."(E)  -  ". $rowel[0];
                                   
                                        
                                    if($rowel[1]!="")
                                    {
                                    $eatt1[$tsub]=$rowel[1];
                                    $etatt1[$tsub]=$rowel[2];
                                    
                                    $elattend[$tsub]=$esub1[$tsub] ."(E)  -  ".$eatt1[$tsub]."/".$etatt1[$tsub];
                                    }
                            //        echo "<script>alert(' elective subjects name with attn= $esub1[$tsub] ."  -  ". $eint1[$tsub]  / tsub  $etatt1[$tsub]  );</script>";
                                      
                                 }
                                 $tsub++;
                               }
                                 
                                  
                                    
                                  
                             
                             
                             
                             //open elective subject
                                if($intern==1)
                               $sqlol= "SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks,$branch.students,$branch.subjects where $branch.subjects.subcode=$branch.marks.subcode and $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.subjects.elective=2";
                                else if($intern==2)
                               $sqlol= "SELECT marks.int2,marks.att2,marks.tatt2 From $branch.marks,$branch.students,$branch.subjects where $branch.subjects.subcode=$branch.marks.subcode and $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.subjects.elective=2";
                              else if($intern==3)
                               $sqlol= "SELECT marks.int3,marks.att3,marks.tatt3 From $branch.marks,$branch.students,$branch.subjects where $branch.subjects.subcode=$branch.marks.subcode and $branch.marks.usn=$branch.students.usn and $branch.marks.usn='$uss'  and $branch.students.sem='$sem' and $branch.subjects.elective=2";
                            
                                  $resultol = $con->query($sqlol);
                                   $ol=mysqli_num_rows($resultol);
                                   $oint1="";
                                   $oeint1="";
                                   $oatt1="";
                                   $otatt1="";
                                    if($ol>0)
                                {
                              //   echo "<script>alert('open elective=$ol');</script>";
                                    if($rowol = $resultol->fetch_array())
                                  {
                                      
                                  
                                //    if($rowol['int1']!="" )
                                     $oint1 =$rowol[0];
                                     $oeint1=$oint1;
                           
                                    if($rowol[1]!="")
                                   {
                                    $oatt1=$rowol[1];
                                     $otatt1=$rowol[2];
                                      $oeat="Open Elective -". $oatt1."/".$otatt1;
                                     }
                                      
                                  }
                            
                                    
                                    
                                }
                                  //  $tot=$tot+$oint1+$eint1;
                              } 
                              
                          //    $dbz=toupper($dbz);
                                    
       $dbz=strtoupper($dbz);
       
       $intern1=$intern;
       if($intern==1)
       $intern1="1st";
       else  if($intern==2)
       $intern1="2nd";
        else if($intern==3)
       $intern1="3rd";
       
      else if($intern==4)
       $intern1="4th";
       
               $msgtxt= "Dear $pname , Your ward $name , Branch $dbz Sem - $sems , $intern1 Internal Marks Report :";
       
             $subcounter=0;
             $msgadd=$mark1[$subcounter]."/30";
             $subcounter=1;
             while($subcounter<$s1)
             {
               
               $msgadd=$msgadd .", " .$mark1[$subcounter]."/30";
                 $subcounter++;
            //    echo "<script>alert(' msg= $msgadd');</script>";
             }
                   
             //       echo "<script>alert(' lab $s2');</script>";
             if($s2>10)
             {
                 $labmark1=0;
                  $labmark=$mark5[$labmark1];
              //   echo "<script>alert('lab  mark $labmark');</script>";
             //$msgele=$eint1[0];
             $labmark1=1;
             while($labmark1<$s2)
             {
                    $labmark=$labmark .", ".$mark5[$labmark1];
          //        echo "<script>alert(' elective= $eint1[$e]');</script>";
                  $labmark1++;
             }
             $msgadd=$msgadd.", ".$labmark; 
             
             }
             
              
             $e=0;
             if($el>0)
             {
          //       echo "<script>alert(' elective sub= $eint1[$e]');</script>";
             $msgele=$eint1[0]."/30";
             $e=1;
             while($e<$el)
             {
                  $msgele=$msgele .", " .$eint1[$e]."/30";
          //        echo "<script>alert(' elective= $eint1[$e]');</script>";
                  $e++;
             }
             $msgadd=$msgadd.", ".$msgele; 
             }
              $o=0;
               if($ol>0)
             {
                 $msgoe="Open Elective - " .$oeint1;//."/15";
             
              //    $msgoe=$msgoe ."," .$oeint1."/30";
             //      echo "<script>alert('open elective= $msgoe');</script>";
                 // $o++;
             
               $msgadd=$msgadd.", ".$msgoe;
             }
             
             
             
             
             $msgtxt=$msgtxt." ".$msgadd .". From: Principal-KVGCE.";
              
    //    echo "<script>alert('mark report= $msgtxt');</script>";
       $msgtxt="dont send msg";
      
      
       $msgtxt1= "Dear $pname , Your ward $name , Branch $dbz Sem - $sems , $intern1 Internal Attendance Report :";
        
             $subcounter=0;
             $msgatten=$att[$subcounter];
             $subcounter=1;
             while($subcounter<$s1)
             {
               
               $msgatten=$msgatten .", " .$att[$subcounter];
              //     echo "<script>alert(' msg atten ele= $msgatten');</script>";
               
                 $subcounter++;
             }
             
             $sublab=0;
             $labadd=$att5[$sublab];
            
               $sublab=1;
             while($sublab<$s2)
             {
              
                $labadd=$labadd .", ".$att5[$sublab];
           //    echo "<script>alert(' msg atten lab= $labadd');</script>";
                $sublab++;
       
             }
             $msgatten=$msgatten.", ".$labadd;
  //      echo "<script>alert(' msg atten lab= $msgatten');</script>";
               $e=0;
               if($el>0)
               {
                   $msgattel=$elattend[0];
                   $e=1;
                 while($e<$el)
                 {
                  $msgattel=$msgattel .", " .$elattend[$e];
                //   echo "<script>alert(' elective atte= $msgattel');</script>";
                  
                  $e++;
                }
         //        echo "<script>alert(' elective atte= $msgattel');</script>";
                $msgatten=$msgatten.", ".$msgattel;
               }
              $o=0;
             if($o<$ol)
             {
                  $msgattol= $oeat;
                //   echo "<script>alert('open  elective atten= $msgattol');</script>";
                 // $o++;
                 $msgatten=$msgatten.", ".$msgattol;
             }
             
             $msgtxt1=$msgtxt1." ".$msgatten . ". From: Principal-KVGCE."; 
    //     echo "<script>alert('mark report= $msgtxt1');</script>";
         $msgtxt1="plz beda";
    
       //sem greater than 4 and lab 3
       
 
         
                                  
         
         
    //Dear $pname , Your ward $name , Branch $dbz Sem $sems, XXXX internal marks report , $ard[0] , $ard[1] , $ard[2] , $ard[3] , $ard[4] , $ard[5] , $ard[6] , $ard[7] , $tot . From: Principal-KVGCE.
                                    
// $msgtxt="Dear $pname, Your ward $sname , branch $dbz , $sems|TH sem, 1st internal marks report, CNSC-$mark1[0], CGV-$mark1[1], SSCD-$mark1[2], OS-$mark1[3], DMDW-$mark1[4], MC/PAP/IS-$oint1 , Total 457/90 , From: Principal-KVGCE";                                
                                    
//  $msgtxt="Dear $pname ,Your ward $sname ,branch $dbz, $sems TH sem, branch $dbz ,1st internal marks report,, EM4-$int1/$att1, ADS-|U|/|V|, AH-|W|/|X|, CT-|Y|/|Z|, GEO-|AA|/|AB|, AS-|AC|/|AD|, FMHM LAB-|AE|/|AF|, GEO LAB-|AG|/|AH| . From: Principal-KVGCE"; 


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



                             
                  
}

}

else if($sem<3)
{
    //  echo "<script>alert('less than 3 sem $sem');</script>";
                                 
                                  $branche1 = array('kvgenggco_civil', 'kvgenggco_csis', 'kvgenggco_ec','kvgenggco_ee','kvgenggco_mech');
                                  $dbname1="kvgenggco_admin";
                                      $c=0;
                                      $totst=0;
                            // all subjects     
                                 // $branch="kvgenggco_".$branch;
                                  while($c<5) 
                             {   
                                 if($sem=='1P')
                                 {
                                     $sem1="1";
                                     $bicycle="Physics";
                                 }
                                 else if($sem=="1C")
                                 {
                                     $sem1="1";
                                     $bicycle="Chemistry";
                                 }
                     //            echo "<script>alert('inside $branche1[$c]');</script>";
   $substudent="SELECT DISTINCT(students.usn),students.Name,students.sem,students.parname,students.parnum  From $branche1[$c].students,$branche1[$c].marks where $branche1[$c].marks.usn=$branche1[$c].students.usn and $branche1[$c].students.cycle='$bicycle' and $branche1[$c].students.sem='$sem1'";

                                  $resultss = $con->query($substudent);
                                  $totsts=mysqli_num_rows($resultss);
                                  $totst=$totst+$totsts;
                                   echo "<script>alert('maklu =$totst');</script>";
                                
                             $xyz=0;
                               while ($rowss = $resultss->fetch_assoc())
                                  {
                               //    $xyz++;
                                //  if($xyz>4)
                               //   break;
                                     $us1= $rowss['usn']; 
                                       $uss= $rowss['usn']; 
                                     $name=$rowss['Name'];
                                    $pname=$rowss['parname'];
                                  $receipientno=$rowss['parnum'];
                          //      echo "<script>alert('branch: $branche1[$c] / sem= $sem / fname= $pname');</script>";
                                
                               // $branche1="kvgenggco_csis";
                $sqlsub= "SELECT distinct(marks.subcode) From $branche1[$c].marks,kvgenggco_admin.subjects,$branche1[$c].students where kvgenggco_admin.subjects.subcode=$branche1[$c].marks.subcode and $branche1[$c].marks.sem='$sem1' and kvgenggco_admin.subjects.elective=0 and $branche1[$c].marks.USN=$branche1[$c].students.USN and $branche1[$c].students.USN='$us1'";
                //$sqlsub= "SELECT distinct(marks.subcode) From $branche1.marks,  kvgenggco_admin.subjects,$branche1.students     where kvgenggco_admin.subjects.subcode=$branche1.marks.subcode     and $branche1.marks.sem='1C'       and kvgenggco_admin.subjects.elective=0 and $branche1.marks.USN=$branche1.students.USN         and $branche1.students.USN='$us1'     and $branche1.marks.subcode     not like '%L%'"; //usn: CS0056   CS100
                                  $resultsub = $con->query($sqlsub);
                                   $s1=mysqli_num_rows($resultsub);
                                  $p=0;
                                   unset($arry); 
                                  //  echo "<script>alert('my sub: $s1');</script>";
                                   while($rowsub = $resultsub->fetch_assoc())
                                   {
                                       $arry[$p]=$rowsub['subcode'];
                                         
                                        
                                        $ard[$p]=$rowsub['subcode'];   //$acronym;
                                    
                                        $p++;
                                 //      echo "<script>alert('my inside subcode :$arry[0]');</script>";
                                   }
                                  
                               
                                   usort($arry, function ($a, $b){
                                        return substr($a, -2) - substr($b, -2);
                                    });
                             //lab loop elective 3
                             
                //                  echo "<script>alert('my value:0=  $arry[0]  $arr[1] $arry[2]  $arry[3] $arry[4] $arry[5] $arry[6] $arry[7]  8=$arry[8]');</script>";         
                $sqllab= "SELECT distinct(marks.subcode) From $branche1[$c].marks,$dbname1.subjects,$branche1[$c].students where $dbname1.subjects.subcode=$branche1[$c].marks.subcode and $branche1[$c].marks.sem='$sem1' and $dbname1.subjects.elective=3 and $branche1[$c].marks.USN=$branche1[$c].students.USN and  $branche1[$c].students.USN='$us1'";
                                  $resultlab = $con->query($sqllab);
                                   $s2=mysqli_num_rows($resultlab);
                            //    echo "<script>alert('my lab: $s2');</script>";
                              //   $arry1=array();
                                 unset($lab); 
                                  $q=0;
                                   while($rowlab = $resultlab->fetch_assoc())
                                   {                
                                     $lab[$q]=$rowlab['subcode'];
                        
                                     $q++;
                                   }
                             
                                   sort($lab);
                                 //   echo "<script>alert('my value labbbb: 0 $lab[0]  $lab[1] ');</script>"; 
                                //   $arry= array_merge($arry,$lab);
                                    //  echo "<script>alert('my value: 0 $arry[0]  $arry[1] $arry[2]  $arry[3] $arry[4] 5= $arry[5]  ');</script>"; 
                                   
                                    $tot=0;
                                    $s3=$s1+$s2;
                                        
                                   unset($mark1);
                                   unset($att);
                                    $counter=0;
                                   $j=0;
                                  while($counter<$s1)
                                  {
                                      if($intern==1)    
                            $sql2="SELECT marks.int1,marks.att1,marks.tatt1 From $branche1[$c].marks where   $branche1[$c].marks.usn='$uss'  and $branche1[$c].marks.sem ='$sem1' and $branche1[$c].marks.subcode='$arry[$counter]'";     
                                         else if($intern==2)    
                            $sql2="SELECT marks.int2,marks.att2,marks.tatt2 From $branche1[$c].marks where   $branche1[$c].marks.usn='$uss'  and $branche1[$c].marks.sem ='$sem1' and $branche1[$c].marks.subcode='$arry[$counter]'";     
                                         else if($intern==3)    
                            $sql2="SELECT marks.int3,marks.att3,marks.tatt3 From $branche1[$c].marks where   $branche1[$c].marks.usn='$uss'  and $branche1[$c].marks.sem ='$sem1' and $branche1[$c].marks.subcode='$arry[$counter]'";     
                      //                if($intern==4)    
                    //        $sql2="SELECT marks.int1,marks.att1,marks.tatt1 From $branche1[$c].marks where   $branche1[$c].marks.usn='$uss'  and $branche1[$c].marks.sem ='$sem' and $branche1[$c].marks.subcode='$arry[$counter]'";     
                        
                        
                              //       $sql2="SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks,$branch.students where  $branch.marks.usn=$branch.students.usn and $branch.students.usn='$uss'  and $branch.students.sem='$sem' and $branch.marks.subcode='$arry[$counter]' ORDER BY $branch.students.usn ASC";
                                     $result2 = $con->query($sql2);
                                     $m=mysqli_num_rows($result2);
                                 //    echo "<script>alert('m = $m');</script>";
                                
                                 
                                     if($row2 = $result2->fetch_array())
                                   {
                                       
                                     $marks=$row2[0];  
                                     
                                     
                                     $mark1[$j]=$arry[$counter]."  -  ". $row2[0];
                            //     echo "<script>alert('marks= $marks');</script>";
                                 
                           //      echo "<script>alert('inside loop  usn = $uss  j= $j counter= $counter  array counter =$arry[$counter] marks=$mark1[$j]');</script>";
                                  
                                 //   $tot=$tot+(int)$row2['int1'];
                                    $attend=$row2[1]."/".$row2[2];
                                   $att[$j]= $arry[$counter]."  -  ".$row2[1]."/".$row2[2];
                                     
                             //      echo "<script>alert('attend= $attend');</script>";
                                    }
                                  
                                  $j++;
                                  $counter++;
                               //    echo "<script>alert('counter= $counter');</script>";
                                  }
                                  unset($mark5);
                                  unset($att5);
                                    $c1=0;
                                   $j1=0;
                                   
                                   
                                   // lab marks...
                                   
                                  while($c1<$s2)
                                  {
                                     
                                 //        echo "<script>alert('inside  usn = $uss counter= $counter s3 = $s3 array counter =$arry[$counter]');</script>";
                                    if($intern==1)    
                                   $sqlab="SELECT marks.int1,marks.att1,marks.tatt1 From $branche1[$c].marks where   $branche1[$c].marks.usn='$uss'  and $branche1[$c].marks.sem='$sem1' and $branche1[$c].marks.subcode='$lab[$c1]'";     
                                     else if($intern==2)    
                                   $sqlab="SELECT marks.int2,marks.att2,marks.tatt2 From $branche1[$c].marks where   $branche1[$c].marks.usn='$uss'  and $branche1[$c].marks.sem='$sem1' and $branche1[$c].marks.subcode='$lab[$c1]'";     
                                else if($intern==3)    
                                   $sqlab="SELECT marks.int3,marks.att3,marks.tatt3 From $branche1[$c].marks where   $branche1[$c].marks.usn='$uss'  and $branche1[$c].marks.sem='$sem1' and $branche1[$c].marks.subcode='$lab[$c1]'";     
                             
                              //       $sql2="SELECT marks.int1,marks.att1,marks.tatt1 From $branch.marks,$branch.students where  $branch.marks.usn=$branch.students.usn and $branch.students.usn='$uss'  and $branch.students.sem='$sem' and $branch.marks.subcode='$arry[$counter]' ORDER BY $branch.students.usn ASC";
                                     $rlab = $con->query($sqlab);
                                     $m2=mysqli_num_rows($rlab);
                                //    echo "<script>alert('labs = $m2');</script>";
                                
                                 
                                     if($row5 = $rlab->fetch_array())
                                   {
                                       
                                     //$marks=$row5['int1'];  
                                     
                                     
                                     $mark5[$c1]=$lab[$c1]."  -  ". $row5[1];
                                 //echo "<script>alert(' marks= $marks');</script>";
                                 
                              //   echo "<script>alert('inside lab loop  usn = $uss  j= $j1 counter= $c1  array counter =$lab[$c1] marks=$mark5[$c]');</script>";
                                  
                                 //   $tot=$tot+(int)$row2['int1'];
                                    $attend=$row5[1]."/".$row5[2];
                                   $att5[$c1]= $lab[$c1]."  -  ".$row5[1]."/".$row5[2];
                                     
                               //    echo "<script>alert(' attend= $attend');</script>";
                                    }
                                  
                                  $j1++;
                                  $c1++;
                               //    echo "<script>alert(' counter= $c1');</script>";
                                  }
                              
                                    
       $dbz=strtoupper($dbz);
       
  //      echo "<script>alert(' dbzz= $dbz');</script>";
        
          $intern1=$intern;
       if($intern==1)
       $intern1="1st";
       else  if($intern==2)
       $intern1="2nd";
        else if($intern==3)
       $intern1="3rd";
       
      else if($intern==4)
       $intern1="4th";
       //sem less than 3
        if($sem<3)
        {
         //   $dbz="PCM";
           //  echo "<script>alert('msg  usn = $uss marks0=$mark1[0] , marks1-$mark1[1] , marks2-$mark1[2] , marks3-$mark1[3] , marks4-$mark1[4] , marks5- $mark1[5]');</script>";   
            //subject 8 including lab
            $msgtxt= "Dear $pname , Your ward $name , Branch $dbz Sem - $sems , $intern1 Internal Marks Report :";
       
             $subcounter=0;
             $msgadd=$mark1[$subcounter];
             $subcounter=1;
             while($subcounter<$s1)
             {
               
               $msgadd=$msgadd .", " .$mark1[$subcounter];
               $subcounter++;
               
             }
             
             $msgtxt=$msgtxt." ".$msgadd . ". From: Principal-KVGCE.";
         //       echo "<script>alert(' msg mark= $msgtxt');</script>";
     // $msgtxt="";
    
    
    
    
       $msgtxt1= "Dear $pname , Your ward $name , Branch $dbz Sem - $sems , $intern1 Internal Attendance Report :";
        
             $subcounter=0;
             $msgatten=$att[$subcounter];
             $subcounter=1;
             while($subcounter<$s3)
             {
               
               $msgatten=$msgatten .", " .$att[$subcounter];
                 $subcounter++;
             }
             
             $sublab=0;
             $labadd=$att5[$sublab];
               $sublab=1;
             while($sublab<$s2)
             {
                $labadd=$labadd.", ". $att5[$sublab];
                $sublab++;
            // echo "<script>alert(' msg= $labadd');</script>";
             }
             $msgtxt1=$msgtxt1." ".$msgatten .$labadd. ". From: Principal-KVGCE.";
              
      //  echo "<script>alert(' msg attendance= $msgtxt1');</script>";
    //    $msgtxt1="";
         
    }
    
    //$msgtxt1="";
        
  

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



                             
                  
} 
    
    
 $c++;   
}

    
}

$receipientno1[0]="9448725608";// sridhar sir
$receipientno1[1]="8105327202";// principal
$receipientno1[2]="9886794742";
$receipientno1[3]="9880551978";
$k=0;
while($k<4)
{
 
$msgtxt5="Dear Sir, $dbz Department $sem Semester $intern1 Internal: Marks and Attendance Report Sent .  From: KVGCE."; 
curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno1[$k]&msgtxt=$msgtxt5");
$buffer5 = curl_exec($ch);
$k++;
}
if(empty ($buffer5))
{ 
    echo " buffer is empty ";

}
else
{ 
    echo $buffer5; 
    
} 



 echo "  Total number of Students ".$totst;
curl_close($ch);

$dbz1=strtolower($dbz);
$sqlid = "select appid from kvgenggco_admin.approved  where branch='$dbz1' and sem='$sem' and intern='$intern'"; 
$resultid = $con->query($sqlid);

if($row1 = $resultid->fetch_assoc())
{
$apid=$row1['appid'];
$todaydate=date("Y-m-d");
$sqlup = "update kvgenggco_admin.approved set dos='$todaydate', remark='sent' where appid='$apid' and branch='$dbz1' and sem='$sem' and intern='$intern'"; 
$resultup = $con->query($sqlup);

}


?>







