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
                    <a class="btn btn-warning btn-sm" href="<?php echo base_url().'bk/kliring_us/'.$k->id_smta;?>"><span class="glyphicon glyphicon-pencil"></span> validasi</a>
                    <?php
                    $where = array(
                    'id_smta' => $k->id_smta      
                    );
                    $m=$this->m_portal->get_data($where,'tbl_kliring_us_bk')->row();
                    if ($m > "0"){
                     ?>
                     <a class="btn btn-warning btn-sm" href="<?php echo base_url().'bk/ekliring_us/'.$k->id_smta; ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                   <?php } ?>
                  </td>
                </tr>
              </table>
              
              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->