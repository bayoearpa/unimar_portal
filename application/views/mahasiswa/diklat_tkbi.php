 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Registration of English Achievement</h3>
          </div>
          <div class="box-body">

             <table width="30%">
                <tr>
                  <td><label for="exampleInputEmail1">NIM</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->nim; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Nama</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->nama; ?></label></td>
                </tr>
                 <tr>
                  <td><label for="exampleInputEmail1">Tanggal Lahir</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->tgll; ?></label></td>
                </tr>
                 <tr>
                  <td><label for="exampleInputEmail1">Alamat</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->alamat; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Jenis Kelamin</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $valjk = ($c->jk == 'L') ? "Laki-laki" : "Perempuan" ; ?></label></td>
                </tr>
              </table>
              <hr>


             <?php 
             
              if ($cekstatus_double > "0") {
              # code... ?>
                <!-- peringatan jika sudah pernah Mendaftar  -->
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Anda Sudah Mendaftar 
                </div>
            <!-- end peringatan jika sudah pernah Mendaftar  -->
          <?php }elseif ($cek_periode > "0") {
            # code... ?>
             <?php 
            // echo validation_errors(); 
            // echo $this->session->flashdata('success');
            // echo $this->session->flashdata('error');
            foreach($mhs_detail as $c){ 
              ?>
             
              <form action="<?php echo base_url() ?>mahasiswa/tkbip" name="form1" id="form1" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_kelas" id="id_kelas" value="<?php echo $id_kelas; ?>">
                <input type="hidden" name="nim" id="nim" value="<?php echo $c->nim; ?>">
                 <div class="form-group">
                   <div class="form-group">
                        <label for="editnamakapal">email (Pastikan email aktif):</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="editnamakapal">No Whatsapp : (Pastikan No. WA masih aktif)</label>
                        <input type="text" class="form-control" id="no_wa" name="no_wa">
                    </div>
                     <div class="form-group">
                        <label for="editstatonboard">Pilih Model Pembayaran:</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="tf_btn" name="tf_btn" value="tf_btn">
                            <label class="form-check-label" for="valstatonboard">Transfer BTN</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="qris" name="qris" value="qris">
                            <label class="form-check-label" for="valstatonboard">QRIS</label>
                        </div>
                    </div>
                  </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                
                 <!-- .cek status laporan -->



         <?php } ?>
          
                <?php }else{ ?>
                <!-- peringatan jika periode belum dibuka  -->
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Periode Pendafataran English Achievement belum dibuka
                </div>
            <!-- end peringatan jika periode belum dibuka  -->

              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->