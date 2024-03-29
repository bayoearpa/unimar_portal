 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Ruang</h3>
          </div>
          <div class="box-body">
            <?php echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
              ?>
              <form action="<?php echo base_url() ?>aset/pi_ruang" name="form1" id="form1" method="post">
                <div class="form-group">
                <label for="exampleInputEmail1">Kode Ruang:</label>
                  <input class="form-control" type="text" name="kode_ruangan" id="kode_ruangan">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Nama Ruang:</label>
                  <input class="form-control" type="text" name="nama_ruang" id="nama_ruang">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Gedung:</label>
                  <!-- <input class="form-control" type="text" name="luas" id="luas"> -->
                  <!-- Select Element -->
                 <select id="gedung" name="gedung">
                    <option value='0'>-- Pilih Gedung --</option>
                    <?php foreach ($gedung as $key) {
                      # code... ?>
                      <option value='<?php echo $key->id_gedung ?>'><?php echo $key->nama_gedung; ?></option>
                    <?php } ?>
                 </select>
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
      