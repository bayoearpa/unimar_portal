<script type="text/javascript">
   $(document).ready(function() {
    $('.view-filek-button').click(function(e) {
        e.preventDefault();
        var filename = $(this).data('filename');
        var fileUrl = '/v1/assets/upload/tpkl/konduite/' + filename;
        window.open(fileUrl, '_blank');
    });

    $('.view-filesk-button').click(function(e) {
        e.preventDefault();
        var filename = $(this).data('filename');
        var fileUrl = '/v1/assets/upload/tpkl/sk/' + filename;
        window.open(fileUrl, '_blank');
    });

   $('.end-status-btn').click(function() {
    var idTpkl = $(this).data('id_tpkl');
    var nim = $(this).data('nim');
    var nama = $(this).data('nama');

    // Mengisi data ke dalam modal
    $('#id_tpkl').val(idTpkl);
    $('#namaMhs').text(nama);
    $('#nimMhs').text(nim);

    // Menampilkan modal konfirmasi
    $('#endStatusModal').modal('show');
});

// Proses ketika tombol Iya pada modal diklik
$('#prosesSelesaiBtn').click(function() {
    // Lakukan AJAX atau submit formulir sesuai kebutuhan
    var idTpkl = $('#id_tpkl').val();
    // Ganti dengan URL controller dan fungsi yang sesuai untuk mengubah status
    $.ajax({
        url: '<?php echo base_url("kliring/endstatustpkl"); ?>/' + idTpkl,
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            console.log('Response:', response);
            // Sembunyikan modal konfirmasi
            $('#endStatusModal').modal('hide');
            
            // Refresh tabel
            refreshTable();
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
});

// Fungsi untuk merefresh tabel (ganti dengan URL yang sesuai)
function refreshTable() {
    $('#example1').DataTable().ajax.reload();
}
  
});
</script>
