     <?php 
if ($catar==null) {
  
  echo "<div class='alert alert-danger'>Data Tidak Ditemukan.</div>";
}else{
 foreach($catar as $c){  ?>
              <!-- data diri -->
               <table class="table">
                <tr>
                  <td width="10%"><label for="exampleInputEmail1">NIM</label></td>
                  <td width="5%"><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->nim; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Nama</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $nama; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Prodi</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $prodi; ?></label></td>
                </tr>
              
              </table>
               <div class="form-group">
              <label for="exampleInputEmail1">Keterangan :</label>
              <a class="btn btn-warning btn-sm" href="#"><i class="fa fa-gear"></i></a>Kliring di PROSES,
              <a class="btn btn-success btn-sm" href="#"><i class="fa fa-check"></i></a>Kliring di ACC,
              <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-close"></i></a>Kliring di TOLAK
              </div>
              <!-- /data diri -->
              <table class="table table-bordered">
                <tr>
                  <td><b>Syarat</b></td>
                  <td><b>Keterangan</b></td>
                  <td><b>Hasil</b></td>
                </tr>
                <tr>
                  <td>Maksimal 9 SKS</td>
                  <?php if ($jml_sks_temp > 9) { ?>
                  <td>SKS tidak memenuhi syarat karena lebih dari 9 sks yang ditentukan</td>
                  <td> <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-close"></i></a></td>
                  <?php
                   # code...
                  }else{ ?>
                  <td>SKS memenuhi syarat yang ditentukan</td>
                  <td><a class="btn btn-success btn-sm" href="#"><i class="fa fa-check"></i></a></td>
                <?php } ?>
                </tr>
                <tr>
                  <td>Peserta Min. 5 orang</td>
                  <td>jika belum di acc harap menghubungi PRODI agar di acc, Perhatikan tabel dibawah untuk melihat kuota terkini</td>
                  <td><?php echo $sudahmasukkuota; ?></td>
                </tr>
               <!--  <tr>
                  <td colspan="3" align="center"><a href="<?php// echo base_url() ?>semestera"><button type="button" class="btn bg-red margin"><i class="fa fa-trash"></i>Reset Pengajuan</button></a></td>
                </tr> -->
                </table>

                <table class="table table-bordered">
                  <tr>
                    <td><b>Mata Kuliah</b></td>
                    <td><b>SKS</b></td>
                    <td><b>Kuota Peserta Terkini (Maks. 10 Orang)</b></td>
                  </tr>
                 
                    <?php 
                      foreach ($list_makul_temp as $keyz) { ?>
                        <tr>
                        <td><?php echo $keyz->nama_makul; ?></td>
                        <td><?php echo $keyz->sks;?></td>
                        <td><?php 
                          echo $kliring->countkuotakelas($keyz->kd_makul);
                         ?></td>
                        </tr>
                      <?php
                      # code...
                      }
                     ?>
                  
                </table>

                 <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Bagian</th>
                  <th>Keterangan</th>
                  <th style="width: 40px">Label</th>
                </tr>
               <!--  <tr>
                  <td>1.</td>
                  <td>Mahatar</td>
                  <td>
                    <?php //echo $mahatar_ket; ?>
                  </td>
                  <td><?php //echo $mahatar_label; ?></td>
                </tr> -->
                <!--<tr>-->
                <!--  <td>1.</td>-->
                <!--  <td>BAAK</td>-->
                <!--  <td>-->
                <!--    <?php //echo $baak_ket; ?>-->
                <!--  </td>-->
                <!--  <td><?php //echo $baak_label; ?></td>-->
                <!--</tr> -->
                <tr>
                  <td>1.</td>
                  <td>Keuangan</td>
                  <td>
                    <?php echo $bk_ket; ?>
                  </td>
                  <td><?php echo $bk_label; ?></td>
                </tr>
                  <tr>
                  <td>2.</td>
                  <td>Prodi</td>
                  <td>
                    <?php echo $prodi_ket; ?>
                  </td>
                  <td><?php echo $prodi_label; ?></td>
                </tr>
                 
              </table>

            

              <?php }}?>
    <!-- /.cari -->
        
      