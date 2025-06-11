<script type="text/javascript">
	
	$(document).ready(function() {

		 $('.view-file-button-signoff').click(function() {
            var filename = $(this).data('filename');
            // Gantilah '/uploads/' dengan direktori tempat Anda menyimpan file
            var fileUrl = '/v1/assets/monitoring/offboard/' + filename;
            
            // Buka tautan ke file di jendela baru
            window.open(fileUrl, '_blank');
        });
          $('.view-file-button-krulist').click(function() {
            var filename = $(this).data('filename');
            // Gantilah '/uploads/' dengan direktori tempat Anda menyimpan file
            var fileUrl = '/v1/assets/monitoring/offboard/' + filename;
            
            // Buka tautan ke file di jendela baru
            window.open(fileUrl, '_blank');
        });
            $('.view-file-button-shipart').click(function() {
            var filename = $(this).data('filename');
            // Gantilah '/uploads/' dengan direktori tempat Anda menyimpan file
            var fileUrl = '/v1/assets/monitoring/offboard/' + filename;
            
            // Buka tautan ke file di jendela baru
            window.open(fileUrl, '_blank');
        });
              $('.view-file-button-swafoto').click(function() {
            var filename = $(this).data('filename');
            // Gantilah '/uploads/' dengan direktori tempat Anda menyimpan file
            var fileUrl = '/v1/assets/monitoring/offboard/' + filename;
            
            // Buka tautan ke file di jendela baru
            window.open(fileUrl, '_blank');
        });


    });
</script>