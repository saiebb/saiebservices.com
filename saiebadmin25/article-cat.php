<?php include "header.php";?>
<?php include "sidebar.php";?>
<?php include "action/article_cat_list.php";?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Individual service categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6  text-right ">
          <a href="article-cat-add.php"  class="btn btn-primary">Add</a>
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
<strong>تم بنجاح</strong>  تم التعديل بنجاح
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
                    <th>Title</th>
                    
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
while ($rows = $reult->fetch_assoc()) {
    ?>
                  <tr  >

                    <td><?php echo $rows["ar_cat_name"]; ?></td>
                  
                    <td>
                    <?php if ($rows["ar_cat_status"] == 2) {
        ?>
                      <label  class="btn btn-warning">Inactive</label>
                      <?php
}?>


<?php if ($rows["ar_cat_status"] == 1) {
        ?>
                      <label  class="btn btn-success">Active</label>
                      <?php
}?>


                  </td>
                    <td>



                    <a href="article-cat-edit.php?item=<?php echo $rows['ar_cat_id']; ?>" class="btn btn-warning"><i class="fa fa-file" aria-hidden="true"></i></a>
                    <button type="button" class="btn btn-danger" onclick="deletItem(<?php echo $rows['ar_cat_id']; ?>)"><i class="fa fa-trash" aria-hidden="true"></i></button>

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
   window.location.href="action/article_cat_delete.php?item="+itemId
  }
}
</script>

