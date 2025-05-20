 <?php 
foreach ($results as $k) {
  # code... ?>
 <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Aktifitas</a></li>
              <li><a href="#onboard" data-toggle="tab">Onboard</a></li>
              <li><a href="#laponboard" data-toggle="tab">Lap. Onboard</a></li>
              <li><a href="#offboard" data-toggle="tab">Offboard</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <table>
                  <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><b><?php echo $k->nim ?></b></td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><b><?php echo $k->nama ?></b></td>
                  </tr>
                  <tr>
                    <td>Program Studi</td>
                    <td>:</td>
                    <td><b><?php echo $k->prodi ?></b></td>
                  </tr>
                </table> 
                <br>     
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          Alur AKtifitas Kepelautan
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-green"></i>

                    <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">Perkuliahan</a> Sudah menyelesaikan perkuliahan D3</h3>
                     <!--  <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div> -->
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                   <?php 
                    if ($ppk->cekstatus("status_prada","sudah", $k->nim) > 0) {
                      # code...?>
                  <li>
                    <i class="fa fa-user bg-green"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header no-border"><a href="#">Prada</a> Sudah Melakukan Prada
                      </h3>
                    </div>
                  </li>
                    <?php }else{?>
                      <li>
                    <i class="fa fa-user bg-red"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header no-border"><a href="#">Prada</a> Belum Melakukan Prada
                      </h3>
                    </div>
                  </li>
                    <?php } ?>
                 
                  <!-- END timeline item -->
                  <!-- timeline item -->
                   <?php 
                  if ($ppk->cekstatus("status_d3","sudah", $k->nim) > 0) {
                    # code...?>
                   <li>
                    <i class="fa fa-user bg-green"></i>

                    <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">Lulus D3</a> Sudah menyelesaikan </h3>
                    </div>
                  </li>
                  <?php }else{?>
                  <li>
                    <i class="fa fa-user bg-red"></i>

                    <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">Lulus D3</a> Belum menyelesaikan </h3>
                    </div>
                  </li>
                  <?php } ?>
                 
                  <!-- END timeline item -->
                  <!-- timeline item -->
                   <?php 
                    if ($ppk->cekstatus("pra_status","sudah", $k->nim) > 0) {
                      # code...?>
                      <li>
                        <i class="fa fa-user bg-green"></i>
                        <div class="timeline-item">
                          <h3 class="timeline-header"><a href="#">Ujian Pra Prala</a> Sudah menyelesaikan </h3>
                        </div>
                      </li>
                    <?php }else{?>
                      <li>
                        <i class="fa fa-user bg-red"></i>
                        <div class="timeline-item">
                          <h3 class="timeline-header"><a href="#">Ujian Pra Prala</a> belum menyelesaikan </h3>
                        </div>
                      </li>
                    <?php } ?>
                  
                  <!-- END timeline item -->
                   <!-- timeline item -->
                   <?php 
                    if ($ppk->cekstatus("status_sb","iya", $k->nim) > 0) {
                      # code...?>
                      <li>
                        <i class="fa fa-user bg-green"></i>
                        <div class="timeline-item">
                          <h3 class="timeline-header"><a href="#">Stand By</a> Taruna dalam keadaan stand by di darat</h3>
                        </div>
                      </li>
                    <?php }else{?>
                       <li>
                        <i class="fa fa-user bg-red"></i>
                        <div class="timeline-item">
                          <h3 class="timeline-header"><a href="#">Stand By</a> Taruna tidak dalam keadaan stand by di darat</h3>
                        </div>
                      </li>
                    <?php } ?>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <?php 
                  if ($ppk->cekstatus("status_onboard","iya", $k->nim) > 0 || $mahasiswa->cekstatus("status_onboard","tidak", $nim) > 0 ) {
                    # code...?>
                    <li>
                    <i class="fa fa-user bg-green"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">Onboard</a> Sudah/sedang melaksanakan </h3>
                    </div>
                  </li>
                  <?php }else{?>
                    <li>
                    <i class="fa fa-user bg-red"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">Onboard</a> Belum melaksanakan </h3>
                    </div>
                  </li>
                  <?php } ?>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <?php 
                  if ($ppk->cekstatus("status_offboard","iya", $k->nim) > 0) {
                    # code...?>
                     <li>
                    <i class="fa fa-user bg-red"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">Offboard</a> Sudah/sedang melaksanakan </h3>
                    </div>
                  </li>
                  <?php }else{?>
                     <li>
                    <i class="fa fa-user bg-red"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">Offboard</a> Belum melaksanakan </h3>
                    </div>
                  </li>
                  <?php } ?>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <?php 
                  if ($ppk->cekstatus("status_modeling","sudah", $k->nim) > 0) {
                    # code...?>
                   <li>
                    <i class="fa fa-user bg-green"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">Ujian Modeling</a> Sudah melaksanakan </h3>
                    </div>
                  </li>
                  <?php }else{?>
                  <li>
                    <i class="fa fa-user bg-red"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">Ujian Modeling</a> Belum melaksanakan </h3>
                    </div>
                  </li>
                  <?php } ?>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <?php 
                  if ($ppk->cekstatus("status_trb","sudah", $k->nim) > 0) {
                    # code...?>
                    <li>
                    <i class="fa fa-user bg-green"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">Ujian TRB</a> Sudah melaksanakan </h3>
                    </div>
                  </li>
                  <?php }else{?>
                   <li>
                    <i class="fa fa-user bg-red"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">Ujian TRB</a> Belum Melaksanakan </h3>
                    </div>
                  </li>
                  <?php } ?>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                   <?php 
                    if ($ppk->cekstatus("pasca_status","sudah", $k->nim) > 0) {
                      # code...?>
                       <li>
                    <i class="fa fa-user bg-green"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">Ujian Pasca Prala</a> Sudah melaksanakan </h3>
                    </div>
                  </li>
                    <?php }else{?>
                       <li>
                    <i class="fa fa-user bg-red"></i>
                    <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">Ujian Pasca Prala</a> Belum melaksanakan </h3>
                    </div>
                  </li>
                    <?php } ?>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
                
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="onboard">
               <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">NIM</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name" value="<?php echo $k->nim ?>" readonly="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Nama</label>

                    <div class="col-sm-10">
                       <input type="email" class="form-control" id="inputName" placeholder="Name" value="<?php echo $k->nama ?>" readonly="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Program Studi</label>

                    <div class="col-sm-10">
                       <input type="email" class="form-control" id="inputName" placeholder="Name" value="<?php echo $k->prodi ?>" readonly="">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama Perusahaan</label>

                    <div class="col-sm-10">
                       <input type="email" class="form-control" id="inputName" placeholder="Name" value="<?php echo $k->nama_perusahaan ?>" readonly="">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama Kapal</label>

                    <div class="col-sm-10">
                       <input type="email" class="form-control" id="inputName" placeholder="Name" value="<?php echo $k->nama_kapal ?>" readonly="">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Tanggal Sign On</label>

                    <div class="col-sm-10">
                       <input type="email" class="form-control" id="inputName" placeholder="Name" value="<?php echo $k->tgl_sign_on ?>" readonly="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                       <?php if ($k->upload_file_signon) { ?>
                        <a href="#" class="btn btn-info view-filesignon-button" data-filename="<?php echo $k->upload_file_signon; ?>">Lihat file Sign On</a>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="laponboard">
                <form id="formLaporanOnboard">
                <div class="box-body table-responsive no-padding">
                   <?php foreach ($resultsl as $key) {
                ?>
              <table class="table table-hover">
                <thead>
                <tr>
                  <th>Laporan Ke</th>
                  <th>File</th>
                  <th>Tanggal Upload</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Laporan Ke.1</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard1) { ?>
                        <a href="#" class="btn btn-info view-filelapon1-button" data-filename="<?php echo $key->lap_onboard1; ?>">Lihat file Laporan Onboard bulan 1</a>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon1; ?></td>
                  <td> <div class="form-group">
                        <div class="form-check">
                          <!-- id lapon disini -->
                          <input type="hidden" name="id_lapon" id="id_lapon" value="<?php  echo $key->id_lapon; ?>">
                            <input type="radio" class="form-check-input" id="sudah_lapon1" name="sudah_lapon1" value="sudah">
                            <label class="form-check-label" for="addstatpra">Sudah</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon1" name="sudah_lapon1" value="belum">
                            <label class="form-check-label" for="addstatpra">Belum</label>
                        </div>
                    </div></td>
                  <td>
                    <textarea class="form-control" name="keterangan_lapon1" id="keterangan_lapon1" rows="3" placeholder="Masukkan Keterangan"><?php  echo $key->keterangan_lapon1; ?></textarea></td>
                </tr>
                <tr>
                  <td>Laporan Ke.2</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard2) { ?>
                        <a href="#" class="btn btn-info view-filelapon2-button" data-filename="<?php echo $key->lap_onboard2; ?>">Lihat file Laporan Onboard Bulan 2</a>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon2; ?></td>
                  <td><div class="form-group">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon2" name="sudah_lapon2" value="sudah">
                            <label class="form-check-label" for="addstatpra">Sudah</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon2" name="sudah_lapon2" value="belum">
                            <label class="form-check-label" for="addstatpra">Belum</label>
                        </div>
                    </div></td>
                  <td><textarea class="form-control" name="keterangan_lapon2" id="keterangan_lapon2" rows="3" placeholder="Masukkan Keterangan"><?php  echo $key->keterangan_lapon2; ?></textarea></td></td>
                </tr>
                <tr>
                  <td>Laporan Ke.3</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard3) { ?>
                        <a href="#" class="btn btn-info view-filelapon3-button" data-filename="<?php echo $key->lap_onboard3; ?>">Lihat file Laporan Onboard Bulan 3</a>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon3; ?></td>
                  <td><div class="form-group">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon3" name="sudah_lapon3" value="sudah">
                            <label class="form-check-label" for="addstatpra">Sudah</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon3" name="sudah_lapon3" value="belum">
                            <label class="form-check-label" for="addstatpra">Belum</label>
                        </div>
                    </div></td>
                  <td><textarea class="form-control" name="keterangan_lapon3" id="keterangan_lapon3" rows="3" placeholder="Masukkan Keterangan"><?php  echo $key->keterangan_lapon4; ?></textarea></td></td>
                </tr>
                <tr>
                  <td>Laporan Ke.4</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard4) { ?>
                        <a href="#" class="btn btn-info view-filelapon4-button" data-filename="<?php echo $key->lap_onboard4; ?>">Lihat file Laporan Onboard Bulan 4 </a>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon4; ?></td>
                  <td><div class="form-group">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon4" name="sudah_lapon4" value="sudah">
                            <label class="form-check-label" for="addstatpra">Sudah</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon4" name="sudah_lapon4" value="belum">
                            <label class="form-check-label" for="addstatpra">Belum</label>
                        </div>
                    </div></td>
                  <td><textarea class="form-control" name="keterangan_lapon4" id="keterangan_lapon4" rows="3" placeholder="Masukkan Keterangan"><?php  echo $key->keterangan_lapon4; ?></textarea></td></td>
                </tr>
                <tr>
                  <td>Laporan Ke.5</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard5) { ?>
                        <a href="#" class="btn btn-info view-filelapon5-button" data-filename="<?php echo $key->lap_onboard5; ?>">Lihat file Laporan Onboard Bulan 5</a>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon5; ?></td>
                  <td><div class="form-group">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon5" name="sudah_lapon5" value="sudah">
                            <label class="form-check-label" for="addstatpra">Sudah</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon5" name="sudah_lapon5" value="belum">
                            <label class="form-check-label" for="addstatpra">Belum</label>
                        </div>
                    </div></td>
                  <td><textarea class="form-control" name="keterangan_lapon5" id="keterangan_lapon5" rows="3" placeholder="Masukkan Keterangan"><?php  echo $key->keterangan_lapon5; ?></textarea></td></td>
                </tr>
                <tr>
                  <td>Laporan Ke.6</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard6) { ?>
                       <a href="#" class="btn btn-info view-filelapon6-button" data-filename="<?php echo $key->lap_onboard6; ?>">Lihat file Laporan Onboard Bulan 6</a>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon6; ?></td>
                  <td><div class="form-group">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon6" name="sudah_lapon6" value="sudah">
                            <label class="form-check-label" for="addstatpra">Sudah</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon6" name="sudah_lapon6" value="belum">
                            <label class="form-check-label" for="addstatpra">Belum</label>
                        </div>
                    </div></td>
                  <td><textarea class="form-control" name="keterangan_lapon6" id="keterangan_lapon6" rows="3" placeholder="Masukkan Keterangan"><?php  echo $key->keterangan_lapon6; ?></textarea></td></td>
                </tr>
                <tr>
                  <td>Laporan Ke.7</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard7) { ?>
                        <a href="#" class="btn btn-info view-filelapon7-button" data-filename="<?php echo $key->lap_onboard7; ?>">Lihat file Laporan Onboard Bulan 7</a>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon7; ?></td>
                  <td><div class="form-group">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon7" name="sudah_lapon7" value="sudah">
                            <label class="form-check-label" for="addstatpra">Sudah</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon7" name="sudah_lapon7" value="belum">
                            <label class="form-check-label" for="addstatpra">Belum</label>
                        </div>
                    </div></td>
                  <td><textarea class="form-control" name="keterangan_lapon7" id="keterangan_lapon7" rows="3" placeholder="Masukkan Keterangan"><?php  echo $key->keterangan_lapon7; ?></textarea></td></td>
                </tr>
                <tr>
                  <td>Laporan Ke.8</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard8) { ?>
                        <a href="#" class="btn btn-info view-filelapon8-button" data-filename="<?php echo $key->lap_onboard8; ?>">Lihat file Laporan Onboard Bulan 8</a>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon8; ?></td>
                  <td><div class="form-group">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon8" name="sudah_lapon8" value="sudah">
                            <label class="form-check-label" for="addstatpra">Sudah</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon8" name="sudah_lapon8" value="belum">
                            <label class="form-check-label" for="addstatpra">Belum</label>
                        </div>
                    </div></td>
                  <td><textarea class="form-control" name="keterangan_lapon8" id="keterangan_lapon8" rows="3" placeholder="Masukkan Keterangan"><?php  echo $key->keterangan_lapon8; ?></textarea></td></td>
                </tr>
                <tr>
                  <td>Laporan Ke.9</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard9) { ?>
                       <a href="#" class="btn btn-info view-filelapon9-button" data-filename="<?php echo $key->lap_onboard9; ?>">Lihat file Laporan Onboard Bulan 9</a>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon9; ?></td>
                  <td><div class="form-group">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon9" name="sudah_lapon9" value="sudah">
                            <label class="form-check-label" for="addstatpra">Sudah</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon9" name="sudah_lapon9" value="belum">
                            <label class="form-check-label" for="addstatpra">Belum</label>
                        </div>
                    </div></td>
                  <td><textarea class="form-control" name="keterangan_lapon9" id="keterangan_lapon9" rows="3" placeholder="Masukkan Keterangan"><?php  echo $key->keterangan_lapon9; ?></textarea></td></td>
                </tr>
                <tr>
                  <td>Laporan Ke.10</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard10) { ?>
                        <a href="#" class="btn btn-info view-filelapon10-button" data-filename="<?php echo $key->lap_onboard10; ?>">Lihat file Laporan Onboard Bulan 10</a>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon10; ?></td>
                  <td><div class="form-group">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon10" name="sudah_lapon10" value="sudah">
                            <label class="form-check-label" for="addstatpra">Sudah</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon10" name="sudah_lapon10" value="belum">
                            <label class="form-check-label" for="addstatpra">Belum</label>
                        </div>
                    </div></td>
                  <td><textarea class="form-control" name="keterangan_lapon10" id="keterangan_lapon10" rows="3" placeholder="Masukkan Keterangan"><?php  echo $key->keterangan_lapon10; ?></textarea></td></td>
                </tr>
                <tr>
                  <td>Laporan Ke.11</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard11) { ?>
                       <a href="#" class="btn btn-info view-filelapon11-button" data-filename="<?php echo $key->lap_onboard11; ?>">Lihat file Laporan Onboard Bulan 11</a>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon11; ?></td>
                  <td><div class="form-group">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon11" name="sudah_lapon11" value="sudah">
                            <label class="form-check-label" for="addstatpra">Sudah</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon11" name="sudah_lapon11" value="belum">
                            <label class="form-check-label" for="addstatpra">Belum</label>
                        </div>
                    </div></td>
                  <td><textarea class="form-control" name="keterangan_lapon11" id="keterangan_lapon11" rows="3" placeholder="Masukkan Keterangan"><?php  echo $key->keterangan_lapon11; ?></textarea></td></td>
                </tr>
                <tr>
                  <td>Laporan Ke.12</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard12) { ?>
                        <a href="#" class="btn btn-info view-filelapon12-button" data-filename="<?php echo $key->lap_onboard12; ?>">Lihat file Laporan Onboard Bulan 12</a>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon12; ?></td>
                  <td><div class="form-group">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon12" name="sudah_lapon12" value="sudah">
                            <label class="form-check-label" for="addstatpra">Sudah</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="sudah_lapon12" name="sudah_lapon12" value="belum">
                            <label class="form-check-label" for="addstatpra">Belum</label>
                        </div>
                    </div></td>
                  <td><textarea class="form-control" name="keterangan_lapon12" id="keterangan_lapon12" rows="3" placeholder="Masukkan Keterangan"><?php  echo $key->keterangan_lapon12; ?></textarea></td></td>
                </tr>
              </tbody></table>
              <button type="submit" class="btn btn-primary">Simpan</button> 
              <div id="notifikasi" class="mt-2"></div>
              </form>
            <?php } ?>
            </div>
            
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->

        <?php } ?>