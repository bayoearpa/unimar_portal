 <script>
    $(document).ready(function() {
        $('#filter-form').submit(function(e) {
            e.preventDefault();
            var year = $('#year').val();
            var programStudi = $('#program_studi').val();

            $.ajax({
                type: 'GET',
                url: '<?php echo base_url('ppk/mon_modelingdata'); ?>',
                data: { year: year, program_studi: programStudi }, // Send both year and program_studi
                success: function(response) {
                    replaceTable(response); // Ganti isi #item-list dengan hasil AJAX
                }
            });
        });
        ////datatables
         var dtOptions = {
                "paging": true, // Enable pagination
                "pageLength": 20, // Set the number of records per page
                "lengthMenu": [[10, 20, 50, 100], [10, 20, 50, 100]],
                'lengthChange': true,
                  'searching'   : true,
                  'ordering'    : true,
                //   'info'        : true,
                //   'autoWidth'   : false
                // Other DataTables options...
            };

        // Inisialisasi DataTables (dipakai ulang setiap kali tabel dimuat ulang)
        function initTable(keyword) {
            var opts = $.extend({}, dtOptions);
            if (keyword) { opts.search = { search: keyword }; }
            return $('#example31082023').DataTable(opts);
        }

        // Ganti tabel dengan hasil AJAX TANPA merusak DataTables
        function replaceTable(html) {
            var keyword = '';
            if ($.fn.DataTable.isDataTable('#example31082023')) {
                var dt = $('#example31082023').DataTable();
                keyword = dt.search();      // simpan kata kunci pencarian
                dt.destroy();               // kembalikan <table> ke kondisi semula
            }
            $('#example31082023').replaceWith(html); // ganti elemen <table> lama (bukan isinya)
            initTable(keyword);             // init ulang DataTables pada tabel baru
        }

        initTable();

 // Menampilkan modal saat tombol "Tambah" diklik
  $(document).on('click', '.add-button', function() {
    var id = $(this).data('id');
    // Ambil data yang akan diedit dari server dengan AJAX
    $.ajax({
      url: '<?php echo base_url('ppk/mon_modelingadd/'); ?>' + id, // Sesuaikan dengan URL yang sesuai
      type: 'GET',
      success: function(data) {
        // Isi modal dengan data yang diambil
        console.log(data); // Cetak nilai data ke konsol
        var parsedData = JSON.parse(data);
         $('#addidmon').val(parsedData.id_mon);
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
        // Mengatur radio button "Status UKP Pasca" sesuai dengan data dari database
            if (parsedData.status_prada === 'sudah') {
                $('input[name="statprada"][value="sudah"]').prop('checked', true);
            } else if (parsedData.status_prada === 'belum') {
                $('input[name="statprada"][value="belum"]').prop('checked', true);
            }
        // Tambahkan input lain sesuai kebutuhan
        $('#addModal').modal('show');
      }
    });
  });
// Menampilkan modal saat tombol "Edit" diklik
  $(document).on('click', '.edit-button', function() {
    var id = $(this).data('id');
    // Ambil data yang akan diedit dari server dengan AJAX
    $.ajax({
      url: '<?php echo base_url('ppk/mon_modelingedit/'); ?>' + id, // Sesuaikan dengan URL yang sesuai
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
        // Mengatur radio button "Status UKP Pasca" sesuai dengan data dari database
            if (parsedData.status_modeling === 'sudah') {
                $('input[name="estatmodeling"][value="sudah"]').prop('checked', true);
            } else if (parsedData.status_modeling === 'belum') {
                $('input[name="estatmodeling"][value="belum"]').prop('checked', true);
            }
        $('#editKetModeling').val(parsedData.ket_modeling);
        // Tambahkan input lain sesuai kebutuhan
        $('#editModal').modal('show');
      }
    });
  });
// Fungsi untuk memuat ulang tabel
function reloadTable() {
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url('ppk/mon_modelingdata'); ?>',
        data: { year: $('#year').val(), program_studi: $('#program_studi').val() },
        success: function(response) {
            replaceTable(response);
        }
    });
}
    // Menyimpan perubahan dengan AJAX
    $('#saveAdd').click(function() {
        $.ajax({
            url: '<?php echo base_url('ppk/mon_pradaaddp'); ?>', // Sesuaikan dengan URL yang sesuai
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
    $('#saveEdit').click(function() {
        $.ajax({
            url: '<?php echo base_url('ppk/mon_modelingeditp'); ?>', // Sesuaikan dengan URL yang sesuai
            type: 'POST',
            data: $('#editForm').serialize(),
            success: function(response) {
                if (response == 'sukses') {
                    // Tutup modal setelah data berhasil ditambahkan
                    $('#editModal').modal('hide');
                    // Muat ulang tabel untuk menampilkan data terbaru
                    reloadTable();
                } else {
                    // Tampilkan pesan kesalahan jika perlu
                    alert('Gagal melakukan edit data baru.');
                }
            }
        });
    });


    $(document).on('click', '#example31082023 .view-file-button', function() {
            var filename = $(this).data('filename');
            // Gantilah '/uploads/' dengan direktori tempat Anda menyimpan file
            var fileUrl = '/v1/assets/monitoring/modeling/' + filename;
            
            // Buka tautan ke file di jendela baru
            window.open(fileUrl, '_blank');
        });

    });
    </script>