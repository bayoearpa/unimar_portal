 <?php 
if ($catar==null) {
  echo $catar;
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
                  <td><label for="exampleInputEmail1">Semester</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->smt_now; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Kelas</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo strtoupper($c->kelas); ?></label></td>
                </tr>
                <tr>
                  <td colspan="3">
                    <div class="callout callout-info">
                      <p>Jika terdapat kesalahan pada data diri dapat melakukan edit pada tombol di bawah ini:</p>
                      <button type="button" class="btn btn-block btn-success btn-flat btn-sm" style="width: 25%">Edit Data Diri</button>
                    </div>
                  </td>
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
                  <th style="width: 10px">#</th>
                  <th>Bagian</th>
                  <th>Keterangan</th>
                  <th style="width: 40px">Label</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Mahatar</td>
                  <td>
                    <?php echo $mahatar_ket; ?>
                  </td>
                  <td><?php echo $mahatar_label; ?></td>
                </tr>
                <!--<tr>-->
                <!--  <td>2.</td>-->
                <!--  <td>BAAK</td>-->
                <!--  <td>-->
                <!--    <?php //echo $baak_ket; ?>-->
                <!--  </td>-->
                <!--  <td><?php //echo $baak_label; ?></td>-->
                <!--</tr>-->
                <tr>
                  <td>2.</td>
                  <td>Keuangan</td>
                  <td>
                    <?php echo $bk_ket; ?>
                  </td>
                  <td><?php echo $bk_label; ?></td>
                </tr>
                  <tr>
                  <td>3.</td>
                  <td>Prodi</td>
                  <td>
                    <?php echo $prodi_ket; ?>
                  </td>
                  <td><?php echo $prodi_label; ?></td>
                </tr>
            <!--    <tr>
                  <td colspan="4">
                    <?php 

                    //if ($cek_nost == 1) { ?>
                      <?php //if ($kd_jenjang = "C"){ ?>
                        <a class="btn btn-warning btn-sm" href="<?php //echo base_url().'cetakberitaacaras1/'.$c->id_uks;?>"><span class="glyphicon glyphicon-print"> </span>Cetak Berita Acara(Proposal Skripsi)</a>
                      <a class="btn btn-warning btn-sm" href="<?php // echo base_url().'cetaksurattugass1/'.$c->id_uks;?>"><span class="glyphicon glyphicon-print"> </span>Cetak Surat Tugas(Proposal Skripsi)</a>
                      <a class="btn btn-warning btn-sm" href="<?php //echo base_url().'cetakberitaacaras1sk/'.$c->id_uks;?>"><span class="glyphicon glyphicon-print"> </span>Cetak Berita Acara (Skripsi)</a>
                      <a class="btn btn-warning btn-sm" href="<?php //echo base_url().'cetaksurattugass1sk/'.$c->id_uks;?>"><span class="glyphicon glyphicon-print"> </span>Cetak Surat Tugas(Skripsi)</a>
                      <?php //}else{ ?>
                      <a class="btn btn-warning btn-sm" href="<?php //echo base_url().'cetakberitaacarad3/'.$c->id_uks;?>"><span class="glyphicon glyphicon-print"> </span>Cetak Berita Acara(Karya Tulis)</a>
                      <a class="btn btn-warning btn-sm" href="<?php //echo base_url().'cetaksurattugasd3/'.$c->id_uks;?>"><span class="glyphicon glyphicon-print"> </span>Cetak Surat Tugas(Karya Tulis)</a>
                      <?php 
                      # code...
                   // }}else{
                     ?>
                    <!-- ini memang di bann  <form action="<?php //echo base_url() ?>klaim" name="form1" id="form1" method="post">
                     <input type="hidden" name="id_uks" id="id_uks" value="<?php //echo $c->id_uks; ?>">
                     <input type="submit" class="btn btn-primary" value="Klaim untuk mendapatkan surat ujian"></input>
                    </form> -->
                  <!--   <a class="btn btn-primary btn-sm" href="<?php //echo base_url().'klaim/'.$c->id_uks;?>">Klaim untuk mendapatkan surat ujian (pastikan semua sudah di acc)</a>
                   <?php } ?>
                  </td>
                 
                </tr> --> 
                 
              </table>

              <?php } ?>
