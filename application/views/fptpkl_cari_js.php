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
        var formData = new FormData();
        formData.append('id_tpkl', idTpkl);
        formData.append('nim', nim);
        formData.append('file_konduite', $('#file_konduite')[0].files[0]);

        formData.append('idTpkl', idTpkl);

        console.log('ID TPKL:', idTpkl, 'NIM:', nim);
        editFileKonduite(formData);
    });

    // Edit File Surat Ket Off button click event
    $('.editsk-button').on('click', function(e) {
        e.preventDefault();
        console.log('Edit File Surat Ket Off button clicked');
        var idTpkl = $(this).data('id-tpkl');
        var nim = $(this).data('nim');
        var formData = new FormData(); // Declare formData here
        formData.append('id_tpkl', idTpkl);
        formData.append('nim', nim);
        formData.append('file_suratketoff', $('#file_suratketoff')[0].files[0]);

        formData.append('idTpkl', idTpkl);

        console.log('ID TPKL:', idTpkl, 'NIM:', nim);
        editFileSuratKetOff(formData);
    });

    // Function to handle editing File Konduite
    function editFileKonduite(formData) { // Removed idTpkl and nim from parameters
        console.log('Editing File Konduite:', formData);
        $.ajax({
            url: '<?php echo base_url('edit_file_konduite'); ?>',
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: 'json',
            data: formData,
            success: function(response) {
                console.log('Edit File Konduite Response:', response);
                // Handle success (redirect or show a success message)
                var idTpkl = formData.get('idTpkl');
                refreshTableCells(idTpkl);
            },
            error: function(xhr, status, error) {
                console.error('Edit File Konduite Error:', error);
            }
        });
    }

    // Function to handle editing File Surat Ket Off
    function editFileSuratKetOff(formData) { // Removed idTpkl and nim from parameters
        console.log('Editing File Surat Ket Off:', formData);
        $.ajax({
            url: '<?php echo base_url('edit_file_sk'); ?>',
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: 'json',
            data: formData,
            success: function(response) {
                console.log('Edit File Surat Ket Off Response:', response);
                // Handle success (redirect or show a success message)
                var idTpkl = formData.get('idTpkl');
                refreshTableCells(idTpkl);
            },
            error: function(xhr, status, error) {
                console.error('Edit File Surat Ket Off Error:', error);
            }
        });
    }
    function refreshTableCells(idTpkl) {
        if (!idTpkl) {
        console.error('Invalid idTpkl:', idTpkl);
        return;
        }
        $.ajax({
            url: '<?php echo base_url('fetch_updated_data_tpkl'); ?>/' + idTpkl,
            type: 'GET',
            dataType: 'html',
            success: function(updatedTdHtml) {
                // Replace the content of specific <td> elements
                $('#tr_file_konduite').html($(updatedTdHtml).find('#tr_file_konduite').html());
                $('#tr_file_suratketoff').html($(updatedTdHtml).find('#tr_file_suratketoff').html());
                console.log('Refresh Table Cells Response:', updatedTdHtml);
            },
            error: function(xhr, status, error) {
                console.error('Table Cell Refresh Error:', error);
            }
        });
    }
});

</script>
