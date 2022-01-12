

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
    echo validation_errors(); 
    echo $this->session->flashdata('success');
    echo $this->session->flashdata('error');?>
  <form name="form1" id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>proses_tpkl">
    <a href="<?php echo base_url() ?>tpkl"><button type="button" class="btn bg-olive margin"><i class="fa fa-fw fa-long-arrow-left"></i>Kembali ke Halaman Turun PKL</button></a>
   
    <div class="form-group">
      <label for="exampleInputEmail">NRP</label>
      <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukan NRP Anda">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail">No. Telp / HP (yang aktif)</label>
      <input class="form-control" type="text" name="no_telp" id="no_telp" placeholder="Masukan Nomor Telpon/HP anda yang aktif">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail">Judul PKL</label>
      <textarea class="form-control" id="judul_pkl" name="judul_pkl"  placeholder="Masukan Judul PKL anda"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail">Upload File Konduite (format file konduite download---> <a href="<?php echo base_url() ?>form_file_konduite" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>disini</a>) </label>
      <input class="form-control" type="file" name="file_k" id="file_k" placeholder="upload file konduite">
    </div>
     <div class="form-group">
      <label for="exampleInputEmail">Upload File Surat Off dari Perusahaan PKL</label>
      <input class="form-control" type="file" name="file_sk" id="file_sk" placeholder="upload file Surat Keterangan off dari Perusahaan judul_pkl">
    </div>

   
        <button type="submit" class="btn btn-primary">Simpan</button>        
        
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
 