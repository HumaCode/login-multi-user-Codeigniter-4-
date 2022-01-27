<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE2/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE2/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE2/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE2/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE2/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="../../index2.html"><b>Register</b>Ci4</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Daftar menjadi member baru</p>

            <?php if (session()->getFlashdata('pesan')) { ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil.!</h4>
                    <?= session()->getFlashdata('pesan') ?>
                </div>
            <?php } ?>

            <?= form_open('auth/simpanRegister') ?>
            <div class="form-group has-feedback <?= ($validation->showError('nama_user')) ? 'has-error' : '' ?> ">
                <input type="text" class="form-control" name="nama_user" placeholder="Nama User" value="<?= old('nama_user') ?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <span class="help-block"><?= $validation->hasError('nama_user') ? $validation->getError('nama_user') : '' ?></span>
            </div>
            <div class="form-group has-feedback <?= ($validation->showError('email')) ? 'has-error' : '' ?> ">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?= old('email') ?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <span class="help-block"><?= $validation->hasError('email') ? $validation->getError('email') : '' ?></span>
            </div>
            <div class="form-group has-feedback <?= ($validation->showError('no_hp')) ? 'has-error' : '' ?>">
                <input type="number" min="1" class="form-control" name="no_hp" placeholder="No. Handphone" value="<?= old('no_hp') ?>">
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                <span class="help-block"><?= $validation->hasError('no_hp') ? $validation->getError('no_hp') : '' ?></span>
            </div>
            <div class="form-group has-feedback <?= ($validation->showError('password')) ? 'has-error' : '' ?>">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span class="help-block"><?= $validation->hasError('password') ? $validation->getError('password') : '' ?></span>
            </div>
            <div class="form-group has-feedback <?= ($validation->showError('password2')) ? 'has-error' : '' ?>">
                <input type="password" class="form-control" name="password2" placeholder="Ulangi Password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                <span class="help-block"><?= $validation->hasError('password2') ? $validation->getError('password2') : '' ?></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
            <?= form_close() ?>

            <a href="<?= base_url('auth/login') ?>" class="text-center">Sudah punya akun? Login Sekarang.</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery 3 -->
    <script src="<?= base_url() ?>/AdminLTE2/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url() ?>/AdminLTE2/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url() ?>/AdminLTE2/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            window.setTimeout(function() {
                $('.alert').fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 3000);

            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
        });
    </script>
</body>

</html>