 <script>
    $(document).ready(function() {
        // Inisialisasi awal DataTables
    var dtOptions = {
        responsive: true,
        paging: true,
        searching: true,
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            paginate: {
                next: "Berikutnya",
                previous: "Sebelumnya"
            }
        }
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
            $('#tabel-container').html(html); // ganti isi container (tabel baru ada di dalamnya)
            initTable(keyword);             // init ulang DataTables pada tabel baru
        }

        initTable();

    // Submit filter
    $('#filter-form').submit(function(e) {
        e.preventDefault();

        var year = $('#year').val();
        var programStudi = $('#program_studi').val();

        $.ajax({
            type: 'GET',
            url: '<?= base_url('baak/mon_sbpraladata'); ?>',
            data: {
                year: year,
                program_studi: programStudi
            },
            success: function(response) {
                replaceTable(response);
            },
            error: function(xhr, status, error) {
                alert('Gagal memuat data');
                console.log(error);
            }
        });
    });

 // Menampilkan modal saat tombol "Tambah" diklik
  $(document).on('click', '.add-button', function() {
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
// Menampilkan modal saat tombol "Edit" diklik
  $(document).on('click', '.edit-button', function() {
    var id = $(this).data('id');
    // Ambil data yang akan diedit dari server dengan AJAX
    $.ajax({
      url: '<?php echo base_url('baak/mon_edit/'); ?>' + id, // Sesuaikan dengan URL yang sesuai
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
        $('#edittgllls').val(parsedData.d3_tanggal_lulus);
        $('#editnoijs').val(parsedData.d3_no_ijasah);
        // Tambahkan input lain sesuai kebutuhan
        $('#editModal').modal('show');
      }
    });
  });
// Fungsi untuk memuat ulang tabel
function reloadTable() {
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url('baak/mon_sbpraladata'); ?>',
        data: { year: $('#year').val(), program_studi: $('#program_studi').val() },
        success: function(response) {
            replaceTable(response);
        }
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
    $('#saveEdit').click(function() {
        $.ajax({
            url: '<?php echo base_url('baak/mon_editp'); ?>', // Sesuaikan dengan URL yang sesuai
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


    });
    </script>