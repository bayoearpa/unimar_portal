 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-body">
            <?php echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
            foreach($ku as $k){ 
              ?>
              <table>
                <tr>
                  <td><label for="exampleInputEmail1">NIM</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $k->nim; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Nama</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $nama; ?></label></td>
                </tr>
                 <tr>
                  <td><label for="exampleInputEmail1">Prodi</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $prodi; ?></label></td>
                </tr>
               
                <tr>
                   <td colspan="3">
                    <a class="btn btn-warning btn-sm" href="<?php echo base_url().'wdosen/kliring_smta/'.$k->id_smta;?>"><span class="glyphicon glyphicon-pencil"></span> Kliring</a>
                    <?php
                    $where = array(
                    'id_smta' => $k->id_smta      
                    );
                    $m=$this->m_portal->get_data($where,'tbl_kliring_smta_prodi')->row();
                    if ($m > "0"){
                     ?>
                     <a class="btn btn-warning btn-sm" href="<?php echo base_url().'wdosen/ekliring_smta/'.$k->id_smta; ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                   <?php } ?>
                  </td>
                </tr>
              </table>
              
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Bagian</th>
                  <th>Keterangan</th>
                  <th style="width: 40px">Label</th>
                </tr>
               <!--  <tr>
                  <td>1.</td>
                  <td>Mahatar</td>
                  <td>
                    <?php //echo $mahatar_ket; ?>
                  </td>
                  <td><?php //echo $mahatar_label; ?></td>
                </tr> -->
                <tr>
                  <td>1.</td>
                  <td>BAAK</td>
                  <td>
                    <?php echo $baak_ket; ?>
                  </td>
                  <td><?php echo $baak_label; ?></td>
                </tr> 
                <tr>
                  <td>2.</td>
                  <td>Keuangan</td>
                  <td>
                    <?php echo $bk_ket; ?>
                  </td>
                  <td><?php echo $bk_label; ?></td>
                </tr>
                  <tr>
                  <td>3.</td>
                  <td>Prodi</td>
                  <td>
                    <?php echo $prodi_ket; ?>
                  </td>
                  <td><?php echo $prodi_label; ?></td>
                </tr>
                 
              </table>
              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->