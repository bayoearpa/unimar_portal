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
                        <td>Sangat Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo round($ss_a) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo round($ss_a) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo round($s_a) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo round($s_a) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Kurang Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($ks_a) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo round($ks_a) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $s_a ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $s_a ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $sts_a ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $sts_a ?>%</span></td>
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
                        <td>Sangat Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $ss_b ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $ss_b ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $s_b ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $s_b ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Kurang Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $ks_b ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $ks_b ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $s_b ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $s_b ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $sts_b ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $sts_b ?>%</span></td>
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
                        <td>Sangat Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $ss_c ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $ss_c ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $s_c ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $s_c ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Kurang Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $ks_c ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $ks_c ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $s_c ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $s_c ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $sts_c ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $sts_c ?>%</span></td>
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
                        <td>Sangat Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $ss_d ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $ss_d ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $s_d ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $s_d ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Kurang Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $ks_d ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $ks_d ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $s_d ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $s_d ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $sts_d ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $sts_d ?>%</span></td>
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
                        <td>Sangat Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $ss_e ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $ss_e ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $s_e ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $s_e ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Kurang Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $ks_e ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $ks_e ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $s_e ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $s_e ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $sts_e ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $sts_e ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->
                <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Akademik</h3>
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
                        <td>Sangat Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $ss_f ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $ss_f ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $s_f ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $s_f ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Kurang Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $ks_f ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $ks_f ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $s_f ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $s_f ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $sts_f ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $sts_f ?>%</span></td>
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
                        <td>Sangat Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $ss_g ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $ss_g ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $s_g ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $s_g ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Kurang Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $ks_g ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $ks_g ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $s_g ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $s_g ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $sts_g ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $sts_g ?>%</span></td>
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
                        <td>Sangat Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $ss_h ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $ss_h ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $s_h ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $s_h ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Kurang Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $ks_h ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $ks_h ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $s_h ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $s_h ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $sts_h ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $sts_h ?>%</span></td>
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
                        <td>Sangat Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $ss_i ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $ss_i ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $s_i ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $s_i ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Kurang Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $ks_i ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $ks_i ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $s_i ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $s_i ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $sts_i ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $sts_i ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->
                <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">laboratorium</h3>
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
                        <td>Sangat Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $ss_j ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $ss_j ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $s_j ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $s_j ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Kurang Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $ks_j ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $ks_j ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $s_j ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $s_j ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $sts_j ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $sts_j ?>%</span></td>
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
                        <td>Sangat Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $ss_k ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $ss_k ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $s_k ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $s_k ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Kurang Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $ks_k ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $ks_k ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $s_k ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $s_k ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $sts_k ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $sts_k ?>%</span></td>
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
                        <td>Sangat Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $ss_l ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $ss_l ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $s_l ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $s_l ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Kurang Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $ks_l ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $ks_l ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $s_l ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $s_l ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $sts_l ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $sts_l ?>%</span></td>
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
                        <td>Sangat Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $ss_m ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $ss_m ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $s_m ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $s_m ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Kurang Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $ks_m ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $ks_m ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $s_m ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $s_m ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $sts_m ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $sts_m ?>%</span></td>
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
                        <td>Sangat Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $ss_n?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $ss_n ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $s_n ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $s_n ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Kurang Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $ks_n ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $ks_n ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $s_n ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $s_n ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $sts_n ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $sts_n ?>%</span></td>
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
                        <td>Sangat Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $ss_o ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $ss_o ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $s_o ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $s_o ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Kurang Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo $ks_o ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $ks_o ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $s_o ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $s_o ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Tidak Setuju</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $sts_o ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $sts_o ?>%</span></td>
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

