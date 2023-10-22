 <script>
    $(document).ready(function() {
        $('#filter-form').submit(function(e) {
            e.preventDefault();
            var year = $('#year').val();
            var programStudi = $('#program_studi').val();

            $.ajax({
                type: 'GET',
                url: '<?php echo base_url('ppk/mon_offboarddata'); ?>',
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

 // Menampilkan modal saat tombol "Tambah" diklik
  $('.add-button').click(function() {
    var id = $(this).data('id');
    // Ambil data yang akan diedit dari server dengan AJAX
    $.ajax({
      url: '<?php echo base_url('baak/mon_add/'); ?>' + id, // Sesuaikan dengan URL yang sesuai
      type: 'GET',
      success: function(data) {
        // Isi modal dengan data yang diambil
        console.log(data); // Cetak nilai data ke konsol
        var parsedData = JSON.parse(data);
        $('#addNim').val(parsedData.nim);
        $('#addNama').val(parsedData.nama);
        $('#addTmptLahir').val(parsedData.tl);
        $('#addTglLahir').val(parsedData.tgll);
        $('#addAlamat').val(parsedData.alamat);
            // Set jenis kelamin sesuai dengan data dari database
            if (parsedData.jk === 'L') {
                $('#addjnsklmn').val('Laki-laki');
            } else if (parsedData.jk === 'P') {
                $('#addjnsklmn').val('Perempuan');
            }
        $('#addtgllls').val(parsedData.d3_tanggal_lulus);
        $('#addnoijs').val(parsedData.d3_no_ijasah);
        // Tambahkan input lain sesuai kebutuhan
        $('#addModal').modal('show');
      }
    });
  });
   // Memeriksa apakah input file sudah diisi saat halaman dimuat
    $('#editufsignoff').on('change', function() {
                var fileUploadStatus = $('#fileUploadStatus');
                var editUfSignOff = $(this)[0];

                if (editUfSignOff.files.length > 0) {
                    var fileName = editUfSignOff.files[0].name;
                    fileUploadStatus.text('File sudah diunggah: ' + fileName);
                } else {
                    fileUploadStatus.text('Belum ada file yang diunggah.');
                }
            });

// Menampilkan modal saat tombol "Edit" diklik
  $('.edit-button').click(function() {
    var id = $(this).data('id');
    // Ambil data yang akan diedit dari server dengan AJAX
    $.ajax({
      url: '<?php echo base_url('ppk/mon_offboardedit/'); ?>' + id, // Sesuaikan dengan URL yang sesuai
      type: 'GET',
      success: function(data) {
        // Isi modal dengan data yang diambil
        console.log(data); // Cetak nilai data ke konsol
        var parsedData = JSON.parse(data);
        $('#editidmon').val(parsedData.id_mon);
        $('#editNim').val(parsedData.nim);
        $('#editNama').val(parsedData.nama);
        $('#editTmptLahir').val(parsedData.tl);
        $('#editTglLahir').val(parsedData.tgll);
        $('#editAlamat').val(parsedData.alamat);
            // Set jenis kelamin sesuai dengan data dari database
            if (parsedData.jk === 'L') {
                $('#editjnsklmn').val('Laki-laki');
            } else if (parsedData.jk === 'P') {
                $('#editjnsklmn').val('Perempuan');
            }
        $('#editseafarercode').val(parsedData.seafarercode);
         // Mengatur status checkbox sesuai dengan data dari database
        // if (parsedData.status_board === 'onboard') {
        //     $('#editstatonboard').prop('checked', true);
        // } else if (parsedData.status_board === 'offboard') {
        //     $('#editstatonboard').prop('checked', true);
        // }

        // Mengatur radio button "Status UKP Pasca" sesuai dengan data dari database
            if (parsedData.pasca_status === 'iya') {
                $('input[name="estatonboard"][value="iya"]').prop('checked', true);
            } else if (parsedData.pasca_status === 'tidak') {
                $('input[name="estatonboard"][value="tidak"]').prop('checked', true);
            }
        $('#editnamakapal').val(parsedData.nama_kapal);
        $('#edittglsignon').val(parsedData.tgl_sign_on);

        $('#edittglsignoff').val(parsedData.tgl_sign_off);
        // $('#editufsignoff').val(parsedData.upload_file_signoff);

         if (parsedData.upload_file_signoff) {
            $('#editufsignoff_existing').val(parsedData.upload_file_signoff);
        } else {
            $('#editufsignoff_existing').val('');
        }
        // Tambahkan input lain sesuai kebutuhan
        $('#editModal').modal('show');
      }
    });
  });
// Fungsi untuk memuat ulang tabel
function reloadTable() {
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url('ppk/mon_offboarddata'); ?>',
        data: { year: $('#year').val(), program_studi: $('#program_studi').val() },
        success: function(response) {
            $('#example31082023').html(response);

            connectEditButtonListeners()
            connectViewButtonListeners()
        }
    });
}
// Fungsi untuk menampilkan modal saat tombol "Edit" diklik
function connectEditButtonListeners() { 
 // Menampilkan modal saat tombol "Edit" diklik
  $('.edit-button').click(function() {
    var id = $(this).data('id');
    // Ambil data yang akan diedit dari server dengan AJAX
    $.ajax({
      url: '<?php echo base_url('ppk/mon_offboardedit/'); ?>' + id, // Sesuaikan dengan URL yang sesuai
      type: 'GET',
      success: function(data) {
        // Isi modal dengan data yang diambil
        console.log(data); // Cetak nilai data ke konsol
        var parsedData = JSON.parse(data);
        $('#editidmon').val(parsedData.id_mon);
        $('#editNim').val(parsedData.nim);
        $('#editNama').val(parsedData.nama);
        $('#editTmptLahir').val(parsedData.tl);
        $('#editTglLahir').val(parsedData.tgll);
        $('#editAlamat').val(parsedData.alamat);
            // Set jenis kelamin sesuai dengan data dari database
            if (parsedData.jk === 'L') {
                $('#editjnsklmn').val('Laki-laki');
            } else if (parsedData.jk === 'P') {
                $('#editjnsklmn').val('Perempuan');
            }
        $('#editseafarercode').val(parsedData.seafarercode);
         // Mengatur status checkbox sesuai dengan data dari database
        // if (parsedData.status_board === 'onboard') {
        //     $('#editstatonboard').prop('checked', true);
        // } else if (parsedData.status_board === 'offboard') {
        //     $('#editstatonboard').prop('checked', true);
        // }

        // Mengatur radio button "Status UKP Pasca" sesuai dengan data dari database
            if (parsedData.pasca_status === 'iya') {
                $('input[name="estatonboard"][value="iya"]').prop('checked', true);
            } else if (parsedData.pasca_status === 'tidak') {
                $('input[name="estatonboard"][value="tidak"]').prop('checked', true);
            }
        $('#editnamakapal').val(parsedData.nama_kapal);
        $('#edittglsignon').val(parsedData.tgl_sign_on);

        $('#edittglsignoff').val(parsedData.tgl_sign_off);
        // $('#editufsignoff').val(parsedData.upload_file_signoff);

         if (parsedData.upload_file_signoff) {
            $('#editufsignoff_existing').val(parsedData.upload_file_signoff);
        } else {
            $('#editufsignoff_existing').val('');
        }
        // Tambahkan input lain sesuai kebutuhan
        $('#editModal').modal('show');
      }
    });
  });
}

function connectViewButtonListeners() { 
    $('.view-file-button').click(function() {
            var filename = $(this).data('filename');
            // Gantilah '/uploads/' dengan direktori tempat Anda menyimpan file
            var fileUrl = './assets/monitoring/offboard' + filename;
            
            // Buka tautan ke file di jendela baru
            window.open(fileUrl, '_blank');
        });

}

    // Menyimpan perubahan dengan AJAX
    $('#saveAdd').click(function() {
        $.ajax({
            url: '<?php echo base_url('baak/mon_addp'); ?>', // Sesuaikan dengan URL yang sesuai
            type: 'POST',
            data: $('#addForm').serialize(),
            success: function(response) {
                if (response == 'sukses') {
                    // Tutup modal setelah data berhasil ditambahkan
                    $('#addModal').modal('hide');
                    // Muat ulang tabel untuk menampilkan data terbaru
                    reloadTable();
                } else {
                    // Tampilkan pesan kesalahan jika perlu
                    alert('Gagal menambahkan data baru.');
                }
            }
        });
    });


 // Menyimpan perubahan dengan AJAX
$(document).on('click', '#saveEdit', function() {
    var formData = new FormData($('#editForm')[0]);

    $.ajax({
        url: '<?php echo base_url('ppk/mon_offboardeditp'); ?>',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            // Handle respons dari server di sini
            // Tutup modal setelah data berhasil ditambahkan
                    $('#editModal').modal('hide');
                    // Muat ulang tabel untuk menampilkan data terbaru
                    reloadTable();
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            console.error(status);
            console.error(error);
        }
    });
});


     $('.view-file-button').click(function() {
            var filename = $(this).data('filename');
            // Gantilah '/uploads/' dengan direktori tempat Anda menyimpan file
            var fileUrl = '/v1/assets/monitoring/offboard/' + filename;
            
            // Buka tautan ke file di jendela baru
            window.open(fileUrl, '_blank');
        });


    });
    </script>