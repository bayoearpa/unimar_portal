 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Edit Karyawan dan Dosen</h3>
          </div>
          <div class="box-body">
            <?php echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
            foreach ($kardos as $k) {
              # code...
              ?>

              <form action="<?php echo base_url() ?>hrd/input_kardosp" name="form1" id="form1" method="post">
                <div class="form-group">
                <label for="exampleInputEmail1">NIAK</label>
                <input class="form-control" type="hidden" name="id" id="id" value="<?php echo $k->id ?>">
                  <input class="form-control" type="text" name="niak" id="niak" value="<?php echo $k->niak ?>">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                  <input class="form-control" type="text" name="nama" id="nama" value="<?php echo $k->nama ?>">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Masukkan alamat rumah"><?php echo $k->alamat ?></textarea>
                </div>
                <div class="form-group">
                  <label>Agama</label>
                  <select class="form-control" name="agama" id="agama">
                      <option selected value="<?php echo $k->agama ?>"><?php echo $k->agama ?></option>
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
                  <input class="form-control" type="number" name="telepon" id="telepon" value="<?php echo $k->telepon ?>">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Status Nikah</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="status_nikah" id="status_nikah" value="Sudah Menikah" <?php echo ($c->status_nikah == 'Sudah Menikah') ? 'checked' : ''; ?>>
                      Sudah Menikah
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="status_nikah" id="status_nikah" value="Belum Menikah" <?php echo ($c->status_nikah == 'Belum Menikah') ? 'checked' : ''; ?>>
                      Belum menikah
                    </label>
                  </div>
                </div>
               <div class="form-group">
                  <label>Jabatan</label>
                  <select class="form-control" name="jabatan" id="jabatan">
                      <option selected value="<?php echo $k->jabatan ?>"><?php echo $k->jabatan ?></option>
                    <?php foreach ($jabatan as $j) {
                      # code...
                    
                     ?>
                      <option value="<?php echo $j->id_jabatan ?>"><?php echo $j->jabatan ?></option>
                    <?php } ?>
                  </select>
                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">SK Karyawan Tetap</label>
                  <input class="form-control" type="text" name="sk_kartep" id="sk_kartep" value="<?php echo $k->sk_kartep ?>">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">TMT Karyawan Tetap</label>
                  <input class="form-control" type="text" name="kartep_tmt" id="kartep_tmt" value="<?php echo $k->kartep_tmt?>">
                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">SK dosen Tetap</label>
                  <input class="form-control" type="text" name="sk_dostep" id="sk_dostep" value="<?php echo $k->sk_dostep ?>">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">TMT dosen Tetap</label>
                  <input class="form-control" type="text" name="dostep_tmt" id="dostep_tmt" value="<?php echo $k->dostep_tmt ?>">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" id="status">
                      <option selected value="<?php echo $k->status ?>"><?php echo $k->status ?></option>
                      <option value="Karyawan Tetap">Karyawan Tetap</option>
                      <option value="Karyawan Kontrak">Karyawan Kontrak</option>
                      <option value="Karyawan Honorer">Karyawan Honorer</option>
                      <option value="Asisten Pengasuh Mahatar">Asisten Pengasuh Mahatar</option>
                       <option value="Dosen">Dosen</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="<?php echo base_url() ?>bk/ajuan"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->