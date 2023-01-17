 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Detail Karyawan dan Dosen</h3>
          </div>
          <div class="box-body">
            <?php echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
            foreach ($kardos as $k) {
              # code...
              ?>
               <table>
          <tr>
            <td>Niak</td>
            <td>:</td>
            <td><?php echo $k->niak ?></td>
          </tr>
          <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?php echo $k->nama ?></td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><?php echo $k->jenis_kelamin ?></td>
          </tr>
          <tr>
            <td>Tempat Lahir</td>
            <td>:</td>
            <td><?php echo $k->tempat_lahir ?></td>
          </tr>
          <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td><?php echo $k->tanggal_lahir ?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?php echo $k->alamat ?></td>
          </tr>
          <tr>
            <td>Agama</td>
            <td>:</td>
            <td><?php echo $k->agama ?></td>
          </tr>
          <tr>
            <td>Telepon</td>
            <td>:</td>
            <td><?php echo $k->telepon ?></td>
          </tr>
          <tr>
            <td>Status Nikah</td>
            <td>:</td>
            <td><?php echo $k->status_nikah ?></td>
          </tr>
          <tr>
          <td>Jabatan</td>
            <td>:</td>
            <td><?php echo $k->nama_jabatan ?></td>
          </tr>
          <tr>
          <td>SK Karyawan Tetap</td>
            <td>:</td>
            <td><?php echo $k->sk_kartep ?></td>
          </tr>
          <tr>
          <td>TMT Karyawan Tetap</td>
            <td>:</td>
            <td><?php echo $k->kartep_tmt ?></td>
          </tr>
          <tr>
          <td>SK Dosen Tetap</td>
            <td>:</td>
            <td><?php echo $k->sk_dostep ?></td>
          </tr>
          <tr>
          <td>TMT Dosen Tetap</td>
            <td>:</td>
            <td><?php echo $k->dostep_tmt ?></td>
          </tr>
          <td>Status</td>
            <td>:</td>
            <td><?php echo $k->status ?></td>
          </tr>
        </table>
              
              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->