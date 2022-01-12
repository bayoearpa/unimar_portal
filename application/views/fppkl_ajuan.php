

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
    echo validation_errors(); 
    echo $this->session->flashdata('success');
    echo $this->session->flashdata('error');?>
  <form name="form1" id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>proses_pkl">
    <a href="<?php echo base_url() ?>pkl"><button type="button" class="btn bg-olive margin"><i class="fa fa-fw fa-long-arrow-left"></i>Kembali ke Halaman PKL</button></a>
   
    <div class="form-group">
      <label for="exampleInputEmail">NRP</label>
      <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukan NRP/NIM Anda">
    </div>


    <div class="form-group">
      <label for="exampleInputEmail">Semester</label>
      <input type="text" class="form-control" id="semester" name="semester" onkeypress="return hanyaAngka(event)" maxlength="2" placeholder="Masukan Semester Anda">
      <script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
      return true;
    }
  </script>
    </div>

            
        <div class="form-group">
        <label for="exampleInputEmail">Prodi</label>
          
          <div class="radio">
            <label>
              <input type="radio" name="jenjang" id="d3" value="1" onclick="Hide('tblsmt2', this); Reveal('tblsmt1', this)">
              D3
            </label>
          </div>
            <div id="tblsmt1" style="display:none">
              
    <select name="prodi1" id="prodi" class="form-control">
      <option value="-">---</option>
    <option value="92401">Kpn</option>
    <option value="92402">Teknika</option>
    <option value="92403">Nautika</option>
    </select>
    </p>
</div>
        <div class="radio">
         <label>
           <input type="radio" name="jenjang" id="s1" value="2"  onclick="Hide('tblsmt1', this); Reveal('tblsmt2', this)">
             S1   
           </label>
           </div>              
             <div id="tblsmt2" style="display:none">
              
    <select name="prodi2" id="prodi" class="form-control">
      <option value="-">---</option>
   <option value="61201">Transportasi</option>
    </select>
    </p>
</div>

<script type="text/javascript">
  function Reveal(it, box) {
    var vis = (box.checked) ? "block" : "none";
    document.getElementById(it).style.display = vis;
  }

  function Hide(it, box) {
    var vis = (box.checked) ? "none" : "none";
    document.getElementById(it).style.display = vis;
  }
</script>


    <div class="form-group">
      <label for="exampleInputEmail">Nama Perusahaan (Tempat PKL)</label>
      <input class="form-control" type="text" name="nama_perusahaan" id="nama_perusahaan" placeholder="Masukan nama Perusahaan tempat PKL anda">
    </div>
      <div class="form-group">
      <label for="exampleInputEmail">Alamat Perusahaan (Tempat PKL)</label>
      <textarea class="form-control" id="alamat_perusahaan" name="alamat_perusahaan"  placeholder="Masukan alamat Perusahaan tempat PKL anda"></textarea>
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
 