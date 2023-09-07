 <script>
    $(document).ready(function() {
        $('#filter-form').submit(function(e) {
            e.preventDefault();
            var year = $('#year').val();
            var programStudi = $('#program_studi').val();

            $.ajax({
                type: 'GET',
                url: '<?php echo base_url('baak/mon_llsd3data'); ?>',
                data: { year: year, program_studi: programStudi }, // Send both year and program_studi
                success: function(response) {
                    $('#example31082023').html(response); // Ganti isi #item-list dengan hasil AJAX
                }
            });
        });
        ////datatables
         $('#example31082023').DataTable({
                "paging": true, // Enable pagination
                "pageLength": 20, // Set the number of records per page
                'lengthChange': true,
                  'searching'   : true,
                  'ordering'    : true,
                //   'info'        : true,
                //   'autoWidth'   : false
                // Other DataTables options...
            });

         // Menampilkan modal saat tombol Edit diklik
    $('.edit-button').click(function() {
        var id = $(this).data('id');
        // Ambil data yang akan diedit dari server dengan AJAX
        $.ajax({
            url: '/baak/mon_add/'+id, // Gantilah dengan URL yang sesuai
            type: 'GET',
            // data: { id: id },
            success: function(data) {
                // Isi modal dengan data yang diambil
                var parsedData = JSON.parse(data);
                $('#editId').val(parsedData.nrp);
                $('#editName').val(parsedData.nama_mahasiswa);
                // Tambahkan input lain sesuai kebutuhan
                $('#editModal').modal('show');
            }
        });
    });

    // Menyimpan perubahan dengan AJAX
    $('#saveEdit').click(function() {
        $.ajax({
            url: 'baak/mon_addp', // Gantilah dengan URL yang sesuai
            type: 'POST',
            data: $('#editForm').serialize(),
            success: function(response) {
                if (response == 'sukses') {
                    // Tutup modal setelah data berhasil disimpan
                    $('#editModal').modal('hide');
                    // Refresh atau perbarui tabel data
                    // Tambahkan kode refresh tabel di sini
                } else {
                    // Tampilkan pesan kesalahan jika perlu
                    alert('Gagal menyimpan perubahan.');
                }
            }
        });
    });
    });
    </script>