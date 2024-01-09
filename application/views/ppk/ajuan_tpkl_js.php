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

  
});
</script>
