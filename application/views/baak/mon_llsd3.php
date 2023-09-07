    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lulus D3</h3>
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
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <!-- Tambahkan pilihan tahun sesuai kebutuhan -->
                </select>
                <label for="program_studi">Pilih Program Studi:</label>
                <select id="program_studi" name="program_studi">
                    <option value="">Semua</option>
                    <option value="92403">Nautika</option>
                    <option value="92402">Teknika</option>
                    <!-- Tambahkan program studi lain jika ada -->
                </select>
                <button type="submit">Filter</button>
            </form>
              <table id="example31082023" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>proses</th>
                  <!-- <th>Jenjang</th>
                  <th>Mahatar</th>
                  <th>D.Wali</th>
                  <th>BAAK</th>
                  <th>BK</th>
                  <th>PPK</th>
                  <th>Hasil</th> -->
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($items as $i) {
                  # code...
                 ?>
                  <tr>
                <td><?php echo $i->nim; ?></td>
                <td><?php echo $i->nama; ?></td>
                <td><?php echo $i->prodi; ?></td>
                <td>
                    <button class="btn btn-primary edit-button" data-id="<?php echo $i->nim; ?>">Edit</button>
                </td>
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>Proses</th>
                 <!-- <th>Jenjang</th>
                  <th>Mahatar</th>
                  <th>D.Wali</th>
                  <th>BAAK</th>
                  <th>BK</th>
                  <th>PPK</th>
                  <th>Hasil</th> -->
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
   
   <!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Data -->
                <form id="editForm">
                    <input type="hidden" id="addNim" name="nim">
                    <div class="form-group">
                        <label for="editName">Nama:</label>
                        <input type="text" class="form-control" id="addNama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="editName">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="addTmptLahir" name="tl">
                    </div>
                    <div class="form-group">
                        <label for="editName">Tanggal Lahir:</label>
                        <input type="text" class="form-control" id="addTglLahir" name="tgll">
                    </div>
                    <div class="form-group">
                        <label for="editName">Alamat:</label>
                        <textarea class="form-control" rows="3" id="addAlamat" name="alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editName">Jenis Kelamin:</label>
                        <input type="text" class="form-control" id="addjnsklmn" name="jk">
                    </div>
                     <div class="form-group">
                        <label for="editName">Tanggal Lulus:</label>
                        <input type="text" class="form-control" id="addtgllls" name="tgllls">
                    </div>
                     <div class="form-group">
                        <label for="editName">Nomor Ijasah:</label>
                        <input type="text" class="form-control" id="addnoijs" name="nj">
                    </div>
                    <!-- Tambahkan input lain sesuai kebutuhan -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="saveEdit">Simpan</button>
            </div>
        </div>
    </div>
</div>
