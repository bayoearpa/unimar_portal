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
                    <option value="">Semua</option>
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
                  <th>No. Ijasah</th>
                  <th>Tanggal Lulus</th>
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
                <td><?php echo $i->d3_no_ijasah; ?></td>
                <td><?php echo $i->d3_tanggal_lulus; ?></td>
                <td>
                      <!-- Tombol Tambah/Edit -->
                    <?php if ($i->id_mon) { ?>
                        <button class="btn btn-primary edit-button" data-id="<?php echo $i->nim; ?>">Edit</button>
                    <?php } else { ?>
                        <button class="btn btn-primary add-button" data-id="<?php echo $i->nim; ?>">Tambah</button>
                    <?php } ?>
                </td>
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>No. Ijasah</th>
                  <th>Tanggal Lulus</th>
                  <th>proses</th>
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
   
   <!-- Modal Add -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addModalLabel">Form Lulus D3</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Data -->
                <form id="addForm">
                    <input type="hidden" id="addNim" name="nim">
                    <div class="form-group">
                        <label for="addNama">Nama:</label>
                        <input type="text" class="form-control" id="addNama" name="nama" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="addTmptLahir">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="addTmptLahir" name="tl" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="addTglLahir">Tanggal Lahir:</label>
                        <input type="text" class="form-control" id="addTglLahir" name="tgll" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="addAlamat">Alamat:</label>
                        <textarea class="form-control" rows="3" id="addAlamat" name="alamat" readonly=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="addjnsklmn">Jenis Kelamin:</label>
                        <input type="text" class="form-control" id="addjnsklmn" name="jk" readonly="">
                    </div>
                     <div class="form-group">
                        <label for="addtgllls">Tanggal Lulus:</label>
                        <input type="date" class="form-control" id="addtgllls" name="tgllls" readonly="">
                    </div>
                     <div class="form-group">
                        <label for="addnoijs">Nomor Ijasah:</label>
                        <input type="text" class="form-control" id="addnoijs" name="nj">
                    </div>
                    <!-- Tambahkan input lain sesuai kebutuhan -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="saveAdd">Simpan</button>
            </div>
        </div>
    </div>
</div>

   <!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editModalLabel">Form Edit Lulus D3</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Data -->
                <form id="editForm">
                    <input type="hidden" id="editidmon" name="id_mon">
                    <input type="hidden" id="editNim" name="nim">
                    <div class="form-group">
                        <label for="editNama">Nama:</label>
                        <input type="text" class="form-control" id="editNama" name="nama" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="editTmptLahir">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="editTmptLahir" name="tl" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="editTglLahir">Tanggal Lahir:</label>
                        <input type="text" class="form-control" id="editTglLahir" name="tgll" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="editAlamat">Alamat:</label>
                        <textarea class="form-control" rows="3" id="editAlamat" name="alamat" readonly=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editjnsklmn">Jenis Kelamin:</label>
                        <input type="text" class="form-control" id="editjnsklmn" name="jk" readonly="">
                    </div>
                     <div class="form-group">
                        <label for="edittgllls">Tanggal Lulus:</label>
                        <input type="date" class="form-control" id="edittgllls" name="etgllls">
                    </div>
                     <div class="form-group">
                        <label for="editnoijs">Nomor Ijasah:</label>
                        <input type="text" class="form-control" id="editnoijs" name="enj" readonly="">
                    </div>
                     <div class="form-group">
                        <label for="editstatpra">Status Lulus D3:</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="editstatd3" name="estatd3" value="sudah">
                            <label class="form-check-label" for="editstatd3">Sudah</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="editstatd3" name="estatd3" value="belum">
                            <label class="form-check-label" for="editstatd3">Belum</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editKetD3">Keterangan:</label>
                        <textarea class="form-control" rows="3" id="editKetD3" name="ket_d3"></textarea>
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
