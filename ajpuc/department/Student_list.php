
<?php include("header.php");
      include('sidebar.php');
      
extract($_REQUEST);?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
    <h1>
      Students
    </h1>

      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Students </li>
      </ol>
       
        <div class="content">
	   <div class="container-fluid">
           <?php if(isset($asuccess)){ ?>
   <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Added Students successfully.</strong>
</div>
   <?php } ?>
  
       <?php if(isset($usuccess)){ ?>
   <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Updated Student successfully.</strong>
</div>
   <?php } ?>
   
   
   
   <?php if(isset($error)){ ?>
   <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Unable to add students.</strong>
</div>
   <?php } ?>
   
   
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
td{ font-size:12px !important; }
</style>

<div>
    <form class="form-horizontal" role="form" method="post" action="excel.php" enctype="multipart/form-data">
        <input type="submit" class="btn btn-primary pull-right" value="Export" />
  </form>
</div>
<div>
  <input type="button" class="btn btn-primary pull-right" value="Print" onclick="PrintDiv();" />
</div>
<div class="clearfix"></div> <br /> <br />


   <a href="add_Student.php" class="btn btn-primary pull-right">Add Students</a>
    <!--<link rel="stylesheet" href="css/tables.css">-->
   <br/><br/>
         <div class="panel panel-info">
	          <div class="panel-heading">Students List </div>
		         <div class="panel-body">
              <div class="box-body table-container">
                   <div id="divToPrint" >
  <div>
                        <table id="example1" class="table table-bordered table-striped">
  <thead role="rowgroup">
    <tr role="row">
        <th role="columnheader">Fname</th>
      <th role="columnheader"> Lname </th>
      <th role="columnheader">Roll_No </th>
      <th role="columnheader">Gender</th>
      <th role="columnheader">Phone_No</th>
      <th role="columnheader">Email_ID</th>
      <th role="columnheader"> Remarks</th>
      <th role="columnheader"> Reg_No</th>
      <th role="columnheader">SATS_No</th>
      <th role="columnheader">Enroll_No</th>
      <th role="columnheader">Father_Name</th>
      <th role="columnheader">Mother_Name</th>
      <th role="columnheader">DOB</th>
      <th role="columnheader">Address_1</th>
      <th role="columnheader">Address_2</th>
      <th role="columnheader">City</th>     
       <th role="columnheader" class="action">Action</th>
    </tr>
  </thead>
  <tbody role="rowgroup">
                                 <?php
                                $i=1;
                                $sql = "SELECT * from student  order by Roll_No asc";
                                $result = $con->query($sql);
                                while($row = $result->fetch_assoc())
                                { 
                                ?>
                                <tr role="row">
				
                               <td role="cell"><?=$row['Fname'];?></td>
                                <td role="cell"><?=$row['Lname'];?></td>
                                <td role="cell"><?=$row['Roll_No'];?></td>
                                <td role="cell"><?=$row['Gender'];?></td>
                                <td role="cell"><?=$row['Phone_No'];?></td>
                                <td role="cell"><?=$row['Email_ID'];?></td>
                                <td role="cell"><?=$row['Remarks'];?></td>
                                <td role="cell"><?=$row['Reg_No'];?></td>
                                <td role="cell"><?=$row['SATS_No'];?></td>
                                <td role="cell"><?=$row['Enroll_No'];?></td>
                                <td role="cell"><?=$row['Fathers_Name'];?></td>
                                <td role="cell"><?=$row['Mothers_Name'];?></td>
                                <td role="cell"><?=$row['DOB'];?></td>
                                <td role="cell"><?=$row['Address_1'];?></td>
                                <td role="cell"><?=$row['Address_2'];?></td>
                                <td role="cell"><?=$row['City'];?></td>
                                 
				
                             </tr>
                             <?php $i++; } ?>
                              </tbody>
                              <tfoot class="hidden-xs hidden-sm">
                                 <tr>
				    <th>Photo</th>
            <th role="columnheader">Fname</th>
      <th role="columnheader"> Lname </th>
      <th role="columnheader">Roll_No </th>
      <th role="columnheader">Gender</th>
      <th role="columnheader">Phone_No</th>
      <th role="columnheader">Email_ID</th>
      <th role="columnheader"> Remarks</th>
      <th role="columnheader"> Reg_No</th>
      <th role="columnheader">SATS_No</th>
      <th role="columnheader">Enroll_No</th>
      <th role="columnheader">Father_Name</th>
      <th role="columnheader">Mother_Name</th>
      <th role="columnheader">DOB</th>
      <th role="columnheader">Address_1</th>
      <th role="columnheader">Address_2</th>
      <th role="columnheader">City</th>              
	            <th  class="action"> ACTION</th>
                                 </tr>
                              </tfoot>
                           </table>
                        </div>
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
      
<style>
    
.box-body::-webkit-scrollbar
{
	-webkit-appearance: none;
	width: 14px;
	height: 14px;
}

.box-body::-webkit-scrollbar-thumb
{
	border-radius: 8px;
	border: 3px solid #fff;
	background-color: rgba(0, 0, 0, .3);
}
.box-body {
    width: 100%;
    overflow-y: auto;
    _overflow: auto;
    margin: 0 0 1em;
}

.box-body::-webkit-scrollbar-thumb {
    border-radius: 8px;
    border: 3px solid #fff;
    background-color: rgba(0, 0, 0, .3);
}
</style>

<?php include('footer.php');?>