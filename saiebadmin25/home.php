<?php include "header.php";?>
<?php include "sidebar.php";?>
<?php include "action/about_by_id.php";?>
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
                                <strong>تم بنجاح </strong> تم التعديل بنجاح
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
                                    <h3 class="card-title"><a href="categories-add.php">Home</a></h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->



                                <form method="post" action="action/about.php" name="form" id="form"
                                    enctype="multipart/form-data">


                                    <div class="card-body">


                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> صورة من نحن  </label>
                                            <input type="file" class="form-control" id="customFile" accept="image/*"
                                                name="ab_about_img" id="ab_about_img" />

                                        </div>
                                        <div class="form-group">
                      <label class="form-label" for="customFile"> الصورة الحالية</label>
                      <img src="..//images/<?php echo $rows["ab_about_img"]; ?>" width="75" height="75">
                    </div>
                    

                                        <div class="form-group">
                                            <label class="form-label" for="customFile">  من نحن </label>
                                            <textarea id="summernote"
                                                name="ab_about"><?php echo $rows['ab_about'] ?></textarea>

                                        </div>



                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> رؤيتنا </label>
                                            <textarea id="summernote2"
                                                name="ab_vision"><?php echo $rows['ab_vision'] ?></textarea>

                                        </div>


                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> رسالة </label>
                                            <textarea id="summernote3"
                                                name="ab_message"><?php echo $rows['ab_message'] ?></textarea>

                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> القيم </label>
                                            <textarea id="summernote4"
                                                name="ab_values"><?php echo $rows['ab_values'] ?></textarea>

                                        </div>




                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
            cat_name_ar: {
                required: true
            },
            cat_name_en: {
                required: true
            },

            cat_img: {
                required: true
            },
            cat_status: {
                required: true
            },


        },
        messages: {
            cat_name_ar: {
                required: "هذا الحقل اجباري"
            },
            cat_name_en: {
                required: "هذا الحقل اجباري"
            },
            cat_img: {
                required: "هذا الحقل اجباري"
            },
            cat_status: {
                required: "هذا الحقل اجباري"
            },
        },
    });
});
</script>