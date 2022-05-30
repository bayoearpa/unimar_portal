 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Update data Kuesioner mahasiswa ke Lembaga</h3>
          </div>
          <div class="box-body">
            <?php 
            echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
              ?>
              <form action="<?php echo base_url() ?>lpm/kues_mhslem_prosesupdate" name="form1" id="form1" method="post">
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
                <label for="exampleInputEmail1">Tahun ajaran</label>
                   <input type="text" class="form-control" name="ta" placeholder="contoh : 2021 ganjil = 20211, 2021 genap = 20212">
                </div>


                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Tekan Untuk Mencari</button>
                <a href="<?php echo base_url() ?>baak/"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Status Update</h3>
          </div>
          <div class="box-body">
           <!-- konten -->
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tahun Ajaran</th>
                  <th>Program Studi</th>
                  <th>Tahun ajaran</th>
                  <th>Terakhir Update</th>
                </tr>
                </thead>

                <?php if ($cektabel == null) {
                  # code...
                 ?>
                <tbody>
                  <td colspan="4">Data Belum Ada</td>
                </tbody>
               <?php }else{ ?>
                <tbody>
                  
                </tbody>
              <?php } ?>
               <tfoot>
                <tr>
                  <th>Tahun Ajaran</th>
                  <th>Program Studi</th>
                  <th>Tahun ajaran</th>
                  <th>Terakhir Update</th>
                </tr>
                </tfoot>
              </table>
          </div>
        </div>


      </section>
      <!-- /.content -->