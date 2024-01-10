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

     // Set data pada modal ketika tombol Selesai diklik
	  $('.btn-danger').click(function() {
	    var id_tpkl = $(this).data('id_tpkl');
	    var nama = $(this).data('nama');
	    var nim = $(this).data('nim');
	    
	    $('#id_tpkl').val(id_tpkl);
	    $('#namaMhs').text(nama);
	    $('#nimMhs').text(nim);
	    
	    // Munculkan modal
	    $('#selesaiModal').modal('show');
	  });

	  // Proses ketika tombol Iya pada modal diklik
	  $('#prosesSelesaiBtn').click(function() {
	    // Lakukan submit form atau aksi sesuai kebutuhan
	    $('#selesaiForm').submit(); // Ganti dengan aksi yang sesuai
	  });
  
});
</script>
