<script type="text/javascript">

$(document).ready(function() {

     $('#saveBuktiBayar').click(function (e) {
        e.preventDefault();

        var form = $('#buktiBayarForm')[0];
        var formData = new FormData(form);

        var nim = formData.get('nim'); // ambil langsung dari form, lebih akurat

        if (!nim || nim.trim() === "") {
            alert('NIM kosong. Silakan isi atau periksa kembali.');
            return;
        }

        $.ajax({
            url: '<?php echo base_url('bk/tkbip_bayar'); ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.trim() === 'sukses') {
                    alert('Berhasil menambahkan data baru.');
                    window.open('<?php echo base_url("bk/tkbi_cetak/"); ?>' + nim, '_blank');
                    window.location.href = '<?php echo base_url("bk/tkbi2_cari2/"); ?>' + nim;
                } else {
                    alert('Gagal menambahkan data baru: ' + response);
                }
            },
            error: function (xhr, status, error) {
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