<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>صـــيب لخدمات الاعمال</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h2> صـــيب لخدمات الاعمال</h2>
            </div>
            <div class="card-body">
                <?php
                // عرض رسائل الخطأ
                if (isset($_GET['error'])) {
                    $error = $_GET['error'];
                    $errorMessage = '';
                    
                    switch ($error) {
                        case 'missing_data':
                            $errorMessage = 'يرجى إدخال جميع البيانات المطلوبة';
                            break;
                        case 'empty_fields':
                            $errorMessage = 'يرجى ملء جميع الحقول';
                            break;
                        case 'invalid_credentials':
                            $errorMessage = 'اسم المستخدم أو كلمة المرور غير صحيحة';
                            break;
                        default:
                            $errorMessage = 'حدث خطأ في تسجيل الدخول';
                    }
                    
                    echo '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-ban"></i> ' . $errorMessage . '
                          </div>';
                }
                ?>

                <form action="action/login.php" method="post" id="form">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="adname" placeholder="اســم المســـتخدم" required autocomplete="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="adpass" placeholder="كلمة المرور" required autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">تســجيل دخول</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>



            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>

<script src="dist/js/jquery.validate.js"></script>

<script>
$().ready(function() {
    // validate signup form on keyup and submit
    $("#form").validate({
        rules: {
          adname: {
                required: true
            },
            adpass: {
                required: true
            }




        },
        messages: {
          adname: {
                required: "هذا الحقل اجباري"
            },
            adpass: {
                required: "هذا الحقل اجباري"
            }
        },
    });
});
</script>

<style>
.error {
  float: left;
  width: 100%;
  color: red;
  font-weight: normal !important;
}
</style>