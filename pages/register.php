<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      Administrator Registration
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Register to access the Admin Page.</p>
      <form action="register_process.php" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="nama_user" placeholder="Nama User">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group">
    <select class="form-control" name="id_level">
        <option value="">-Pilih Level-</option>
        <option value="5">Administrator</option>
        <option value="4">Waiter</option>
        <option value="3">Kasir</option>
        <option value="2">Owner</option>
        <option value="1">Pelanggan</option>
    </select>
</div>

        <!-- You can add more registration fields here -->
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
          </div><br>
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
  <!-- jQuery 2.2.3 -->
  <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>