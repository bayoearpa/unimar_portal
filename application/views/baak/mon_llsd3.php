    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kliring</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <form id="filter-form">
                <label for="year">Pilih Tahun:</label>
                <select id="year" name="year">
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2018">2019</option>
                    <option value="2019">2018</option>
                    <!-- Tambahkan pilihan tahun sesuai kebutuhan -->
                </select>
                <button type="submit">Filter</button>
            </form>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>Jenjang</th>
                  <th>Mahatar</th>
                  <th>D.Wali</th>
                  <th>BAAK</th>
                  <th>BK</th>
                  <th>PPK</th>
                  <th>Hasil</th>
                </tr>
                </thead>
                <tbody>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                </tbody>
                <tfoot>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>Jenjang</th>
                  <th>Mahatar</th>
                  <th>D.Wali</th>
                  <th>BAAK</th>
                  <th>BK</th>
                  <th>PPK</th>
                  <th>Hasil</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <script>
    $(document).ready(function() {
        $('#filter-form').submit(function(e) {
            e.preventDefault();
            var year = $('#year').val();

            $.ajax({
                type: 'GET',
                url: '<?php echo base_url('items/index'); ?>',
                data: { year: year },
                success: function(response) {
                    $('#item-list').html(response); // Ganti isi #item-list dengan hasil AJAX
                }
            });
        });
    });
    </script>