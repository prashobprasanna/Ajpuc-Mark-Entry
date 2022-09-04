<?php
session_start();
if(isset($_SESSION["email"]))
{
header("location: dashboard.php"); 
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
</head>
<script type="text/JavaScript">
         var message="NoRightClicking";
         function defeatIE() {if (document.all) {(message);return false;}}
         function defeatNS(e) {if 
         (document.layers||(document.getElementById&&!document.all)) {
         if (e.which==2||e.which==3) {(message);return false;}}}
         if (document.layers) 
         {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=defeatNS;}
         else{document.onmouseup=defeatNS;document.oncontextmenu=defeatIE;}
         document.oncontextmenu=new Function("return false")
    </script>
    
<body class="hold-transition login-page">
     
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Admin</b> Login</a>
  </div>
     <?php extract($_REQUEST);
                            if(isset($login)){ ?>
                            <br/>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              Incorrect <b>username</b> or <b>password</b> try again ! 
                            </div>
                        <?php } ?>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="admin_validate.php" method="post">
        <div class="form-group has-feedback">
            <select name="dbnam" class="form-control"> 
                <option value="civil">CV</option>
                <option value="csis">CS & IS</option>
                <option value="ec">EC</option>
                <option value="ee">EE</option>
                <option value="mech">ME</option>
                <option value="admin">PCM</option>
            </select>
        
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control"  name="email" placeholder="Username" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pwd" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

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
    
<div class="hell"
<a href="../" ><button class="btn btn-success btn-block btn-flat" style="font-size:20px !important;text-shadow:0px 0px 1px #000">Home</button></a>
</div>
</footer>
</html>
