 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Pencarian Mahasiswa dengan NRP/NIM UJIAN SUSULAN</h3>
          </div>
          <div class="box-body">
            <?php echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
              ?>
              <form action="<?php echo base_url() ?>bk/search_us_nim_cari" name="form1" id="form1" method="post">
                <div class="form-group">
                <label for="exampleInputEmail1">Masukan NRP/NIM untuk mencari Mahasiswa atau Taruna :</label>
                 <input type="text" name="nim" id="nim" class="form-control">
                </div>


                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Tekan Untuk Mencari</button>
                <a href="<?php echo base_url() ?>bk/search_uas_nim"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->