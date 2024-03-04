 <!-- Main content -->
      <section class="content">

         <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Summary</a></li>
              <li><a href="#tab_2" data-toggle="tab">Dosen</a></li>
             <!--  <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Dropdown <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
              </li> -->
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <!-- tab 1 -->
              <div class="tab-pane active" id="tab_1">
                <?php echo validation_errors(); 
                      echo $this->session->flashdata('success');
                      echo $this->session->flashdata('error');
                   ?> 
               <!-- chart jajal -->
               <!-- BAR CHART -->
                <h1>Rekap per Prodi : <?php echo $nama_prodi; ?></h1>
                <h3><?php echo $pernyataan; ?></h3>
               <!--  <div class="chart">
                <canvas id="canvas" style="height:300px"></canvas>
                </div> -->
                <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Fakultas</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Skala</th>
                        <th>Chart</th>
                        <th style="width: 40px">Persentase</th>
                      </tr>
                      <tr>
                        <td>1.</td>
                        <td>Sangat Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo round($ss_a,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo round($ss_a,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_a,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo round($s_a,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo round($ks_a,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo round($ks_a,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($ts_a,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($ts_a,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($sts_a,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($sts_a,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->
                <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Program Studi</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Skala</th>
                        <th>Chart</th>
                        <th style="width: 40px">Persentase</th>
                      </tr>
                      <tr>
                        <td>1.</td>
                        <td>Sangat Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo round($ss_b,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo round($ss_b,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_b,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo round($s_b,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo round($ks_b,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo round($ks_b,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($ts_b,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($ts_b,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($sts_b,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($sts_b,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->
                <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Keuangan</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Skala</th>
                        <th>Chart</th>
                        <th style="width: 40px">Persentase</th>
                      </tr>
                      <tr>
                        <td>1.</td>
                        <td>Sangat Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo round($ss_c,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo round($ss_c,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_c,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo round($s_c,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo round($ks_c,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo round($ks_c,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($ts_c,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($ts_c,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($sts_c,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($sts_c,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->
                <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Sarana dan Prasarana</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Skala</th>
                        <th>Chart</th>
                        <th style="width: 40px">Persentase</th>
                      </tr>
                      <tr>
                        <td>1.</td>
                        <td>Sangat Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo round($ss_d,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo round($ss_d,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_d,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo round($s_d,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo round($ks_d,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo round($ks_d,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($ts_d,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($ts_d,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($sts_d,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($sts_d,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->
                <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">PMB</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Skala</th>
                        <th>Chart</th>
                        <th style="width: 40px">Persentase</th>
                      </tr>
                      <tr>
                        <td>1.</td>
                        <td>Sangat Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo round($ss_e,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo round($ss_e,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_e,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo round($s_e,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo round($ks_e,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo round($ks_e,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($ts_e,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($ts_e,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($sts_e,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($sts_e,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->
                <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Akaedmik</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Skala</th>
                        <th>Chart</th>
                        <th style="width: 40px">Persentase</th>
                      </tr>
                      <tr>
                        <td>1.</td>
                        <td>Sangat Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo round($ss_f,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo round($ss_f,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_f,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo round($s_f,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo round($ks_f,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo round($ks_f,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($ts_f,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($ts_f,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($sts_f,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($sts_f,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->
                <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Mahatar</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Skala</th>
                        <th>Chart</th>
                        <th style="width: 40px">Persentase</th>
                      </tr>
                      <tr>
                        <td>1.</td>
                        <td>Sangat Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo round($ss_g,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo round($ss_g,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_g,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo round($s_g,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo round($ks_g,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo round($ks_g,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($ts_g,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($ts_g,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($sts_g,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($sts_g,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->
                <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Humas</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Skala</th>
                        <th>Chart</th>
                        <th style="width: 40px">Persentase</th>
                      </tr>
                      <tr>
                        <td>1.</td>
                        <td>Sangat Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo round($ss_h,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo round($ss_h,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_h,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo round($s_h,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo round($ks_h,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo round($ks_h,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($ts_h,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($ts_h,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($sts_h,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($sts_h,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->
                <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Perpustakaan</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Skala</th>
                        <th>Chart</th>
                        <th style="width: 40px">Persentase</th>
                      </tr>
                      <tr>
                        <td>1.</td>
                        <td>Sangat Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo round($ss_i,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo round($ss_i,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_i,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo round($s_i,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo round($ks_i,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo round($ks_i,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($ts_i,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($ts_i,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($sts_i,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($sts_i,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->
                <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Laboratorium</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Skala</th>
                        <th>Chart</th>
                        <th style="width: 40px">Persentase</th>
                      </tr>
                      <tr>
                        <td>1.</td>
                        <td>Sangat Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo round($ss_j,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo round($ss_j,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_j,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo round($s_j,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo round($ks_j,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo round($ks_j,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($ts_j,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($ts_j,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($sts_j,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($sts_j,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->
                <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">PKL</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Skala</th>
                        <th>Chart</th>
                        <th style="width: 40px">Persentase</th>
                      </tr>
                      <tr>
                        <td>1.</td>
                        <td>Sangat Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo round($ss_k,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo round($ss_k,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_k,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo round($s_k,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo round($ks_k,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo round($ks_k,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($ts_k,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($ts_k,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($sts_k,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($sts_k,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->
                <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">PRALA</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Skala</th>
                        <th>Chart</th>
                        <th style="width: 40px">Persentase</th>
                      </tr>
                      <tr>
                        <td>1.</td>
                        <td>Sangat Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo round($ss_l,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo round($ss_l,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_l,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo round($s_l,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo round($ks_l,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo round($ks_l,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($ts_l,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($ts_l,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($sts_l,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($sts_l,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->
                <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Diklat Umum</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Skala</th>
                        <th>Chart</th>
                        <th style="width: 40px">Persentase</th>
                      </tr>
                      <tr>
                        <td>1.</td>
                        <td>Sangat Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo round($ss_m,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo round($ss_m,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_m,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo round($s_m,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo round($ks_m,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo round($ks_m,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($ts_m,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($ts_m,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($sts_m,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($sts_m,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->
                <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">DKP</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Skala</th>
                        <th>Chart</th>
                        <th style="width: 40px">Persentase</th>
                      </tr>
                      <tr>
                        <td>1.</td>
                        <td>Sangat Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo round($ss_n,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo round($ss_n,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_n,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo round($s_n,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo round($ks_n,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo round($ks_n,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($ts_n,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($ts_n,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($sts_n,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($sts_n,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->
                <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">PUSTIK</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Skala</th>
                        <th>Chart</th>
                        <th style="width: 40px">Persentase</th>
                      </tr>
                      <tr>
                        <td>1.</td>
                        <td>Sangat Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo round($ss_o,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo round($ss_o,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_o,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo round($s_o,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo round($ks_o,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo round($ks_o,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($ts_o,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($ts_o,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Baik</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($sts_o,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($sts_o,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->
               
              <!-- /chart jajal -->
              </div>
                <!-- /tab 1 -->
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <!-- tab 2 -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->

            <!-- MODALLL -->
             <?php 
               // foreach ($list_pert as $key) {?>
                <div class="modal fade" id="<?php echo $key->id_mhsdsn ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><?php //echo $key->pert_mhsdsn ?></h4>
                      </div>
                      <div class="modal-body">
                         
                                <div id="donut-chart-<?php //echo $key->id_mhsdsn ?>" style="height: 300px;width: 100%;"></div>

                        <table>
                          <tr>
                            <td><b>STS :</b></td>
                            <td>Sangat Tidak Setuju</td>
                          </tr>
                          <tr>
                            <td><b>TS :</b></td>
                            <td>Tidak Setuju</td>
                          </tr>
                          <tr>
                            <td><b>KS :</b></td>
                            <td>Kurang Setuju</td>
                          </tr>
                          <tr>
                            <td><b>S :</b></td>
                            <td>Setuju</td>
                          </tr>
                          <tr>
                            <td><b>SS :</b></td>
                            <td>Sangat Setuju</td>
                          </tr>

                        </table>
                          
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                 <?php //} ?>

      </section>
      <!-- /.content -->

