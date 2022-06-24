    <!-- Main content -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kliring UAS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
              <label for="exampleInputEmail1">Keterangan :</label>
              <a class="btn btn-warning btn-sm" href="#"><i class="fa fa-gear"></i></a>Kliring di PROSES,
              <a class="btn btn-success btn-sm" href="#"><i class="fa fa-check"></i></a>Kliring di ACC,
              <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-close"></i></a>Kliring di TOLAK
              </div>
              <table id="example1" class="table table-bordered table-striped display nowrap">
                <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>Jenjang</th>
                  <th>Mahatar</th>
                  <th>Prodi</th>
                 <!--  <th>BAAK</th> -->
                  <th>BK</th>
                  <th>Hasil</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($catar as $c){ 
                 ?>
                <tr>
                  <td><?php echo $c->nim; ?></td>
                  <td><?php echo $c->nm_mhs; ?></td>
                  <td><?php echo $c->nm_prodi ?></td>
                  <td>
                    <?php
                    if ($c->kd_jenjang == "E") {
                        # code...
                        echo $jurusan = "D3";
                    }else{
                        # code...
                        echo $jurusan = "S1";
                    }
                     ?></td>
                  <!-- proses kliring -->
                  <!-- mahatar -->
                    <!-- <td>
                    <?php
                    //$m=$this->m_portal->get_data($where,'tbl_kliring_uas_mahatar')->row();
                    //$n=$this->m_portal->get_data($where2,'tbl_kliring_uas_mahatar')->row();
                    //$o=$this->m_portal->get_data($where3,'tbl_kliring_uas_mahatar')->row();
                    //if ($m > "0" && $n > "0"){
                     ?>
                    <a class="btn btn-success btn-sm" href="#"><i class="fa fa-check"></i></a>
                    <?php // }elseif ( $m > "0" && $o > "0" ){ ?>
                    <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-close"></i></a>
                    <?php // }else{?>
                    <a class="btn btn-warning btn-sm" href="#"><i class="fa fa-gear"></i></a>
                    <?php //} ?>
                    </td> -->
                    <!-- dosen wali -->
                  <!--   <td>
                    <?php
                   // $m=$this->m_portal->get_data($where,'tbl_kliring_uas_prodi')->row();
                   // $n=$this->m_portal->get_data($where2,'tbl_kliring_uas_prodi')->row();
                   // $o=$this->m_portal->get_data($where3,'tbl_kliring_uas_prodi')->row();
                   //if ($m > "0" && $n > "0"){
                     ?>
                    <a class="btn btn-success btn-sm" href="#"><i class="fa fa-check"></i></a>
                    <?php //}elseif ( $m > "0" && $o > "0" ){ ?>
                    <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-close"></i></a>
                    <?php //}else{?>
                    <a class="btn btn-warning btn-sm" href="#"><i class="fa fa-gear"></i></a>
                    <?php // } ?>
                    </td> -->
                    <!-- baak -->
                    <!-- <td>
                    <?php
                    //$m=$this->m_portal->get_data($where,'tbl_kliring_uas_baak')->row();
                    //$n=$this->m_portal->get_data($where2,'tbl_kliring_uas_baak')->row();
                    //$o=$this->m_portal->get_data($where3,'tbl_kliring_uas_baak')->row();
                    //if ($m > "0" && $n > "0"){
                     ?>
                    <a class="btn btn-success btn-sm" href="#"><i class="fa fa-check"></i></a>
                    <?php  // }elseif ( $m > "0" && $o > "0" ){ ?>
                    <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-close"></i></a>
                    <?php  // }else{?>
                    <a class="btn btn-warning btn-sm" href="#"><i class="fa fa-gear"></i></a>
                    <?php //} ?>
                    </td> -->
                    <!-- BK -->
                     <td>
                    <?php 
                    switch ($c->hasil_m) {
                      case '1':
                        $icon = 'check';
                        $label = 'success';
                        break;
                      case '2':
                        $icon = 'close';
                        $label = 'danger';
                        break;
                      default:
                        $icon = 'gear';
                        $label = 'warning';
                        break;
                    }

                    echo $tombol = '<a class="btn btn-'.$label.' btn-sm" href="#"><i class="fa fa-'.$icon.'"></i></a>';
                    ?>
                    </td>
                     <td>
                    <?php 
                    switch ($c->hasil_p) {
                      case '1':
                        $icon = 'check';
                        $label = 'success';
                        break;
                      case '2':
                        $icon = 'close';
                        $label = 'danger';
                        break;
                      default:
                        $icon = 'gear';
                        $label = 'warning';
                        break;
                    }

                    echo $tombol = '<a class="btn btn-'.$label.' btn-sm" href="#"><i class="fa fa-'.$icon.'"></i></a>';
                    ?>
                    </td>
                    <td>
                    <?php 
                    switch ($c->hasil_bk) {
                      case '1':
                        $icon = 'check';
                        $label = 'success';
                        break;
                      case '2':
                        $icon = 'close';
                        $label = 'danger';
                        break;
                      default:
                        $icon = 'gear';
                        $label = 'warning';
                        break;
                    }

                    echo $tombol = '<a class="btn btn-'.$label.' btn-sm" href="#"><i class="fa fa-'.$icon.'"></i></a>';
                    ?>
                    </td>
                   

                  <td>
                    <a class="btn btn-warning btn-sm" href="<?php echo base_url().'bk/kliring_uas/'.$c->id_kuas;?>"><span class="glyphicon glyphicon-pencil"></span> Kliring</a>
                    <?php
                    $where = array(
                      'id_kuas' => $c->id_kuas      
                      );
                    $m=$this->m_portal->get_data($where,'tbl_kliring_uas_bk')->row();
                    if ($m > "0"){
                     ?>
                     <a class="btn btn-warning btn-sm" href="<?php echo base_url().'bk/ekliring_uas/'.$c->id_kuas; ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
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
                 <!--  <th>BAAK</th> -->
                  <th>BK</th>
                  <th>Hasil</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
