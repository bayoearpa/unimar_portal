 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Set Pengampu Semester Antara</h3>
          </div>
          <div class="box-body">
            <?php echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
              ?>
              <form action="<?php echo base_url() ?>wdosen/search_smta_pengampup" name="form1" id="form1" method="post">
                <div class="form-group">
                <label for="exampleInputEmail1">Pilih Prodi</label>
                   <select class="form-control" name="prodi" id="prodi">
                    <option> </option>
                    <option value="92401">D3 Ketatalaksanaan Pelayaran Niaga dan Kepelabuhanan</option>
                    <option value="92402">D3 Teknika</option>
                    <option value="92403">D3 Nautika</option>
                    <option value="61201">S1 Transportasi</option>
                    <option value="21207">S1 Teknik Transportasi Laut</option>
                    <option value="21201">S1 Teknik Mesin</option>
                    <option value="13241">S1 Teknik Keselamatan</option>
                    <option value="94205">S1 Perdagangan Internasional</option>
                  </select>
                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">Pilih Semester</label>
                   <select class="form-control" name="semester" id="semester">
                    <option> </option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
                </div>


                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Tekan Untuk Mencari</button>
                <a href="<?php echo base_url() ?>wdosen/"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->