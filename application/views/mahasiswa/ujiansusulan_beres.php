 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Ujian Susulan</h3>
          </div>
          <div class="box-body">
            <!-- konten -->
            <?php if ($this->session->flashdata('success')): ?>
              <div class="alert alert-success alert-dismissible">
                  <button class="close" data-dismiss="alert">&times;</button>
                  <?= $this->session->flashdata('success'); ?>
              </div>
               <a href="<?php echo base_url() ?>mahasiswa/ujian_susulan_cetak/<?php echo $id_smta; ?>" target="__blank"><button class="btn btn-primary">Cetak Kartu Ujian Susulan</button></a>
              <?php endif; ?>

              <?php if ($this->session->flashdata('error')): ?>
              <div class="alert alert-danger alert-dismissible">
                  <button class="close" data-dismiss="alert">&times;</button>
                  <?= $this->session->flashdata('error'); ?>
              </div>
              <?php endif; ?>


             
          
       <!-- /.konten -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->