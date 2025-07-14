<script type="text/javascript">

$(document).ready(function() {
    $('#saveBuktiBayar').click(function(e) {
        e.preventDefault(); // Hindari reload

        var formData = new FormData($('#buktiBayarForm')[0]);
        var nim = $('#nim').val(); // simpan nilai nim sebelum AJAX

        $.ajax({
            url: '<?php echo base_url('bk/tkbip_bayar'); ?>',
            type: 'POST',
            data: formData,
            contentType: false, // penting!
            processData: false, // penting!
            success: function(response) {
			    if (response.trim() === 'sukses') {
			        alert('Berhasil menambahkan data baru.');
			     window.location.href = '<?php echo base_url("bk/tkbi2_cari2/"); ?>' + nim;
                window.open('<?php echo base_url("bk/tkbi2_cari2_cetak/"); ?>' + nim, '_blank');
			    } else {
			        alert('Gagal menambahkan data baru: ' + response);
			    }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                alert('Terjadi kesalahan: ' + error);
            }
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