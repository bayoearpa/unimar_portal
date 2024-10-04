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
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="control-label">Nim</label>

                    <div class="col-sm-10">
                      <label for="inputName" class="control-label"><?php echo $k->nim ?></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="control-label">Nama</label>

                    <div class="col-sm-10">
                      <label for="inputName" class="control-label"><?php echo $k->nama ?></label>
                    </div>
                  </div>
                  </form>           
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
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="laponboard">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->

        <?php } ?>