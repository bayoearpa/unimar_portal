<script type="text/javascript">
	
	$(document).ready(function() {

		 $('.view-file-button').click(function() {
            var filename = $(this).data('filename');
            // Gantilah '/uploads/' dengan direktori tempat Anda menyimpan file
            var fileUrl = '/v1/assets/monitoring/onboard/' + filename;
            
            // Buka tautan ke file di jendela baru
            window.open(fileUrl, '_blank');
        });


    });
</script>