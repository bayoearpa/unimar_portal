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
                  <th>D.Wali</th>
                  <th>BAAK</th>
                  <th>BK</th>
                  <th>PPK</th>
                  <th>Hasil</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($catar as $c){ 
                 ?>
                <tr>
                  <td><?php echo $c->nim; 
                  $where = array(
                  'id_uks' => $c->id_uks      
                  );
                  $where2 = array(
                  'id_uks' => $c->id_uks, 
                  'hasil' => "1"     
                  );
                   $where3 = array(
                  'id_uks' => $c->id_uks, 
                  'hasil' => "2"     
                  );
                  ?></td>
                  <td><?php echo $ppk->getnama($c->nim) ?></td>
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
                    $m=$this->m_portal->get_data($where,'tbl_kliring_ujianktsk_mahatar')->row();
                    $n=$this->m_portal->get_data($where2,'tbl_kliring_ujianktsk_mahatar')->row();
                    $o=$this->m_portal->get_data($where3,'tbl_kliring_ujianktsk_mahatar')->row();
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
                    $m=$this->m_portal->get_data($where,'tbl_kliring_ujianktsk_walidosen')->row();
                    $n=$this->m_portal->get_data($where2,'tbl_kliring_ujianktsk_walidosen')->row();
                    $o=$this->m_portal->get_data($where3,'tbl_kliring_ujianktsk_walidosen')->row();
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
                    $m=$this->m_portal->get_data($where,'tbl_kliring_ujianktsk_baak')->row();
                    $n=$this->m_portal->get_data($where2,'tbl_kliring_ujianktsk_baak')->row();
                    $o=$this->m_portal->get_data($where3,'tbl_kliring_ujianktsk_baak')->row();
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
                    $m=$this->m_portal->get_data($where,'tbl_kliring_ujianktsk_bk')->row();
                    $n=$this->m_portal->get_data($where2,'tbl_kliring_ujianktsk_bk')->row();
                    $o=$this->m_portal->get_data($where3,'tbl_kliring_ujianktsk_bk')->row();
                    if ($m > "0" && $n > "0"){
                     ?>
                    <a class="btn btn-success btn-sm" href="#"><i class="fa fa-check"></i></a>
                    <?php }elseif ( $m > "0" && $o > "0" ){ ?>
                    <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-close"></i></a>
                    <?php }else{?>
                    <a class="btn btn-warning btn-sm" href="#"><i class="fa fa-gear"></i></a>
                    <?php } ?>
                    </td>
                    <!-- ppk -->
                    <td>
                    <?php
                    $m=$this->m_portal->get_data($where,'tbl_kliring_ujianktsk_ppk')->row();
                    $n=$this->m_portal->get_data($where2,'tbl_kliring_ujianktsk_ppk')->row();
                    $o=$this->m_portal->get_data($where3,'tbl_kliring_ujianktsk_ppk')->row();
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
                    <a class="btn btn-warning btn-sm" href="<?php echo base_url().'ppk/kliring/'.$c->id_uks;?>"><span class="glyphicon glyphicon-pencil"></span> Kliring</a>
                    <?php
                    $m=$this->m_portal->get_data($where,'tbl_kliring_ujianktsk_ppk')->row();
                    if ($m > "0"){
                     ?>
                     <a class="btn btn-warning btn-sm" href="<?php echo base_url().'ppk/ekliring/'.$c->id_uks; ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
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
                  <th>D.Wali</th>
                  <th>BAAK</th>
                  <th>BK</th>
                  <th>PPK</th>
                  <th>Hasil</th>
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