<script type="text/javascript">
    $(document).ready(function() {

    // File signon
$(document).on('click', '.view-filesignon-button', function(e) {
    e.preventDefault();
    var filename = $(this).data('filename');
    var fileUrl = '/v1/assets/monitoring/onboard/' + filename;
    window.open(fileUrl, '_blank');
});

 // file lapon 1-12
// $(document).on('click', '.view-filelapon1-button', function(e) {
//     e.preventDefault();
//     var filename = $(this).data('filename');
//     var fileUrl = '/v1/assets/monitoring/laponboard/1/' + filename + '.pdf';
//     window.open(fileUrl, '_blank');
// });
for (let i = 1; i <= 12; i++) {
    $(document).on('click', '.view-filelapon' + i + '-button', function(e) {
        e.preventDefault();
        var filename = $(this).data('filename');
        var fileUrl = '/v1/assets/monitoring/laponboard/' + i + '/' + filename + '.pdf';
        window.open(fileUrl, '_blank');
    });
}



    $('#previewForm').on('submit', function(e){
    e.preventDefault(); // Prevent the form from submitting via the browser

    $.ajax({
      type: "POST",
      url: "<?php echo base_url('ppk/mon_pencarianp'); ?>", // Change the URL to your controller method
      data: $(this).serialize(),
      success: function(response) {
        $('#results').html(response); // Load the response into the div with id 'results'
      }
    });
  });

    $('#formLaporanOnboard').on('submit', function(e) {
    e.preventDefault(); // Mencegah reload halaman

    $.ajax({
      url: '<?= base_url('ppk/mon_laporanupdate') ?>',
      type: 'POST',
      data: $(this).serialize(),
      success: function(response) {
        $('#notifikasi').html('<div class="alert alert-success">Data berhasil diperbarui.</div>');
      },
      error: function(xhr, status, error) {
        $('#notifikasi').html('<div class="alert alert-danger">Terjadi kesalahan: ' + error + '</div>');
      }
    });
  });

  });
</script>