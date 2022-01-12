
          <div class="box-body">
                  <!-- row -->
      <div class="row">
        <div class="col-md-12">

          <!-- konten -->
          <table>
            <tr>
              <td><b>Nama</b></td><td>:</td><td><?php echo $nama; ?></td>
            </tr>
             <tr>
              <td><b>NIM</b></td><td>:</td><td><?php echo $nim; ?></td>
            </tr>
             <tr>
              <td><b>Kelas</b></td><td>:</td><td><?php echo $kelas; ?></td>
            </tr>
             <tr>
              <td><b>Prodi</b></td><td>:</td><td><?php echo $prodi; ?></td>
            </tr>
            
          </table>

         <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                  <tr>
                  <th>Nama Mata Kuliah</th>
                  <th>Nama Dosen</th>
                  <th>Kelas</th>
                  <th>Prodi</th>
                  <th>action</th>
                </tr>
                <?php 
                foreach ($select as $s) {
                 ?>
                <tr>
                  <td><?php echo $s->matkul ?></td>
                  <td><?php echo $s->dosen ?></td>
                  <td><?php echo $s->kelas ?></td>
                  <!-- <span class="label label-success">Approved</span> -->
                  <td><?php echo $s->prodi ?></td>
                  <?php 
                    $kode_ta = $s->kode_ta;
                    $kode_prodi = $s->kode_prodi;
                    $kode_matkul = $s->kode_matkul;
                    $kode_dosen = $s->kode_dosen;
                   ?>

                  <td>
                    <?php 
                    $cek = $kues->cekKues($nim, $kode_ta, $kode_dosen, $kode_matkul);
                      if ($cek > 0) {
                        # code...
                    ?><a href="#"><button type="button" class="btn bg-green btn-flat margin">Sudah diisi</button></a>

                    <?php }else{ ?>
                    <a href="<?php echo base_url() ?>kues/kues_mhdsn_isi/<?php echo $nim ?>/<?php echo $kode_prodi ?>/<?php echo $kode_matkul ?>/<?php echo $kode_dosen ?>"><button type="button" class="btn bg-orange btn-flat margin">Isi Kuesioner</button></a>
                    <?php } ?>
                  </td>
                </tr>
              <?php } ?>
              </tbody></table>
            </div>
          
          <!-- /.konten -->
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
          </div>
          <!-- /.box-body -->
      