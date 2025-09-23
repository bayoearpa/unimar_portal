 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-body">
            <?php 
            // echo validation_errors(); 
            // echo $this->session->flashdata('success');
            // echo $this->session->flashdata('error');
            
              ?>
             <table class="table table-bordered">
               <tr>
                <td><b>No Dosen</b></td>
                <td><b>Nama Dosen</b></td>
                <td><b>Status</b></td>
                <td><b>Kirim Data</b></td>

               
               </tr>
               <?php foreach($select_dosen as $k){ ?>
                <tr>
                  <td><?php echo $k->kddosen ?></td>
                  <td><?php echo $k->nama_dosen ?></td>
                  <td>
                    <?php
                    $kd = $k->kddosen;
                    $ta = $k->ta;
                    $prodi = $k->kode_prodi;
                    $get_stats = $lpm->cektablelapmhsdsn_dsn($kd, $ta); 
                    if ($get_stats > 0) {
                      # code...
                      ?>
                      <button type="button" class="btn btn-block btn-success btn-sm"><i class="fa fa-fw fa-check"></i></button>
                    <?php }else{ ?>
                      <button type="button" class="btn btn-block btn-danger btn-sm"><i class="fa fa-fw fa-ban"></i></button>
                    <?php  } ?>
                  </td>
                  <td><a href="<?php echo base_url() ?>lpm/kues_mhsdsn_run_update/<?php echo $kd ?>/<?php echo $ta ?>/<?php echo $prodi ?>" target="_blank"><button type="button" class="btn btn-block btn-primary btn-sm"><i class="fa fa-fw fa-send"></i>Kirim Data</button></a></td>

                </tr>
                <?php } ?>
             </table>
              
             
              
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->