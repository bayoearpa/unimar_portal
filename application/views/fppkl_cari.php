

      <!-- Main content -->
      <section class="content">
        <!-- <div class="callout callout-info">
          <h4>Tip!</h4>

          <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a
            sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular
            links instead.</p>
        </div> -->
      <!--   <div class="callout callout-danger">
          <h4>Warning!</h4>

          <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
            and the content will slightly differ than that of the normal layout.</p>
        </div> -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Pengajuan PKL</h3>
          </div>
          <div class="box-body">
                  <!-- row -->
      <div class="row">
        <div class="col-md-12">

          <!-- konten -->
          <?php 
    // echo validation_errors(); 
    
    if ($this->session->flashdata('success') > "0") {
      # code...
      echo "<div class='alert alert-success'>".$this->session->flashdata('success')."</div>";
    }
     if ($this->session->flashdata('error') > "0") {
      # code...
      echo "<div class='alert alert-danger'>".$this->session->flashdata('error')."</div>";
    }
    ?>
  <form name="form1" id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>cek_pkl">
    <div class="form-group">
      <a href="<?php echo base_url() ?>ajuan_pkl"><button type="button" class="btn bg-orange btn-flat margin">Ajukan Prada</button></a>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail">Masukan NIM anda untuk cek proses kliring PKL</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan NIM anda">
    </div>            
        <button type="submit" class="btn btn-primary">Cari</button>   
    <div class="form-group">
      <ol>
          <li>Lakukan pengejuan PKL dengan klik tombol "Ajukan PKL"</li>
          <li>Setelah proses ajuan selesai, untuk melakukan cek proses ajuan silakan memasukkan nim pada form diatas.</li>
          <li>lalu akan muncul update proses pengajuan PKL. jika semua proses telah di <b>ACC</b> maka proses pengajuan PKL telah selesai.</li>
      </ol>
    </div>

    <!-- cari -->
     <?php 
if ($catar==null) {
  
  echo "<div class='alert alert-danger'>Data Tidak Ditemukan.</div>";
}else{
 foreach($catar as $c){  ?>
              <!-- data diri -->
               <table class="table">
                <tr>
                  <td width="10%"><label for="exampleInputEmail1">NIM</label></td>
                  <td width="5%"><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $nim; ?></label></td>
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
                  <td><label for="exampleInputEmail1">Nama Perusahaan</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->nama_perusahaan; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Alamat Perushaan</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->alamat_perusahaan; ?></label></td>
                </tr>
              
              </table>
               <div class="form-group">
              <label for="exampleInputEmail1">Keterangan :</label>
              <a class="btn btn-warning btn-sm" href="#"><i class="fa fa-gear"></i></a>Kliring di PROSES,
              <a class="btn btn-success btn-sm" href="#"><i class="fa fa-check"></i></a>Kliring di ACC,
              <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-close"></i></a>Kliring di TOLAK
              </div>
              <!-- /data diri -->

              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Bagian</th>
                  <th>Keterangan</th>
                  <th style="width: 40px">Label</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Mahatar</td>
                  <td>
                    <?php echo $mahatar_ket; ?>
                  </td>
                  <td><?php echo $mahatar_label; ?></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>BAAK</td>
                  <td>
                    <?php echo $baak_ket; ?>
                  </td>
                  <td><?php echo $baak_label; ?></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Keuangan</td>
                  <td>
                    <?php echo $bk_ket; ?>
                  </td>
                  <td><?php echo $bk_label; ?></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Prodi</td>
                  <td>
                    <?php echo $prodi_ket; ?>
                  </td>
                  <td><?php echo $prodi_label; ?></td>
                </tr>
                 
              </table>

              <?php }}?>
    <!-- /.cari -->
        
          <!-- /.konten -->
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
 