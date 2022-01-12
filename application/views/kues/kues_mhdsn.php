

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
            <h3 class="box-title">Survey Kepuasan Pelanggan dari Mahasiswa ke Dosen</h3>
          </div>
          <div class="box-body">
                  <!-- row -->
      <div class="row">
        <div class="col-md-12">

          <!-- konten -->
           <?php 
    echo validation_errors(); 
    echo $this->session->flashdata('success');
    echo $this->session->flashdata('error');?>
     <div class="form-group">
      <p><b>Tata Cara Pengisian Form Kuesioner Mahasiswa ke Dosen</b></p>
      <ul>
        <li>Masukan NIM/NRP dan pilih prodi pada Form dibawah ini.</li>
        <li>setelah muncul seluruh mata kuliah yang diambil lalu klik <b>"isi kuesioner"</b></li>
        <li>isikan seluruh form kuesioner tanpa boleh terlewat</li>
        <li>lalu simpan hasil isian</li>
        <li>lalu ulangi sampai semua tombol berwarna <b>"HIJAU"</b> bertulisan <b>"Sudah diisi"</b></li>
        <li>jika mengalami kesulitan dalam pengisian form kuesioner dapat menghubungi IT 082220220573 (Bayu)</li>
      </ul>
    </div>
  <form name="form1" id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>kues/kues_mhdsn_cek">
   
    <div class="form-group">
      <label for="exampleInputEmail">NRP</label>
      <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukan NIM atau NRP anda">
      <input type="hidden" class="form-control" id="ta" name="ta" value="<?php echo $ta ?>" placeholder="Masukan NIM atau NRP anda">
    </div>

     <div class="form-group">
                  <label>Prodi </label>
                  <select class="form-control" name="prodi" id="prodi">
                    <option> </option>
                    <option value="92401">D3 Ketatalaksanaan Pelayaran Niaga dan Kepelabuhanan</option>
                    <option value="92402">D3 Teknika</option>
                    <option value="92403">D3 Nautika</option>
                    <option value="61201">S1 Transportasi</option>
                    <option value="21201">S1 Teknik Mesin</option>
                    <option value="21207">S1 Teknik Transportasi Laut</option>
                    <option value="13241">S1 Teknik Keselamatan</option>
                    <option value="94205">S1 Perdagangan Internasional</option>
                  </select>
      </div>
   
        <button type="submit" class="btn btn-primary">Cari</button>        
        </form>
          <!-- /.konten -->
          
       
 