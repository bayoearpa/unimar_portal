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
                  <td><label for="exampleInputEmail1">Judul</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->karya; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Penguji 1</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->pembimbing1; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Penguji 2</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->pembimbing2; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Penguji 3</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->pembimbing3; ?></label></td>
                </tr>
              </table>
               <div class="form-group">
              <label for="exampleInputEmail1">Keterangan :</label>
              <a class="btn btn-warning btn-sm" href="#"><i class="fa fa-gear"></i></a>Kliring di PROSES,
              <a class="btn btn-success btn-sm" href="#"><i class="fa fa-check"></i></a>Kliring di ACC,
              <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-close"></i></a>Kliring di TOLAK
              </div>
              <!-- /data diri -->
              <?php //echo $kd_jenjang; ?>
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
                <tr>
                  <td>2.</td>
                  <td>BAAK</td>
                  <td>
                    <?php echo $baak_ket; ?>
                  </td>
                  <td><?php echo $baak_label; ?></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Keuangan</td>
                  <td>
                    <?php echo $bk_ket; ?>
                  </td>
                  <td><?php echo $bk_label; ?></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Penempatan Praktek</td>
                  <td>
                    <?php echo $ppk_ket; ?>
                  </td>
                  <td><?php echo $ppk_label; ?></td>
                </tr>
                <?php if ($c->jenjang == '2') { ?>
                
                  <tr>
                  <td>5.</td>
                  <td>Wali Dosen</td>
                  <td>
                    <?php echo $wdosen_ket; ?>
                  </td>
                  <td><?php echo $wdosen_label; ?></td>
                </tr>
               <?php } ?>
               <tr>
                  <td colspan="4">
                    <?php 

                    if ($cek_nost == 1) { ?>
                     <?php if ($kd_prodi == "61201"){ ?>
                        <a class="btn btn-warning btn-sm" href="<?php echo base_url().'cetakberitaacaras1/'.$c->id_uks;?>"><span class="glyphicon glyphicon-print"> </span>Cetak Berita Acara(Proposal Skripsi)</a>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url().'cetaksurattugass1/'.$c->id_uks;?>"><span class="glyphicon glyphicon-print"> </span>Cetak Surat Tugas(Proposal Skripsi)</a>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url().'cetakberitaacaras1sk/'.$c->id_uks;?>"><span class="glyphicon glyphicon-print"> </span>Cetak Berita Acara (Skripsi)</a>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url().'cetaksurattugass1sk/'.$c->id_uks;?>"><span class="glyphicon glyphicon-print"> </span>Cetak Surat Tugas(Skripsi)</a>
                      <?php }else{ ?>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url().'cetakberitaacarad3/'.$c->id_uks;?>"><span class="glyphicon glyphicon-print"> </span>Cetak Berita Acara(Karya Tulis)</a>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url().'cetaksurattugasd3/'.$c->id_uks;?>"><span class="glyphicon glyphicon-print"> </span>Cetak Surat Tugas(Karya Tulis)</a>
                      <?php
                      # code...
                    }}else{
                     ?>
                    <!--  <form action="<?php //echo base_url() ?>klaim" name="form1" id="form1" method="post">
                     <input type="hidden" name="id_uks" id="id_uks" value="<?php //echo $c->id_uks; ?>">
                     <input type="submit" class="btn btn-primary" value="Klaim untuk mendapatkan surat ujian"></input>
                    </form> -->
                    <a class="btn btn-primary btn-sm" href="<?php echo base_url().'klaim/'.$c->id_uks;?>">Klaim untuk mendapatkan surat ujian (pastikan semua sudah di acc)</a>
                   <?php } ?>
                  </td>
                 
                </tr>
                 
              </table>

              <?php }} ?>
