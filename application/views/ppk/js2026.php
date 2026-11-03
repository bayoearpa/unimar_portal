<script>
$(document).ready(function () {
  var key = '<?php echo $key; ?>';

  // Detail data (menu form)
  $(document).on('click', '.btn-detail2026', function () {
    var nim = $(this).data('nim');
    $.get('<?php echo base_url('ppk2026/detail/'); ?>' + key + '/' + encodeURIComponent(nim), function (html) {
      $('#detailModal2026 .modal-body').html(html);
      $('#detailModal2026').modal('show');
    });
  });

  // Validasi laporan per bulan (menu lapgiat)
  $(document).on('click', '.btn-cek2026', function () {
    var nim = $(this).data('nim');
    $.post('<?php echo base_url('ppk2026/lapgiat_cek/'); ?>' + key, { nim: nim }, function (html) {
      $('#cekModal2026 .modal-body').html(html);
      $('#cekModal2026').modal('show');
    });
  });

  $(document).on('click', '#saveLapgiat2026', function () {
    $.ajax({
      url: '<?php echo base_url('ppk2026/lapgiat_update/'); ?>' + key,
      type: 'POST',
      data: $('#formLapgiat2026').serialize(),
      dataType: 'json',
      success: function (res) {
        if (res.status === 'success') {
          alert('Validasi berhasil disimpan.');
          location.reload();
        } else {
          alert(res.pesan || 'Gagal menyimpan.');
        }
      },
      error: function () {
        alert('Terjadi kesalahan saat menyimpan.');
      }
    });
  });
});
</script>
