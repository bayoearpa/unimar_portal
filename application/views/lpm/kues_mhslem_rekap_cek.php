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
                <div class="chart">
                <canvas id="canvas" style="height:300px"></canvas>
                </div>
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

