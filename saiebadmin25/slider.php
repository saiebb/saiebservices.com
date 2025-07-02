<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "action/slider.php";?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!-- Main content -->
    <div class="content mt-4">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">

                    <div class="card">
                        <?php
                        if (isset($_GET['s'])) {
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
                        <!-- /.card-header -->
                        <div class="card-body">



                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">الصــور المتحركة</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->



                                <form method="post" action="action/slider-save.php" name="form" id="form"
                                    enctype="multipart/form-data">


                                    <div class="card-body">

                                        <h3>الصــورة الاولى</h3>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">صورة 1</label>
                                            <input type="file" class="form-control" id="customFile" accept="image/*"
                                                name="sl_img1" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">الصــورة الحالية</label>
                                            <img src="..//images/<?php echo $rows[0]["sl_img"]; ?>" width="75"
                                                height="75">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">عنوان 1</label>
                                            <input type="text" class="form-control" name="sl_title1"
                                                value="<?php echo $rows[0]["sl_title"]; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">النص 1</label>
                                            <textarea name="sl_text1"
                                                class="form-control"><?php echo $rows[0]["sl_text"]; ?></textarea>
                                        </div>


                                        <hr>
                                        <h3>الصــورة الثانية</h3>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">صورة 2</label>
                                            <input type="file" class="form-control" id="customFile" accept="image/*"
                                                name="sl_img2" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">الصــورة الحالية</label>
                                            <img src="..//images/<?php echo $rows[1]["sl_img"]; ?>" width="75"
                                                height="75">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">عنوان 2</label>
                                            <input type="text" class="form-control" name="sl_title2"
                                                value="<?php echo $rows[1]["sl_title"]; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">النص 2</label>
                                            <textarea name="sl_text2"
                                                class="form-control"><?php echo $rows[1]["sl_text"]; ?></textarea>
                                        </div>

                                        <hr>
                                        <h3>الصــورة الثالثة</h3>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">صورة 3</label>
                                            <input type="file" class="form-control" id="customFile" accept="image/*"
                                                name="sl_img3" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">الصــورة الحالية</label>
                                            <img src="..//images/<?php echo $rows[2]["sl_img"]; ?>" width="75"
                                                height="75">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">عنوان 3</label>
                                            <input type="text" class="form-control" name="sl_title3"
                                                value="<?php echo $rows[2]["sl_title"]; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">نص 3</label>
                                            <textarea name="sl_text3"
                                                class="form-control"><?php echo $rows[2]["sl_text"]; ?></textarea>
                                        </div>



                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">حفــــظ</button>

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
<?php include "footer.php"; ?>


<script>
$().ready(function() {
    // validate signup form on keyup and submit
    $("#form").validate({
        rules: {
            sldr_image1: {
                required: true
            },
            sldr_image2: {
                required: true
            },
        },
        messages: {
            sldr_image1: {
                required: "هذا الحقل اجباري"
            },
            sldr_image2: {
                required: "هذا الحقل اجباري"
            },
        },
    });
});
</script>

<style>
select:focus {
    outline: none;
    box-shadow: none;
}
</style>