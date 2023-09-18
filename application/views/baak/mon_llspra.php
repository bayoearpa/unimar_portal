    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lulus PRA</h3>
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
                  <th>Seafarercode</th>
                  <th>Tanggal Lulus Pra</th>
                  <th>Masa Berlaku SKL</th>
                  <th>Status Ujian</th>
                  <th>proses</th>
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
                <td><?php echo $i->seafarercode; ?></td>
                <td><?php echo $i->pra_lulus_ukp; ?></td>
                <td><?php echo $i->pra_mb_skl; ?></td>
                <td><?php echo $i->pra_status; ?></td>
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
                  <th>Seafarercode</th>
                  <th>Tanggal Lulus Pra</th>
                  <th>Masa Berlaku SKL</th>
                  <th>Status Ujian</th>
                  <th>proses</th>
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
                <h3 class="modal-title" id="addModalLabel">Form Lulus PRA</h3>
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
                        <label for="addseafarercode">Seafarercode:</label>
                        <input type="text" class="form-control" id="addseafarercode" name="seafarercode">
                    </div>
                    <div class="form-group">
                        <label for="addtglllspra">Tanggal Lulus Pra:</label>
                        <input type="date" class="form-control" id="addtglllspra" name="tglllspra">
                    </div>
                    <div class="form-group">
                        <label for="addmbskl">Masa Berlaku SKL:</label>
                        <input type="date" class="form-control" id="addmbskl" name="mbskl">
                    </div>
                    <div class="form-group">
                        <label for="addstatpra">Status Lulus Pra:</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="addstatpra" name="statpra" value="sudah">
                            <label class="form-check-label" for="addstatpra">Sudah</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="addstatpra" name="statpra" value="belum">
                            <label class="form-check-label" for="addstatpra">Belum</label>
                        </div>
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
                <h3 class="modal-title" id="editModalLabel">Form Edit Lulus PRA</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Data -->
                <form id="editForm">
                    <input type="hidden" id="editNim" name="nim">
                    <input type="hidden" id="editidmon" name="id_mon">
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
                        <label for="editseafarercode">Seafarercode:</label>
                        <input type="text" class="form-control" id="editseafarercode" name="eseafarercode">
                    </div>
                    <div class="form-group">
                        <label for="edittglllspra">Tanggal Lulus Pra:</label>
                        <input type="date" class="form-control" id="edittglllspra" name="etglllspra">
                    </div>
                    <div class="form-group">
                        <label for="editmbskl">Masa Berlaku SKL:</label>
                        <input type="date" class="form-control" id="editmbskl" name="embskl">
                    </div>
                    <div class="form-group">
                        <label for="editstatpra">Status Lulus Pra:</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="editstatpra" name="estatpra" value="sudah">
                            <label class="form-check-label" for="editstatpra">Sudah</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="editstatpra" name="estatpra" value="belum">
                            <label class="form-check-label" for="editstatpra">Belum</label>
                        </div>
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
