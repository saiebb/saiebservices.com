<?php include "header.php";?>
<?php include "sidebar.php";?>
<?php include "action/request_by_id.php";?>

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
                                    <h3 class="card-title"> مشــاهدة الطـــلب </h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->



                                <form method="post" action="action/req_update.php" name="form" id="form"
                                    enctype="multipart/form-data">


                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">العنــوان</label>
                                            <?php echo $rows['ar_title']; ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">اســــم العميل</label>
                                            <?php echo $rows['req_cli_name']; ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> البريد الالكتروني</label>
                                            <?php echo $rows['req_cli_email']; ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> رقــم الجوال </label>
                                            <?php echo $rows['req_cli_phone']; ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> الوقت المناسب للاتصال </label>
                                            <?php echo $rows['req_cli_time_to_call']; ?>
                                        </div>





                                        <div class="form-group">
                                            <label>الحــــالة</label>
                                            <select name="req_status"
                                                class="form-control select2 select2-hidden-accessible"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true">
                                                <option value="">-اختر-</option>
                                                <option value="1" <?php if ($rows["ar_status"] == 1) {?> selected
                                                    <?php }?>>جديد</option>
                                                <option value="2" <?php if ($rows["ar_status"] == 2) {?> selected
                                                    <?php }?>>تم التواصــل</option>

                                                    <option value="3" <?php if ($rows["ar_status"] == 3) {?> selected
                                                        <?php }?>>مســـح </option>

                                            </select>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <input type="hidden" name="req_id" value="<?php echo $rows["req_id"]; ?>">
                                        <input type="hidden" name="req_type" value="<?php echo $rows["req_ser_type"]; ?>">
                                        <button type="submit" class="btn btn-primary">حفــــظ</button>
                                        <a class="btn btn-default  float-right" href="requests.php?type=<?php echo $rows["req_ser_type"]; ?>">الغـــــــاء</a>
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


            req_status: {
                required: true
            },


        },
        messages: {

            req_status: {
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