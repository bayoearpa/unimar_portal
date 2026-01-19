 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Ujian Susulan</h3>
          </div>
          <div class="box-body">
            <!-- konten -->
            <form name="form1" id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>proses_smta">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIM</label>
                      <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" value="<?php echo $nim; ?>" style="width:50%;" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama; ?>" style="width:50%;" readonly>
                    </div>
                   
                     <div class="form-group">
                      <label for="exampleInputPassword1">Program Studi</label>
                      <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" placeholder="Program Studi" value="<?php echo $prodi ?>" style="width:70%;" readonly>
                      <input type="hidden" class="form-control" id="prodi" name="prodi" placeholder="Program Studi" value="<?php echo $kode_prodi ?>" style="width:70%;" readonly>
                    </div> 

                     <div class="form-group">
                      <label for="exampleInputPassword1">Semester (Wajib Isi)</label>
                      <input type="text" class="form-control" id="smt" name="smt" placeholder="Semester" style="width:50%;">
                    </div>            
                </div>
                
                  <div class="col-md-12">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">Pilihlah Mata Kuliah yang akan di daftarkan!</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body no-padding">

                        <table class="table table-condensed">
                          <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th style="width: 60px">Kode Makul</th>
                            <th style="width: 60px">Nama Mata Kuliah</th>
                            <th style="width: 40px">SKS</th>
                            <th style="width: 40px">Tahun Ajaran</th>
                          </tr>
                          <?php foreach($catar as $c){    ?>
                          <tr>
                            <td><input type="checkbox" name="makul[]" data-tahunajaran="<?php  echo $c->taa ?>" value="<?php  echo $c->kode_makul ?>" onclick="hitungTahunAjaran()" class="minimal"></td>
                            <td><?php echo $c->kode_makul; ?></td>
                            <td><?php echo $c->makul; ?></td>
                            <td><?php echo $c->sks; ?></td>
                            <td><?php echo $c->taa; ?></td>
                          </tr>
                          <?php } ?> 
                        </tbody></table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <input type="hidden" name="jumlah_tahun_ajaran" id="jumlah_tahun_ajaran" value="">
                    <div class="box-footer">
                    <!-- <input type="submit" class="btn btn-primary" value="Simpan"> -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
                  </div>
       <!-- /.konten -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->