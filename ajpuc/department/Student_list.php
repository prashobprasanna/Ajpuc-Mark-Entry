
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
        <th role="columnheader">Photo</th>
      <th role="columnheader"> USN </th>
      <th role="columnheader">Name</th>
      <th role="columnheader">SEM </th>
      <th role="columnheader">SEC</th>
      <th role="columnheader">student Phone</th>
      <th role="columnheader">Parent Phone</th>
      <th role="columnheader"> Parent Name</th>
      <th role="columnheader"> Permanent Add</th>
      <th role="columnheader">Campus Add</th>
        <th role="columnheader" class="action">Action</th>
    </tr>
  </thead>
  <tbody role="rowgroup">
                                 <?php
                                $i=1;
                                $sql = "SELECT * from students where sem<9 order by usn asc";
                                $result = $con->query($sql);
                                while($row = $result->fetch_assoc())
                                { 
                                ?>
                                <tr role="row">
				<td role="cell"><img src="<?php echo $row['url'];?>" style="height:4.5cm;width:3.5cm;"></td>
                               <td role="cell"><?=$row['USN'];?></td>
                                <td role="cell"><?=$row['Name'];?></td>
                                <td role="cell"><?=$row['sem'];?></td>
                                  <td role="cell"><?=strtoupper($row['sec']);?></td>
                                  <td role="cell"><?=$row['studnum'];?></td>
                                   <td role="cell"><?=$row['parnum'];?></td>
                                    <td role="cell"><?=$row['parname'];?></td>
                                     <td role="cell" style="font-size: 12px;"><?=$row['addl1'].'<br>'.$row['addl2'].'<br>'.$row['addl3'].'<br>'.$row['pincode'];?></td>
                                      <td role="cell" style="font-size: 12px;"><?=$row['caddl1'].'<br>'.$row['caddl2'].'<br>'.$row['caddl3'].'<br>'.$row['cpincode'];?></td>
				<td role="cell"  class="action"><a href="edit_student.php?oldusn=<?php echo $row['USN'];?>"><button>EDIT</button></a><span> </span><a href="del_stud.php?id=<?php echo $row['idn'];?>"><button>DELETE</button></a></td>
                             </tr>
                             <?php $i++; } ?>
                              </tbody>
                              <tfoot class="hidden-xs hidden-sm">
                                 <tr>
				    <th>Photo</th>
                                    <th> USN </th>
                                    <th> Name </th>
                                    <th> SEM </th>
                                    <th> SEC </th>
                                    <th> student Phno </th>
                                    <th> Parent Phno </th>
                                    <th> Parent Name </th>
                                    <th> Permanent Addr </th>
                                    <th> Campus Addr </th>
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