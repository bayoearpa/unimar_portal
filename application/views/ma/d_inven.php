 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Pencarian data dengan Barcode</h3>
          </div>
          <div class="box-body">
            <?php echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
              ?>
             <!--disini-->
                         <?php 
            foreach ($detail as $q) {
            # code...
            ?>
            
                <div class="form-group">
                   <a href="<?php echo base_url() ?>aset/scan"><button type="button" class="btn btn-success pull-left"><i class="fa fa-barcode"></i>Scan Barcode</button></a>
                </div>  
                <br>
                <div class="form-group">
                  <label for="exampleInputEmail"><?php echo $q->nama."-".$q->nm_gedung."-".$q->nm_ruang."-".$q->nm_barang."-".$q->brg_ke; ?></label>
                </div>  
                 <div class="form-group">
                  <label for="exampleInputEmail"> Detail :</label>
                </div>  
                <table>
                  <tr>
                    <td>Gedung</td>
                    <td>:</td>
                    <td><?php echo " ". $q->nm_gedung ?></td>
                  </tr>
                  <tr>
                    <td>Ruangan</td>
                    <td>:</td>
                    <td><?php echo " ". $q->nm_ruang ?></td>
                  </tr>
                  <tr>
                    <td>Barang</td>
                    <td>:</td>
                    <td><?php echo " ". $q->nm_barang ?></td>
                  </tr>
                  <tr>
                    <td>Merk</td>
                    <td>:</td>
                    <td><?php echo " ". $q->merk ?></td>
                  </tr>
                  <tr>
                    <td>Harga Beli</td>
                    <td>:</td>
                    <td><?php echo " ". $q->hrg_beli ?></td>
                  </tr>
                  <tr>
                    <td>Tahun Beli</td>
                    <td>:</td>
                    <td><?php echo " ". $q->thn_beli ?></td>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td><?php echo " ". $q->ket ?></td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?php echo " ". $q->status ?></td>
                  </tr>
                </table>
               
               
            <?php } ?>
             <!--/disini-->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
      
              
  

 