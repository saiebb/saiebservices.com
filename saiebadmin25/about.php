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
                                    <h3 class="card-title">من نحن</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->



                                <form method="post" action="action/about.php" name="form" id="form"
                                    enctype="multipart/form-data">


                                    <div class="card-body">


                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> صورة نبذة عن صـــيب </label>
                                            <input type="file" class="form-control" id="customFile" accept="image/*"
                                                name="ab_about_img" id="ab_about_img" />

                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> الصورة الحالية</label>
                                            <img src="../images/<?php echo $rows["ab_about_img"]; ?>" width="75"
                                                height="75">
                                        </div>


                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> نبذة عن صـــيب</label>
                                            <textarea id="summernote"
                                                name="ab_about"><?php echo $rows['ab_about'] ?></textarea>

                                        </div>



                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> رؤيتنا </label>
                                            <textarea class="form-control"
                                                name="ab_vision"><?php echo $rows['ab_vision'] ?></textarea>

                                        </div>


                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> رسالة </label>
                                            <textarea class="form-control"
                                                name="ab_message"><?php echo $rows['ab_message'] ?></textarea>

                                        </div>
                                        <hr>
                                        <h3 style="margin-top: 100px !important;">القيم</h3>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> اﻻﻟﺘــــﺰام </label>
                                            <textarea class="form-control"
                                                name="ab_value_1"><?php echo $rows['ab_value_1'] ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> اﻻﺑﺘـــــﻜﺎر </label>
                                            <textarea class="form-control"
                                                name="ab_value_2"><?php echo $rows['ab_value_2'] ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> اﻟﻄﻤـــﻮح </label>
                                            <textarea class="form-control"
                                                name="ab_value_3"><?php echo $rows['ab_value_3'] ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> اﻟﺪﻗـــــﺔ </label>
                                            <textarea class="form-control"
                                                name="ab_value_4"><?php echo $rows['ab_value_4'] ?></textarea>
                                        </div>
                                        <hr>
                                        <h3 style="margin-top: 100px !important;">ﻟﻤﺎذا ﻧﺤﻦ</h3>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> ﺧﺒﺮة وﻛﻔﺎءة اﻟﻔﺮﻳﻖ </label>
                                            <textarea class="form-control"
                                                name="ab_why_1"><?php echo $rows['ab_why_1'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> اﻻﺳﺘﺮاﺗﻴﺠﻴﺔ اﻟﺸﺎﻣﻠﺔ </label>
                                            <textarea class="form-control"
                                                name="ab_why_2"><?php echo $rows['ab_why_2'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> اﻻﻟﺘـــــــﺰام </label>
                                            <textarea class="form-control"
                                                name="ab_why_3"><?php echo $rows['ab_why_3'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile"> اﻟﻘﻴﻤﺔ اﻟﺘﻨﺎﻓﺴﻴﺔ </label>
                                            <textarea class="form-control"
                                                name="ab_why_4"><?php echo $rows['ab_why_4'] ?></textarea>
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
         
            ab_about: {
                required: true
            },

            ab_vision: {
                required: true
            },
            ab_message: {
                required: true
            },
            ab_value_1: {
                required: true
            },
            ab_value_2: {
                required: true
            },
            ab_value_3: {
                required: true
            },
            ab_value_4: {
                required: true
            },
            ab_why_1: {
                required: true
            },
            ab_why_2: {
                required: true
            },
            ab_why_3: {
                required: true
            },
            ab_why_4: {
                required: true
            }


        },
        messages: {
          
            ab_about: {
                required: "هذا الحقل اجباري"
            },
            ab_vision: {
                required: "هذا الحقل اجباري"
            },
            ab_message: {
                required: "هذا الحقل اجباري"
            },
            ab_value_1: {
                required: "هذا الحقل اجباري"
            },
            ab_value_2: {
                required: "هذا الحقل اجباري"
            },
            ab_value_3: {
                required: "هذا الحقل اجباري"
            },
            ab_value_4: {
                required: "هذا الحقل اجباري"
            },
            ab_why_1: {
                required: "هذا الحقل اجباري"
            },
            ab_why_2: {
                required: "هذا الحقل اجباري"
            },
            ab_why_3: {
                required: "هذا الحقل اجباري"
            },
            ab_why_4: {
                required: "هذا الحقل اجباري"
            }

        },
    });
});
</script>