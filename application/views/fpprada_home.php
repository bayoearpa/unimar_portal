

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
            <h3 class="box-title">Pengajuan Prada</h3>
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
  <form name="form1" id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>cek_prada">
    <div class="form-group">
      <a href="<?php echo base_url() ?>ajuan_prada"><button type="button" class="btn bg-orange btn-flat margin">Ajukan Prada</button></a>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail">Masukan NIM anda untuk cek proses kliring Prada</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan NIM anda">
    </div>            
        <button type="submit" class="btn btn-primary">Cari</button>   
    <div class="form-group">
      <div class="callout callout-danger">
      <ol>
          <li>Lakukan pengejuan Prada dengan klik tombol "Ajukan Prada"</li>
          <li>Setelah proses ajuan selesai, untuk melakukan cek proses ajuan silakan memasukkan nim pada form diatas.</li>
          <li>lalu akan muncul update proses pengajuan prada. jika semua proses telah di <b>ACC</b> maka proses pengajuan prada telah selesai.</li>
          <li>Hubungi pihak terkait agar kliring segera di <b>ACC</b> untuk nomor yang dapat dihibungi
               <ul>>IT (082220220573 (Bayu)) catatan : hubungi jika terjadi masalah pada sistem</ul>
              <ul>>Mahatar (081312606684 (Pak Iwan Samsul))</ul>
              <ul>>Keuangan (082241613131 (Aisah))</ul>
              <ul>>BAAK 085876516196 (Rima)</ul>
              <ul>>Prodi (menghubungi prodi masing-masing)</ul>
          </li>
      </ol>
    </div>
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
 