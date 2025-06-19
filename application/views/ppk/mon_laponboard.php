    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Onboard</h3>
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
                  <th>Status Onboard</th>
                  <th>Nama Perusahaan</th>
                  <th>Nama Kapal</th>
                  <th>Tanggal Sign On</th>
                  <th>Cek Laporan</th>
                  <th>Validasi</th>
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
                <td><?php echo $i->status_onboard; ?></td>
                <td><?php echo $i->nama_perusahaan; ?></td>
                <td><?php echo $i->nama_kapal; ?></td>
                <td><?php echo $i->tgl_sign_on; ?></td>
                <td>
                      <!-- Tombol Tambah/Edit -->
                    <?php if ($i->id_mon) { ?>
                        <button class="btn btn-primary edit-button" data-id="<?php echo $i->nim; ?>">Detail</button>
                    <?php } else { ?>
                        <button class="btn btn-primary add-button" data-id="<?php echo $i->nim; ?>">Tambah</button>
                    <?php } ?>
                </td>
                 <td>
                      <!-- Tombol Tambah/Edit -->
                    <?php if ($i->id_mon) { ?>
                        <button class="btn btn-primary val-button" data-id="<?php echo $i->nim; ?>">Validasi</button>
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
                  <th>Status Onboard</th>
                  <th>Nama Perusahaan</th>
                  <th>Nama Kapal</th>
                  <th>Tanggal Sign On</th>
                  <th>Cek Laporan</th>
                  <th>Validasi</th>
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
                <h3 class="modal-title" id="editModalLabel">Laporan Onboard</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Data -->
                <form id="editForm" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="editNim" name="nim">
                    <input type="hidden" id="editidmon" name="nid_mon">
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
                        <input type="text" class="form-control" id="editseafarercode" name="eseafarercode" readonly="">
                    </div>

                    <!-- onboard/offboard formgroup -->

                    <div class="form-group">
                        <label for="editstatonboard">Status Onboard:</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="editstatonboard" name="estatonboard" value="iya">
                            <label class="form-check-label" for="editstatonboard">Iya</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="editstatonboard" name="estatonboard" value="tidak">
                            <label class="form-check-label" for="editstatonboard">Tidak</label>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="editnamakapal">Nama Perusahaan:</label>
                        <input type="text" class="form-control" id="editnamaperusahaan" name="editnamaperusahaan">
                    </div>
                    <div class="form-group">
                        <label for="editnamakapal">Nama Kapal:</label>
                        <input type="text" class="form-control" id="editnamakapal" name="editnamakapal">
                    </div>
                    <div class="form-group">
                        <label for="edittglsignon">Tanggal Sign On:</label>
                        <input type="date" class="form-control" id="edittglsignon" name="etglsignon">
                    </div>
                   <div class="form-group">
                        <label for="editufsignon">Upload File Sign On</label>
                        <input type="file" class="form-control" id="editufsignon" name="eufsignon">
                        <input type="hidden" id="editufsignon_existing" name="eufsignon_existing" value="<?php echo $i->upload_file_signon; ?>">
                    </div>
                    <div id="fileUploadStatus">Belum ada file yang diunggah.</div>
                    <div class="form-group">
                        <label for="editKetOnboard">Keterangan:</label>
                        <textarea class="form-control" rows="3" id="editKetOnboard" name="ket_onboard"></textarea>
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


   <!-- Modal Edit -->
<div class="modal fade" id="valModal" tabindex="-1" role="dialog" aria-labelledby="valModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editModalLabel">Validasi Laporan Onboard</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Data -->
                <form id="valForm" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="editNim" name="nim">
                    <input type="text" id="validmon" name="id_mon">
                    <div class="form-group">
                        <label for="editNama">Nama:</label>
                        <input type="text" class="form-control" id="valNama" name="nama" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="editTmptLahir">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="valTmptLahir" name="tl" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="editTglLahir">Tanggal Lahir:</label>
                        <input type="text" class="form-control" id="valTglLahir" name="tgll" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="editAlamat">Alamat:</label>
                        <textarea class="form-control" rows="3" id="valAlamat" name="alamat" readonly=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editjnsklmn">Jenis Kelamin:</label>
                        <input type="text" class="form-control" id="valjnsklmn" name="jk" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="editseafarercode">Seafarercode:</label>
                        <input type="text" class="form-control" id="valseafarercode" name="eseafarercode" readonly="">
                    </div>

                    
                     <div class="form-group">
                        <label for="editnamakapal">Nama Perusahaan:</label>
                        <input type="text" class="form-control" id="valnamaperusahaan" name="valnamaperusahaan" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="editnamakapal">Nama Kapal:</label>
                        <input type="text" class="form-control" id="valnamakapal" name="valnamakapal" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="edittglsignon">Tanggal Sign On:</label>
                        <input type="date" class="form-control" id="valtglsignon" name="etglsignon" readonly="">
                    </div>

                    <!-- onboard/offboard formgroup -->

                    <div class="form-group">
                        <label for="editstatonboard">Status Laporan Onboard (di validasi ketika sudah semua laporan onboardnya):</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="valstatonboard" name="vstatlapon" value="sudah">
                            <label class="form-check-label" for="valstatonboard">Sudah</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="valstatonboard" name="vstatlapon" value="belum">
                            <label class="form-check-label" for="valstatonboard">Belum</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editKetOnboard">Keterangan:</label>
                        <textarea class="form-control" rows="3" id="valKetLapon" name="vket_lapon"></textarea>
                    </div>
                    
                    
                    <!-- Tambahkan input lain sesuai kebutuhan -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="saveValEdit">Simpan</button>
            </div>
        </div>
    </div>
</div>