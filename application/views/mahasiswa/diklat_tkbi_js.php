<script type="text/javascript">

$(document).ready(function() {
    $('#saveBuktiBayar').click(function(e) {
        e.preventDefault(); // Hindari reload

        var formData = new FormData($('#buktiBayarForm')[0]);

        $.ajax({
            url: '<?php echo base_url('mahasiswa/tkbip_bayar'); ?>',
            type: 'POST',
            data: formData,
            contentType: false, // penting!
            processData: false, // penting!
            success: function(response) {
			    if (response.trim() === 'sukses') {
			        alert('Berhasil menambahkan data baru.');
			        window.location.href = '<?php echo base_url("mahasiswa/tkbi/"); ?>' + $('#nim').val();
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
            var fileUrl = '/assets/upload/tkbi/bukti_bayar/' + filename;
            
            // Buka tautan ke file di jendela baru
            window.open(fileUrl, '_blank');
        });
});

</script>