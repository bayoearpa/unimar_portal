 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Setting Dosen Pengampu</h3>
          </div>
          <div class="box-body">
            <?php echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
           
              ?>
              <table>
                <tr>
                  <td><label for="exampleInputEmail1">Kode Mata Kuliah</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $kdmakul; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Mata Kuliah</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $nm_makul; ?></label></td>
                </tr>
                 <tr>
                  <td><label for="exampleInputEmail1">Semester</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $smt; ?></label></td>
                </tr>
              </table>
              <hr>
              <form action="<?php echo base_url() ?>wdosen/set_dosen_pengampu_smtap" name="form1" id="form1" method="post">
                <input type="hidden" name="kdmakul" id="kdmakul" value="<?php echo $kdmakul; ?>">              
               
                <div class="form-group">
                <label>Pilih Dosen</label>
                <select class="form-control select2" id="dosen" name="dosen" style="width: 50%;">
                  <option selected="selected">Pilih Dosen</option>
                  <?php 
                    foreach ($dosen as $key) {
                      # code...
                   ?>
                  <option value="<?php echo $key->Kode_dosen ?>"><?php echo $key->Nama_dosen ?></option>

                <?php } ?>
                </select>
              </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url() ?>wdosen/ajuan_kuas"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->