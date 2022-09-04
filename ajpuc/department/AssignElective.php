<?php include('header.php');
include('sidebar.php');
extract($_REQUEST);

    $type = explode('@',$subs);
    $_SESSION["subcodes"]=$type[0];
     $_SESSION["sems"]=$type[1];
     $_SESSION["facid"]=$fac;
    $subcode=$type[0];
    $sems=$type[1];
    $facId=$fac;
// echo "<script>alert('$facId');</script>";
//echo "<script>alert('$sems');</script>";
//echo "<script>alert('$subcode');</script>";

?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Assign Elective subject
      </h1>
      <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Mentors</li>
      </ol>
      <div class="content">
         <div class="container-fluid">
            <?php
            if(isset($success)){?>
            <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Subject Assigned sucessfully</strong>
            </div>
            <?php }
            ?>
            <?php
            if(isset($error)){?>
            <div class="alert alert-warning" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Subject is not added at this time try again!</strong>
            </div>
            <?php }
            ?>
            
     <script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox1').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox1').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox1').on('click',function(){
        if($('.checkbox1:checked').length == $('.checkbox1').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>       
            <a href="listElective.php" class="btn btn-primary pull-right">Assigned Elective Subject Details</a>
         <br/><br/>
         
           <div class="panel panel-primary">
               <div class="panel-heading">Assign Elective </div>
               <div class="panel-body">
                   <div class="button-container">
                   
                   
                        <form class="form-horizontal" role="form" method="post" action="saveElective.php" enctype="multipart/form-data">
                          
                     
                            <div class="panel panel-primary">
               <div class="panel-heading">
                   <div class="col-sm-2">
                   <?= $sems ?>th Sem 
               </div>
               <div class="col-sm-2">
                <input type="checkbox" id="select_all" /> Select all
                 </div>
                 <div class="clearfix"></div>
               </div>
               
               <div class="panel-body"style="max-height: 10;overflow-y: scroll;">
                    <?php 
                      $tm = "SELECT usn,Name,sec FROM students WHERE sem=$sems ORDER BY sec asc, Name asc";
                        $sm = $con->query($tm);
                        while($row7 = $sm->fetch_assoc()){
                            
                            if($row7['sec']=='a')
                            {
                            ?>
                            <div class="col-sm-2 cordinate">
                                <div style="color:#b33d30;text-shadow: 0px 0px 1px;">
                                <?php
                                
                             echo "<input class='checkbox1' type='checkbox' name='students[]' value='".$row7['usn']."' style='margin-right: 5px'>".$row7['Name'] ?></div>
                             </div>
                             <?php
                            }
                                else if($row7['sec']=='b')
                            {?>
                              <div class="col-sm-2 cordinate">
                                <div style="color:#09403b;text-shadow: 0px 0px 1px;">
                                <?php
                                
                             echo "<input class='checkbox1' type='checkbox' name='students[]' value='".$row7['usn']."' style='margin-right: 5px'>".$row7['Name']?></div>
                             </div>  
                           <?php  
                               }
                               
                               
                               else
                            {?>
                              <div class="col-sm-2 cordinate">
                                <div style="color:#361a8c;text-shadow: 0px 0px 1px;">
                                <?php
                                
                             echo "<input class='checkbox1' type='checkbox' name='students[]' value='".$row7['usn']."' style='margin-right: 5px'>".$row7['Name']?></div>
                             </div>  
                           <?php  
                               }
                            }        
                      ?>
                           
                 </div>
               </div>      
               
               
                        
               
               
                     <br>
                     <div class="col-md-10 col-sm-10 col-sx-12">
                        <input id="submit" name="submit" type="submit" value="Assign Subject" class="btn btn-success pull-right">
                     </div>
                  </form>
            

                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<?php include("footer.php");?>
