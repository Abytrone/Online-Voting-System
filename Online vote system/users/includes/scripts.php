<!-- ChartJS -->
<script src="../bower_components/chart.js/Chart.js"></script>
<!-- ChartJS Horizontal Bar -->
<script src="../bower_components/chart.js/Chart.HorizontalBar.js"></script>
<!-- ************************************************ -->
  <!-- Bootstrap core JavaScript-->
  <script src="../admin/vendor/jquery/jquery.min.js"></script>
  <script src="../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="../admin/js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="../admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- ************************************************ -->
<!-- Data Table Initialize -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
    })
    $('#searchBox').on('keyup', function(){
      bookTable.search(this.value).draw();
  });
  })
</script>