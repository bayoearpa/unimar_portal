    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pendaftar English Achievement</h3>
            </div>             
            <!-- /.box-header -->
            <div class="box-body">
                <!-- Main content -->
                <?php 
                foreach($catar as $c){ 
                 ?>
    <section class="invoice">
      <!-- title row -->
      <div class="row">
      <a href="<?php echo base_url() ?>bau/"><button type="button" class="btn btn-success pull-right"><i class="fa fa-chevron-left"></i>Kembali
          </button></a>
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Detail
            <small class="pull-right">Tanggal : <?php echo date("d-m-Y"); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Data
          <address>
            <strong>Nama</strong><br>
            Tempat Lahir<br>
            Tanggal Lahir<br>
            Nama Ibu<br>
            Jenis Kelamin<br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Keterangan
          <address>
            <strong><?php echo $c->nama ?></strong><br>
            <?php echo $c->tl ?><br>
            <?php echo $c->tgl_l ?><br>
            <?php echo $c->nama_i ?><br>
            <?php echo $c->jk ?> <br>

          </address>
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No.</th>
              <th>Jurusan yang Diambil</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>1</td>
              <td><strong>
                <?php 
                      echo $nmprodi;
                ?>
                </strong>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
         
        </div>
        <!-- /.col -->
       <!--  <div class="col-xs-6">
          <p class="lead">Detail Pembayaran</p>

          <div class="table-responsive">
            <table class="table">
              
              <tr>
                <th>Total Bayar:</th>
                <td>Rp. <?php //echo $totalbiaya = number_format($nominal, 0, ',', '.'); ?> ,-</td>
              </tr>
            </table>
          </div>
        </div> -->
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
        <form method="post" action="<?php echo base_url() ?>bau/dafula" target="_blank">
        <!-- <input type="hidden" name="id" id="id" value="<?php //echo $c->val_id ?>"> -->
        <input type="hidden" name="no" id="no" value="<?php echo $c->no ?>">
        <input type="hidden" name="gelombang" id="gelombang" value="<?php echo $c->gelombang ?>">
        <input type="hidden" name="tgl_byr" id="tgl_byr" value="<?php echo date("Y-m-d"); ?>">
        <input type="hidden" name="prodi" id="prodi" value="<?php echo $c->prodi ?>">
        <input class="form-control" type="text" name="jml_byr" id="jml_byr" placeholder="Masukan Nominal Bayar" required="">
        <input type="hidden" name="thn_pel" id="thn_pel" value="<?php echo $c->thn_pel ?>">


          <!-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->
            <?php if ($c->bukti_bayar_daful) { ?>
            <button class="btn btn-success view-file-button" data-filename="<?php echo $c->bukti_bayar_daful; ?>">Lihat Bukti Bayar</button>
            <?php } else { ?>
            <!-- Tampilkan pesan jika file tidak ada -->
            File tidak tersedia
            <?php } ?>
          <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-credit-card"></i> Validasi daftar ulang
          </button>
        </form>
          <!-- <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button> -->
        </div>
      </div>
    </section>
    <?php } ?>
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