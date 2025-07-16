 <script>
    $(document).ready(function() {
       
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


// Menampilkan modal saat tombol "Edit" diklik
  $('#example31082023').on('click', '.edit-button', function() {
    var id = $(this).data('id');
    // Ambil data yang akan diedit dari server dengan AJAX
    $.ajax({
      url: '<?php echo base_url('superadmin/get_edit_kelas/'); ?>' + id, // Sesuaikan dengan URL yang sesuai
      type: 'GET',
      success: function(data) {
        // Isi modal dengan data yang diambil
        console.log(data); // Cetak nilai data ke konsol
        var parsedData = JSON.parse(data);
        $('#id_tkbi_kelas').val(parsedData.id_tkbi_kelas);
        $('#periode_kelas').val(parsedData.periode_kelas);
         if (parsedData.status === 'sudah') {
                $('input[name="status"][value="sudah"]').prop('checked', true);
            } else if (parsedData.status === 'belum') {
                $('input[name="status"][value="belum"]').prop('checked', true);
            }
        $('#waktu_pelaksanaan').val(parsedData.waktu_pelaksanaan);
        // Tambahkan input lain sesuai kebutuhan
        $('#editModal').modal('show');
      }
    });
  });

 $('#saveEdit').click(function (e) {
        e.preventDefault();

        var form = $('#editForm')[0];
        var formData = new FormData(form);

        var id_tkbi_kelas = formData.get('id_tkbi_kelas'); // ambil langsung dari form, lebih akurat

        if (!id_tkbi_kelas || id_tkbi_kelas.trim() === "") {
            alert('id_tkbi_kelas kosong. Silakan isi atau periksa kembali.');
            return;
        }

        $.ajax({
            url: '<?php echo base_url('superadmin/set_kelas_edit'); ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.trim() === 'sukses') {
                    alert('Berhasil Edit data baru.');
                    window.location.href = '<?php echo base_url("superadmin/set_kelas/"); ?>';
                } else {
                    alert('Gagal Edit data baru: ' + response);
                }
            },
            error: function (xhr, status, error) {
                alert('Terjadi kesalahan: ' + error);
            }
        });
    });



 // Saat tombol 'Tambah Kelas' ditekan, buka modal
    $('.add-button').click(function () {
        $('#insertModal').modal('show');
        $('#insertForm')[0].reset(); // Reset form jika sebelumnya pernah dipakai
    });

    // Saat tombol 'Simpan' ditekan
    $('#saveData').click(function () {
        var formData = {
            iperiode_kelas: $('#iperiode_kelas').val(),
            istatus: $('input[name="istatus"]:checked').val(),
            iwaktu_pelaksanaan: $('#iwaktu_pelaksanaan').val()
        };

        // Validasi sederhana
        if (!formData.iperiode_kelas || !formData.istatus || !formData.iwaktu_pelaksanaan) {
            alert("Semua field harus diisi!");
            return;
        }

        $.ajax({
            url: '<?php echo base_url("kelas/insert_kelas"); ?>', // Ganti dengan URL controller kamu
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (res) {
                if (res.status === 'success') {
                    alert('Data berhasil disimpan!');
                    $('#insertModal').modal('hide');
                    $('#insertForm')[0].reset();
                    // Reload table atau halaman jika perlu
                    location.reload();
                } else {
                    alert('Gagal menyimpan data: ' + res.message);
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat mengirim data: ' + error);
            }
        });
    });

    });
    </script>