<?php include "header.php";?>
<?php include "sidebar.php";?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!-- Main content -->
    <div class="content mt-4">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">

                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">


                            <?php
if (isset($_GET['e'])) {
    if ($_GET['e'] == 1) {
        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>خطــــأ</strong> يبدو أن خطأ ما قد حدث، يرجى المحاولة مرة أخرى.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <?php
}
}
?>

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title"> اضف عميل</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->



                                <form method="post" action="action/client_save.php" name="form" id="form"
                                    enctype="multipart/form-data">


                                    <div class="card-body">






                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> الصـــورة</label>
                                            <input type="file" class="form-control" id="customFile" accept="image/*"
                                                name="cli_img" id="cat_img" />

                                        </div>







                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">حفــــظ</button>
                                        <a class="btn btn-default  float-right" href="clients.php">الغـــــــاء</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>


                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<?php include "footer.php";?>


<script>
$().ready(function() {
    // validate signup form on keyup and submit
    $("#form").validate({
        rules: {


            cli_img: {
                required: true
            }


        },
        messages: {

            cli_img: {
                required: "هذا الحقل اجباري"
            }
        },
    });
});
</script>