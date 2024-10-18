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
                <h1>Rekap Tendik Ke Lemdik</h1>
               <!--  <div class="chart">
                <canvas id="canvas" style="height:300px"></canvas>
                </div> -->
                <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">UNIMAR AMNI menyediakan fasilitas dan prasarana yang cukup kepada tendik dalam melaksanakan tugas.</h3>
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
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $lpm->precise_round($ss_1,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $lpm->precise_round($ss_1,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_1,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $lpm->precise_round($s_1,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $lpm->precise_round($ks_1,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $lpm->precise_round($ks_1,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($ts_1,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($ts_1,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($sts_1,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($sts_1,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->
               

                  <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">UNIMAR AMNI menyediakan SOP dalam menjalankan  tugas</h3>
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
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $lpm->precise_round($ss_2,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $lpm->precise_round($ss_2,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_2,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $lpm->precise_round($s_2,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $lpm->precise_round($ks_2,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $lpm->precise_round($ks_2,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($ts_2,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($ts_2,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($sts_2,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($sts_2,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->

               
                 <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">UNIMAR AMNI sangat peduli dan memahami kepentingan tendik dalam melaksanakan tugas</h3>
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
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $lpm->precise_round($ss_4,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $lpm->precise_round($ss_4,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_4,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $lpm->precise_round($s_4,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $lpm->precise_round($ks_4,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $lpm->precise_round($ks_4,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($ts_4,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($ts_4,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($sts_4,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($sts_4,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->

                 <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">UNIMAR AMNI melaksanakan monitoring dan evaluasi mengenai perkembangan pelayanan yang diberikan tendik</h3>
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
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $lpm->precise_round($ss_5,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $lpm->precise_round($ss_5,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_5,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $lpm->precise_round($s_5,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $lpm->precise_round($ks_5,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $lpm->precise_round($ks_5,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($ts_5,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($ts_5,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($sts_5,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($sts_5,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->

                 <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">UNIMAR AMNI bersikap terbuka dan kooperatif terhadap masukan dari tendik</h3>
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
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $lpm->precise_round($ss_6,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $lpm->precise_round($ss_6,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_6,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $lpm->precise_round($s_6,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $lpm->precise_round($ks_6,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $lpm->precise_round($ks_6,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($ts_6,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($ts_6,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($sts_6,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($sts_6,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->

                 <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">UNIMAR AMNI menyediakan sarana dan prasarana yang mendukung tugas tendik</h3>
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
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $lpm->precise_round($ss_7,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $lpm->precise_round($ss_7,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_7,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $lpm->precise_round($s_7,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $lpm->precise_round($ks_7,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $lpm->precise_round($ks_7,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($ts_7,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($ts_7,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($sts_7,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($sts_7,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->

                 <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">UNIMAR AMNI menyediakan ketersediaan layanan peningkatan karir bagi tendik</h3>
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
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $lpm->precise_round($ss_8,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $lpm->precise_round($ss_8,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_8,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $lpm->precise_round($s_8,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $lpm->precise_round($ks_8,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $lpm->precise_round($ks_8,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($ts_8,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($ts_8,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($sts_8,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($sts_8,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->

                 <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">UNIMAR AMNI memberikan kesempatan bagi tendik untuk mengembangkan ide atau gagasan </h3>
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
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $lpm->precise_round($ss_9,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $lpm->precise_round($ss_9,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_9,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $lpm->precise_round($s_9,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $lpm->precise_round($ks_9,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $lpm->precise_round($ks_9,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($ts_9,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($ts_9,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($sts_9,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($sts_9,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->

               
                 <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">UNIMAR AMNI tanggap dalam menyediakan fasilitas bagi tendik dalam menyelesaikan tugas</h3>
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
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $lpm->precise_round($ss_10,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $lpm->precise_round($ss_10,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_10,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $lpm->precise_round($s_10,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $lpm->precise_round($ks_10,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $lpm->precise_round($ks_10,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($ts_10,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($ts_10,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($sts_10,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($sts_10,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->

                 <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">UNIMAR AMNI memberikan motivasi dan bimbingan bagi tendik untuk mencapai prestasi kerja</h3>
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
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $lpm->precise_round($ss_11,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $lpm->precise_round($ss_11,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_11,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $lpm->precise_round($s_11,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $lpm->precise_round($ks_11,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $lpm->precise_round($ks_11,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($ts_11,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($ts_11,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($sts_11,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($sts_11,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->

                 <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">UNIMAR AMNI memberikan dukungan Sistem Informasi bagi tendik untuk memudahkan setiap pelayanan</h3>
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
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $lpm->precise_round($ss_12,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $lpm->precise_round($ss_12,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_12,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $lpm->precise_round($s_12,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $lpm->precise_round($ks_12,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $lpm->precise_round($ks_12,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($ts_12,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($ts_12,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($sts_12,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($sts_12,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->

                 <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">UNIMAR AMNI memberikan penghargaan atas prestasi kerja</h3>
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
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $lpm->precise_round($ss_13,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $lpm->precise_round($ss_13,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_13,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $lpm->precise_round($s_13,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $lpm->precise_round($ks_13,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $lpm->precise_round($ks_13,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($ts_13,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($ts_13,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($sts_13,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($sts_13,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->

                 <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">UNIMAR AMNI memberikan reward bagi bagian yang memberikan pelayanan terbaik</h3>
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
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $lpm->precise_round($ss_14,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $lpm->precise_round($ss_14,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_14,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $lpm->precise_round($s_14,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $lpm->precise_round($ks_14,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $lpm->precise_round($ks_14,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($ts_14,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($ts_14,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($sts_14,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($sts_14,2) ?>%</span></td>
                      </tr>
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- ./table chart -->

                 <!-- table chart -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">UNIMAR AMNI memberikan kesempatan dan fasilitas untuk mengembangkan diri termasuk kursus, pelatihan , studi lanjut dll</h3>
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
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $lpm->precise_round($ss_15,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo $lpm->precise_round($ss_15,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Baik</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-primary" style="width: <?php echo round($s_15,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo $lpm->precise_round($s_15,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Cukup</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $lpm->precise_round($ks_15,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-light-blue"><?php echo $lpm->precise_round($ks_15,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($ts_15,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($ts_15,2) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Sangat Kurang</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $lpm->precise_round($sts_15,2) ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo $lpm->precise_round($sts_15,2) ?>%</span></td>
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

