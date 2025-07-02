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
                  <h3 class="card-title"> اضــف انجاز</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->



                <form method="post" action="action/clientsoponions_save.php" name="form" id="form" enctype="multipart/form-data">




                  <div class="card-body">



                  <div class="form-group">
                      <label for="exampleInputEmail1">اســم العميل</label>
                      <input type="text" class="form-control" name="ar_title">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">المنصــب</label>
                      <input type="text" class="form-control" name="ar_position">
                    </div>




                    <div class="form-group">
                      <label class="form-label" for="customFile"> الصـــورة</label>
                      <input type="file" class="form-control" id="customFile" accept="image/*" name="ar_image" id="cat_img"  />

                    </div>


                    <div class="form-group">
                      <label class="form-label" for="customFile"> النص</label>
                      <textarea  name="ar_text" class="form-control"></textarea>

                    </div>



                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">حفــــظ</button>
                    <a class="btn btn-default  float-right" href="news.php">الغـــــــاء</a>
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
  $().ready(function () {
    // validate signup form on keyup and submit
    $("#form").validate({
      rules: {
        ar_title: {
          required: true
        },
        ar_position: {
          required: true
        },
        ar_image: {
          required: true
        },
        ar_text: {
          required: true
        }


      },
      messages: {

        ar_title: {
           required: "هذا الحقل اجباري"
        },
        ar_position: {
           required: "هذا الحقل اجباري"
        },
        ar_image: {
           required: "هذا الحقل اجباري"
        },
        ar_text: {
           required: "هذا الحقل اجباري"
        }
      },
    });
  });
</script>

