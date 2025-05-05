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
                <?php foreach ($result1 as $key) {
                  # code...
                  echo $key->lap_onboard1;
                } ?>
                <tbody>
                <tr>
                  <td>Laporan Ke.1</td>
                  <td>File</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>Laporan Ke.2</td>
                  <td>File</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>Laporan Ke.3</td>
                  <td>File</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>Laporan Ke.4</td>
                  <td>File</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>Laporan Ke.5</td>
                  <td>File</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>Laporan Ke.6</td>
                  <td>File</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>Laporan Ke.7</td>
                  <td>File</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>Laporan Ke.8</td>
                  <td>File</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>Laporan Ke.9</td>
                  <td>File</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>Laporan Ke.10</td>
                  <td>File</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>Laporan Ke.11</td>
                  <td>File</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>Laporan Ke.12</td>
                  <td>File</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
              </tbody></table>
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