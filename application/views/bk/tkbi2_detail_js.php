<script type="text/javascript">

$(document).ready(function() {
   $(document).ready(function () {
    $('#saveBuktiBayar').click(function (e) {
        e.preventDefault(); // Cegah reload form

        // Pastikan elemen input NIM ada
        var $nimInput = $('#nim');
        if ($nimInput.length === 0) {
            alert('Input NIM tidak ditemukan di dalam form.');
            return;
        }

        var nim = $nimInput.val(); // Ambil nilai NIM
        if (!nim) {
            alert('NIM kosong. Silakan isi atau periksa kembali.');
            return;
        }

        // Ambil FormData
        var form = $('#buktiBayarForm')[0];
        if (!form) {
            alert('Form tidak ditemukan.');
            return;
        }

        var formData = new FormData(form);

        // AJAX kirim data
        $.ajax({
            url: '<?php echo base_url('bk/tkbip_bayar'); ?>',
            type: 'POST',
            data: formData,
            contentType: false, // penting untuk file upload
            processData: false,
            success: function (response) {
                var trimmed = response.trim();
                if (trimmed === 'sukses') {
                    alert('Berhasil menambahkan data baru.');

                    // Buka halaman baru untuk cetak
                    window.open('<?php echo base_url("bk/tkbi2_cari2_cetak/"); ?>' + nim, '_blank');

                    // Redirect ke halaman detail
                    window.location.href = '<?php echo base_url("bk/tkbi2_cari2/"); ?>' + nim;
                } else {
                    alert('Gagal menambahkan data baru: ' + response);
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', error);
                alert('Terjadi kesalahan: ' + error);
            }
        });
    });
});


     $('.view-file-button').click(function(e) {
            e.preventDefault();
            var filename = $(this).data('filename');
            // Gantilah '/uploads/' dengan direktori tempat Anda menyimpan file
            var fileUrl = '/v1/assets/upload/tkbi/bukti_bayar/' + filename;
            
            // Buka tautan ke file di jendela baru
            window.open(fileUrl, '_blank');
        });
});

</script>