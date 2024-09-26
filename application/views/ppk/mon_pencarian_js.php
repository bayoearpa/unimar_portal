<script type="text/javascript">
    $(document).ready(function() {
    
  // Panggil fungsi toggleGelombangForm saat halaman dimuat untuk menetapkan status awal
  document.addEventListener('DOMContentLoaded', toggleGelombangForm);

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

  });
</script>