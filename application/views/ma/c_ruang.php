 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Cetak QR Code Per Ruang</h3>
          </div>
          <div class="box-body">
            <?php echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
              ?>
              <form action="<?php echo base_url() ?>aset/pdf_qr_ruang" name="form1" id="form1" method="post">
                
                 <div class="form-group">
                <label for="exampleInputEmail1">Ruang:</label>
                  <!-- <input class="form-control" type="text" name="luas" id="luas"> -->
                  <!-- Select Element -->
                  <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>">
                 <select id="ruang" name="ruang" class="form-control">
                    <option value='0'>-- Pilih Ruang --</option>
                    <?php foreach ($ruang as $key) {
                      # code... ?>
                      <option value='<?php echo $key->kd_ruang ?>'><?php echo $key->nama_ruang; ?></option>
                    <?php } ?>
                 </select>
                </div>

                <button type="submit" class="btn btn-primary">Cetak</button>
                </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
      