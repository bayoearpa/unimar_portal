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
              <form action="<?php echo base_url() ?>aset/pi_barang" name="form1" id="form1" method="post">
                <div class="form-group">
                <label for="exampleInputEmail1">Nama Barang:</label>
                  <input class="form-control" type="text" name="nama_barang" id="nama_barang">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Tipe:</label>
                  <!-- <input class="form-control" type="text" name="luas" id="luas"> -->
                  <!-- Select Element -->
                 <select id="tipe" name="tipe" class="form-control">
                    <option value='0'>-- Pilih Tipe--</option>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Mesin">Mesin</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Peraga">Peraga</option>
                    <option value="Perlengkapan">Perlengkapan</option>
                 </select>
                </div>
              

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url() ?>aset/barang"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
      z