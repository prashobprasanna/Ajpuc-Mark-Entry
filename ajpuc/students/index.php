<?php
session_start();
if(isset($_SESSION["usn"]))
{
header("location: dashboard.php"); 
}
else if(isset($_SESSION["email"]))
{
header("location: faculty/dashboard.php"); 
}?>
<!DOCTYPE html>
<html>
<head>
    <STYLE>
     .hell {
        position: absolute;
        bottom:0;
        width:100%;
       
     }
</STYLE>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <script>
      

    
  //$("#ty").on("change", function(){
    function execch()
    {
     
        var selected = $("#ty").val();
        var sect1=document.getElementById('sec1');
        var sect2=document.getElementById('sec2');
       
         if(selected=="1")
         {
            
          sect2.style.display='none';
          sect1.style.display='block';
         }
        if(selected=="2")
        {
         
          sect1.style.display='none';
          sect2.style.display='block';
        }
      }//)
  </script>
</head>

    
<body class="hold-transition login-page">
     
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Student</b> Details</a>
  </div>
     <?php extract($_REQUEST);
                            if(isset($login)){ ?>
                            <br/>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              Incorrect <b>Login</b> try again ! 
                            </div>
                        <?php } ?>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="form-group">
            <select id="ty" name="ty" class="form-control" onchange="execch()">
               
                <option value="1">Parent / Student</option>
                 <option value="2">Faculty</option>
            </select>
        </div>

      <div id="sec1">
      <form action="admin_validate.php" method="post">
        
       
        
      <div class="form-group has-feedback">
          <div id="changeusr">
          <input type="text" class="form-control"  name="usn"  placeholder="USN" required>
          </div>
          <div id="changeusrico">
        <span class="glyphicon glyphicon-tag form-control-feedback"></span>
          </div>
      </div>
        <div class="form-group has-feedback">
            <div id="changepwd">
        <input type="password" class="form-control" name="pwd" placeholder="Parent Phno" required>
            </div>
            <div id="changepwdico">
        <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
            </div>
      </div>
        
        <!-- /.col -->
        
        <div class="" id="butch">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Check</button>
        
        </div>
        <!-- /.col -->
      
    </form>
      </div>
      
      <div id="sec2" style="display:none">
          <form action="faculty/admin_validate.php" method="post">
        
        
        
      <div class="form-group has-feedback">
          
          <input type='text' class='form-control'  name='usrnm' placeholder='Username / Email' required>
          
          
        <span class='glyphicon glyphicon-envelope form-control-feedback'></span>
         
      </div>
        <div class="form-group has-feedback">
           
        <input type='password' class='form-control' name='pwd' placeholder='Password' required>
            
            
        <span class='glyphicon glyphicon-lock form-control-feedback'></span>
            
      </div>
        
        <!-- /.col -->
        
        <div class="" id="butch">
          <button type='submit' name='submit' class='btn btn-primary btn-block btn-flat'>Login</button>
        
        </div>
        <!-- /.col -->
     
    </form>
      </div>
    </div>
    <!-- /.social-auth-links -->  

  </div>
  <!-- /.login-box-body --><br/><br/>
    <div class="">
    <center><a href="../" style="font-size:20px !important;color:#0000cd;text-shadow:0px 0px 1px">HOME</a></center>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

</body>
<footer>
    
<div class="hell">
<a href="../" ><button class="btn btn-primary btn-block btn-flat">Home</button></a>
</div>
</footer>
</html>
