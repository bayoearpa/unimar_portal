    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kliring</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
              <label for="exampleInputEmail1">Keterangan :</label>
              <a class="btn btn-warning btn-sm" href="#"><i class="fa fa-gear"></i></a>Kliring di PROSES,
              <a class="btn btn-success btn-sm" href="#"><i class="fa fa-check"></i></a>Kliring di ACC,
              <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-close"></i></a>Kliring di TOLAK
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>Jenjang</th>
                  <th>Mahatar</th>
                  <th>Prodi</th>
                  <th>BAAK</th>
                  <th>BK</th>
                  <th>Dosen Pembimbing 1</th>
                  <th>Dosen Pembimbing 2</th>
                  <th>Proses</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($catar as $c){ 
                 ?>
                <tr>
                  <td><?php echo $c->nim; 
                  $where = array(
                  'id_kp' => $c->id_kp      
                  );
                  $where2 = array(
                  'id_kp' => $c->id_kp, 
                  'hasil' => "1"     
                  );
                   $where3 = array(
                  'id_kp' => $c->id_kp, 
                  'hasil' => "2"     
                  );
                  ?></td>
                  <td><?php echo $mahatar->getnama($c->nim) ?></td>
                  <td><?php echo $prodi ?></td>
                  <td>
                    <?php
                    if ($c->jenjang == "1") {
                        # code...
                        echo $jurusan = "D3";
                    }else{
                        # code...
                        echo $jurusan = "S1";
                    }
                     ?></td>
                  <!-- proses kliring -->
                  <!-- mahatar -->
                    <td>
                    <?php
                    $m=$this->m_portal->get_data($where,'tbl_kliring_prada_mahatar')->row();
                    $n=$this->m_portal->get_data($where2,'tbl_kliring_prada_mahatar')->row();
                    $o=$this->m_portal->get_data($where3,'tbl_kliring_prada_mahatar')->row();
                    if ($m > "0" && $n > "0"){
                     ?>
                    <a class="btn btn-success btn-sm" href="#"><i class="fa fa-check"></i></a>
                    <?php }elseif ( $m > "0" && $o > "0" ){ ?>
                    <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-close"></i></a>
                    <?php }else{?>
                    <a class="btn btn-warning btn-sm" href="#"><i class="fa fa-gear"></i></a>
                    <?php } ?>
                    </td>
                    <!-- dosen wali -->
                    <td>
                    <?php
                    $m=$this->m_portal->get_data($where,'tbl_kliring_prada_prodi')->row();
                    $n=$this->m_portal->get_data($where2,'tbl_kliring_prada_prodi')->row();
                    $o=$this->m_portal->get_data($where3,'tbl_kliring_prada_prodi')->row();
                   if ($m > "0" && $n > "0"){
                     ?>
                    <a class="btn btn-success btn-sm" href="#"><i class="fa fa-check"></i></a>
                    <?php }elseif ( $m > "0" && $o > "0" ){ ?>
                    <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-close"></i></a>
                    <?php }else{?>
                    <a class="btn btn-warning btn-sm" href="#"><i class="fa fa-gear"></i></a>
                    <?php } ?>
                    </td>
                    <!-- baak -->
                    <td>
                    <?php
                    $m=$this->m_portal->get_data($where,'tbl_kliring_prada_baak')->row();
                    $n=$this->m_portal->get_data($where2,'tbl_kliring_prada_baak')->row();
                    $o=$this->m_portal->get_data($where3,'tbl_kliring_prada_baak')->row();
                    if ($m > "0" && $n > "0"){
                     ?>
                    <a class="btn btn-success btn-sm" href="#"><i class="fa fa-check"></i></a>
                    <?php }elseif ( $m > "0" && $o > "0" ){ ?>
                    <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-close"></i></a>
                    <?php }else{?>
                    <a class="btn btn-warning btn-sm" href="#"><i class="fa fa-gear"></i></a>
                    <?php } ?>
                    </td>
                    <!-- BK -->
                    <td>
                    <?php
                    $m=$this->m_portal->get_data($where,'tbl_kliring_prada_bk')->row();
                    $n=$this->m_portal->get_data($where2,'tbl_kliring_prada_bk')->row();
                    $o=$this->m_portal->get_data($where3,'tbl_kliring_prada_bk')->row();
                    if ($m > "0" && $n > "0"){
                     ?>
                    <a class="btn btn-success btn-sm" href="#"><i class="fa fa-check"></i></a>
                    <?php }elseif ( $m > "0" && $o > "0" ){ ?>
                    <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-close"></i></a>
                    <?php }else{?>
                    <a class="btn btn-warning btn-sm" href="#"><i class="fa fa-gear"></i></a>
                    <?php } ?>
                    </td>
                    <td>
                      <?php 
                        $getdosbing=$this->m_portal->get_data($where,'tbl_kliring_prada_prodi')->result();
                        foreach ($getdosbing as $key) {
                          # code...
                          if ($key->dosbing1 == null) {
                            # code...
                            echo "Dosen Pembimbing 1 belum diisi oleh Prodi";
                          }else{
                            echo $key->dosbing1;
                          }
                        
                        }
                       ?>
                    </td>
                    <td>
                      <?php 
                        $getdosbing=$this->m_portal->get_data($where,'tbl_kliring_prada_prodi')->result();
                        foreach ($getdosbing as $key) {
                          # code...
                          if ($key->dosbing2 == null) {
                            # code...
                            echo "Dosen Pembimbing 2 belum diisi oleh Prodi";
                          }else{
                            echo $key->dosbing2;
                          }
                        
                        }
                       ?>
                    </td>
                     <td>
                    <a class="btn btn-warning btn-sm" href="<?php echo base_url().'mahatar/kliring_prada/'.$c->id_kp;?>"><span class="glyphicon glyphicon-pencil"></span> Kliring</a>
                    <?php
                    $m=$this->m_portal->get_data($where,'tbl_kliring_prada_mahatar')->row();
                    if ($m > "0"){
                     ?>
                     <a class="btn btn-warning btn-sm" href="<?php echo base_url().'mahatar/ekliring_prada/'.$c->id_kp; ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                   <?php } ?>
                  </td>
                  
                </tr>
               <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>Jenjang</th>
                  <th>Mahatar</th>
                  <th>Prodi</th>
                  <th>BAAK</th>
                  <th>BK</th>
                  <th>Dosen Pembimbing 1</th>
                  <th>Dosen Pembimbing 2</th>
                  <th>Proses</th>
                </tr>
                </tfoot>
              </table>
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