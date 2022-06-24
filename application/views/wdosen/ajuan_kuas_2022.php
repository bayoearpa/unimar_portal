 <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Ajuan Kliring UAS</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                  <div class="box-body">
                  <div class="form-group">
                      <form method="post" action="<?php echo base_url() ?>bk/ajuan_kuas2022p">
                      <label> Pilih Program Studi*
                    </label>
                    <select name="prodi" id="prodi" class="form-control" style="width:50%;">  
                    <option selected>== Pilih ==</option>
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
                  <label>Tahun Masuk*</label>
                  <input type="text" class="form-control autocomplete" id="tahun_masuk" name="tahun_masuk" style="width: 40%;" placeholder="diisi dengan tahun masuk">
                  </div>
                  <div class="form-group">
                  <label>kelas</label>
                  <input type="text" class="form-control autocomplete" id="kelas" name="kelas" style="width: 40%;" placeholder="contoh : A, B, C dst..">
                  </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-block btn-success" id="cari" name="cari" style="width:20%;" value="Cek">
                    </div>
                  </form>
                  
                 <div id="results"></div><!-- /.div result -->
         
              </div><!-- /.box -->
        </div>