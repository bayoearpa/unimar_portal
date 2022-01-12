 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-body">
            <?php echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
            
              ?>
             <table class="table table-bordered">
               <tr>
                <td>Kode Makul</td>
                <td>Nama Mata Kuliah</td>
                <td>Semester</td>
                <td>Peserta</td>
                <td>Dosen Pengampu</td>
                <td>Cetak</td>
               </tr>
               <?php foreach($list_makul as $k){ 
                $kdmakul = $k->kd_makul;
                ?>
                <tr>
                  <td><?php echo $k->kd_makul ?></td>
                  <td><?php echo $k->makul ?></td>
                  <td><?php echo $k->smt ?></td>
                  <td><?php 
                  $jml_peserta = $baak->totalpesertasmtabayardone($kdmakul);
                  echo $jml_peserta ?></td>
                  <td><?php 
                  $dosen = $baak->cekdosenpengampu($kdmakul);
                  echo $dosen;
                   ?></td>
                  <td width="25%">
                    <?php 
                    if ($jml_peserta >= 10 ) {
                      # code... ?>
                    <a href="<?php echo base_url() ?>baak/cetakabsensisemesterantara/<?php echo $k->kd_makul ?>"><button type="button" class="btn btn-primary pull-left"><i class="fa fa-print" target="__blank"></i>Cetak Lampiran Absensi</button></a>

                    <a href="<?php echo base_url() ?>baak/export_excel_smta/<?php echo $k->kd_makul ?>"><button type="button" class="btn btn-success pull-left"><i class="fa fa-file-excel-o" target="__blank"></i>Export Excel</button></a>
                  <?php } ?>
                  <?php 
                    if ($dosen == "Dosen Belum Di Set") {
                      # code...
                    }else{
                   ?>
                    <a href="<?php echo base_url() ?>baak/cetakpermohonansemesterantara/<?php echo $k->kd_makul ?>"><button type="button" class="btn btn-warning pull-left"><i class="fa fa-print"></i>Cetak Halaman Permohonan</button></a>
                  <?php } ?>

                    <a href="<?php echo base_url() ?>baak/cek_smta_peserta/<?php echo $k->kd_makul ?>"><button type="button" class="btn btn-info pull-left"><i class="fa fa-eye"></i>Cek Peserta</button></a>
                  </td>
                </tr>
                <?php } ?>
             </table>
              
             
              
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->