<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=1024">
      <link href="http://provide.smashingmagazine.com/graph_tut_files/css/common.css" rel="stylesheet">
      <link href="http://provide.smashingmagazine.com/graph_tut_files/css/04.css" rel="stylesheet">
      <title>Example 01: No CSS</title>
   </head>

   <body>
      <div id="wrapper">
			<div class="chart">
			
			<?php
			
		 extract($_REQUEST);
      $dbname1= "kvgenggco_".$_SESSION["dbnamez"];
      $branch=$dbname1;
      
      $branchs=strtoupper($_SESSION["dbnamez"]); //Only to display the department name
      
 //   $_SESSION["semss"]=$sem;
  //  $_SESSION["intern"]="1";
    $facname=$_SESSION['facname'];
$email=$_SESSION['email'];
         	
			$sql1 ="SELECT students.USN,students.cordinator,sem From students,faculty WHERE faculty.Name='$facname' and cordinator='$facname' and  students.sem<9 and students.sem>0";
                                  $result10 = $con->query($sql1);
                                  $s10=mysqli_num_rows($result10);
                            //      echo "<script>alert('$s10');</script>";
                                 $var1=0;
                                  while($row10 = $result10->fetch_assoc())
                                  {
                                     $usnm[$var1]= $row10['USN'];
                                     $sem=$row10['sem'];
                                      $var1++;
                                  }
                    
               
                   $sqlsub= "SELECT distinct(marks.subcode) From $dbname1.marks,$dbname1.subjects where $dbname1.subjects.subcode=$dbname1.marks.subcode and $dbname1.marks.sem='$sem' and $dbname1.subjects.elective=0  and  $dbname1.marks.subcode not like '%L%'";
                                  $resultsub = $con->query($sqlsub);
                                   $s1=mysqli_num_rows($resultsub);
                             //   echo "<script>alert('my value: $s1');</script>";
                                
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
                                    $sqllab= "SELECT distinct(marks.subcode) From $dbname1.marks,$dbname1.subjects,$dbname1.students where $dbname1.subjects.subcode=$dbname1.marks.subcode and $dbname1.marks.sem='$sem' and $dbname1.subjects.elective=0 and $dbname1.marks.USN=$dbname1.students.USN  and $dbname1.marks.subcode like '%L%'";
                                  $resultlab = $con->query($sqllab);
                                   $s2=mysqli_num_rows($resultlab);
                            //    echo "<script>alert('my lab: $s2');</script>";
                                  
                                   while($rowlab = $resultlab->fetch_assoc())
                                   {                
                                     $arry1[]=$rowlab['subcode'];
                                   }
                                    sort($arry1);
                                   $arry= array_merge($arry,$arry1);
                                  //    echo "<script>alert('my value: 0 $arry[0]  $arr[1] $arry[2]  $arry[3] $arry[4] $arry[5] $arry[6] $arry[7] 8= $arry[8]');</script>"; 
                                    $counter=0;
                                    $tot=0;
                                    $s1=$s1+$s2;
			
			
	$sql = "SELECT students.usn,students.Name,students.sem From $branch.students,$branch.marks where $branch.marks.usn=$branch.students.usn and $branch.students.sem='$sem' and $branch.students.USN='$usnm[$ms]'";
                                  $result = $con->query($sql);
                                  
                                  if($row = $result->fetch_assoc())
                                  {
                                     $uss= $row['usn']; ?>
                                     
                                     <?=$uss?>
                                   <?=$row['Name'];?>
                                   
                                   ?> 
                                 
				<table id="data-table" border="1" cellpadding="10" cellspacing="0" summary="The effects of the zombie outbreak on the populations of endangered species from 2012 to 2016">
					<caption>Population in thousands</caption>
					<thead>
						<tr>
							<td>&nbsp;</td>
							<th scope="col"><?=$uss?></th>
						
						</tr>
					</thead>
					<tbody>
						<tr>
						    
							<th scope="row"><?php $arry[0]?></th>
							<td>4080</td>
							<td>6080</td>
							<td>6240</td>
							<td>3520</td>
							<td>2240</td>
						</tr>
						<tr>
							<th scope="row">Blue Monkey</th>
							<td>5680</td>
							<td>6880</td>
							<td>5760</td>
							<td>5120</td>
							<td>2640</td>
						</tr>
						<tr>
							<th scope="row">Tanned Zombie</th>
							<td>1040</td>
							<td>1760</td>
							<td>2880</td>
							<td>4720</td>
							<td>7520</td>
						</tr>
					</tbody>
				</table>
				
				<?php } ?>
		</div>
   </body>
</html>



<script>
    
    // Wait for the DOM to load everything, just to be safe
$(document).ready(function() {

   // Create our graph from the data table and specify a container to put the graph in
   createGraph('#data-table', '.chart');

   // Here be graphs
   function createGraph(data, container) {
      // Declare some common variables and container elements
      …

      // Create the table data object
      var tableData = {
         …
      }

      // Useful variables to access table data
      …

      // Construct the graph
      …

      // Set the individual heights of bars
      function displayGraph(bars) {
         …
      }

      // Reset the graph's settings and prepare for display
      function resetGraph() {
         …
         displayGraph(bars);
      }

      // Helper functions
      …

      // Finally, display the graph via reset function
      resetGraph();
   }
});





// Declare some common variables and container elements
var bars = [];
var figureContainer = $('<div id="figure"></div>');
var graphContainer = $('<div class="graph"></div>');
var barContainer = $('<div class="bars"></div>');
var data = $(data);
var container = $(container);
var chartData;
var chartYMax;
var columnGroups;

// Timer variables
var barTimer;
var graphTimer;







// Create table data object
var tableData = {
   // Get numerical data from table cells
   chartData: function() {
      …
   },
   // Get heading data from table caption
   chartHeading: function() {
      …
   },
   // Get legend data from table body
   chartLegend: function() {
      …
   },
   // Get highest value for y-axis scale
   chartYMax: function() {
      …
   },
   // Get y-axis data from table cells
   yLegend: function() {
      …
   },
   // Get x-axis data from table header
   xLegend: function() {
      …
   },
   // Sort data into groups based on number of columns
   columnGroups: function() {
      …
   }
}








// Sort data into groups based on number of columns
columnGroups: function() {
   var columnGroups = [];
   // Get number of columns from first row of table body
   var columns = data.find('tbody tr:eq(0) td').length;
   for (var i = 0; i < columns; i++) {
      columnGroups[i] = [];
      data.find('tbody tr').each(function() {
         columnGroups[i].push($(this).find('td').eq(i).text());
      });
   }
   return columnGroups;
}









// Loop through column groups, adding bars as we go
$.each(columnGroups, function(i) {
   // Create bar group container
   var barGroup = $('<div class="bar-group"></div>');
   // Add bars inside each column
   for (var j = 0, k = columnGroups[i].length; j < k; j++) {
      // Create bar object to store properties (label, height, code, etc.) and add it to array
      // Set the height later in displayGraph() to allow for left-to-right sequential display
      var barObj = {};
      barObj.label = this[j];
      barObj.height = Math.floor(barObj.label / chartYMax * 100) + '%';
      barObj.bar = $('<div class="bar fig' + j + '"><span>' + barObj.label + '</span></div>')
         .appendTo(barGroup);
      bars.push(barObj);
   }
   // Add bar groups to graph
   barGroup.appendTo(barContainer);
});











// Add y-axis to graph
var yLegend   = tableData.yLegend();
var yAxisList   = $('<ul class="y-axis"></ul>');
$.each(yLegend, function(i) {
   var listItem = $('<li><span>' + this + '</span></li>')
      .appendTo(yAxisList);
});
yAxisList.appendTo(graphContainer);







// Add bars to graph
barContainer.appendTo(graphContainer);

// Add graph to graph container
graphContainer.appendTo(figureContainer);

// Add graph container to main container
figureContainer.appendTo(container);









// Set the individual height of bars
function displayGraph(bars, i) {
   // Changed the way we loop because of issues with $.each not resetting properly
   if (i < bars.length) {
      // Animate the height using the jQuery animate() function
      $(bars[i].bar).animate({
         height: bars[i].height
      }, 800);
      // Wait the specified time, then run the displayGraph() function again for the next bar
      barTimer = setTimeout(function() {
         i++;
         displayGraph(bars, i);
      }, 100);
   }
}













// Reset graph settings and prepare for display
function resetGraph() {
   // Stop all animations and set the bar's height to 0
   $.each(bars, function(i) {
      $(bars[i].bar).stop().css('height', 0);
   });

   // Clear timers
   clearTimeout(barTimer);
   clearTimeout(graphTimer);

   // Restart timer
   graphTimer = setTimeout(function() {
      displayGraph(bars, 0);
   }, 200);
}






    
</script>








<style>
   


/* Containers */

#wrapper {
   height: 420px;
   left: 50%;
   margin: -210px 0 0 -270px;
   position: absolute;
   top: 50%;
   width: 540px;
}

#figure {
   height: 380px;
   position: relative;
}

#figure ul {
   list-style: none;
   margin: 0;
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
   height: 20px;
   margin: 0;
   padding: 10px 30px;
   width: 120px;
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
}

.x-axis li {
   float: left;
   margin: 0 15px;
   padding: 5px 0;
   width: 76px;
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
   margin: -10px 0 0 -60px;
   padding: 0 10px;
   width: 40px;
}












/* Graph bars */

.bars {
   height: 253px;
   position: absolute;
   width: 100%;
   z-index: 10;
}

.bar-group {
   float: left;
   height: 100%;
   margin: 0 15px;
   position: relative;
   width: 76px;
}








.bar {
   border-radius: 3px 3px 0 0;
   bottom: 0;
   cursor: pointer;
   height: 0;
   position: absolute;
   text-align: center;
   width: 24px;
}

.bar.fig0 {
   left: 0;
}

.bar.fig1 {
   left: 26px;
}

.bar.fig2 {
   left: 52px;
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


<script>
    
// Set individual height of bars
function displayGraph(bars, i) {
   // Changed the way we loop because of issues with $.each not resetting properly
   if (i < bars.length) {
      // Add transition properties and set height via CSS
      $(bars[i].bar).css({'height': bars[i].height, '-webkit-transition': 'all 0.8s ease-out'});
      // Wait the specified time, then run the displayGraph() function again for the next bar
      barTimer = setTimeout(function() {
         i++;
         displayGraph(bars, i);
      }, 100);
   }
}
// Reset graph settings and prepare for display
function resetGraph() {
   // Set bar height to 0 and clear all transitions
   $.each(bars, function(i) {
      $(bars[i].bar).stop().css({'height': 0, '-webkit-transition': 'none'});
   });

   // Clear timers
   clearTimeout(barTimer);
   clearTimeout(graphTimer);

   // Restart timer
   graphTimer = setTimeout(function() {
      displayGraph(bars, 0);
   }, 200);
}    
    
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="http://provide.smashingmagazine.com/graph_tut_files/js/04.js"></script>
