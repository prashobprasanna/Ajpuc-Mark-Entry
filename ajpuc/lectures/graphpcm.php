<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=1024">
      <title>Students Peformance Chart</title>
      
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <link href="http://provide.smashingmagazine.com/graph_tut_files/css/common.css" rel="stylesheet"> 
      <link href="http://provide.smashingmagazine.com/graph_tut_files/css/04.css" rel="stylesheet">
      
      <style>
          input[type=button], input[type=reset], input[type=submit] {
    padding: 7px 20px;
    background: #367fa9;
    color: #fff;
    border: none;
    text-transform: uppercase;
    text-shadow: 0px 0px 0px;
}

.graphhead {
    background: #ffd3d3;
}
      </style>
      
   </head>

   <body>
       
      <div class="graphhead">
          <div class="container" >
              <div class="col-sm-6">
              <h3 style="font-size: 18px;font-weight: 600; padding: 10px;">The Performance of Students based on the Internal Exams</h3>
              </div>
               <div class="col-sm-5"></div>
                <div class="col-sm-1" style="padding: 10px;margin-top: 5px;">
                        <a href="mentorStudentpcm.php" >
                            <button class="btn btn-primary">BACK</button>
                        </a>
                 </div>
          </div>
      </div>
      
      
       
        <br> <br>
       
      <div id="wrapper">
			<div class="chart">
			
			<?php
			
		include('dbconfig.php');
		
		
		$servername1 = "localhost";
        $username1 = "kvgenggco_admin";
        $password1 = "Geleyageleya";
        //$dbname1 = "kvgenggco_".$branch; 
        $dbname1= "kvgenggco_".$_SESSION["dbnamez"];
        $con = new mysqli($servername1, $username1, $password1, $dbname1);
		 extract($_REQUEST);
        //   $dbname1= "kvgenggco_"."csis";  // $_SESSION["dbnamez"];
        $branch=$dbname1;
      
			 
        $branchs=strtoupper($_SESSION["dbnamez"]); //Only to display the department name
      
        //   $_SESSION["semss"]=$sem;
        //  $_SESSION["intern"]="1";
        //  $sem=7;
        $facname=$_SESSION['facname'];
        $email=$_SESSION['email'];//$_SESSION['email'];
        $sem=  $_SESSION["sem"];
      $cycle=$_SESSION["cycle"];
      
     
     if($cycle=="Physics")
       $cycle=$sem."P";
       else
        $cycle=$sem."C";
        //	echo "<script>alert('sem = $sem');</script>";
		/*	$sql1 ="SELECT students.Name,students.USN,students.cordinator,sem From students,faculty WHERE faculty.Name='$facname' and cordinator='$facname' and  students.sem<9 and students.sem>0";
                                  $result10 = $con->query($sql1);
                                  $s10=mysqli_num_rows($result10);
                           //      echo "<script>alert('$s10');</script>";
                                 $var1=0;
                                  while($row10 = $result10->fetch_assoc())
                                  {
                                     $usnm[$var1]= $row10['USN'];
                                     $snames[$var1]=$row10['Name'];
                                     $sem=$row10['sem'];
                                      $var1++;
                                  }
                    */
               
                   $sqlsub= "SELECT distinct(marks.subcode) From kvgenggco_csis.marks,$dbname1.subjects where $dbname1.subjects.subcode=kvgenggco_csis.marks.subcode and kvgenggco_csis.marks.sem like '$sem%' and  $dbname1.subjects.sem='$cycle' and $dbname1.subjects.elective=0 ";
                                  $resultsub = $con->query($sqlsub);
                                   $s1=mysqli_num_rows($resultsub);
                              // echo "<script>alert('my value: $s1');</script>";
                                
                                   while($rowsub = $resultsub->fetch_assoc())
                                   {
                                       $arry[]=$rowsub['subcode'];
                                       
                                   }
                                //   echo "<script>alert('my value: 0 $arry[0]  $arr[1] $arry[2]  $arry[3] $arry[4] $arry[5] $arry[6] );</script>"; 
                                   
                                    usort($arry, function ($a, $b){
                                        return substr($a, -2) - substr($b, -2);
                                    });
                                   
                               //     echo "<script>alert('my value: 0 $arry[0]  $arr[1] $arry[2]  $arry[3] $arry[4] $arry[5] $arry[6] $arry[7] 8= $arry[8]');</script>"; 
                                   
                                   
                                   
                             
                                   //lab code
                                    $sqllab= "SELECT distinct(marks.subcode) From kvgenggco_csis.marks,$dbname1.subjects where $dbname1.subjects.subcode=kvgenggco_csis.marks.subcode and kvgenggco_csis.marks.sem like '$sem%'  and $dbname1.subjects.sem='$cycle' and $dbname1.subjects.elective=3 ";
                                  $resultlab = $con->query($sqllab);
                                   $s2=mysqli_num_rows($resultlab);
                        //        echo "<script>alert('my lab: $s2');</script>";
                                  
                                   while($rowlab = $resultlab->fetch_assoc())
                                   {                
                                     $arry1[]=$rowlab['subcode'];
                                   }
                                    sort($arry1);
                                    
                                    
                                    if($s2>0)
                                   $arry= array_merge($arry,$arry1);
                                  //    echo "<script>alert('my value: 0 $arry[0]  $arr[1] $arry[2]  $arry[3] $arry[4] $arry[5] $arry[6] $arry[7] 8= $arry[8]');</script>"; 
                                    $counter=0;
                                    $tot=0;
                                    $s1=$s1+$s2;
                                   
                    
                                
                                   $i=1;
                                  
                         
                        
                                  
                                  // elective subject
                             
                             ?>
                             
                             
                     
                             
                               <div class="clearfix"></div><br>    
                  <form action="graphpcm.php" method="post">
                      <div class="col-sm-4"></div>
                      <div class="col-sm-2">
                         <label style="font-size:15px; color:navy">Select Subcode: </label>
                      </div>
                      <div class="col-sm-1">
                        <select name="subsi" style="padding: 6px;">
                      
                            <?php $subgalu=sizeof($arry);
                                  $ks=0;
                                 while($ks<$subgalu)
                                 { ?>
                                 <option><?=$arry[$ks]?></option>
                                 
                                <?php
                                $ks++;
                                }?>
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                  </form>
                  
        <?php        if(isset($_POST["subsi"]))
                    {
          
                        $_SESSION["subsi"]=$_POST["subsi"];
                  
                    }
                    
                    else
                     $_SESSION["subsi"]=$arry[0];
                    
                    ?>        
                        
                 <div class="clearfix"></div><br>  <br>    
                 
				<table id="data-table" border="1" cellpadding="10" cellspacing="0" summary="The Performance of Students based on the Internal Exams">
				<!--	<caption><b>The Performance of Students based on the Internal Exams</b></caption> -->
						<thead>
						<tr>
						    
						    
						    	<td>&nbsp;</td>
						        <?php
						        $stud=0;
						         $deptcounter=0;
                                  $branche1 = array('kvgenggco_civil', 'kvgenggco_csis', 'kvgenggco_ec','kvgenggco_mech');
						    $maklasankye=0;
						    $mstot=0;
						     $cccc=0;
                            //   echo "<script>alert('my branch: $branche1');</script>";
						    while($deptcounter<4)
						    {
						        
						       
                                // $branch="kvgenggco_" .$branch;
                                
                                  $sql = "SELECT distinct(students.usn),students.Name,students.sem From $branche1[$deptcounter].students,$branche1[$deptcounter].marks where $branche1[$deptcounter].marks.usn=$branche1[$deptcounter].students.usn  and $branche1[$deptcounter].students.cordinator='$facname'";
                                  $result = $con->query($sql);
                                   $maklasankye=mysqli_num_rows($result);
                          //          echo "<script>alert('branch $branche1[$deptcounter]  / sankye - $maklasankye');</script>";
                                   $mstot=$mstot+$maklasankye;
                                  
                                  while($row = $result->fetch_assoc())
                                  {
                                     $usnm[]= $row['usn'];
                                     $snames[]=$row['Name'];
						            $depts[]=$branche1[$deptcounter] ?>
							        <th scope="col"><?=substr($snames[$cccc],0,8) ; 
							        
							        $cccc++;
							        ?></th>
							        <?php 
						        
							    } 
                                     
                                 $deptcounter++;}
							        ?>
						</tr>
					</thead>
					
                <tbody>
                    <?php $sub=0;
                      $subcodaa= $_SESSION["subsi"] ;
                        ?>
                        <tr>
						  
					        <?php
					        $counter=0;
			                $maklu=0;
			              //   $deptcounter=0;
                            //      $branche1 = array('kvgenggco_civil', 'kvgenggco_csis', 'kvgenggco_ec','kvgenggco_mech');
                          
                            while($maklu<$mstot)
						    {
						        
						        $sql2= "SELECT marks.int1, marks.int2, marks.int3 From $depts[$maklu].marks,$depts[$maklu].students where  $depts[$maklu].marks.usn=$depts[$maklu].students.usn and $depts[$maklu].marks.usn='$usnm[$maklu]'  and $depts[$maklu].students.sem='$sem' and $depts[$maklu].marks.subcode='$subcodaa' ORDER BY $depts[$maklu].students.usn ASC";
                                $result2 = $con->query($sql2);
                                $m=mysqli_num_rows($result2);
                                 
                                 if($row2 = $result2->fetch_array())
                                  {
                                       // $mark1[]=$row2[0];
                                  
                                       $mark1[]=$row2[0];
                                       $mark2[]=$row2[1];
                                       $mark3[]=$row2[2];
                                      
                                
                                        //   $mark2[]=$row2[1];
                                        //   $mark3[]=$row2[2];
                                   }
                               
                                  
                                    $maklu++;
				             	    $counter++; 
				             	    $deptcounter++;
                            }
                        ?> 
                              <th scope="row"><?= $subcodaa. " "?> (1st)</th>
                        <?php    $i=0;
                                while($i<$mstot)  
                                 {  ?> 
                                   <td><?=$mark1[$i]*1000?></td>
                            <?php     
                                     $i++;
                                 } 
                               ?> 
                               
                                </tr>
                                
                                <tr>
                               <th scope="row"><?= $subcodaa. " " ?> (2nd)</th>
                        <?php  
                                   $i=0;
                                while($i<$mstot)  
                                 {  ?> 
                                   <td><?=$mark2[$i]*1000?></td>
                                   
                                <?php       $i++; }  
                                ?>  
                                
                               </tr> 
                                
                                
                                <tr>
                                <th scope="row"><?= $subcodaa. " " ?>(3rd)</th>
                               <?php   $i=0;
                                  while($i<$mstot)  
                                 {  ?> 
                                   <td><?=$mark3[$i]*1000?></td>
                                 <?php       $i++; }  ?>
               	       
               	    </tr>
				</tbody>	
			</table>
		</div>
   </body>
</html>















<style>
   
#wrapper {
    height: auto !important;
    left: 1%;
    margin: 1%;
    position: relative;
    top: 0;
    width: auto;
}


/* Containers */

#figure {
   height: 380px;
   position: relative;
}

#figure ul {
   list-style: none;
   margin: 0px 0px -35px 0px;
   padding: 0;
}

.graph {
   height: 283px;
   position: relative;
}






/* Legend */

.legend {
   background: #f0f0f0;
   border-radius: 4px;
   bottom: 0;
   position: absolute;
   text-align: left;
   width: 100%;
}

.legend li {
    display: block;
    float: left;
    height: 40px;
    margin: 4px;
    padding: 10px 30px;
    width: 200px;
    font-weight: 900;
    font-size: 11px;
    color: #b30000;
}

.legend span.icon {
   background-position: 50% 0;
   border-radius: 2px;
   display: block;
   float: left;
   height: 16px;
   margin: 2px 10px 0 0;
   width: 16px;
}








/* x-axis */

.x-axis {
   bottom: 0;
   color: #555;
   position: absolute;
   text-align: center;
   width: 100%;    
   font-size: 10px;
}

.x-axis li {
    float: left;
    margin: 0px 6px;
    padding: 5px 0;
    width: 60px;
}








/* y-axis */

.y-axis {
   color: #555;
   position: absolute;
   text-align: right;
   width: 100%;
}

.y-axis li {
   border-top: 1px solid #ccc;
   display: block;
   height: 62px;
   width: 100%;
}

.y-axis li span {
   display: block;
   margin: -10px 0 0 -35px;
   padding: 0 10px;
   width: 40px;
}












/* Graph bars */

.bars {
   height: 249px;
   position: absolute;
   width: 100%;
   z-index: 10;
}

.bar-group {
    float: left;
    height: 100%;
    margin: 0 6px;
    position: relative;
    width: 60px;
}








.bar {
   border-radius: 3px 3px 0 0;
   bottom: 0;
   cursor: pointer;
   height: 0;
   position: absolute;
   text-align: center;
    width: 10px;
}

.bar.fig0 {
   left: 0;
}

.bar.fig1 {
   left: 12px;
}

.bar.fig2 {
   left: 24px;
}








.bar span {
   #fefefe url(../images/info-bg.gif) 0 100% repeat-x;
   border-radius: 3px;
   left: -8px;
   display: none;
   margin: 0;
   position: relative;
   text-shadow: rgba(255, 255, 255, 0.8) 0 1px 0;
   width: 40px;
   z-index: 20;

   -webkit-box-shadow: rgba(0, 0, 0, 0.6) 0 1px 4px;
   box-shadow: rgba(0, 0, 0, 0.6) 0 1px 4px;
}

.bar:hover span {
   display: block;
   margin-top: -25px;
}









.fig0 {
   background: #747474 url(../images/bar-01-bg.gif) 0 0 repeat-y;
}

.fig1 {
   background: #65c2e8 url(../images/bar-02-bg.gif) 0 0 repeat-y;
}

.fig2 {
   background: #eea151 url(../images/bar-03-bg.gif) 0 0 repeat-y;
}



.fig0 {
   background: -webkit-gradient(linear, left top, right top, color-stop(0.0, #747474), color-stop(0.49, #676767), color-stop(0.5, #505050), color-stop(1.0, #414141));
}

.fig1 {
   background: -webkit-gradient(linear, left top, right top, color-stop(0.0, #65c2e8), color-stop(0.49, #55b3e1), color-stop(0.5, #3ba6dc), color-stop(1.0, #2794d4));
}

.fig2 {
   background: -webkit-gradient(linear, left top, right top, color-stop(0.0, #eea151), color-stop(0.49, #ea8f44), color-stop(0.5, #e67e28), color-stop(1.0, #e06818));
}





.bar span {
   background: -webkit-gradient(linear, left top, left bottom, color-stop(0.0, #fff), color-stop(1.0, #e5e5e5));
   …
}



.bar span {
   background: -webkit-gradient(linear, left top, left bottom, color-stop(0.0, #fff), color-stop(1.0, #e5e5e5));
   display: block;
   opacity: 0;

   -webkit-transition: all 0.2s ease-out;
}

.bar:hover span {
   opacity: 1;
}



 
</style>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="js/page/graph.js"></script>
<!--<script src="http://provide.smashingmagazine.com/graph_tut_files/js/04.js"></script>-->





