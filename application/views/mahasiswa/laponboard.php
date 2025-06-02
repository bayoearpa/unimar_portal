    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Laporan Onboard Per Bulan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <?php 
             
              if ($mahasiswa->cekstatus('status_sb','tidak', $this->session->userdata('user')) > "0" ) {
              # code... ?>
                <?php  foreach ($mhs_detail as $c) { ?>
                  <p>Sebelum mengisi form laporan Onboard silakan donwload format yang tersedia dibawah ini:</p>
                  <a href="<?php echo base_url() ?>mahasiswa/down_format_laporan_bulanan_onboard" target="__blank"><button type="button" class="btn btn-primary">Download Format Laporan Onboard</button></a>
                           


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class="">
                        Laporan Onboard Bulan Ke-1
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true" style="">
                    <div class="box-body">
                
                          <strong><i class="fa fa-book margin-r-5"></i> Silakan Upload Laporan dibawah ini :</strong>

                          <p class="text-muted">
                           <a href="<?php echo base_url() ?>mahasiswa/laponboardfile/1" target="__blank"><button type="button" class="btn btn-primary">Upload</button></a>
                          </p>

                          <hr>

                          <strong><i class="fa fa-map-marker margin-r-5"></i> Tanggal Upload</strong>

                          <p class="text-muted"><?php if ($c->date_lapon1 == null) {
                              # code...
                            echo "0000-00-00";
                          }else{ echo $c->date_lapon1; } ?></p>

                          <hr>

                          <strong><i class="fa fa-pencil margin-r-5"></i> Status laporan *cek dari Bagian PPK</strong>
                          <p>
                            <?php if ($c->sudah_lapon1 == proses) { ?>
                                <span class="label label-warning">Proses</span>

                            <?php }elseif ($c->sudah_lapon1 == belum) { ?>
                             <span class="label label-danger">Ditolak</span>
                            <?php }else{ ?> 
                            <span class="label label-success">Diterima</span>
                            <?php } ?>
                          </p>

                          <hr>

                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Keterangan dari PPK</strong>

                          <p><?php echo $c->keterangan_lapon1; ?></p>
         
                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false">
                        Laporan Onboard Bulan Ke-2
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                       <strong><i class="fa fa-book margin-r-5"></i> Silakan Upload Laporan dibawah ini :</strong>

                          <p class="text-muted">
                           <a href="<?php echo base_url() ?>mahasiswa/laponboardfile/2" target="__blank"><button type="button" class="btn btn-primary">Upload</button></a>
                          </p>

                          <hr>

                          <strong><i class="fa fa-map-marker margin-r-5"></i> Tanggal Upload</strong>

                          <p class="text-muted"><?php if ($c->date_lapon2 == null) {
                              # code...
                            echo "0000-00-00";
                          }else{ echo $c->date_lapon2; } ?></p>

                          <hr>

                          <strong><i class="fa fa-pencil margin-r-5"></i> Status laporan *cek dari Bagian PPK</strong>
                          <p>
                            <?php if ($c->sudah_lapon2 == proses) { ?>
                                <span class="label label-warning">Proses</span>

                            <?php }elseif ($c->sudah_lapon2 == belum) { ?>
                             <span class="label label-danger">Ditolak</span>
                            <?php }else{ ?> 
                            <span class="label label-success">Diterima</span>
                            <?php } ?>
                          </p>

                          <hr>

                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Keterangan dari PPK</strong>

                          <p><?php echo $c->keterangan_lapon2; ?></p>
                    </div>
                  </div>
                </div>
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                        Laporan Onboard Bulan Ke-3
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                       <strong><i class="fa fa-book margin-r-5"></i> Silakan Upload Laporan dibawah ini :</strong>

                          <p class="text-muted">
                           <a href="<?php echo base_url() ?>mahasiswa/laponboardfile/3" target="__blank"><button type="button" class="btn btn-primary">Upload</button></a>
                          </p>

                          <hr>

                          <strong><i class="fa fa-map-marker margin-r-5"></i> Tanggal Upload</strong>

                          <p class="text-muted"><?php if ($c->date_lapon3 == null) {
                              # code...
                            echo "0000-00-00";
                          }else{ echo $c->date_lapon3; } ?></p>

                          <hr>

                          <strong><i class="fa fa-pencil margin-r-5"></i> Status laporan *cek dari Bagian PPK</strong>
                          <p>
                            <?php if ($c->sudah_lapon3 == proses) { ?>
                                <span class="label label-warning">Proses</span>

                            <?php }elseif ($c->sudah_lapon3 == belum) { ?>
                             <span class="label label-danger">Ditolak</span>
                            <?php }else{ ?> 
                            <span class="label label-success">Diterima</span>
                            <?php } ?>
                          </p>

                          <hr>

                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Keterangan dari PPK</strong>

                          <p><?php echo $c->keterangan_lapon3; ?></p>
                    </div>
                  </div>
                </div>
                 <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" class="">
                        Laporan Onboard Bulan Ke-4 
                      </a>
                    </h4>
                  </div>
                  <div id="collapseFour" class="panel-collapse collapse" aria-expanded="false" style="">
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Silakan Upload Laporan dibawah ini :</strong>

                          <p class="text-muted">
                           <a href="<?php echo base_url() ?>mahasiswa/laponboardfile/4" target="__blank"><button type="button" class="btn btn-primary">Upload</button></a>
                          </p>

                          <hr>

                          <strong><i class="fa fa-map-marker margin-r-5"></i> Tanggal Upload</strong>

                          <p class="text-muted"><?php if ($c->date_lapon4 == null) {
                              # code...
                            echo "0000-00-00";
                          }else{ echo $c->date_lapon4; } ?></p>

                          <hr>

                          <strong><i class="fa fa-pencil margin-r-5"></i> Status laporan *cek dari Bagian PPK</strong>
                          <p>
                            <?php if ($c->sudah_lapon4 == proses) { ?>
                                <span class="label label-warning">Proses</span>

                            <?php }elseif ($c->sudah_lapon4 == belum) { ?>
                             <span class="label label-danger">Ditolak</span>
                            <?php }else{ ?> 
                            <span class="label label-success">Diterima</span>
                            <?php } ?>
                          </p>

                          <hr>

                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Keterangan dari PPK</strong>

                          <p><?php echo $c->keterangan_lapon4; ?></p>
                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" class="collapsed" aria-expanded="false">
                        Laporan Onboard Bulan Ke-5
                      </a>
                    </h4>
                  </div>
                  <div id="collapseFive" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                       <strong><i class="fa fa-book margin-r-5"></i> Silakan Upload Laporan dibawah ini :</strong>

                          <p class="text-muted">
                           <a href="<?php echo base_url() ?>mahasiswa/laponboardfile/5" target="__blank"><button type="button" class="btn btn-primary">Upload</button></a>
                          </p>

                          <hr>

                          <strong><i class="fa fa-map-marker margin-r-5"></i> Tanggal Upload</strong>

                          <p class="text-muted"><?php if ($c->date_lapon5 == null) {
                              # code...
                            echo "0000-00-00";
                          }else{ echo $c->date_lapon5; } ?></p>

                          <hr>

                          <strong><i class="fa fa-pencil margin-r-5"></i> Status laporan *cek dari Bagian PPK</strong>
                          <p>
                            <?php if ($c->sudah_lapon5 == proses) { ?>
                                <span class="label label-warning">Proses</span>

                            <?php }elseif ($c->sudah_lapon5 == belum) { ?>
                             <span class="label label-danger">Ditolak</span>
                            <?php }else{ ?> 
                            <span class="label label-success">Diterima</span>
                            <?php } ?>
                          </p>

                          <hr>

                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Keterangan dari PPK</strong>

                          <p><?php echo $c->keterangan_lapon5; ?></p>
                    </div>
                  </div>
                </div>
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" class="collapsed" aria-expanded="false">
                        Laporan Onboard Bulan Ke-6 
                      </a>
                    </h4>
                  </div>
                  <div id="collapseSix" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Silakan Upload Laporan dibawah ini :</strong>

                          <p class="text-muted">
                           <a href="<?php echo base_url() ?>mahasiswa/laponboardfile/6" target="__blank"><button type="button" class="btn btn-primary">Upload</button></a>
                          </p>

                          <hr>

                          <strong><i class="fa fa-map-marker margin-r-5"></i> Tanggal Upload</strong>

                          <p class="text-muted"><?php if ($c->date_lapon6 == null) {
                              # code...
                            echo "0000-00-00";
                          }else{ echo $c->date_lapon6; } ?></p>

                          <hr>

                          <strong><i class="fa fa-pencil margin-r-5"></i> Status laporan *cek dari Bagian PPK</strong>
                          <p>
                            <?php if ($c->sudah_lapon6 == proses) { ?>
                                <span class="label label-warning">Proses</span>

                            <?php }elseif ($c->sudah_lapon6 == belum) { ?>
                             <span class="label label-danger">Ditolak</span>
                            <?php }else{ ?> 
                            <span class="label label-success">Diterima</span>
                            <?php } ?>
                          </p>

                          <hr>

                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Keterangan dari PPK</strong>

                          <p><?php echo $c->keterangan_lapon6; ?></p>
                    </div>
                  </div>
                </div>
                 <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="true" class="">
                        Laporan Onboard Bulan Ke-7
                      </a>
                    </h4>
                  </div>
                  <div id="collapseSeven" class="panel-collapse collapse" aria-expanded="false" style="">
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Silakan Upload Laporan dibawah ini :</strong>

                          <p class="text-muted">
                           <a href="<?php echo base_url() ?>mahasiswa/laponboardfile/7" target="__blank"><button type="button" class="btn btn-primary">Upload</button></a>
                          </p>

                          <hr>

                          <strong><i class="fa fa-map-marker margin-r-5"></i> Tanggal Upload</strong>

                          <p class="text-muted"><?php if ($c->date_lapon7 == null) {
                              # code...
                            echo "0000-00-00";
                          }else{ echo $c->date_lapon7; } ?></p>

                          <hr>

                          <strong><i class="fa fa-pencil margin-r-5"></i> Status laporan *cek dari Bagian PPK</strong>
                          <p>
                            <?php if ($c->sudah_lapon7 == proses) { ?>
                                <span class="label label-warning">Proses</span>

                            <?php }elseif ($c->sudah_lapon7 == belum) { ?>
                             <span class="label label-danger">Ditolak</span>
                            <?php }else{ ?> 
                            <span class="label label-success">Diterima</span>
                            <?php } ?>
                          </p>

                          <hr>

                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Keterangan dari PPK</strong>

                          <p><?php echo $c->keterangan_lapon7; ?></p>
                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight" class="collapsed" aria-expanded="false">
                        Laporan Onboard Bulan Ke-8
                      </a>
                    </h4>
                  </div>
                  <div id="collapseEight" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Silakan Upload Laporan dibawah ini :</strong>

                          <p class="text-muted">
                           <a href="<?php echo base_url() ?>mahasiswa/laponboardfile/8" target="__blank"><button type="button" class="btn btn-primary">Upload</button></a>
                          </p>

                          <hr>

                          <strong><i class="fa fa-map-marker margin-r-5"></i> Tanggal Upload</strong>

                          <p class="text-muted"><?php if ($c->date_lapon8 == null) {
                              # code...
                            echo "0000-00-00";
                          }else{ echo $c->date_lapon8; } ?></p>

                          <hr>

                          <strong><i class="fa fa-pencil margin-r-5"></i> Status laporan *cek dari Bagian PPK</strong>
                          <p>
                            <?php if ($c->sudah_lapon8 == proses) { ?>
                                <span class="label label-warning">Proses</span>

                            <?php }elseif ($c->sudah_lapon8 == belum) { ?>
                             <span class="label label-danger">Ditolak</span>
                            <?php }else{ ?> 
                            <span class="label label-success">Diterima</span>
                            <?php } ?>
                          </p>

                          <hr>

                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Keterangan dari PPK</strong>

                          <p><?php echo $c->keterangan_lapon8; ?></p>
                    </div>
                  </div>
                </div>
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine" class="collapsed" aria-expanded="false">
                        Laporan Onboard Bulan Ke-9
                      </a>
                    </h4>
                  </div>
                  <div id="collapseNine" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Silakan Upload Laporan dibawah ini :</strong>

                          <p class="text-muted">
                           <a href="<?php echo base_url() ?>mahasiswa/laponboardfile/9" target="__blank"><button type="button" class="btn btn-primary">Upload</button></a>
                          </p>

                          <hr>

                          <strong><i class="fa fa-map-marker margin-r-5"></i> Tanggal Upload</strong>

                          <p class="text-muted"><?php if ($c->date_lapon9 == null) {
                              # code...
                            echo "0000-00-00";
                          }else{ echo $c->date_lapon9; } ?></p>

                          <hr>

                          <strong><i class="fa fa-pencil margin-r-5"></i> Status laporan *cek dari Bagian PPK</strong>
                          <p>
                            <?php if ($c->sudah_lapon9 == proses) { ?>
                                <span class="label label-warning">Proses</span>

                            <?php }elseif ($c->sudah_lapon9 == belum) { ?>
                             <span class="label label-danger">Ditolak</span>
                            <?php }else{ ?> 
                            <span class="label label-success">Diterima</span>
                            <?php } ?>
                          </p>

                          <hr>

                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Keterangan dari PPK</strong>

                          <p><?php echo $c->keterangan_lapon9; ?></p>
                    </div>
                  </div>
                </div>
                 <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="true" class="">
                        Laporan Onboard Bulan Ke-10
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTen" class="panel-collapse collapse" aria-expanded="false" style="">
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Silakan Upload Laporan dibawah ini :</strong>

                          <p class="text-muted">
                           <a href="<?php echo base_url() ?>mahasiswa/laponboardfile/10" target="__blank"><button type="button" class="btn btn-primary">Upload</button></a>
                          </p>

                          <hr>

                          <strong><i class="fa fa-map-marker margin-r-5"></i> Tanggal Upload</strong>

                          <p class="text-muted"><?php if ($c->date_lapon10 == null) {
                              # code...
                            echo "0000-00-00";
                          }else{ echo $c->date_lapon10; } ?></p>

                          <hr>

                          <strong><i class="fa fa-pencil margin-r-5"></i> Status laporan *cek dari Bagian PPK</strong>
                          <p>
                            <?php if ($c->sudah_lapon10 == proses) { ?>
                                <span class="label label-warning">Proses</span>

                            <?php }elseif ($c->sudah_lapon10 == belum) { ?>
                             <span class="label label-danger">Ditolak</span>
                            <?php }else{ ?> 
                            <span class="label label-success">Diterima</span>
                            <?php } ?>
                          </p>

                          <hr>

                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Keterangan dari PPK</strong>

                          <p><?php echo $c->keterangan_lapon10; ?></p>
                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" class="collapsed" aria-expanded="false">
                        Laporan Onboard Bulan Ke-11
                      </a>
                    </h4>
                  </div>
                  <div id="collapseEleven" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Silakan Upload Laporan dibawah ini :</strong>

                          <p class="text-muted">
                           <a href="<?php echo base_url() ?>mahasiswa/laponboardfile/11" target="__blank"><button type="button" class="btn btn-primary">Upload</button></a>
                          </p>

                          <hr>

                          <strong><i class="fa fa-map-marker margin-r-5"></i> Tanggal Upload</strong>

                          <p class="text-muted"><?php if ($c->date_lapon11 == null) {
                              # code...
                            echo "0000-00-00";
                          }else{ echo $c->date_lapon11; } ?></p>

                          <hr>

                          <strong><i class="fa fa-pencil margin-r-5"></i> Status laporan *cek dari Bagian PPK</strong>
                          <p>
                            <?php if ($c->sudah_lapon11 == proses) { ?>
                                <span class="label label-warning">Proses</span>

                            <?php }elseif ($c->sudah_lapon11 == belum) { ?>
                             <span class="label label-danger">Ditolak</span>
                            <?php }else{ ?> 
                            <span class="label label-success">Diterima</span>
                            <?php } ?>
                          </p>

                          <hr>

                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Keterangan dari PPK</strong>

                          <p><?php echo $c->keterangan_lapon11; ?></p>
                    </div>
                  </div>
                </div>
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve" class="collapsed" aria-expanded="false">
                        Laporan Onboard Bulan Ke-12
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwelve" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Silakan Upload Laporan dibawah ini :</strong>

                          <p class="text-muted">
                           <a href="<?php echo base_url() ?>mahasiswa/laponboardfile/12" target="__blank"><button type="button" class="btn btn-primary">Upload</button></a>
                          </p>

                          <hr>

                          <strong><i class="fa fa-map-marker margin-r-5"></i> Tanggal Upload</strong>

                          <p class="text-muted"><?php if ($c->date_lapon12 == null) {
                              # code...
                            echo "0000-00-00";
                          }else{ echo $c->date_lapon12; } ?></p>

                          <hr>

                          <strong><i class="fa fa-pencil margin-r-5"></i> Status laporan *cek dari Bagian PPK</strong>
                          <p>
                            <?php if ($c->sudah_lapon12 == proses) { ?>
                                <span class="label label-warning">Proses</span>

                            <?php }elseif ($c->sudah_lapon12 == belum) { ?>
                             <span class="label label-danger">Ditolak</span>
                            <?php }else{ ?> 
                            <span class="label label-success">Diterima</span>
                            <?php } ?>
                          </p>

                          <hr>

                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Keterangan dari PPK</strong>

                          <p><?php echo $c->keterangan_lapon12; ?></p>
                    </div>
                  </div>
                </div>

               
                  <?php } ?>
             <?php } ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

