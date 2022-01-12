 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Inventaris</h3>
          </div>
          <div class="box-body">
            <?php echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
              ?>
              <form action="<?php echo base_url() ?>aset/pi_inventaris" name="form1" id="form1" method="post">
                 <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>">
                 <div class="form-group">
                <label for="exampleInputEmail1">Gedung:</label>
                  <!-- <input class="form-control" type="text" name="luas" id="luas"> -->
                  <!-- Select Element -->
                 <select id="gedung" name="gedung" class="form-control">
                    <option value='0'>-- Pilih Gedung --</option>
                    <?php foreach ($gedung as $key) {
                      # code... ?>
                      <option value='<?php echo $key->id_gedung ?>'><?php echo $key->nama_gedung; ?></option>
                    <?php } ?>
                 </select>
                </div>

                 <div class="form-group">
                <label for="exampleInputEmail1">Ruang:</label>
                  <!-- <input class="form-control" type="text" name="luas" id="luas"> -->
                  <!-- Select Element -->
                 <select id="ruang" name="ruang" class="form-control">
                    <option value='0'>-- Pilih Ruang --</option>
                    <?php foreach ($ruang as $key) {
                      # code... ?>
                      <option value='<?php echo $key->kd_ruang ?>'><?php echo $key->nama_ruang; ?></option>
                    <?php } ?>
                 </select>
                </div>

                  <div class="form-group">
                <label for="exampleInputEmail1">Barang:</label>
                  <!-- <input class="form-control" type="text" name="luas" id="luas"> -->
                  <!-- Select Element -->
                 <select id="barang" name="barang" class="form-control">
                    <option value='0'>-- Pilih Barang --</option>
                    <?php foreach ($barang as $key) {
                      # code... ?>
                      <option value='<?php echo $key->kd_barang ?>'><?php echo $key->nama_barang; ?></option>
                    <?php } ?>
                 </select>
                </div>

                <div class="form-group">
                <label for="exampleInputEmail1">Merk:</label>
                  <input class="form-control" type="text" name="merk" id="merk">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Tahun Beli:</label>
                  <input class="form-control" type="text" name="tahun_beli" id="tahun_beli">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Harga Beli:</label>
                  <input class="form-control" type="text" name="harga_beli" id="harga_beli">
                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">Qty:</label>
                  <input class="form-control" type="text" name="qty" id="qty">
                </div>
                  <div class="form-group">
                <label for="exampleInputEmail1">Status:</label>
                  <!-- <input class="form-control" type="text" name="luas" id="luas"> -->
                  <!-- Select Element -->
                 <select id="status" name="status" class="form-control">
                    <option value='0'>-- Pilih Status--</option>
                    <option value="Terpakai">Terpakai</option>
                    <option value="Rusak">Rusak</option>
                    <option value="Lelang">Lelang</option>
                    <option value="Hibah">Hibah</option>
                    <option value="Pinjam">Pinjam</option>
                    <option value="Buang">Buang</option>
                    <option value="Hilang">Hilang</option>
                   
                 </select>
                </div>

                <div class="form-group">
                  <label>Keterangan (optional) :</label>
                  <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Masukkan Keterangan"></textarea>
                </div>
              

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url() ?>aset/ruang"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
      