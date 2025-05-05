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
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $k->upload_file_signon; ?>">Lihat file Sign On</button>
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

                <div class="box-body table-responsive no-padding">
                   <?php foreach ($resultsl as $key) {
                  echo $key->lap_onboard1;
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
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $key->lap_onboard1; ?>">Lihat file Laporan Onboard 1</button>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon1; ?></td>
                  <td><span class="label label-success">Approved</span></td>
                  <td><?php  echo $key->keterangan_lapon1; ?></td>
                </tr>
                <tr>
                  <td>Laporan Ke.2</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard2) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $key->lap_onboard2; ?>">Lihat file Laporan Onboard 2</button>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon2; ?></td>
                  <td><span class="label label-success">Approved</span></td>
                  <td><?php  echo $key->keterangan_lapon2; ?></td>
                </tr>
                <tr>
                  <td>Laporan Ke.3</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard3) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $key->lap_onboard3; ?>">Lihat file Laporan Onboard 3</button>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon3; ?></td>
                  <td><span class="label label-success">Approved</span></td>
                  <td><?php  echo $key->keterangan_lapon3; ?></td>
                </tr>
                <tr>
                  <td>Laporan Ke.4</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard4) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $key->lap_onboard4; ?>">Lihat file Laporan Onboard 4</button>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon4; ?></td>
                  <td><span class="label label-success">Approved</span></td>
                  <td><?php  echo $key->keterangan_lapon4; ?></td>
                </tr>
                <tr>
                  <td>Laporan Ke.5</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard5) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $key->lap_onboard5; ?>">Lihat file Laporan Onboard 5</button>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon5; ?></td>
                  <td><span class="label label-success">Approved</span></td>
                  <td><?php  echo $key->keterangan_lapon5; ?></td>
                </tr>
                <tr>
                  <td>Laporan Ke.6</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard6) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $key->lap_onboard6; ?>">Lihat file Laporan Onboard 6</button>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon6; ?></td>
                  <td><span class="label label-success">Approved</span></td>
                  <td><?php  echo $key->keterangan_lapon6; ?></td>
                </tr>
                <tr>
                  <td>Laporan Ke.7</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard7) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $key->lap_onboard7; ?>">Lihat file Laporan Onboard 7</button>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon7; ?></td>
                  <td><span class="label label-success">Approved</span></td>
                  <td><?php  echo $key->keterangan_lapon7; ?></td>
                </tr>
                <tr>
                  <td>Laporan Ke.8</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard8) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $key->lap_onboard8; ?>">Lihat file Laporan Onboard 8</button>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon8; ?></td>
                  <td><span class="label label-success">Approved</span></td>
                  <td><?php  echo $key->keterangan_lapon8; ?></td>
                </tr>
                <tr>
                  <td>Laporan Ke.9</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard9) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $key->lap_onboard9; ?>">Lihat file Laporan Onboard 9</button>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon9; ?></td>
                  <td><span class="label label-success">Approved</span></td>
                  <td><?php  echo $key->keterangan_lapon9; ?></td>
                </tr>
                <tr>
                  <td>Laporan Ke.10</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard10) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $key->lap_onboard10; ?>">Lihat file Laporan Onboard 10</button>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon10; ?></td>
                  <td><span class="label label-success">Approved</span></td>
                  <td><?php  echo $key->keterangan_lapon10; ?></td>
                </tr>
                <tr>
                  <td>Laporan Ke.11</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard11) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $key->lap_onboard11; ?>">Lihat file Laporan Onboard 11</button>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon11; ?></td>
                  <td><span class="label label-success">Approved</span></td>
                  <td><?php  echo $key->keterangan_lapon11; ?></td>
                </tr>
                <tr>
                  <td>Laporan Ke.12</td>
                  <td><div class="col-sm-offset-2 col-sm-10">
                       <?php if ($key->lap_onboard12) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $key->lap_onboard12; ?>">Lihat file Laporan Onboard 12</button>
                      <?php } else { ?>
                          <!-- Tampilkan pesan jika file tidak ada -->
                          File tidak tersedia
                      <?php } ?>
                    </div></td>
                  <td><?php  echo $key->date_lapon12; ?></td>
                  <td><span class="label label-success">Approved</span></td>
                  <td><?php  echo $key->keterangan_lapon12; ?></td>
                </tr>
              </tbody></table> 
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