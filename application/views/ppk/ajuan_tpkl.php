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
                  <th>Dosen Pembimbing</th>
                  <th>Judul PKL</th>
                  <th>File Konduite</th>
                  <th>SK off PKL</th>
                  <th>PPK</th>
                  <th>Prodi</th>
                  <th colspan="2">Proses</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($catar as $c){ 
                 ?>
                <tr>
                  <td><?php echo $c->nim; 
                  $where = array(
                  'id_tpkl' => $c->id_tpkl      
                  );
                  $where2 = array(
                  'id_tpkl' => $c->id_tpkl, 
                  'hasil' => "1"     
                  );
                   $where3 = array(
                  'id_tpkl' => $c->id_tpkl, 
                  'hasil' => "2"     
                  );
                  ?></td>
                  <td><?php echo $c->nama ?></td>
                  <td><?php echo $c->prodi ?></td>
                    <td>
                      <?php 
                        echo $ppk->cekdosbing_tpkl($c->id_tpkl);
                       ?>
                    </td>
                    <td>
                      <?php 
                        echo $c->judul_pkl;
                       ?>
                    </td>
                     <td><?php if ($c->file_konduite) { ?>
                        <button class="btn btn-success view-filek-button" data-filename="<?php echo $c->file_konduite; ?>">Lihat</button>
                    <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                    <?php } ?></td>
                     <td><?php if ($c->file_suratketoff) { ?>
                        <button class="btn btn-success view-filesk-button" data-filename="<?php echo $c->file_suratketoff; ?>">Lihat</button>
                    <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                    <?php } ?></td>
                    <!-- proses kliring -->
                  <!-- PPK -->
                    <td>
                    <?php
                    $m=$this->m_portal->get_data($where,'tbl_kliring_tpkl_ppk')->row();
                    $n=$this->m_portal->get_data($where2,'tbl_kliring_tpkl_ppk')->row();
                    $o=$this->m_portal->get_data($where3,'tbl_kliring_tpkl_ppk')->row();
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
                    $m=$this->m_portal->get_data($where,'tbl_kliring_tpkl_prodi')->row();
                    $n=$this->m_portal->get_data($where2,'tbl_kliring_tpkl_prodi')->row();
                    $o=$this->m_portal->get_data($where3,'tbl_kliring_tpkl_prodi')->row();
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
                    <a class="btn btn-warning btn-sm" href="<?php echo base_url().'ppk/kliring_tpkl/'.$c->id_tpkl;?>"><span class="glyphicon glyphicon-pencil"></span> Kliring</a>
                    <?php
                    $m=$this->m_portal->get_data($where,'tbl_kliring_tpkl_ppk')->row();
                    if ($m > "0"){
                     ?>
                     <a class="btn btn-warning btn-sm" href="<?php echo base_url().'ppk/ekliring_tpkl/'.$c->id_tpkl; ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                   <?php } ?>
                  </td>
                  <td><button class="btn btn-error" data-filename="<?php echo $c->file_konduite; ?>">Selesai</button></td>
                </tr>
               <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>Dosen Pembimbing</th>
                  <th>Judul PKL</th>
                  <th>File Konduite</th>
                  <th>SK off PKL</th>
                  <th>PPK</th>
                  <th>Prodi</th>
                  <th colspan="2">Proses</th>
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