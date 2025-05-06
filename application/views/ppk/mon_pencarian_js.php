<script type="text/javascript">
    $(document).ready(function() {

      // file signon
     $('.view-filesignon-button').click(function(e) {
        e.preventDefault();
        var filename = $(this).data('filename');
        var fileUrl = '/v1/assets/upload/onboard/' + filename;
        window.open(fileUrl, '_blank');
    });

     // Laporan Onboard
      $('.view-filelapon1-button').click(function(e) {
        e.preventDefault();
        var filename = $(this).data('filename');
        var fileUrl = '/v1/assets/upload/laponboard/1/' + filename;
        window.open(fileUrl, '_blank');
    });

        $('.view-filelapon2-button').click(function(e) {
        e.preventDefault();
        var filename = $(this).data('filename');
        var fileUrl = '/v1/assets/upload/laponboard/2/' + filename;
        window.open(fileUrl, '_blank');
    });
            $('.view-filelapon3-button').click(function(e) {
        e.preventDefault();
        var filename = $(this).data('filename');
        var fileUrl = '/v1/assets/upload/laponboard/3/' + filename;
        window.open(fileUrl, '_blank');
    });
            $('.view-filelapon3-button').click(function(e) {
        e.preventDefault();
        var filename = $(this).data('filename');
        var fileUrl = '/v1/assets/upload/laponboard/3/' + filename;
        window.open(fileUrl, '_blank');
    });
        $('.view-filelapon4-button').click(function(e) {
        e.preventDefault();
        var filename = $(this).data('filename');
        var fileUrl = '/v1/assets/upload/laponboard/4/' + filename;
        window.open(fileUrl, '_blank');
    });

        $('.view-filelapon5-button').click(function(e) {
        e.preventDefault();
        var filename = $(this).data('filename');
        var fileUrl = '/v1/assets/upload/laponboard/5/' + filename;
        window.open(fileUrl, '_blank');
    });
        $('.view-filelapon6-button').click(function(e) {
        e.preventDefault();
        var filename = $(this).data('filename');
        var fileUrl = '/v1/assets/upload/laponboard/6/' + filename;
        window.open(fileUrl, '_blank');
    });
        $('.view-filelapon7-button').click(function(e) {
        e.preventDefault();
        var filename = $(this).data('filename');
        var fileUrl = '/v1/assets/upload/laponboard/7/' + filename;
        window.open(fileUrl, '_blank');
    });
        $('.view-filelapon8-button').click(function(e) {
        e.preventDefault();
        var filename = $(this).data('filename');
        var fileUrl = '/v1/assets/upload/laponboard/8/' + filename;
        window.open(fileUrl, '_blank');
    });
        $('.view-filelapon9-button').click(function(e) {
        e.preventDefault();
        var filename = $(this).data('filename');
        var fileUrl = '/v1/assets/upload/laponboard/9/' + filename;
        window.open(fileUrl, '_blank');
    });
        $('.view-filelapon10-button').click(function(e) {
        e.preventDefault();
        var filename = $(this).data('filename');
        var fileUrl = '/v1/assets/upload/laponboard/10/' + filename;
        window.open(fileUrl, '_blank');
    });
        $('.view-filelapon11-button').click(function(e) {
        e.preventDefault();
        var filename = $(this).data('filename');
        var fileUrl = '/v1/assets/upload/laponboard/11/' + filename;
        window.open(fileUrl, '_blank');
    });
        $('.view-filelapon12-button').click(function(e) {
        e.preventDefault();
        var filename = $(this).data('filename');
        var fileUrl = '/v1/assets/upload/laponboard/12/' + filename;
        window.open(fileUrl, '_blank');
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

  });
</script>