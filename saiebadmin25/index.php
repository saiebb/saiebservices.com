<?php include "header.php";?>
<?php include "sidebar.php";?>
<?php include "action/requests.php";?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">احدث طلـــبات العملاء </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header border-0  home-card-title">
                            <h3 class="card-title">التدريب</h3>
                            <div> <a href="requests.php?type=1" class="btn btn-default view-all">مشــاهدةكل الطلبات</a>
                            </div>


                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>التدريب</th>
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
                                while ($latestReqTrainingRows = $latestReqTrainingResult->fetch_assoc()) {
                                    ?>
                                    <tr>

                                        <td>
                                            <?php echo $latestReqTrainingRows['ar_title']; ?>
                                        </td>
                                        <td> <?php echo $latestReqTrainingRows['req_cli_name']; ?></td>
                                        <td> <?php echo $latestReqTrainingRows['req_cli_phone']; ?></td>
                                        <td> <?php echo $latestReqTrainingRows['req_cli_email']; ?></td>
                                        <td> <?php echo $latestReqTrainingRows['req_cli_time_to_call']; ?></td>
                                        <td><?php echo $latestReqTrainingRows['req_time']; ?></td>
                                        <td>


                                            <?php if ($latestReqTrainingRows["req_status"] == 1) {
                                                ?>
                                            <label class="btn btn-warning">جديد</label>
                                            <?php
                                                      }?>




                                        </td>
                                        <td>
                                            <a href="requests-edit.php?item=<?php echo $latestReqTrainingRows['req_id']; ?>"
                                                class="btn btn-warning"><i class="fa fa-file"
                                                    aria-hidden="true"></i></a>
                                        </td>


                                    </tr>
                                    <?php
                              }?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.card -->


                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header border-0  home-card-title">
                            <h3 class="card-title">خدمة الاعمــال</h3>
                            <div> <a href="requests.php?type=2" class="btn btn-default view-all">مشــاهدةكل الطلبات</a>
                            </div>


                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>الخدمة</th>
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
                                while ($latestReqBusinessRows = $latestReqBusinessResult->fetch_assoc()) {
                                    ?>
                                    <tr>

                                        <td>
                                            <?php echo $latestReqBusinessRows['ar_title']; ?>
                                        </td>
                                        <td> <?php echo $latestReqBusinessRows['req_cli_name']; ?></td>
                                        <td> <?php echo $latestReqBusinessRows['req_cli_phone']; ?></td>
                                        <td> <?php echo $latestReqBusinessRows['req_cli_email']; ?></td>
                                        <td> <?php echo $latestReqBusinessRows['req_cli_time_to_call']; ?></td>
                                        <td><?php echo $latestReqBusinessRows['req_time']; ?></td>
                                        <td>


                                            <?php if ($latestReqBusinessRows["req_status"] == 1) {
                                                ?>
                                            <label class="btn btn-warning">جديد</label>
                                            <?php
                                                      }?>




                                        </td>
                                        <td>
                                            <a href="requests-edit.php?item=<?php echo $latestReqBusinessRows['req_id']; ?>"
                                                class="btn btn-warning"><i class="fa fa-file"
                                                    aria-hidden="true"></i></a>
                                        </td>


                                    </tr>
                                    <?php
                              }?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.card -->


                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header border-0  home-card-title">
                            <h3 class="card-title">خدمة الافـراد والمنشــآت</h3>
                            <div> <a href="requests.php?type=3" class="btn btn-default view-all">مشــاهدةكل الطلبات</a>
                            </div>


                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>الخدمة</th>
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
                                while ($latestReqIndivRows = $latestReqIndivResult->fetch_assoc()) {
                                    ?>
                                    <tr>

                                        <td>
                                            <?php echo $latestReqIndivRows['ar_title']; ?>
                                        </td>
                                        <td> <?php echo $latestReqIndivRows['req_cli_name']; ?></td>
                                        <td> <?php echo $latestReqIndivRows['req_cli_phone']; ?></td>
                                        <td> <?php echo $latestReqIndivRows['req_cli_email']; ?></td>
                                        <td> <?php echo $latestReqIndivRows['req_cli_time_to_call']; ?></td>
                                        <td><?php echo $latestReqIndivRows['req_time']; ?></td>
                                        <td>


                                            <?php if ($latestReqIndivRows["req_status"] == 1) {
                                                ?>
                                            <label class="btn btn-warning">جديد</label>
                                            <?php
                                                      }?>




                                        </td>
                                        <td>
                                            <a href="requests-edit.php?item=<?php echo $latestReqIndivRows['req_id']; ?>"
                                                class="btn btn-warning"><i class="fa fa-file"
                                                    aria-hidden="true"></i></a>
                                        </td>


                                    </tr>
                                    <?php
                              }?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.card -->


                        <!-- /.card -->

                        <div class="card">
                        <div class="card-header border-0  home-card-title">
                            <h3 class="card-title">خدمة الاستشــارات المالية</h3>
                            <div> <a href="requests.php?type=4" class="btn btn-default view-all">مشــاهدةكل الطلبات</a>
                            </div>


                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>الخدمة</th>
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
                                while ($latestReqFinRows = $latestReqFinResult->fetch_assoc()) {
                                    ?>
                                    <tr>

                                        <td>
                                            <?php echo $latestReqFinRows['ar_title']; ?>
                                        </td>
                                        <td> <?php echo $latestReqFinRows['req_cli_name']; ?></td>
                                        <td> <?php echo $latestReqFinRows['req_cli_phone']; ?></td>
                                        <td> <?php echo $latestReqFinRows['req_cli_email']; ?></td>
                                        <td> <?php echo $latestReqFinRows['req_cli_time_to_call']; ?></td>
                                        <td><?php echo $latestReqFinRows['req_time']; ?></td>
                                        <td>


                                            <?php if ($latestReqFinRows["req_status"] == 1) {
                                                ?>
                                            <label class="btn btn-warning">جديد</label>
                                            <?php
                                                      }?>




                                        </td>
                                        <td>
                                            <a href="requests-edit.php?item=<?php echo $latestReqFinRows['req_id']; ?>"
                                                class="btn btn-warning"><i class="fa fa-file"
                                                    aria-hidden="true"></i></a>
                                        </td>


                                    </tr>
                                    <?php
                              }?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.card -->
                </div>

                <!-- /.col-md-6 -->
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