
<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/2/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>assets/2/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/2/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url() ?>assets/2/bower_components/raphael/raphael.min.js"></script>
<!-- <script src="<?php //echo base_url() ?>assets/2/bower_components/morris.js/morris.min.js"></script> -->
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/2/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>assets/2/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/2/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/2/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets/2/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/2/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/2/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/2/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/2/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/2/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/2/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/2/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/2/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/2/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url() ?>assets/2/bower_components/chart.js/Chart.js"></script>
<!-- FLOT CHARTS -->
<script src="<?php echo base_url() ?>assets/2/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url() ?>assets/2/bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url() ?>assets/2/bower_components/Flot/jquery.flot.resize.js"></script>
<script>
  var spinner = '<div class="spinner-holder"><div class="lds-dual-ring"></div><br><span style="color:#333; font-size:0.7em">Sedang Memproses...</span></div>';

        var spinner_only = '<div style="background:none; margin:auto;"><div class="lds-dual-ring"></div><br><span style="color:#333; font-size:0.7em"></span></div>';

        var spinner_big = '<div class="spinner-holder-big"><div class="lds-dual-ring-big"></div><br><span style="color:#333; font-size:0.7em">Sedang Memproses...</span></div>';
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<?php $nm_datatabel = (isset($nama_datatabel)) ? $nama_datatabel : '' ?>
<?php echo (isset($jquerynya_datatabel)) ? $jquerynya_datatabel->jquery($nm_datatabel) : '' ?>
</body>
</html>