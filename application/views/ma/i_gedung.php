 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Gedung</h3>
          </div>
          <div class="box-body">
            <?php echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
              ?>
              <form action="<?php echo base_url() ?>aset/pi_gedung" name="form1" id="form1" method="post">
                <div class="form-group">
                <label for="exampleInputEmail1">Nama Gedung:</label>
                  <input class="form-control" type="text" name="nama_gedung" id="nama_gedung">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Luas:</label>
                  <input class="form-control" type="text" name="luas" id="luas">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Tahun Pembelian:</label>
                  <input class="form-control" type="text" name="tahun_p" id="tahun_p">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Biaya Pembelian:</label>
                  <input class="form-control" type="text" name="biaya_p" id="biaya_p">
                </div>
               
              <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>">
                <div class="form-group">
                  <label>Keterangan :</label>
                  <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Masukkan Keterangan"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url() ?>aset/gedung"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->