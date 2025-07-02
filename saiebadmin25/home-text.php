<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<?php include "action/home_text.php";?>
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
                                    <h3 class="card-title"> نص الصــفحة الرئيســية</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->



                                <form method="post" action="action/home_text_save.php" name="form" id="form"  enctype="multipart/form-data">


                                    <div class="card-body">

                                        <h3>من نحن </h3>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">الصــورة</label>
                                            <input type="file" class="form-control" id="customFile" accept="image/*"
                                                name="te_img1" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">الصــورة الحالية</label>
                                            <img src="..//images/<?php echo $rows[0]["te_img"]; ?>" width="75"
                                                height="75">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">العنوان</label>
                                            <input type="text" class="form-control" name="te_title1" value="<?php echo $rows[0]["te_title"]; ?>">
                                        </div>                                        <div class="form-group">
                                            <label for="exampleInputEmail1">النص</label>
                                            <textarea id="summernote1" name="te_text1" class="form-control"><?php echo $rows[0]["te_text"]; ?></textarea>
                                        </div>


                                        <hr>
                                        <h3>خدمات الاعمال</h3>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> الصــورة</label>
                                            <input type="file" class="form-control" id="customFile" accept="image/*"
                                                name="te_img2" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">الصــورة الحالية</label>
                                            <img src="..//images/<?php echo $rows[1]["te_img"]; ?>" width="75"
                                                height="75">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> العنوان</label>
                                            <input type="text" class="form-control" name="te_title2" value="<?php echo $rows[1]["te_title"]; ?>">
                                        </div>                                        <div class="form-group">
                                            <label for="exampleInputEmail1">النص</label>
                                            <textarea id="summernote2" name="te_text2" class="form-control"><?php echo $rows[1]["te_text"]; ?></textarea>
                                        </div>

                                        <hr>
                                        <h3>الخدمات العامة للأفراد والمنشآت</h3>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">الصــورة</label>
                                            <input type="file" class="form-control" id="customFile" accept="image/*"
                                                name="te_img3" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">الصــورة الحالية</label>
                                            <img src="..//images/<?php echo $rows[2]["te_img"]; ?>" width="75"
                                                height="75">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">العنوان</label>
                                            <input type="text" class="form-control" name="te_title3" value="<?php echo $rows[2]["te_title"]; ?>">
                                        </div>                                        <div class="form-group">
                                            <label for="exampleInputEmail1">النص</label>
                                            <textarea id="summernote3" name="te_text3" class="form-control"><?php echo $rows[2]["te_text"]; ?></textarea>
                                        </div>




                                        <hr>
                                        <h3>   التدريب </h3>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> الصــورة</label>
                                            <input type="file" class="form-control" id="customFile" accept="image/*"
                                                name="te_img4" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">الصــورة الحالية</label>
                                            <img src="..//images/<?php echo $rows[3]["te_img"]; ?>" width="75"
                                                height="75">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> العنوان</label>
                                            <input type="text" class="form-control" name="te_title4" value="<?php echo $rows[3]["te_title"]; ?>">
                                        </div>                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> النص</label>
                                            <textarea id="summernote4" name="te_text4" class="form-control"><?php echo $rows[3]["te_text"]; ?></textarea>
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
$(document).ready(function() {
    $('#summernote1').summernote({
        placeholder: 'اكتب النص هنا...',
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        lang: 'ar-AR'
    });

    $('#summernote2').summernote({
        placeholder: 'اكتب النص هنا...',
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        lang: 'ar-AR'
    });

    $('#summernote3').summernote({
        placeholder: 'اكتب النص هنا...',
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        lang: 'ar-AR'
    });

    $('#summernote4').summernote({
        placeholder: 'اكتب النص هنا...',
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        lang: 'ar-AR'
    });
});

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