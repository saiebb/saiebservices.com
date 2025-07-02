<?php include "header.php";?>
<?php include "sidebar.php";?>
<?php include "action/contact_by_id.php";?>
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
if (isset($_GET['s'])) {
    if ($_GET['s'] == 1) {
        ?>
                            <div class="alert alert-success alert-dismissible fade show " role="alert">
                                <strong>تم بنجاح </strong> تم الحفــــظ بنجاح
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <?php
}

    if ($_GET['s'] == 2) {
        ?>
                            <div class="alert alert-success alert-dismissible fade show " role="alert">
                                <strong>تم المســــح</strong> تم المســـح بنجاح
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <?php
}

    if ($_GET['s'] == 3) {
        ?>
                            <div class="alert alert-success alert-dismissible fade show " role="alert">
                                <strong>تم بنجاح</strong> تم التعديل بنجاح
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <?php
}

}
?>
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
                                    <h3 class="card-title"><a href="categories-add.php">اتصــل بنا</a></h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->



                                <form method="post" action="action/contact.php" name="form" id="form"
                                    enctype="multipart/form-data">


                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">العنوان</label>
                                            <input type="text" class="form-control" name="con_address"
                                                value="<?php echo $rows['con_address'] ?>">
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">البريد الالكتروني</label>
                                            <input type="text" class="form-control" name="con_email"
                                                value="<?php echo $rows['con_email'] ?>">
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">رقم الجــوال</label>
                                            <input type="text" class="form-control" name="con_tel"
                                                value="<?php echo $rows['con_tel'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Instagram</label>
                                            <input type="text" class="form-control" name="con_instagram"
                                                value="<?php echo $rows['con_instagram'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">X</label>
                                            <input type="text" class="form-control" name="con_x"
                                                value="<?php echo $rows['con_x'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Linkedin</label>
                                            <input type="text" class="form-control" name="con_linkedin"
                                                value="<?php echo $rows['con_linkedin'] ?>">
                                        </div>




                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">تعديل</button>
                                        <!-- <a class="btn btn-default  float-right" href="categories.php">الغـــــــاء</a> -->
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
            con_address: {
                required: true
            },
            con_email: {
                required: true,
                email: true
            },

            con_tel: {
                required: true
            },
            con_instagram: {
                required: true
            },
            con_x: {
                required: true
            },
            con_linkedin: {
                required: true
            },

        },
        messages: {
            con_address: {
                required: "هذا الحقل اجباري"
            },
            con_email: {
                required: "هذا الحقل اجباري",
                email: "الرجاء ادخال بريد الكتروني صحيح"
            },
            con_tel: {
                required: "هذا الحقل اجباري"
            },
            con_instagram: {
                required: "هذا الحقل اجباري"
            },
            con_x: {
                required: "هذا الحقل اجباري"
            },

            con_linkedin: {
                required: "هذا الحقل اجباري"
            },
        },
    });
});
</script>