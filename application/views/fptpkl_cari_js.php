<!-- JavaScript code for handling edit buttons -->
<script>
    $(document).ready(function() {
        $('.view-filek-button').click(function() {
            var filename = $(this).data('filename');
            // Gantilah '/uploads/' dengan direktori tempat Anda menyimpan file
            var fileUrl = '/v1/assets/upload/tpkl/konduite/' + filename;
            
            // Buka tautan ke file di jendela baru
            window.open(fileUrl, '_blank');
        });

         $('.view-filesk-button').click(function() {
            var filename = $(this).data('filename');
            // Gantilah '/uploads/' dengan direktori tempat Anda menyimpan file
            var fileUrl = '/v1/assets/upload/tpkl/sk/' + filename;
            
            // Buka tautan ke file di jendela baru
            window.open(fileUrl, '_blank');
        });
        // Edit File Konduite button click event
        $('.editfk-button').on('click', function() {
            var idTpkl = $(this).data('id-tpkl'); // Assuming you have a unique identifier for each file
            var nim = $(this).data('nim');
            // Implement logic for editing File Konduite
            editFileKonduite(idTpkl, nim);
        });

        // Edit File Surat Ket Off button click event
        $('.editsk-button').on('click', function() {
            var idTpkl = $(this).data('id-tpkl'); // Assuming you have a unique identifier for each file
            var nim = $(this).data('nim');
            // Implement logic for editing File Surat Ket Off
            editFileSuratKetOff(idTpkl, nim);
        });

        // Function to handle editing File Konduite
        function editFileKonduite(idTpkl, nim) {
            // Implement logic to edit File Konduite
            // You can use AJAX to send the data to the server for processing
            // Example AJAX call:
            $.ajax({
                url: '<?php echo base_url('edit_file_konduite'); ?>',
                type: 'POST',
                dataType: 'json',
                data: { id_tpkl: idTpkl, nim: nim },
                success: function(response) {
                    // Handle success (redirect or show a success message)
                }
            });
        }

        // Function to handle editing File Surat Ket Off
        function editFileSuratKetOff(idTpkl, nim) {
            // Implement logic to edit File Surat Ket Off
            // You can use AJAX to send the data to the server for processing
            // Example AJAX call:
            $.ajax({
                url: '<?php echo base_url('edit_file_sk'); ?>',
                type: 'POST',
                dataType: 'json',
                data: { id_tpkl: idTpkl, nim: nim },
                success: function(response) {
                    // Handle success (redirect or show a success message)
                }
            });
        }
    });
</script>