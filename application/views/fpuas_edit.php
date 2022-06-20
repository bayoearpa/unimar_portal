 <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit data diri UAS</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
               <?php 
      if ($catar==null) {
        echo $catar;
        echo "<div class='alert alert-danger'>Data Tidak Ditemukan.</div>";
      }else{
       foreach($catar as $c){  ?>
                    <!-- data diri -->
                    <a href="<?php echo base_url(); ?>uas"><button type="button" class="btn bg-olive margin"><i class="fa fa-fw fa-long-arrow-left"></i>Kembali ke Halaman Kliring UAS</button></a>
         
             <table class="table">
              <tr>
                <td width="10%"><label for="exampleInputEmail1">NIM</label></td>
                <td width="5%"><label for="exampleInputEmail1">:</label></td>
                <td><label for="exampleInputEmail1"><?php echo $c->nim; ?></label></td>
              </tr>
              <tr>
                <td><label for="exampleInputEmail1">Nama</label></td>
                <td><label for="exampleInputEmail1">:</label></td>
                <td><label for="exampleInputEmail1"><?php echo $nama; ?></label></td>
              </tr>
              <form  name="form1" id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>permohonanuas_editp">
              <tr>
                <td><label for="exampleInputEmail1">Semester</label></td>
                <td><label for="exampleInputEmail1">:</label></td>
                <td><label for="exampleInputEmail1"><input type="text" name="smt_now" id="smt_now" value="<?php echo $c->smt_now; ?>"></label></td>
                <input type="text" name="id_kuas" id="id_kuas" value="<?php echo $c->id_kuas; ?>">
              </tr>
              <tr>
                <td><label for="exampleInputEmail1">Kelas</label></td>
                <td><label for="exampleInputEmail1">:</label></td>
                <td><label for="exampleInputEmail1"><input type="text" name="kelas" id="kelas" value="<?php echo strtoupper($c->kelas); ?>"></label></td>
              </tr>
              <tr>
                <td colspan="3"><button type="submit" class="btn btn-primary">Edit Data</button></td>
              </tr>
              </form>
            </table>
                    <?php }} ?>
        </div>
        <!-- /.box-body -->
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      </div>