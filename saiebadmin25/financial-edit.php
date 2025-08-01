<?php include "header.php";?>
<?php include "sidebar.php";?>
<?php include "action/financial_by_id.php";?>

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
                                    <h3 class="card-title"> تعديل خدمة استشـــارة مالية</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->



                                <form method="post" action="action/financial_update.php" name="form" id="form"
                                    enctype="multipart/form-data">


                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">العنــوان</label>
                                            <input type="text" class="form-control" name="ar_title"
                                                value="<?php echo $rows['ar_title'] ?>">
                                        </div>

                                
                                      



                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> الصـــورة</label>
                                            <input type="file" class="form-control" id="customFile" accept="image/*"
                                                name="ar_image" id="cat_img" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">الصــورة الحالية</label>
                                            <img src="..//images/<?php echo $rows["ar_image"]; ?>" width="75"
                                                height="75">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> النص</label>
                                            <textarea id="summernote"
                                                name="ar_text"> <?php echo $rows['ar_text'] ?> </textarea>

                                        </div>





                                        <div class="form-group">
                                            <label>الحــــالة</label>
                                            <select name="ar_status"
                                                class="form-control select2 select2-hidden-accessible"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true">
                                                <option value="">-اختر-</option>
                                                <option value="1" <?php if ($rows["ar_status"] == 1) {?> selected
                                                    <?php }?>>نشـــط</option>
                                                <option value="2" <?php if ($rows["ar_status"] == 2) {?> selected
                                                    <?php }?>>عير نشـــط</option>

                                            </select>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <input type="hidden" name="ar_id" value="<?php echo $rows["ar_id"]; ?>">
                                        <button type="submit" class="btn btn-primary">حفــــظ</button>
                                        <a class="btn btn-default  float-right" href="financial.php">الغـــــــاء</a>
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
            ar_title: {
                required: true
            },
          
           

            ar_text: {
                required: true
            },
            ar_status: {
                required: true
            },

        },
        messages: {
            ar_title: {
                required: "هذا الحقل اجباري"
            },
          
          

            ar_text: {
                required: "هذا الحقل اجباري"
            },
            ar_status: {
                required: "هذا الحقل اجباري"
            },
        },
    });
});

document.getElementById('ar_price').addEventListener('keypress', function(event) {
    if (!/\d/.test(event.key)) {
        event.preventDefault();
    }
});
</script>