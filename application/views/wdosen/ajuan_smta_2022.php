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
                  <!-- <th>Mahatar</th> -->
                  <th>Kliring Prodi</th>
                 <!--  <th>BAAK</th> -->
                  <th>Kliring BK</th>
                  <th>Hasil</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($select as $c){ 
                 ?>
                <tr>
                  <td><?php echo $c->nim; ?></td>
                  <td><?php echo $c->nama_mhs; ?></td>
                  <td><?php echo $c->nama_prodi ?></td>
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
                    <!--  <td>
                    <?php 
                    // switch ($c->hasil_m) {
                    //   case '1':
                    //     $icon = 'check';
                    //     $label = 'success';
                    //     break;
                    //   case '2':
                    //     $icon = 'close';
                    //     $label = 'danger';
                    //     break;
                    //   default:
                    //     $icon = 'gear';
                    //     $label = 'warning';
                    //     break;
                    // }

                    // echo $tombol = '<a class="btn btn-'.$label.' btn-sm" href="#"><i class="fa fa-'.$icon.'"></i></a>';
                    ?>
                    </td> -->
                     <td>
                    <?php 
                    echo $c->hasil_p;
                    switch ($c->hasil_prodi) {
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
                    <a class="btn btn-warning btn-sm" href="<?php echo base_url().'wdosen/search_smta_nim_cari2/'.$c->id_smta;?>"><span class="glyphicon glyphicon-pencil"></span> Kliring</a>
                    <?php
                    $where = array(
                      'id_smta' => $c->id_smta      
                      );
                    $m=$this->m_portal->get_data($where,'tbl_kliring_smta_prodi')->row();
                    if ($m > "0"){
                     ?>
                     <a class="btn btn-warning btn-sm" href="#"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
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
                  <!-- <th>Mahatar</th> -->
                  <th>Kliring Prodi</th>
                 <!--  <th>BAAK</th> -->
                  <th>Kliring BK</th>
                  <th>Hasil</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
