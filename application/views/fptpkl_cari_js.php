<script>
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

        // Edit File Konduite button click event
        $('.editfk-button').on('click', function(e) {
            e.preventDefault();
            console.log('Edit File Konduite button clicked');
            var idTpkl = $(this).data('id-tpkl');
            var nim = $(this).data('nim');
            console.log('ID TPKL:', idTpkl, 'NIM:', nim);
            editFileKonduite(idTpkl, nim);
        });

        // Edit File Surat Ket Off button click event
        $('.editsk-button').on('click', function(e) {
            e.preventDefault();
            console.log('Edit File Surat Ket Off button clicked');
            var idTpkl = $(this).data('id-tpkl');
            var nim = $(this).data('nim');
            console.log('ID TPKL:', idTpkl, 'NIM:', nim);
            editFileSuratKetOff(idTpkl, nim);
        });

        // Function to handle editing File Konduite
        function editFileKonduite(idTpkl, nim) {
            console.log('Editing File Konduite:', idTpkl, 'NIM:', nim);
            $.ajax({
                url: '<?php echo base_url('edit_file_konduite'); ?>',
                type: 'POST',
                enctype: 'multipart/form-data', //
                dataType: 'json',
                data: { id_tpkl: idTpkl, nim: nim },
                success: function(response) {
                    console.log('Edit File Konduite Response:', response);
                    // Handle success (redirect or show a success message)
                },
                error: function(xhr, status, error) {
                    console.error('Edit File Konduite Error:', error);
                }
            });
        }

        // Function to handle editing File Surat Ket Off
        function editFileSuratKetOff(idTpkl, nim) {
            console.log('Editing File Surat Ket Off:', idTpkl, 'NIM:', nim);
            $.ajax({
                url: '<?php echo base_url('edit_file_sk'); ?>',
                type: 'POST',
                enctype: 'multipart/form-data', //
                dataType: 'json',
                data: { id_tpkl: idTpkl, nim: nim },
                success: function(response) {
                    console.log('Edit File Surat Ket Off Response:', response);
                    // Handle success (redirect or show a success message)
                },
                error: function(xhr, status, error) {
                    console.error('Edit File Surat Ket Off Error:', error);
                }
            });
        }
    });
</script>
