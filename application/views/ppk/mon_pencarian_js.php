<script type="text/javascript">
    $(document).ready(function() {

    // File signon
$(document).on('click', '.view-filesignon-button', function(e) {
    e.preventDefault();
    var filename = $(this).data('filename');
    var fileUrl = '/v1/assets/upload/onboard/' + filename;
    window.open(fileUrl, '_blank');
});

// File laporan onboard 1–12
$(document).on('click', '[class^="view-filelapon"]', function(e) {
    e.preventDefault();

    var filename = $(this).data('filename');

    // Tangkap angka laporan dari class
    var classes = $(this).attr('class').split(' ');
    var nomorLaporan = null;

    classes.forEach(function(cls) {
        var match = cls.match(/^view-filelapon(\d+)-button$/);
        if (match) {
            nomorLaporan = match[1];
        }
    });

    if (nomorLaporan && filename) {
        var fileUrl = '/v1/assets/upload/laponboard/' + nomorLaporan + '/' + filename;
        window.open(fileUrl, '_blank');
    } else {
        alert('File tidak tersedia atau nama file tidak valid.');
    }
});


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