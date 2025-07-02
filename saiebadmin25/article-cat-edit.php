<?php include "header.php";?>
<?php include "sidebar.php";?>
<?php include "action/article_cat_by_id.php";?>

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
                                    <h3 class="card-title">Edit Individual service category </h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->



                                <form method="post" action="action/article_cat_update.php" name="form" id="form"
                                    enctype="multipart/form-data">


                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">العنــوان</label>
                                            <input type="text" class="form-control" name="ar_cat_name"
                                                value="<?php echo $rows['ar_cat_name'] ?>">
                                        </div>





                                        <div class="form-group">
                                            <label>الحــــالة</label>
                                            <select name="ar_cat_status"
                                                class="form-control select2 select2-hidden-accessible"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true">
                                                <option value="">-اختر-</option>
                                                <option value="1" <?php if ($rows["ar_cat_status"] == 1) {?> selected
                                                    <?php }?>>Active</option>
                                                <option value="2" <?php if ($rows["ar_cat_status"] == 2) {?> selected
                                                    <?php }?>>Inactive</option>

                                            </select>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <input type="hidden" name="ar_cat_id"
                                            value="<?php echo $rows["ar_cat_id"]; ?>">
                                        <button type="submit" class="btn btn-primary">حفــــظ</button>
                                        <a class="btn btn-default  float-right" href="article-cat.php">الغـــــــاء</a>
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
            ar_cat_name: {
                required: true
            }
,

            ar_cat_status: {
                required: true
            },


        },
        messages: {
            ar_cat_name: {
                required: "هذا الحقل اجباري"
            }
,
            ar_cat_status: {
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