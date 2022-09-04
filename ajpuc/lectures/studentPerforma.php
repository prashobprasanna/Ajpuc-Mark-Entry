<?php include("header.php");
      include('sidebar.php');
     include('dbconfig.php');
extract($_REQUEST); 
//$_SESSION['back']="MentorStudent.php";

$servername1 = "localhost";
$username1 = "kvgenggco_admin";
$password1 = "Geleyageleya";

          $sem=$_SESSION['sem'];
$dbname1 = "kvgenggco_".$_SESSION["dbnamez"];
$contemp = new mysqli($servername1, $username1, $password1, $dbname1);


//if (isset($_POST["susn"])) {

if(!$susn=="")
 $_SESSION["susn"]=$susn;  
//}
//else{  
  $susn= $_SESSION["susn"];
//}

echo "<script>alert('$dbname1/  $sem');</script>";

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
        Internal Assessment Marks and Attendences
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">IA marks<li>
      </ol>
       
        <div class="content">
	   <div class="container-fluid">
	       
	             
                  <div class="col-sm-4">
                <a href="studentGraph.php" class="btn btn-secondary">Student Performance Analysis</a>
                  
                  <style>
                         .btn-secondary { 
                             float: right;
                              padding: 10px;
                              background: linear-gradient(#c671f1,#5b2577);
                              color: #ffffff;
                              font-weight: 600;
                              font-size: 15px;
                         }
                  </style>
                   </div>
                   
                  <?php $backnav="mentorStudent.php"; ?>
                   
   
     <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=window.width,height=window.height');
       popupWin.document.open();
       popupWin.document.write('<html><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><style>td{ font-size:12px !important; }.action { display :none !important; }</style><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>

<br/><br/>

<style>
td{ font-size:13px !important; }
</style>

                   <div class="col-md-2 col-sm-2 col-sx-2 pull-right" >
                        <input type="button" class="btn btn-primary pull-right" value="Print" onclick="PrintDiv();" />
                    </div>



                   <div class="col-md-2 col-sm-2 col-sx-2 pull-right" >
                        <form action="<?php echo $backnav ?>">
                            <input id="submit" name="Back" type="submit" value="Back" class="btn btn-success pull-right">
                        </form>
                    </div>
 
               
   <br/> <br/> 

         <div class="panel panel-info">
	          <div class="panel-heading"><?=$sem ?> Semester</div>
		         <div class="panel-body">
             <div class="table-responsive">
              <div class="box-body">
                  
                   <div id="divToPrint" >
                           <table  class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    
                                     <th>Subject Name</th>
                                     
                                     <th>1st IA </th>
                                     <th>Atten </th>
                                     <th>2nd IA </th>
                                     <th>Atten </th>
                                     <th>3rd IA </th>
                                     <th>Atten </th>
                                     
                                     <th>Final IA</th>
                                     
                                     <th>Final Atten</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                  $i=1;
                             //     $sql="select `subjects`.`Name` AS subname,`int1`,`int2`,`int3`,`att1`,`att2`,`att3`,`tatt1`,`tatt2`,`tatt3` from kvgenggco_csis.subjects, kvgenggco_csis.marks where marks.subcode=`subjects`.`subcode` and usn='4KV15CS003'";
                                 $sql = "select DISTINCT(`subjects`.`Name`) AS subname,`int1`,`int2`,`int3`,`att1`,`att2`,`att3`,`tatt1`,`tatt2`,`tatt3`,`totia`,`avgint`,`avgatt` from $dbname1.subjects,$dbname1.marks where marks.subcode=`subjects`.`subcode` AND usn='$susn' and $dbname1.marks.sem=$sem";
                                  $result = $contemp->query($sql);
                                    
                                 while($row=$result->fetch_assoc())
                                  { 
                                  
                                  ?>
                                  <tr>
                                  
                                    <td><?=$row['subname'];?></td>
                                    
                                    <td><?=$row['int1'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att1']*100/(int)$row['tatt1'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att1']."/".$row['tatt1']." ".$finval;
                                              
                                              ?>
                                    
                                    </td>
                                    <td><?=$row['int2'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att2']*100/(int)$row['tatt2'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att2']."/".$row['tatt2']." ".$finval;
                                              
                                              ?></td>
                                    <td><?=$row['int3'];?></td>
                                    <td><?php  
                                              $valz=(int)$row['att3']*100/(int)$row['tatt3'];
                                              $valu=round($valz,2);
                                              $finval='';
                                              if((int)$valu<85)
                                              {
                                                  $finval="<p style='color:red;'>"."(".$valu."%".")"."</p>";
                                              }
                                              else
                                              {
                                                  $finval="<p style='color:green;'>"."(".$valu."%".")"."</p>";
                                              }
                                              
                                              echo $row['att3']."/".$row['tatt3']." ".$finval;
                                              
                                              ?></td>
                                              <td><?=$row['avgia']?></td>
                                                <td><?=$row['avgatt']?></td>
                               </tr>
                               <?php $i++; } ?>
                              </tbody>
                              
                           </table>
                        </div>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                  </div>
                  <!-- /.col -->
               </div>
   
  
   
               <!-- /.row -->
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
      


<?php include('footer.php');?>