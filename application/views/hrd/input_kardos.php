 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Karyawan dan Dosen</h3>
          </div>
          <div class="box-body">
            <?php echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
              ?>

              <form action="<?php echo base_url() ?>hrd/input_kardosp" name="form1" id="form1" method="post">
                <div class="form-group">
                <label for="exampleInputEmail1">NIAK</label>
                  <input class="form-control" type="text" name="niak" id="niak">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                  <input class="form-control" type="text" name="nama" id="nama" required="">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Tempat Lahir</label>
                  <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" required="">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Lahir</label>
                  <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" required="">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Masukkan alamat rumah" required=""></textarea>
                </div>
                <div class="form-group">
                  <label>Agama</label>
                  <select class="form-control" name="agama" id="agama" required="">
                      <option selected>==Pilih==</option>
                      <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Katholik">Katholik</option>
                      <option value="Protestan">Protestan</option>
                      <option value="Buddha">Buddha</option>
                      <option value="KhongHucu">KhongHucu</option>
                  </select>
                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">Telepon</label>
                  <input class="form-control" type="number" name="telepon" id="telepon" required="">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Status Nikah</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="status_nikah" id="status_nikah" value="Sudah Menikah">
                      Sudah Menikah
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="status_nikah" id="status_nikah" value="Belum Menikah">
                      Belum menikah
                    </label>
                  </div>
                </div>
               <div class="form-group">
                  <label>Jabatan</label>
                  <select class="form-control" name="jabatan" id="jabatan" required="">
                      <option selected>==Pilih==</option>
                    <?php foreach ($jabatan as $j) {
                      # code...
                    
                     ?>
                      <option value="<?php echo $j->id_jabatan ?>"><?php echo $j->jabatan ?></option>
                    <?php } ?>
                  </select>
                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">SK Karyawan Tetap</label>
                  <input class="form-control" type="text" name="sk_kartep" id="sk_kartep">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">TMT Karyawan Tetap</label>
                  <input class="form-control" type="text" name="kartep_tmt" id="kartep_tmt">
                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">SK dosen Tetap</label>
                  <input class="form-control" type="text" name="sk_dostep" id="sk_dostep">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">TMT dosen Tetap</label>
                  <input class="form-control" type="text" name="dostep_tmt" id="dostep_tmt">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" id="status" required="">
                      <option selected>==Pilih==</option>
                      <option value="Karyawan Tetap">Karyawan Tetap</option>
                      <option value="Karyawan Kontrak">Karyawan Kontrak</option>
                      <option value="Karyawan Honorer">Karyawan Honorer</option>
                      <option value="Asisten Pengasuh Mahatar">Asisten Pengasuh Mahatar</option>
                       <option value="Dosen">Dosen</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url() ?>bk/ajuan"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->