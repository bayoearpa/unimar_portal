   <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020 IT-UNIMAR AMNI Semarang.</strong> All rights
    reserved.
  </footer>

 
  
</div>
<!-- ./wrapper -->

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
<script src="<?php echo base_url() ?>assets/2/bower_components/morris.js/morris.min.js"></script>
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
<!-- <script src="<?php //echo base_url() ?>assets/2/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php //echo base_url() ?>assets/2/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script>
  var spinner = '<div class="spinner-holder"><div class="lds-dual-ring"></div><br><span style="color:#333; font-size:0.7em">Sedang Memproses...</span></div>';

        var spinner_only = '<div style="background:none; margin:auto;"><div class="lds-dual-ring"></div><br><span style="color:#333; font-size:0.7em"></span></div>';

        var spinner_big = '<div class="spinner-holder-big"><div class="lds-dual-ring-big"></div><br><span style="color:#333; font-size:0.7em">Sedang Memproses...</span></div>';
  $(function () {
    $('#example1').DataTable({
       rowReorder: {
            selector: 'td:nth-child(6)'
        },
        responsive: true
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
<script>
$(document).ready(function() {
    $.getJSON("<?= base_url('bk/get_keuangan_notif') ?>", function(data) {
        $('#notifCount').text(data.length);
        $('#notifTextCount').text(data.length);

        let notifHtml = '';
        data.forEach(function(item) {
            notifHtml += `
                <li>
                    <a href="<?= base_url('bk/set_notif_read/') ?>${item.id}?redirect=${item.link}">
                        <i class="fa fa-info text-blue"></i> ${item.notifikasi}
                    </a>
                </li>`;
        });

        $('#notifList').html(notifHtml);
    });
});
</script>
<?php $nm_datatabel = (isset($nama_datatabel)) ? $nama_datatabel : '' ?>
<?php echo (isset($jquerynya_datatabel)) ? $jquerynya_datatabel->jquery($nm_datatabel) : '' ?>
</body>
</html>