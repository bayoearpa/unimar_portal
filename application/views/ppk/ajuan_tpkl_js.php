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



    var dataTable = $('#example3').DataTable({
        // Konfigurasi DataTable
        "order": [[0, "desc"]]
    });

    // Event delegation untuk tombol Selesai
    $('#example3').on('click', '.btn-danger', function() {
        var idTpkl = $(this).data('id_tpkl');
        var nim = $(this).data('nim');
        var nama = $(this).data('nama');

        // Mengisi data ke dalam modal
        $('#id_tpkl').val(idTpkl);
        $('#namaMhs').text(nama);
        $('#nimMhs').text(nim);

        // Menampilkan modal konfirmasi
        $('#selesaiModal').modal('show');
    });
    
   


// Proses ketika tombol Iya pada modal diklik
$('#prosesSelesaiBtn').click(function() {
    // Lakukan AJAX atau submit formulir sesuai kebutuhan
    var idTpkl = $('#id_tpkl').val();
    // Ganti dengan URL controller dan fungsi yang sesuai untuk mengubah status
    $.ajax({
        url: '<?php echo base_url("ppk/endstatustpkl"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {id_tpkl: $('#id_tpkl').val()},
        success: function(response) {
             console.log('Response:', response);

		    if (response && response.trim() !== "") {
		        try {
		            // Try to parse the JSON response
		            var jsonResponse = JSON.parse(response);

		            // Check for success and refresh the table
		            if (jsonResponse.success) {
		                refreshTable();
		            } else {
		                console.error('Gagal memperbarui status:', jsonResponse.message);
		            }
		        } catch (e) {
		            console.error('Error parsing JSON response:', e);
		        }
		    } else {
		        console.error('Empty or malformed JSON response');
		    }

		    // Sembunyikan modal konfirmasi
		    $('#selesaiModal').modal('hide');
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            // Log the details of the XHR object
		    console.log('XHR status:', xhr.status);
		    console.log('XHR response text:', xhr.responseText);
		    console.log('XHR ready state:', xhr.readyState);
        }
    });
});

// Fungsi untuk merefresh tabel (ganti dengan URL yang sesuai)
function refreshTable() {
    $('#example3').DataTable().ajax.reload();
    table.ajax.reload(null, false);
}
  
});
</script>
