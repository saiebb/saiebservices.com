
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2025 .</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "language": {
        "sProcessing":     "جاري التحميل...",
        "sLengthMenu":     "أظهر _MENU_ مدخلات",
        "sZeroRecords":    "لم يتم العثور على نتائج",
        "sEmptyTable":     "لا توجد بيانات متاحة في الجدول",
        "sInfo":           "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
        "sInfoEmpty":      "يعرض 0 إلى 0 من أصل 0 مدخل",
        "sInfoFiltered":   "(مفلترة من أصل _MAX_ مدخل)",
        "sInfoPostFix":    "",
        "sSearch":         "ابحث:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "جاري التحميل...",
        "oPaginate": {
          "sFirst":    "الأول",
          "sLast":     "الأخير",
          "sNext":     "التالي",
          "sPrevious": "السابق"
        },
        "oAria": {
          "sSortAscending":  ": تفعيل لترتيب العمود تصاعدياً",
          "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
        }
      }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>


<script src="dist/js/jquery.validate.js"></script>




<!-- editor -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote(
      {
     
        tabsize: 2,
        height: 400,
        toolbar: [
      ['misc', [ 'codeview', 'undo', 'redo', 'codeBlock']],
      [
        'font',
        [
          'bold',
          'italic',
          'underline',
          'strikethrough',
          'superscript',
          'subscript',
          'clear',
        ],
      ],
      ['fontsize', ['fontname', 'fontsize', 'color']],
      ['para', ['style0', 'ul', 'ol', 'paragraph', 'height']],
      ['insert', ['hr']],
    ],
      }
    )



    
      // summernote2
      $('#summernote2').summernote(
      {
     
        tabsize: 2,
        height: 100,
        toolbar: [
      ['misc', [ 'codeview', 'undo', 'redo', 'codeBlock']],
      [
        'font',
        [
          'bold',
          'italic',
          'underline',
          'strikethrough',
          'superscript',
          'subscript',
          'clear',
        ],
      ],
      ['fontsize', ['fontname', 'fontsize', 'color']],
      ['para', ['style0', 'ul', 'ol', 'paragraph', 'height']],
      ['insert', ['hr']],
    ],
      }
    )


      // Summernote 3
      $('#summernote3').summernote(
      {
     
        tabsize: 2,
        height: 100,
        toolbar: [
      ['misc', [ 'codeview', 'undo', 'redo', 'codeBlock']],
      [
        'font',
        [
          'bold',
          'italic',
          'underline',
          'strikethrough',
          'superscript',
          'subscript',
          'clear',
        ],
      ],
      ['fontsize', ['fontname', 'fontsize', 'color']],
      ['para', ['style0', 'ul', 'ol', 'paragraph', 'height']],
      ['insert', ['hr']],
    ],
      }
    )


      // Summernote 4
      $('#summernote4').summernote(
      {
     
        tabsize: 2,
        height: 200,
        toolbar: [
      ['misc', [ 'codeview', 'undo', 'redo', 'codeBlock']],
      [
        'font',
        [
          'bold',
          'italic',
          'underline',
          'strikethrough',
          'superscript',
          'subscript',
          'clear',
        ],
      ],
      ['fontsize', ['fontname', 'fontsize', 'color']],
      ['para', ['style0', 'ul', 'ol', 'paragraph', 'height']],
      ['insert', ['hr']],
    ],
      }
    )


  })
</script>
</body>
</html>
