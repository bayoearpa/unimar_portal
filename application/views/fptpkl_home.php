

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
            <h3 class="box-title">Pengajuan Turun PKL</h3>
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
  <form name="form1" id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>cek_tpkl">
    <div class="form-group">
      <a href="<?php echo base_url() ?>ajuan_tpkl"><button type="button" class="btn bg-orange btn-flat margin">Ajukan Turun PKL</button></a>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail">Masukan NIM anda untuk cek proses kliring Turun PKL</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan NIM anda">
    </div>            
        <button type="submit" class="btn btn-primary">Cari</button>   
    <div class="form-group">
      <ol>
          <li>Lakukan pengejuan Prada dengan klik tombol "Ajukan Turun PKL"</li>
          <li>Setelah proses ajuan selesai, untuk melakukan cek proses ajuan silakan memasukkan nim pada form diatas.</li>
          <li>lalu akan muncul update proses pengajuan PKL. jika semua proses telah di <b>ACC</b> maka proses pengajuan PKL telah selesai.</li>
          <li>Hubungi pihak terkait agar kliring segera di <b>ACC</b>, untuk nomor yang dapat dihibungi
              <ul>>IT (082220220573 (Bayu)) catatan : hubungi jika terjadi masalah pada sistem</ul>
              <ul>>Prodi (menghubungi prodi masing-masing)</ul>
              <ul>>PPK (085640227474 (Pak Radit) )</ul>
          </li>
      </ol>
    </div>
        
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
 