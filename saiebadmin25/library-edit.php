<?php include "header.php";?>
<?php include "sidebar.php";?>
<?php include "action/library_by_id.php";?>
<?php include "action/library_cat_list.php";?>
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
                                    <h3 class="card-title"> تعديل الملــف </h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->





                                <form method="post" action="action/library_update.php" name="form" id="form"
                                    enctype="multipart/form-data">




                                    <div class="card-body">


                                        <div class="form-group">
                                            <label>القســم</label>
                                            <select name="lib_cat"
                                                class="form-control select2 select2-hidden-accessible"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true">
                                                <option value="">-اختر-</option>
                                                <?php
while ($rows = $reult->fetch_assoc()) {
    if($rows['lib_cat_id'] == $rowsLib['lib_cat']){
?>
                                                <option selected value="<?php echo $rows['lib_cat_id']; ?>">
                                                    <?php echo $rows["lib_cat_name"]; ?></option><?php
    }else{
        ?>
                                                <option value="<?php echo $rows['lib_cat_id']; ?>">
                                                    <?php echo $rows["lib_cat_name"]; ?></option><?php
    }
 
}?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">العنــوان</label>
                                            <input type="text" class="form-control" name="lib_title"
                                                value="<?php echo $rowsLib['lib_title'] ?>">
                                        </div>



                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> الصـــورة</label>
                                            <input type="file" class="form-control" id="customFile" name="lib_file"
                                                id="cat_img" />

                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> الملــف الحالي</label>
                                            <a href="..//library/<?php echo $rowsLib["lib_file"]; ?>"><i
                                                    class="fa fa-file library-file" aria-hidden="true"></i>
                                            </a>
                                        </div>


                                        <div class="form-group">
                                            <label>الحــــالة</label>
                                            <select name="lib_status"
                                                class="form-control select2 select2-hidden-accessible"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true">
                                                <option value="">-اختر-</option>
                                                <option value="1" <?php if ($rowsLib["lib_status"] == 1) {?> selected
                                                    <?php }?>>نشــط</option>
                                                <option value="2" <?php if ($rowsLib["lib_status"] == 2) {?> selected
                                                    <?php }?>>عير نشــط</option>
                                            </select>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <input type="hidden" name="lib_id" value="<?php echo $rowsLib["lib_id"]; ?>">
                                        <button type="submit" class="btn btn-primary">حفــــظ</button>
                                        <a class="btn btn-default  float-right" href="library.php">الغـــــــاء</a>
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

            cat_status: {
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