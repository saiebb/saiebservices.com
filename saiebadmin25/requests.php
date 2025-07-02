<?php include "header.php";?>
<?php include "sidebar.php";?>
<?php include "action/requestsbytype.php";?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 text-right">
                    <h1 class="m-0">طلبـــات

                        <?php
        if( $_GET['type'] == 1 ){
         echo "التدريب" ;
        }
        if( $_GET['type'] == 2  ){
            echo "خدمات الاعمــال" ;
           }

           if( $_GET['type'] == 3  ){
            echo "خدمات الافــراد والمنشـــآت" ;
           }

           if( $_GET['type'] ==  6 ){
            echo "خدمات  الاستشــارات المالية " ;
           }
?>

                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6  text-right ">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">

                    <div class="card">
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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            <?php
        if( $_GET['type'] == 1 ){
         echo "التدريب" ;
        }
        if( $_GET['type'] != 1  ){
            echo "الخدمة " ;
           }
?>
                                        </th>
                                        <th>اســـم العميل</th>
                                        <th>رقــم هاتف </th>
                                        <th>بريد الكتروني</th>
                                        <th> الوقت المناســب للاتصــال</th>
                                        <th>وقت تسـجيل الطلب</th>
                                        <th>الحــالة</th>
                                        <th>الاجـــراءات</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
while ($rows = $latestReqTrainingResult->fetch_assoc()) {
    ?>
                                    <tr>

                                        <td>
                                            <?php echo $rows['ar_title']; ?>
                                        </td>
                                        <td> <?php echo $rows['req_cli_name']; ?></td>
                                        <td> <?php echo $rows['req_cli_phone']; ?></td>
                                        <td> <?php echo $rows['req_cli_email']; ?></td>
                                        <td> <?php echo $rows['req_cli_time_to_call']; ?></td>
                                        <td><?php echo $rows['req_time']; ?></td>
                                        <td>


                                            <?php if ($rows["req_status"] == 1) {
        ?>
                                            <label class="btn btn-warning">جديد</label>
                                            <?php
              }?>

                                            <?php if ($rows["req_status"] == 2) {
        ?>
                                            <label class="btn btn-success">تم التواصل</label>
                                            <?php
              }?>



                                        </td>
                                        <td>
                                            <a href="requests-edit.php?item=<?php echo $rows['req_id']; ?>"
                                                class="btn btn-warning"><i class="fa fa-file"
                                                    aria-hidden="true"></i></a>
                                        </td>


                                    </tr>
                                    <?php
}
?>

                                    </tfoot>
                            </table>
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
function deletItem(itemId) {
    let text;
    if (confirm("هل انت متأكد من انك تريد حذف هذا العنصـــر") == true) {
        window.location.href = "action/news_delete.php?item=" + itemId
    }
}
</script>