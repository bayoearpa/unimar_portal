

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
            <h3 class="box-title">Kuesioner mahasiswa ke dosen</h3>
          </div>
          <div class="box-body">
                  <!-- row -->
      <div class="row">
        <div class="col-md-12">

          <!-- konten -->
 <form name="form1" id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>kues/kues_mhdsn_proses">
    <table>
      <?php 
      foreach ($select as $s) {
        # code...
      }
       ?>
    <tr>
      <td>Nama Mahatar <i>(Wajib Diisi)</i>   :</td>
          <td>
            <?php echo $s->nama ?>
            <input type="hidden" name="nama" value="<?php echo $s->nama ?>"></td>
        </tr>
        <tr>
            <td>NIM/NRP<i>(Wajib Diisi)</i>   :</td>
            <td>
              <?php echo $s->nim ?>
              <input type="hidden" name="nim" value="<?php echo $s->nim ?>"></td>
        </tr>
        <tr>
            <td>Fakultas<i>(Wajib Diisi)</i>   :</td>
            <td>
              <?php echo $fak ?>
              <input type="hidden" name="fak" value="<?php echo $fak ?>"></td>
        </tr>
        <tr>
            <td>Prodi<i>(Wajib Diisi)</i>   :</td>
            <td>
              <?php echo $s->prodi ?>
              <input type="hidden" name="prodi" value="<?php echo $kode_prodi ?>">
            </td>
        </tr>
        <tr>
            <td>Nama Dosen yang dinilai<i>(Wajib Diisi)</i>   :</td>
            <td>
             <?php echo $nama_dosen ?>
             <input type="hidden" name="kode_dosen" value="<?php echo $kode_dosen ?>">
            </td>
       </tr>
        <tr>
            <td>Mata Kuliah yang diampu<i>(Wajib Diisi)</i>   :</td>
            <td>
             <?php echo $nama_matkul ?>
             <input type="hidden" name="kode_matkul" value="<?php echo $kode_matkul ?>">
             <input type="hidden" name="ta" value="<?php echo $ta ?>">
             <input type="hidden" name="kelas" value="<?php echo $s->kelas ?>">
            </td>
        </tr>
    </table>
    <p>
    Beri tanda centang (v) piih sekor anda dalam kolom yang ada.
    <br>Skor : 1 = sangat tidak setuju, 2 = tidak setuju, 3 = kurang setuju, 4 = setuju, 5 = sangat setuju
    </p>
   <table>
    <tr>
      <td><b>1.</b></td>
      <td colspan="5"><b>Pelayanan UNIMAR AMNI sangat membantu dalam proses pelaksanaan kegiatan pembelajaran Mahatar</b></td>
    </tr>
    <tr>
      <td><b>Pilihan</b></td>
      <td><b>Sangat Tidak Setuju</b></td>
      <td><b>Tidak Setuju</b></td>
      <td><b>Biasa Saja</b></td>
      <td><b>Setuju</b></td>
      <td><b>Sangat Setuju</b></td>
    </tr>
    <tr>
      <td>Fakultas</td>
      <td align="center"><input type="radio" name="ml_1a" value="1"></td>
          <td align="center"><input type="radio" name="ml_1a" value="2"></td>
          <td align="center"><input type="radio" name="ml_1a" value="3"></td>
          <td align="center"><input type="radio" name="ml_1a" value="4"></td>
          <td align="center"><input type="radio" name="ml_1a" value="5"></td>
    </tr>
    <tr>
      <td>Program Studi</td>
      <td align="center"><input type="radio" name="ml_1b" value="1"></td>
          <td align="center"><input type="radio" name="ml_1b" value="2"></td>
          <td align="center"><input type="radio" name="ml_1b" value="3"></td>
          <td align="center"><input type="radio" name="ml_1b" value="4"></td>
          <td align="center"><input type="radio" name="ml_1b" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Keuangan</td>
      <td align="center"><input type="radio" name="ml_1c" value="1"></td>
          <td align="center"><input type="radio" name="ml_1c" value="2"></td>
          <td align="center"><input type="radio" name="ml_1c" value="3"></td>
          <td align="center"><input type="radio" name="ml_1c" value="4"></td>
          <td align="center"><input type="radio" name="ml_1c" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Umum (Sarpras)</td>
      <td align="center"><input type="radio" name="ml_1d" value="1"></td>
          <td align="center"><input type="radio" name="ml_1d" value="2"></td>
          <td align="center"><input type="radio" name="ml_1d" value="3"></td>
          <td align="center"><input type="radio" name="ml_1d" value="4"></td>
          <td align="center"><input type="radio" name="ml_1d" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Kemahataran (Pencamahatar, Registrasi)</td>
      <td align="center"><input type="radio" name="ml_1e" value="1"></td>
          <td align="center"><input type="radio" name="ml_1e" value="2"></td>
          <td align="center"><input type="radio" name="ml_1e" value="3"></td>
          <td align="center"><input type="radio" name="ml_1e" value="4"></td>
          <td align="center"><input type="radio" name="ml_1e" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Akademik (Pengajaran, Ujian Akademik, UKP) </td>
      <td align="center"><input type="radio" name="ml_1f" value="1"></td>
          <td align="center"><input type="radio" name="ml_1f" value="2"></td>
          <td align="center"><input type="radio" name="ml_1f" value="3"></td>
          <td align="center"><input type="radio" name="ml_1f" value="4"></td>
          <td align="center"><input type="radio" name="ml_1f" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Pengembangan Mahatar dan Alumni </td>
      <td align="center"><input type="radio" name="ml_1g" value="1"></td>
          <td align="center"><input type="radio" name="ml_1g" value="2"></td>
          <td align="center"><input type="radio" name="ml_1g" value="3"></td>
          <td align="center"><input type="radio" name="ml_1g" value="4"></td>
          <td align="center"><input type="radio" name="ml_1g" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Bemahatar</td>
      <td align="center"><input type="radio" name="ml_1h" value="1"></td>
          <td align="center"><input type="radio" name="ml_1h" value="2"></td>
          <td align="center"><input type="radio" name="ml_1h" value="3"></td>
          <td align="center"><input type="radio" name="ml_1h" value="4"></td>
          <td align="center"><input type="radio" name="ml_1h" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Perpustakaan</td>
      <td align="center"><input type="radio" name="ml_1i" value="1"></td>
          <td align="center"><input type="radio" name="ml_1i" value="2"></td>
          <td align="center"><input type="radio" name="ml_1i" value="3"></td>
          <td align="center"><input type="radio" name="ml_1i" value="4"></td>
          <td align="center"><input type="radio" name="ml_1i" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Laboratorium</td>
      <td align="center"><input type="radio" name="ml_1j" value="1"></td>
          <td align="center"><input type="radio" name="ml_1j" value="2"></td>
          <td align="center"><input type="radio" name="ml_1j" value="3"></td>
          <td align="center"><input type="radio" name="ml_1j" value="4"></td>
          <td align="center"><input type="radio" name="ml_1j" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prada dan PKL</td>
      <td align="center"><input type="radio" name="ml_1k" value="1"></td>
          <td align="center"><input type="radio" name="ml_1k" value="2"></td>
          <td align="center"><input type="radio" name="ml_1k" value="3"></td>
          <td align="center"><input type="radio" name="ml_1k" value="4"></td>
          <td align="center"><input type="radio" name="ml_1k" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prala</td>
      <td align="center"><input type="radio" name="ml_1l" value="1"></td>
          <td align="center"><input type="radio" name="ml_1l" value="2"></td>
          <td align="center"><input type="radio" name="ml_1l" value="3"></td>
          <td align="center"><input type="radio" name="ml_1l" value="4"></td>
          <td align="center"><input type="radio" name="ml_1l" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Umum</td>
      <td align="center"><input type="radio" name="ml_1m" value="1"></td>
          <td align="center"><input type="radio" name="ml_1m" value="2"></td>
          <td align="center"><input type="radio" name="ml_1m" value="3"></td>
          <td align="center"><input type="radio" name="ml_1m" value="4"></td>
          <td align="center"><input type="radio" name="ml_1m" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Khusus Pelaut (DKP)</td>
      <td align="center"><input type="radio" name="ml_1n" value="1"></td>
          <td align="center"><input type="radio" name="ml_1n" value="2"></td>
          <td align="center"><input type="radio" name="ml_1n" value="3"></td>
          <td align="center"><input type="radio" name="ml_1n" value="4"></td>
          <td align="center"><input type="radio" name="ml_1n" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Pusat Komputer</td>
      <td align="center"><input type="radio" name="ml_1o" value="1"></td>
          <td align="center"><input type="radio" name="ml_1o" value="2"></td>
          <td align="center"><input type="radio" name="ml_1o" value="3"></td>
          <td align="center"><input type="radio" name="ml_1o" value="4"></td>
          <td align="center"><input type="radio" name="ml_1o" value="5"></td>
    </tr>
    <tr>
      <td><b>2.</b></td>
      <td colspan="5"><b> PIC dan/atau Petugas UNIMAR AMNI menguasai bidang yang menjadi tanggung jawab pelayanannya</b></td>
    </tr>
    <tr>
      <td><b>Pilihan</b></td>
      <td><b>Sangat Tidak Setuju</b></td>
      <td><b>Tidak Setuju</b></td>
      <td><b>Biasa Saja</b></td>
      <td><b>Setuju</b></td>
      <td><b>Sangat Setuju</b></td>
    </tr>
    <tr>
      <td>Fakultas</td>
      <td align="center"><input type="radio" name="ml_2a" value="1"></td>
          <td align="center"><input type="radio" name="ml_2a" value="2"></td>
          <td align="center"><input type="radio" name="ml_2a" value="3"></td>
          <td align="center"><input type="radio" name="ml_2a" value="4"></td>
          <td align="center"><input type="radio" name="ml_2a" value="5"></td>
    </tr>
    <tr>
      <td>Program Studi</td>
      <td align="center"><input type="radio" name="ml_2b" value="1"></td>
          <td align="center"><input type="radio" name="ml_2b" value="2"></td>
          <td align="center"><input type="radio" name="ml_2b" value="3"></td>
          <td align="center"><input type="radio" name="ml_2b" value="4"></td>
          <td align="center"><input type="radio" name="ml_2b" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Keuangan</td>
      <td align="center"><input type="radio" name="ml_2c" value="1"></td>
          <td align="center"><input type="radio" name="ml_2c" value="2"></td>
          <td align="center"><input type="radio" name="ml_2c" value="3"></td>
          <td align="center"><input type="radio" name="ml_2c" value="4"></td>
          <td align="center"><input type="radio" name="ml_2c" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Umum (Sarpras)</td>
      <td align="center"><input type="radio" name="ml_2d" value="1"></td>
          <td align="center"><input type="radio" name="ml_2d" value="2"></td>
          <td align="center"><input type="radio" name="ml_2d" value="3"></td>
          <td align="center"><input type="radio" name="ml_2d" value="4"></td>
          <td align="center"><input type="radio" name="ml_2d" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Kemahataran (Pencamahatar, Registrasi)</td>
      <td align="center"><input type="radio" name="ml_2e" value="1"></td>
          <td align="center"><input type="radio" name="ml_2e" value="2"></td>
          <td align="center"><input type="radio" name="ml_2e" value="3"></td>
          <td align="center"><input type="radio" name="ml_2e" value="4"></td>
          <td align="center"><input type="radio" name="ml_2e" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Akademik (Pengajaran, Ujian Akademik, UKP) </td>
      <td align="center"><input type="radio" name="ml_2f" value="1"></td>
          <td align="center"><input type="radio" name="ml_2f" value="2"></td>
          <td align="center"><input type="radio" name="ml_2f" value="3"></td>
          <td align="center"><input type="radio" name="ml_2f" value="4"></td>
          <td align="center"><input type="radio" name="ml_2f" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Pengembangan Mahatar dan Alumni </td>
      <td align="center"><input type="radio" name="ml_2g" value="1"></td>
          <td align="center"><input type="radio" name="ml_2g" value="2"></td>
          <td align="center"><input type="radio" name="ml_2g" value="3"></td>
          <td align="center"><input type="radio" name="ml_2g" value="4"></td>
          <td align="center"><input type="radio" name="ml_2g" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Bemahatar</td>
      <td align="center"><input type="radio" name="ml_2h" value="1"></td>
          <td align="center"><input type="radio" name="ml_2h" value="2"></td>
          <td align="center"><input type="radio" name="ml_2h" value="3"></td>
          <td align="center"><input type="radio" name="ml_2h" value="4"></td>
          <td align="center"><input type="radio" name="ml_2h" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Perpustakaan</td>
      <td align="center"><input type="radio" name="ml_2i" value="1"></td>
          <td align="center"><input type="radio" name="ml_2i" value="2"></td>
          <td align="center"><input type="radio" name="ml_2i" value="3"></td>
          <td align="center"><input type="radio" name="ml_2i" value="4"></td>
          <td align="center"><input type="radio" name="ml_2i" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Laboratorium</td>
      <td align="center"><input type="radio" name="ml_2j" value="1"></td>
          <td align="center"><input type="radio" name="ml_2j" value="2"></td>
          <td align="center"><input type="radio" name="ml_2j" value="3"></td>
          <td align="center"><input type="radio" name="ml_2j" value="4"></td>
          <td align="center"><input type="radio" name="ml_2j" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prada dan PKL</td>
      <td align="center"><input type="radio" name="ml_2k" value="1"></td>
          <td align="center"><input type="radio" name="ml_2k" value="2"></td>
          <td align="center"><input type="radio" name="ml_2k" value="3"></td>
          <td align="center"><input type="radio" name="ml_2k" value="4"></td>
          <td align="center"><input type="radio" name="ml_2k" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prala</td>
      <td align="center"><input type="radio" name="ml_2l" value="1"></td>
          <td align="center"><input type="radio" name="ml_2l" value="2"></td>
          <td align="center"><input type="radio" name="ml_2l" value="3"></td>
          <td align="center"><input type="radio" name="ml_2l" value="4"></td>
          <td align="center"><input type="radio" name="ml_2l" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Umum</td>
      <td align="center"><input type="radio" name="ml_2m" value="1"></td>
          <td align="center"><input type="radio" name="ml_2m" value="2"></td>
          <td align="center"><input type="radio" name="ml_2m" value="3"></td>
          <td align="center"><input type="radio" name="ml_2m" value="4"></td>
          <td align="center"><input type="radio" name="ml_2m" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Khusus Pelaut (DKP)</td>
      <td align="center"><input type="radio" name="ml_2n" value="1"></td>
          <td align="center"><input type="radio" name="ml_2n" value="2"></td>
          <td align="center"><input type="radio" name="ml_2n" value="3"></td>
          <td align="center"><input type="radio" name="ml_2n" value="4"></td>
          <td align="center"><input type="radio" name="ml_2n" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Pusat Komputer</td>
      <td align="center"><input type="radio" name="ml_2o" value="1"></td>
          <td align="center"><input type="radio" name="ml_2o" value="2"></td>
          <td align="center"><input type="radio" name="ml_2o" value="3"></td>
          <td align="center"><input type="radio" name="ml_2o" value="4"></td>
          <td align="center"><input type="radio" name="ml_2o" value="5"></td>
    </tr>
    <tr>
      <td><b>3.</b></td>
      <td colspan="5"><b> Dukungan layanan UNIMAR AMNI dalam membantu Mahatar</b></td>
    </tr>
    <tr>
      <td><b>Pilihan</b></td>
      <td><b>Sangat Tidak Setuju</b></td>
      <td><b>Tidak Setuju</b></td>
      <td><b>Biasa Saja</b></td>
      <td><b>Setuju</b></td>
      <td><b>Sangat Setuju</b></td>
    </tr>
    <tr>
      <td>Fakultas</td>
      <td align="center"><input type="radio" name="ml_3a" value="1"></td>
          <td align="center"><input type="radio" name="ml_3a" value="2"></td>
          <td align="center"><input type="radio" name="ml_3a" value="3"></td>
          <td align="center"><input type="radio" name="ml_3a" value="4"></td>
          <td align="center"><input type="radio" name="ml_3a" value="5"></td>
    </tr>
    <tr>
      <td>Program Studi</td>
      <td align="center"><input type="radio" name="ml_3b" value="1"></td>
          <td align="center"><input type="radio" name="ml_3b" value="2"></td>
          <td align="center"><input type="radio" name="ml_3b" value="3"></td>
          <td align="center"><input type="radio" name="ml_3b" value="4"></td>
          <td align="center"><input type="radio" name="ml_3b" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Keuangan</td>
      <td align="center"><input type="radio" name="ml_3c" value="1"></td>
          <td align="center"><input type="radio" name="ml_3c" value="2"></td>
          <td align="center"><input type="radio" name="ml_3c" value="3"></td>
          <td align="center"><input type="radio" name="ml_3c" value="4"></td>
          <td align="center"><input type="radio" name="ml_3c" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Umum (Sarpras)</td>
      <td align="center"><input type="radio" name="ml_3d" value="1"></td>
          <td align="center"><input type="radio" name="ml_3d" value="2"></td>
          <td align="center"><input type="radio" name="ml_3d" value="3"></td>
          <td align="center"><input type="radio" name="ml_3d" value="4"></td>
          <td align="center"><input type="radio" name="ml_3d" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Kemahataran (Pencamahatar, Registrasi)</td>
      <td align="center"><input type="radio" name="ml_3e" value="1"></td>
          <td align="center"><input type="radio" name="ml_3e" value="2"></td>
          <td align="center"><input type="radio" name="ml_3e" value="3"></td>
          <td align="center"><input type="radio" name="ml_3e" value="4"></td>
          <td align="center"><input type="radio" name="ml_3e" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Akademik (Pengajaran, Ujian Akademik, UKP) </td>
      <td align="center"><input type="radio" name="ml_3f" value="1"></td>
          <td align="center"><input type="radio" name="ml_3f" value="2"></td>
          <td align="center"><input type="radio" name="ml_3f" value="3"></td>
          <td align="center"><input type="radio" name="ml_3f" value="4"></td>
          <td align="center"><input type="radio" name="ml_3f" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Pengembangan Mahatar dan Alumni </td>
      <td align="center"><input type="radio" name="ml_3g" value="1"></td>
          <td align="center"><input type="radio" name="ml_3g" value="2"></td>
          <td align="center"><input type="radio" name="ml_3g" value="3"></td>
          <td align="center"><input type="radio" name="ml_3g" value="4"></td>
          <td align="center"><input type="radio" name="ml_3g" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Bemahatar</td>
      <td align="center"><input type="radio" name="ml_3h" value="1"></td>
          <td align="center"><input type="radio" name="ml_3h" value="2"></td>
          <td align="center"><input type="radio" name="ml_3h" value="3"></td>
          <td align="center"><input type="radio" name="ml_3h" value="4"></td>
          <td align="center"><input type="radio" name="ml_3h" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Perpustakaan</td>
      <td align="center"><input type="radio" name="ml_3i" value="1"></td>
          <td align="center"><input type="radio" name="ml_3i" value="2"></td>
          <td align="center"><input type="radio" name="ml_3i" value="3"></td>
          <td align="center"><input type="radio" name="ml_3i" value="4"></td>
          <td align="center"><input type="radio" name="ml_3i" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Laboratorium</td>
      <td align="center"><input type="radio" name="ml_3j" value="1"></td>
          <td align="center"><input type="radio" name="ml_3j" value="2"></td>
          <td align="center"><input type="radio" name="ml_3j" value="3"></td>
          <td align="center"><input type="radio" name="ml_3j" value="4"></td>
          <td align="center"><input type="radio" name="ml_3j" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prada dan PKL</td>
      <td align="center"><input type="radio" name="ml_3k" value="1"></td>
          <td align="center"><input type="radio" name="ml_3k" value="2"></td>
          <td align="center"><input type="radio" name="ml_3k" value="3"></td>
          <td align="center"><input type="radio" name="ml_3k" value="4"></td>
          <td align="center"><input type="radio" name="ml_3k" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prala</td>
      <td align="center"><input type="radio" name="ml_3l" value="1"></td>
          <td align="center"><input type="radio" name="ml_3l" value="2"></td>
          <td align="center"><input type="radio" name="ml_3l" value="3"></td>
          <td align="center"><input type="radio" name="ml_3l" value="4"></td>
          <td align="center"><input type="radio" name="ml_3l" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Umum</td>
      <td align="center"><input type="radio" name="ml_3m" value="1"></td>
          <td align="center"><input type="radio" name="ml_3m" value="2"></td>
          <td align="center"><input type="radio" name="ml_3m" value="3"></td>
          <td align="center"><input type="radio" name="ml_3m" value="4"></td>
          <td align="center"><input type="radio" name="ml_3m" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Khusus Pelaut (DKP)</td>
      <td align="center"><input type="radio" name="ml_3n" value="1"></td>
          <td align="center"><input type="radio" name="ml_3n" value="2"></td>
          <td align="center"><input type="radio" name="ml_3n" value="3"></td>
          <td align="center"><input type="radio" name="ml_3n" value="4"></td>
          <td align="center"><input type="radio" name="ml_3n" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Pusat Komputer</td>
      <td align="center"><input type="radio" name="ml_3o" value="1"></td>
          <td align="center"><input type="radio" name="ml_3o" value="2"></td>
          <td align="center"><input type="radio" name="ml_3o" value="3"></td>
          <td align="center"><input type="radio" name="ml_3o" value="4"></td>
          <td align="center"><input type="radio" name="ml_3o" value="5"></td>
    </tr>
    <tr>
      <td><b>4.</b></td>
      <td colspan="5"><b> PIC dan / atau Petugas UNIMAR AMNI memberikan layanan yang ramah dan memuaskan</b></td>
    </tr>
    <tr>
      <td><b>Pilihan</b></td>
      <td><b>Sangat Tidak Setuju</b></td>
      <td><b>Tidak Setuju</b></td>
      <td><b>Biasa Saja</b></td>
      <td><b>Setuju</b></td>
      <td><b>Sangat Setuju</b></td>
    </tr>
    <tr>
      <td>Fakultas</td>
      <td align="center"><input type="radio" name="ml_4a" value="1"></td>
          <td align="center"><input type="radio" name="ml_4a" value="2"></td>
          <td align="center"><input type="radio" name="ml_4a" value="3"></td>
          <td align="center"><input type="radio" name="ml_4a" value="4"></td>
          <td align="center"><input type="radio" name="ml_4a" value="5"></td>
    </tr>
    <tr>
      <td>Program Studi</td>
      <td align="center"><input type="radio" name="ml_4b" value="1"></td>
          <td align="center"><input type="radio" name="ml_4b" value="2"></td>
          <td align="center"><input type="radio" name="ml_4b" value="3"></td>
          <td align="center"><input type="radio" name="ml_4b" value="4"></td>
          <td align="center"><input type="radio" name="ml_4b" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Keuangan</td>
      <td align="center"><input type="radio" name="ml_4c" value="1"></td>
          <td align="center"><input type="radio" name="ml_4c" value="2"></td>
          <td align="center"><input type="radio" name="ml_4c" value="3"></td>
          <td align="center"><input type="radio" name="ml_4c" value="4"></td>
          <td align="center"><input type="radio" name="ml_4c" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Umum (Sarpras)</td>
      <td align="center"><input type="radio" name="ml_4d" value="1"></td>
          <td align="center"><input type="radio" name="ml_4d" value="2"></td>
          <td align="center"><input type="radio" name="ml_4d" value="3"></td>
          <td align="center"><input type="radio" name="ml_4d" value="4"></td>
          <td align="center"><input type="radio" name="ml_4d" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Kemahataran (Pencamahatar, Registrasi)</td>
      <td align="center"><input type="radio" name="ml_4e" value="1"></td>
          <td align="center"><input type="radio" name="ml_4e" value="2"></td>
          <td align="center"><input type="radio" name="ml_4e" value="3"></td>
          <td align="center"><input type="radio" name="ml_4e" value="4"></td>
          <td align="center"><input type="radio" name="ml_4e" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Akademik (Pengajaran, Ujian Akademik, UKP) </td>
      <td align="center"><input type="radio" name="ml_4f" value="1"></td>
          <td align="center"><input type="radio" name="ml_4f" value="2"></td>
          <td align="center"><input type="radio" name="ml_4f" value="3"></td>
          <td align="center"><input type="radio" name="ml_4f" value="4"></td>
          <td align="center"><input type="radio" name="ml_4f" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Pengembangan Mahatar dan Alumni </td>
      <td align="center"><input type="radio" name="ml_4g" value="1"></td>
          <td align="center"><input type="radio" name="ml_4g" value="2"></td>
          <td align="center"><input type="radio" name="ml_4g" value="3"></td>
          <td align="center"><input type="radio" name="ml_4g" value="4"></td>
          <td align="center"><input type="radio" name="ml_4g" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Bemahatar</td>
      <td align="center"><input type="radio" name="ml_4h" value="1"></td>
          <td align="center"><input type="radio" name="ml_4h" value="2"></td>
          <td align="center"><input type="radio" name="ml_4h" value="3"></td>
          <td align="center"><input type="radio" name="ml_4h" value="4"></td>
          <td align="center"><input type="radio" name="ml_4h" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Perpustakaan</td>
      <td align="center"><input type="radio" name="ml_4i" value="1"></td>
          <td align="center"><input type="radio" name="ml_4i" value="2"></td>
          <td align="center"><input type="radio" name="ml_4i" value="3"></td>
          <td align="center"><input type="radio" name="ml_4i" value="4"></td>
          <td align="center"><input type="radio" name="ml_4i" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Laboratorium</td>
      <td align="center"><input type="radio" name="ml_4j" value="1"></td>
          <td align="center"><input type="radio" name="ml_4j" value="2"></td>
          <td align="center"><input type="radio" name="ml_4j" value="3"></td>
          <td align="center"><input type="radio" name="ml_4j" value="4"></td>
          <td align="center"><input type="radio" name="ml_4j" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prada dan PKL</td>
      <td align="center"><input type="radio" name="ml_4k" value="1"></td>
          <td align="center"><input type="radio" name="ml_4k" value="2"></td>
          <td align="center"><input type="radio" name="ml_4k" value="3"></td>
          <td align="center"><input type="radio" name="ml_4k" value="4"></td>
          <td align="center"><input type="radio" name="ml_4k" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prala</td>
      <td align="center"><input type="radio" name="ml_4l" value="1"></td>
          <td align="center"><input type="radio" name="ml_4l" value="2"></td>
          <td align="center"><input type="radio" name="ml_4l" value="3"></td>
          <td align="center"><input type="radio" name="ml_4l" value="4"></td>
          <td align="center"><input type="radio" name="ml_4l" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Umum</td>
      <td align="center"><input type="radio" name="ml_4m" value="1"></td>
          <td align="center"><input type="radio" name="ml_4m" value="2"></td>
          <td align="center"><input type="radio" name="ml_4m" value="3"></td>
          <td align="center"><input type="radio" name="ml_4m" value="4"></td>
          <td align="center"><input type="radio" name="ml_4m" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Khusus Pelaut (DKP)</td>
      <td align="center"><input type="radio" name="ml_4n" value="1"></td>
          <td align="center"><input type="radio" name="ml_4n" value="2"></td>
          <td align="center"><input type="radio" name="ml_4n" value="3"></td>
          <td align="center"><input type="radio" name="ml_4n" value="4"></td>
          <td align="center"><input type="radio" name="ml_4n" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Pusat Komputer</td>
      <td align="center"><input type="radio" name="ml_4o" value="1"></td>
          <td align="center"><input type="radio" name="ml_4o" value="2"></td>
          <td align="center"><input type="radio" name="ml_4o" value="3"></td>
          <td align="center"><input type="radio" name="ml_4o" value="4"></td>
          <td align="center"><input type="radio" name="ml_4o" value="5"></td>
    </tr>
    <tr>
      <td><b>5.</b></td>
      <td colspan="5"><b> PIC dan/atau Petugas pelayanan UNIMAR AMNI bersikap terbuka dan kooperatif dalam melayani Mahatar</b></td>
    </tr>
    <tr>
      <td><b>Pilihan</b></td>
      <td><b>Sangat Tidak Setuju</b></td>
      <td><b>Tidak Setuju</b></td>
      <td><b>Biasa Saja</b></td>
      <td><b>Setuju</b></td>
      <td><b>Sangat Setuju</b></td>
    </tr>
    <tr>
      <td>Fakultas</td>
      <td align="center"><input type="radio" name="ml_5a" value="1"></td>
          <td align="center"><input type="radio" name="ml_5a" value="2"></td>
          <td align="center"><input type="radio" name="ml_5a" value="3"></td>
          <td align="center"><input type="radio" name="ml_5a" value="4"></td>
          <td align="center"><input type="radio" name="ml_5a" value="5"></td>
    </tr>
    <tr>
      <td>Program Studi</td>
      <td align="center"><input type="radio" name="ml_5b" value="1"></td>
          <td align="center"><input type="radio" name="ml_5b" value="2"></td>
          <td align="center"><input type="radio" name="ml_5b" value="3"></td>
          <td align="center"><input type="radio" name="ml_5b" value="4"></td>
          <td align="center"><input type="radio" name="ml_5b" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Keuangan</td>
      <td align="center"><input type="radio" name="ml_5c" value="1"></td>
          <td align="center"><input type="radio" name="ml_5c" value="2"></td>
          <td align="center"><input type="radio" name="ml_5c" value="3"></td>
          <td align="center"><input type="radio" name="ml_5c" value="4"></td>
          <td align="center"><input type="radio" name="ml_5c" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Umum (Sarpras)</td>
      <td align="center"><input type="radio" name="ml_5d" value="1"></td>
          <td align="center"><input type="radio" name="ml_5d" value="2"></td>
          <td align="center"><input type="radio" name="ml_5d" value="3"></td>
          <td align="center"><input type="radio" name="ml_5d" value="4"></td>
          <td align="center"><input type="radio" name="ml_5d" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Kemahataran (Pencamahatar, Registrasi)</td>
      <td align="center"><input type="radio" name="ml_5e" value="1"></td>
          <td align="center"><input type="radio" name="ml_5e" value="2"></td>
          <td align="center"><input type="radio" name="ml_5e" value="3"></td>
          <td align="center"><input type="radio" name="ml_5e" value="4"></td>
          <td align="center"><input type="radio" name="ml_5e" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Akademik (Pengajaran, Ujian Akademik, UKP) </td>
      <td align="center"><input type="radio" name="ml_5f" value="1"></td>
          <td align="center"><input type="radio" name="ml_5f" value="2"></td>
          <td align="center"><input type="radio" name="ml_5f" value="3"></td>
          <td align="center"><input type="radio" name="ml_5f" value="4"></td>
          <td align="center"><input type="radio" name="ml_5f" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Pengembangan Mahatar dan Alumni </td>
      <td align="center"><input type="radio" name="ml_5g" value="1"></td>
          <td align="center"><input type="radio" name="ml_5g" value="2"></td>
          <td align="center"><input type="radio" name="ml_5g" value="3"></td>
          <td align="center"><input type="radio" name="ml_5g" value="4"></td>
          <td align="center"><input type="radio" name="ml_5g" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Bemahatar</td>
      <td align="center"><input type="radio" name="ml_5h" value="1"></td>
          <td align="center"><input type="radio" name="ml_5h" value="2"></td>
          <td align="center"><input type="radio" name="ml_5h" value="3"></td>
          <td align="center"><input type="radio" name="ml_5h" value="4"></td>
          <td align="center"><input type="radio" name="ml_5h" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Perpustakaan</td>
      <td align="center"><input type="radio" name="ml_5i" value="1"></td>
          <td align="center"><input type="radio" name="ml_5i" value="2"></td>
          <td align="center"><input type="radio" name="ml_5i" value="3"></td>
          <td align="center"><input type="radio" name="ml_5i" value="4"></td>
          <td align="center"><input type="radio" name="ml_5i" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Laboratorium</td>
      <td align="center"><input type="radio" name="ml_5j" value="1"></td>
          <td align="center"><input type="radio" name="ml_5j" value="2"></td>
          <td align="center"><input type="radio" name="ml_5j" value="3"></td>
          <td align="center"><input type="radio" name="ml_5j" value="4"></td>
          <td align="center"><input type="radio" name="ml_5j" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prada dan PKL</td>
      <td align="center"><input type="radio" name="ml_5k" value="1"></td>
          <td align="center"><input type="radio" name="ml_5k" value="2"></td>
          <td align="center"><input type="radio" name="ml_5k" value="3"></td>
          <td align="center"><input type="radio" name="ml_5k" value="4"></td>
          <td align="center"><input type="radio" name="ml_5k" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prala</td>
      <td align="center"><input type="radio" name="ml_5l" value="1"></td>
          <td align="center"><input type="radio" name="ml_5l" value="2"></td>
          <td align="center"><input type="radio" name="ml_5l" value="3"></td>
          <td align="center"><input type="radio" name="ml_5l" value="4"></td>
          <td align="center"><input type="radio" name="ml_5l" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Umum</td>
      <td align="center"><input type="radio" name="ml_5m" value="1"></td>
          <td align="center"><input type="radio" name="ml_5m" value="2"></td>
          <td align="center"><input type="radio" name="ml_5m" value="3"></td>
          <td align="center"><input type="radio" name="ml_5m" value="4"></td>
          <td align="center"><input type="radio" name="ml_5m" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Khusus Pelaut (DKP)</td>
      <td align="center"><input type="radio" name="ml_5n" value="1"></td>
          <td align="center"><input type="radio" name="ml_5n" value="2"></td>
          <td align="center"><input type="radio" name="ml_5n" value="3"></td>
          <td align="center"><input type="radio" name="ml_5n" value="4"></td>
          <td align="center"><input type="radio" name="ml_5n" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Pusat Komputer</td>
      <td align="center"><input type="radio" name="ml_5o" value="1"></td>
          <td align="center"><input type="radio" name="ml_5o" value="2"></td>
          <td align="center"><input type="radio" name="ml_5o" value="3"></td>
          <td align="center"><input type="radio" name="ml_5o" value="4"></td>
          <td align="center"><input type="radio" name="ml_5o" value="5"></td>
    </tr>
    <tr>
      <td><b>6.</b></td>
      <td colspan="5"><b> Pelayanan UNIMAR AMNI memfasilitasi kegiatan Mahatar</b></td>
    </tr>
    <tr>
      <td><b>Pilihan</b></td>
      <td><b>Sangat Tidak Setuju</b></td>
      <td><b>Tidak Setuju</b></td>
      <td><b>Biasa Saja</b></td>
      <td><b>Setuju</b></td>
      <td><b>Sangat Setuju</b></td>
    </tr>
    <tr>
      <td>Fakultas</td>
      <td align="center"><input type="radio" name="ml_6a" value="1"></td>
          <td align="center"><input type="radio" name="ml_6a" value="2"></td>
          <td align="center"><input type="radio" name="ml_6a" value="3"></td>
          <td align="center"><input type="radio" name="ml_6a" value="4"></td>
          <td align="center"><input type="radio" name="ml_6a" value="5"></td>
    </tr>
    <tr>
      <td>Program Studi</td>
      <td align="center"><input type="radio" name="ml_6b" value="1"></td>
          <td align="center"><input type="radio" name="ml_6b" value="2"></td>
          <td align="center"><input type="radio" name="ml_6b" value="3"></td>
          <td align="center"><input type="radio" name="ml_6b" value="4"></td>
          <td align="center"><input type="radio" name="ml_6b" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Keuangan</td>
      <td align="center"><input type="radio" name="ml_6c" value="1"></td>
          <td align="center"><input type="radio" name="ml_6c" value="2"></td>
          <td align="center"><input type="radio" name="ml_6c" value="3"></td>
          <td align="center"><input type="radio" name="ml_6c" value="4"></td>
          <td align="center"><input type="radio" name="ml_6c" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Umum (Sarpras)</td>
      <td align="center"><input type="radio" name="ml_6d" value="1"></td>
          <td align="center"><input type="radio" name="ml_6d" value="2"></td>
          <td align="center"><input type="radio" name="ml_6d" value="3"></td>
          <td align="center"><input type="radio" name="ml_6d" value="4"></td>
          <td align="center"><input type="radio" name="ml_6d" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Kemahataran (Pencamahatar, Registrasi)</td>
      <td align="center"><input type="radio" name="ml_6e" value="1"></td>
          <td align="center"><input type="radio" name="ml_6e" value="2"></td>
          <td align="center"><input type="radio" name="ml_6e" value="3"></td>
          <td align="center"><input type="radio" name="ml_6e" value="4"></td>
          <td align="center"><input type="radio" name="ml_6e" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Akademik (Pengajaran, Ujian Akademik, UKP) </td>
      <td align="center"><input type="radio" name="ml_6f" value="1"></td>
          <td align="center"><input type="radio" name="ml_6f" value="2"></td>
          <td align="center"><input type="radio" name="ml_6f" value="3"></td>
          <td align="center"><input type="radio" name="ml_6f" value="4"></td>
          <td align="center"><input type="radio" name="ml_6f" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Pengembangan Mahatar dan Alumni </td>
      <td align="center"><input type="radio" name="ml_6g" value="1"></td>
          <td align="center"><input type="radio" name="ml_6g" value="2"></td>
          <td align="center"><input type="radio" name="ml_6g" value="3"></td>
          <td align="center"><input type="radio" name="ml_6g" value="4"></td>
          <td align="center"><input type="radio" name="ml_6g" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Bemahatar</td>
      <td align="center"><input type="radio" name="ml_6h" value="1"></td>
          <td align="center"><input type="radio" name="ml_6h" value="2"></td>
          <td align="center"><input type="radio" name="ml_6h" value="3"></td>
          <td align="center"><input type="radio" name="ml_6h" value="4"></td>
          <td align="center"><input type="radio" name="ml_6h" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Perpustakaan</td>
      <td align="center"><input type="radio" name="ml_6i" value="1"></td>
          <td align="center"><input type="radio" name="ml_6i" value="2"></td>
          <td align="center"><input type="radio" name="ml_6i" value="3"></td>
          <td align="center"><input type="radio" name="ml_6i" value="4"></td>
          <td align="center"><input type="radio" name="ml_6i" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Laboratorium</td>
      <td align="center"><input type="radio" name="ml_6j" value="1"></td>
          <td align="center"><input type="radio" name="ml_6j" value="2"></td>
          <td align="center"><input type="radio" name="ml_6j" value="3"></td>
          <td align="center"><input type="radio" name="ml_6j" value="4"></td>
          <td align="center"><input type="radio" name="ml_6j" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prada dan PKL</td>
      <td align="center"><input type="radio" name="ml_6k" value="1"></td>
          <td align="center"><input type="radio" name="ml_6k" value="2"></td>
          <td align="center"><input type="radio" name="ml_6k" value="3"></td>
          <td align="center"><input type="radio" name="ml_6k" value="4"></td>
          <td align="center"><input type="radio" name="ml_6k" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prala</td>
      <td align="center"><input type="radio" name="ml_6l" value="1"></td>
          <td align="center"><input type="radio" name="ml_6l" value="2"></td>
          <td align="center"><input type="radio" name="ml_6l" value="3"></td>
          <td align="center"><input type="radio" name="ml_6l" value="4"></td>
          <td align="center"><input type="radio" name="ml_6l" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Umum</td>
      <td align="center"><input type="radio" name="ml_6m" value="1"></td>
          <td align="center"><input type="radio" name="ml_6m" value="2"></td>
          <td align="center"><input type="radio" name="ml_6m" value="3"></td>
          <td align="center"><input type="radio" name="ml_6m" value="4"></td>
          <td align="center"><input type="radio" name="ml_6m" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Khusus Pelaut (DKP)</td>
      <td align="center"><input type="radio" name="ml_6n" value="1"></td>
          <td align="center"><input type="radio" name="ml_6n" value="2"></td>
          <td align="center"><input type="radio" name="ml_6n" value="3"></td>
          <td align="center"><input type="radio" name="ml_6n" value="4"></td>
          <td align="center"><input type="radio" name="ml_6n" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Pusat Komputer</td>
      <td align="center"><input type="radio" name="ml_6o" value="1"></td>
          <td align="center"><input type="radio" name="ml_6o" value="2"></td>
          <td align="center"><input type="radio" name="ml_6o" value="3"></td>
          <td align="center"><input type="radio" name="ml_6o" value="4"></td>
          <td align="center"><input type="radio" name="ml_6o" value="5"></td>
    </tr>
    <tr>
      <td><b>7.</b></td>
      <td colspan="5"><b> Pelayanan UNIMAR AMNI menyediakan waktu untuk Mahatar berkonsultasi</b></td>
    </tr>
    <tr>
      <td><b>Pilihan</b></td>
      <td><b>Sangat Tidak Setuju</b></td>
      <td><b>Tidak Setuju</b></td>
      <td><b>Biasa Saja</b></td>
      <td><b>Setuju</b></td>
      <td><b>Sangat Setuju</b></td>
    </tr>
    <tr>
      <td>Fakultas</td>
      <td align="center"><input type="radio" name="ml_7a" value="1"></td>
          <td align="center"><input type="radio" name="ml_7a" value="2"></td>
          <td align="center"><input type="radio" name="ml_7a" value="3"></td>
          <td align="center"><input type="radio" name="ml_7a" value="4"></td>
          <td align="center"><input type="radio" name="ml_7a" value="5"></td>
    </tr>
    <tr>
      <td>Program Studi</td>
      <td align="center"><input type="radio" name="ml_7b" value="1"></td>
          <td align="center"><input type="radio" name="ml_7b" value="2"></td>
          <td align="center"><input type="radio" name="ml_7b" value="3"></td>
          <td align="center"><input type="radio" name="ml_7b" value="4"></td>
          <td align="center"><input type="radio" name="ml_7b" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Keuangan</td>
      <td align="center"><input type="radio" name="ml_7c" value="1"></td>
          <td align="center"><input type="radio" name="ml_7c" value="2"></td>
          <td align="center"><input type="radio" name="ml_7c" value="3"></td>
          <td align="center"><input type="radio" name="ml_7c" value="4"></td>
          <td align="center"><input type="radio" name="ml_7c" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Umum (Sarpras)</td>
      <td align="center"><input type="radio" name="ml_7d" value="1"></td>
          <td align="center"><input type="radio" name="ml_7d" value="2"></td>
          <td align="center"><input type="radio" name="ml_7d" value="3"></td>
          <td align="center"><input type="radio" name="ml_7d" value="4"></td>
          <td align="center"><input type="radio" name="ml_7d" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Kemahataran (Pencamahatar, Registrasi)</td>
      <td align="center"><input type="radio" name="ml_7e" value="1"></td>
          <td align="center"><input type="radio" name="ml_7e" value="2"></td>
          <td align="center"><input type="radio" name="ml_7e" value="3"></td>
          <td align="center"><input type="radio" name="ml_7e" value="4"></td>
          <td align="center"><input type="radio" name="ml_7e" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Akademik (Pengajaran, Ujian Akademik, UKP) </td>
      <td align="center"><input type="radio" name="ml_7f" value="1"></td>
          <td align="center"><input type="radio" name="ml_7f" value="2"></td>
          <td align="center"><input type="radio" name="ml_7f" value="3"></td>
          <td align="center"><input type="radio" name="ml_7f" value="4"></td>
          <td align="center"><input type="radio" name="ml_7f" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Pengembangan Mahatar dan Alumni </td>
      <td align="center"><input type="radio" name="ml_7g" value="1"></td>
          <td align="center"><input type="radio" name="ml_7g" value="2"></td>
          <td align="center"><input type="radio" name="ml_7g" value="3"></td>
          <td align="center"><input type="radio" name="ml_7g" value="4"></td>
          <td align="center"><input type="radio" name="ml_7g" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Bemahatar</td>
      <td align="center"><input type="radio" name="ml_7h" value="1"></td>
          <td align="center"><input type="radio" name="ml_7h" value="2"></td>
          <td align="center"><input type="radio" name="ml_7h" value="3"></td>
          <td align="center"><input type="radio" name="ml_7h" value="4"></td>
          <td align="center"><input type="radio" name="ml_7h" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Perpustakaan</td>
      <td align="center"><input type="radio" name="ml_7i" value="1"></td>
          <td align="center"><input type="radio" name="ml_7i" value="2"></td>
          <td align="center"><input type="radio" name="ml_7i" value="3"></td>
          <td align="center"><input type="radio" name="ml_7i" value="4"></td>
          <td align="center"><input type="radio" name="ml_7i" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Laboratorium</td>
      <td align="center"><input type="radio" name="ml_7j" value="1"></td>
          <td align="center"><input type="radio" name="ml_7j" value="2"></td>
          <td align="center"><input type="radio" name="ml_7j" value="3"></td>
          <td align="center"><input type="radio" name="ml_7j" value="4"></td>
          <td align="center"><input type="radio" name="ml_7j" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prada dan PKL</td>
      <td align="center"><input type="radio" name="ml_7k" value="1"></td>
          <td align="center"><input type="radio" name="ml_7k" value="2"></td>
          <td align="center"><input type="radio" name="ml_7k" value="3"></td>
          <td align="center"><input type="radio" name="ml_7k" value="4"></td>
          <td align="center"><input type="radio" name="ml_7k" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prala</td>
      <td align="center"><input type="radio" name="ml_7l" value="1"></td>
          <td align="center"><input type="radio" name="ml_7l" value="2"></td>
          <td align="center"><input type="radio" name="ml_7l" value="3"></td>
          <td align="center"><input type="radio" name="ml_7l" value="4"></td>
          <td align="center"><input type="radio" name="ml_7l" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Umum</td>
      <td align="center"><input type="radio" name="ml_7m" value="1"></td>
          <td align="center"><input type="radio" name="ml_7m" value="2"></td>
          <td align="center"><input type="radio" name="ml_7m" value="3"></td>
          <td align="center"><input type="radio" name="ml_7m" value="4"></td>
          <td align="center"><input type="radio" name="ml_7m" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Khusus Pelaut (DKP)</td>
      <td align="center"><input type="radio" name="ml_7n" value="1"></td>
          <td align="center"><input type="radio" name="ml_7n" value="2"></td>
          <td align="center"><input type="radio" name="ml_7n" value="3"></td>
          <td align="center"><input type="radio" name="ml_7n" value="4"></td>
          <td align="center"><input type="radio" name="ml_7n" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Pusat Komputer</td>
      <td align="center"><input type="radio" name="ml_7o" value="1"></td>
          <td align="center"><input type="radio" name="ml_7o" value="2"></td>
          <td align="center"><input type="radio" name="ml_7o" value="3"></td>
          <td align="center"><input type="radio" name="ml_7o" value="4"></td>
          <td align="center"><input type="radio" name="ml_7o" value="5"></td>
    </tr>
    <tr>
      <td><b>8.</b></td>
      <td colspan="5"><b> Pelayanan UNIMAR AMNI melaksanakan program pendampingan bagi Mahatar yang membutuhkan</b></td>
    </tr>
    <tr>
      <td><b>Pilihan</b></td>
      <td><b>Sangat Tidak Setuju</b></td>
      <td><b>Tidak Setuju</b></td>
      <td><b>Biasa Saja</b></td>
      <td><b>Setuju</b></td>
      <td><b>Sangat Setuju</b></td>
    </tr>
    <tr>
      <td>Fakultas</td>
      <td align="center"><input type="radio" name="ml_8a" value="1"></td>
          <td align="center"><input type="radio" name="ml_8a" value="2"></td>
          <td align="center"><input type="radio" name="ml_8a" value="3"></td>
          <td align="center"><input type="radio" name="ml_8a" value="4"></td>
          <td align="center"><input type="radio" name="ml_8a" value="5"></td>
    </tr>
    <tr>
      <td>Program Studi</td>
      <td align="center"><input type="radio" name="ml_8b" value="1"></td>
          <td align="center"><input type="radio" name="ml_8b" value="2"></td>
          <td align="center"><input type="radio" name="ml_8b" value="3"></td>
          <td align="center"><input type="radio" name="ml_8b" value="4"></td>
          <td align="center"><input type="radio" name="ml_8b" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Keuangan</td>
      <td align="center"><input type="radio" name="ml_8c" value="1"></td>
          <td align="center"><input type="radio" name="ml_8c" value="2"></td>
          <td align="center"><input type="radio" name="ml_8c" value="3"></td>
          <td align="center"><input type="radio" name="ml_8c" value="4"></td>
          <td align="center"><input type="radio" name="ml_8c" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Umum (Sarpras)</td>
      <td align="center"><input type="radio" name="ml_8d" value="1"></td>
          <td align="center"><input type="radio" name="ml_8d" value="2"></td>
          <td align="center"><input type="radio" name="ml_8d" value="3"></td>
          <td align="center"><input type="radio" name="ml_8d" value="4"></td>
          <td align="center"><input type="radio" name="ml_8d" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Kemahataran (Pencamahatar, Registrasi)</td>
      <td align="center"><input type="radio" name="ml_8e" value="1"></td>
          <td align="center"><input type="radio" name="ml_8e" value="2"></td>
          <td align="center"><input type="radio" name="ml_8e" value="3"></td>
          <td align="center"><input type="radio" name="ml_8e" value="4"></td>
          <td align="center"><input type="radio" name="ml_8e" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Akademik (Pengajaran, Ujian Akademik, UKP) </td>
      <td align="center"><input type="radio" name="ml_8f" value="1"></td>
          <td align="center"><input type="radio" name="ml_8f" value="2"></td>
          <td align="center"><input type="radio" name="ml_8f" value="3"></td>
          <td align="center"><input type="radio" name="ml_8f" value="4"></td>
          <td align="center"><input type="radio" name="ml_8f" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Pengembangan Mahatar dan Alumni </td>
      <td align="center"><input type="radio" name="ml_8g" value="1"></td>
          <td align="center"><input type="radio" name="ml_8g" value="2"></td>
          <td align="center"><input type="radio" name="ml_8g" value="3"></td>
          <td align="center"><input type="radio" name="ml_8g" value="4"></td>
          <td align="center"><input type="radio" name="ml_8g" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Bemahatar</td>
      <td align="center"><input type="radio" name="ml_8h" value="1"></td>
          <td align="center"><input type="radio" name="ml_8h" value="2"></td>
          <td align="center"><input type="radio" name="ml_8h" value="3"></td>
          <td align="center"><input type="radio" name="ml_8h" value="4"></td>
          <td align="center"><input type="radio" name="ml_8h" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Perpustakaan</td>
      <td align="center"><input type="radio" name="ml_8i" value="1"></td>
          <td align="center"><input type="radio" name="ml_8i" value="2"></td>
          <td align="center"><input type="radio" name="ml_8i" value="3"></td>
          <td align="center"><input type="radio" name="ml_8i" value="4"></td>
          <td align="center"><input type="radio" name="ml_8i" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Laboratorium</td>
      <td align="center"><input type="radio" name="ml_8j" value="1"></td>
          <td align="center"><input type="radio" name="ml_8j" value="2"></td>
          <td align="center"><input type="radio" name="ml_8j" value="3"></td>
          <td align="center"><input type="radio" name="ml_8j" value="4"></td>
          <td align="center"><input type="radio" name="ml_8j" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prada dan PKL</td>
      <td align="center"><input type="radio" name="ml_8k" value="1"></td>
          <td align="center"><input type="radio" name="ml_8k" value="2"></td>
          <td align="center"><input type="radio" name="ml_8k" value="3"></td>
          <td align="center"><input type="radio" name="ml_8k" value="4"></td>
          <td align="center"><input type="radio" name="ml_8k" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prala</td>
      <td align="center"><input type="radio" name="ml_8l" value="1"></td>
          <td align="center"><input type="radio" name="ml_8l" value="2"></td>
          <td align="center"><input type="radio" name="ml_8l" value="3"></td>
          <td align="center"><input type="radio" name="ml_8l" value="4"></td>
          <td align="center"><input type="radio" name="ml_8l" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Umum</td>
      <td align="center"><input type="radio" name="ml_8m" value="1"></td>
          <td align="center"><input type="radio" name="ml_8m" value="2"></td>
          <td align="center"><input type="radio" name="ml_8m" value="3"></td>
          <td align="center"><input type="radio" name="ml_8m" value="4"></td>
          <td align="center"><input type="radio" name="ml_8m" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Khusus Pelaut (DKP)</td>
      <td align="center"><input type="radio" name="ml_8n" value="1"></td>
          <td align="center"><input type="radio" name="ml_8n" value="2"></td>
          <td align="center"><input type="radio" name="ml_8n" value="3"></td>
          <td align="center"><input type="radio" name="ml_8n" value="4"></td>
          <td align="center"><input type="radio" name="ml_8n" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Pusat Komputer</td>
      <td align="center"><input type="radio" name="ml_8o" value="1"></td>
          <td align="center"><input type="radio" name="ml_8o" value="2"></td>
          <td align="center"><input type="radio" name="ml_8o" value="3"></td>
          <td align="center"><input type="radio" name="ml_8o" value="4"></td>
          <td align="center"><input type="radio" name="ml_8o" value="5"></td>
    </tr>
    <tr>
      <td><b>9.</b></td>
      <td colspan="5"><b> Pelayanan UNIMAR AMNI selalu tanggap dalam melayani Mahatar yang membutuhkan penjelasan lebih rinci</b></td>
    </tr>
    <tr>
      <td><b>Pilihan</b></td>
      <td><b>Sangat Tidak Setuju</b></td>
      <td><b>Tidak Setuju</b></td>
      <td><b>Biasa Saja</b></td>
      <td><b>Setuju</b></td>
      <td><b>Sangat Setuju</b></td>
    </tr>
    <tr>
      <td>Fakultas</td>
      <td align="center"><input type="radio" name="ml_9a" value="1"></td>
          <td align="center"><input type="radio" name="ml_9a" value="2"></td>
          <td align="center"><input type="radio" name="ml_9a" value="3"></td>
          <td align="center"><input type="radio" name="ml_9a" value="4"></td>
          <td align="center"><input type="radio" name="ml_9a" value="5"></td>
    </tr>
    <tr>
      <td>Program Studi</td>
      <td align="center"><input type="radio" name="ml_9b" value="1"></td>
          <td align="center"><input type="radio" name="ml_9b" value="2"></td>
          <td align="center"><input type="radio" name="ml_9b" value="3"></td>
          <td align="center"><input type="radio" name="ml_9b" value="4"></td>
          <td align="center"><input type="radio" name="ml_9b" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Keuangan</td>
      <td align="center"><input type="radio" name="ml_9c" value="1"></td>
          <td align="center"><input type="radio" name="ml_9c" value="2"></td>
          <td align="center"><input type="radio" name="ml_9c" value="3"></td>
          <td align="center"><input type="radio" name="ml_9c" value="4"></td>
          <td align="center"><input type="radio" name="ml_9c" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Umum (Sarpras)</td>
      <td align="center"><input type="radio" name="ml_9d" value="1"></td>
          <td align="center"><input type="radio" name="ml_9d" value="2"></td>
          <td align="center"><input type="radio" name="ml_9d" value="3"></td>
          <td align="center"><input type="radio" name="ml_9d" value="4"></td>
          <td align="center"><input type="radio" name="ml_9d" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Kemahataran (Pencamahatar, Registrasi)</td>
      <td align="center"><input type="radio" name="ml_9e" value="1"></td>
          <td align="center"><input type="radio" name="ml_9e" value="2"></td>
          <td align="center"><input type="radio" name="ml_9e" value="3"></td>
          <td align="center"><input type="radio" name="ml_9e" value="4"></td>
          <td align="center"><input type="radio" name="ml_9e" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Akademik (Pengajaran, Ujian Akademik, UKP) </td>
      <td align="center"><input type="radio" name="ml_9f" value="1"></td>
          <td align="center"><input type="radio" name="ml_9f" value="2"></td>
          <td align="center"><input type="radio" name="ml_9f" value="3"></td>
          <td align="center"><input type="radio" name="ml_9f" value="4"></td>
          <td align="center"><input type="radio" name="ml_9f" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Pengembangan Mahatar dan Alumni </td>
      <td align="center"><input type="radio" name="ml_9g" value="1"></td>
          <td align="center"><input type="radio" name="ml_9g" value="2"></td>
          <td align="center"><input type="radio" name="ml_9g" value="3"></td>
          <td align="center"><input type="radio" name="ml_9g" value="4"></td>
          <td align="center"><input type="radio" name="ml_9g" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Bemahatar</td>
      <td align="center"><input type="radio" name="ml_9h" value="1"></td>
          <td align="center"><input type="radio" name="ml_9h" value="2"></td>
          <td align="center"><input type="radio" name="ml_9h" value="3"></td>
          <td align="center"><input type="radio" name="ml_9h" value="4"></td>
          <td align="center"><input type="radio" name="ml_9h" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Perpustakaan</td>
      <td align="center"><input type="radio" name="ml_9i" value="1"></td>
          <td align="center"><input type="radio" name="ml_9i" value="2"></td>
          <td align="center"><input type="radio" name="ml_9i" value="3"></td>
          <td align="center"><input type="radio" name="ml_9i" value="4"></td>
          <td align="center"><input type="radio" name="ml_9i" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Laboratorium</td>
      <td align="center"><input type="radio" name="ml_9j" value="1"></td>
          <td align="center"><input type="radio" name="ml_9j" value="2"></td>
          <td align="center"><input type="radio" name="ml_9j" value="3"></td>
          <td align="center"><input type="radio" name="ml_9j" value="4"></td>
          <td align="center"><input type="radio" name="ml_9j" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prada dan PKL</td>
      <td align="center"><input type="radio" name="ml_9k" value="1"></td>
          <td align="center"><input type="radio" name="ml_9k" value="2"></td>
          <td align="center"><input type="radio" name="ml_9k" value="3"></td>
          <td align="center"><input type="radio" name="ml_9k" value="4"></td>
          <td align="center"><input type="radio" name="ml_9k" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prala</td>
      <td align="center"><input type="radio" name="ml_9l" value="1"></td>
          <td align="center"><input type="radio" name="ml_9l" value="2"></td>
          <td align="center"><input type="radio" name="ml_9l" value="3"></td>
          <td align="center"><input type="radio" name="ml_9l" value="4"></td>
          <td align="center"><input type="radio" name="ml_9l" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Umum</td>
      <td align="center"><input type="radio" name="ml_9m" value="1"></td>
          <td align="center"><input type="radio" name="ml_9m" value="2"></td>
          <td align="center"><input type="radio" name="ml_9m" value="3"></td>
          <td align="center"><input type="radio" name="ml_9m" value="4"></td>
          <td align="center"><input type="radio" name="ml_9m" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Khusus Pelaut (DKP)</td>
      <td align="center"><input type="radio" name="ml_9n" value="1"></td>
          <td align="center"><input type="radio" name="ml_9n" value="2"></td>
          <td align="center"><input type="radio" name="ml_9n" value="3"></td>
          <td align="center"><input type="radio" name="ml_9n" value="4"></td>
          <td align="center"><input type="radio" name="ml_9n" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Pusat Komputer</td>
      <td align="center"><input type="radio" name="ml_9o" value="1"></td>
          <td align="center"><input type="radio" name="ml_9o" value="2"></td>
          <td align="center"><input type="radio" name="ml_9o" value="3"></td>
          <td align="center"><input type="radio" name="ml_9o" value="4"></td>
          <td align="center"><input type="radio" name="ml_9o" value="5"></td>
    </tr>
    <tr>
      <td><b>10.</b></td>
      <td colspan="5"><b> Pelayanan UNIMAR AMNI sangat ramah dalam melayani kepentingan Mahatar</b></td>
    </tr>
    <tr>
      <td><b>Pilihan</b></td>
      <td><b>Sangat Tidak Setuju</b></td>
      <td><b>Tidak Setuju</b></td>
      <td><b>Biasa Saja</b></td>
      <td><b>Setuju</b></td>
      <td><b>Sangat Setuju</b></td>
    </tr>
    <tr>
      <td>Fakultas</td>
      <td align="center"><input type="radio" name="ml_10a" value="1"></td>
          <td align="center"><input type="radio" name="ml_10a" value="2"></td>
          <td align="center"><input type="radio" name="ml_10a" value="3"></td>
          <td align="center"><input type="radio" name="ml_10a" value="4"></td>
          <td align="center"><input type="radio" name="ml_10a" value="5"></td>
    </tr>
    <tr>
      <td>Program Studi</td>
      <td align="center"><input type="radio" name="ml_10b" value="1"></td>
          <td align="center"><input type="radio" name="ml_10b" value="2"></td>
          <td align="center"><input type="radio" name="ml_10b" value="3"></td>
          <td align="center"><input type="radio" name="ml_10b" value="4"></td>
          <td align="center"><input type="radio" name="ml_10b" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Keuangan</td>
      <td align="center"><input type="radio" name="ml_10c" value="1"></td>
          <td align="center"><input type="radio" name="ml_10c" value="2"></td>
          <td align="center"><input type="radio" name="ml_10c" value="3"></td>
          <td align="center"><input type="radio" name="ml_10c" value="4"></td>
          <td align="center"><input type="radio" name="ml_10c" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Umum (Sarpras)</td>
      <td align="center"><input type="radio" name="ml_10d" value="1"></td>
          <td align="center"><input type="radio" name="ml_10d" value="2"></td>
          <td align="center"><input type="radio" name="ml_10d" value="3"></td>
          <td align="center"><input type="radio" name="ml_10d" value="4"></td>
          <td align="center"><input type="radio" name="ml_10d" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Kemahataran (Pencamahatar, Registrasi)</td>
      <td align="center"><input type="radio" name="ml_10e" value="1"></td>
          <td align="center"><input type="radio" name="ml_10e" value="2"></td>
          <td align="center"><input type="radio" name="ml_10e" value="3"></td>
          <td align="center"><input type="radio" name="ml_10e" value="4"></td>
          <td align="center"><input type="radio" name="ml_10e" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Akademik (Pengajaran, Ujian Akademik, UKP) </td>
      <td align="center"><input type="radio" name="ml_10f" value="1"></td>
          <td align="center"><input type="radio" name="ml_10f" value="2"></td>
          <td align="center"><input type="radio" name="ml_10f" value="3"></td>
          <td align="center"><input type="radio" name="ml_10f" value="4"></td>
          <td align="center"><input type="radio" name="ml_10f" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Pengembangan Mahatar dan Alumni </td>
      <td align="center"><input type="radio" name="ml_10g" value="1"></td>
          <td align="center"><input type="radio" name="ml_10g" value="2"></td>
          <td align="center"><input type="radio" name="ml_10g" value="3"></td>
          <td align="center"><input type="radio" name="ml_10g" value="4"></td>
          <td align="center"><input type="radio" name="ml_10g" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Bemahatar</td>
      <td align="center"><input type="radio" name="ml_10h" value="1"></td>
          <td align="center"><input type="radio" name="ml_10h" value="2"></td>
          <td align="center"><input type="radio" name="ml_10h" value="3"></td>
          <td align="center"><input type="radio" name="ml_10h" value="4"></td>
          <td align="center"><input type="radio" name="ml_10h" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Perpustakaan</td>
      <td align="center"><input type="radio" name="ml_10i" value="1"></td>
          <td align="center"><input type="radio" name="ml_10i" value="2"></td>
          <td align="center"><input type="radio" name="ml_10i" value="3"></td>
          <td align="center"><input type="radio" name="ml_10i" value="4"></td>
          <td align="center"><input type="radio" name="ml_10i" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Laboratorium</td>
      <td align="center"><input type="radio" name="ml_10j" value="1"></td>
          <td align="center"><input type="radio" name="ml_10j" value="2"></td>
          <td align="center"><input type="radio" name="ml_10j" value="3"></td>
          <td align="center"><input type="radio" name="ml_10j" value="4"></td>
          <td align="center"><input type="radio" name="ml_10j" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prada dan PKL</td>
      <td align="center"><input type="radio" name="ml_10k" value="1"></td>
          <td align="center"><input type="radio" name="ml_10k" value="2"></td>
          <td align="center"><input type="radio" name="ml_10k" value="3"></td>
          <td align="center"><input type="radio" name="ml_10k" value="4"></td>
          <td align="center"><input type="radio" name="ml_10k" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prala</td>
      <td align="center"><input type="radio" name="ml_10l" value="1"></td>
          <td align="center"><input type="radio" name="ml_10l" value="2"></td>
          <td align="center"><input type="radio" name="ml_10l" value="3"></td>
          <td align="center"><input type="radio" name="ml_10l" value="4"></td>
          <td align="center"><input type="radio" name="ml_10l" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Umum</td>
      <td align="center"><input type="radio" name="ml_10m" value="1"></td>
          <td align="center"><input type="radio" name="ml_10m" value="2"></td>
          <td align="center"><input type="radio" name="ml_10m" value="3"></td>
          <td align="center"><input type="radio" name="ml_10m" value="4"></td>
          <td align="center"><input type="radio" name="ml_10m" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Khusus Pelaut (DKP)</td>
      <td align="center"><input type="radio" name="ml_10n" value="1"></td>
          <td align="center"><input type="radio" name="ml_10n" value="2"></td>
          <td align="center"><input type="radio" name="ml_10n" value="3"></td>
          <td align="center"><input type="radio" name="ml_10n" value="4"></td>
          <td align="center"><input type="radio" name="ml_10n" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Pusat Komputer</td>
      <td align="center"><input type="radio" name="ml_10o" value="1"></td>
          <td align="center"><input type="radio" name="ml_10o" value="2"></td>
          <td align="center"><input type="radio" name="ml_10o" value="3"></td>
          <td align="center"><input type="radio" name="ml_10o" value="4"></td>
          <td align="center"><input type="radio" name="ml_10o" value="5"></td>
    </tr>
    <tr>
      <td><b>11.</b></td>
      <td colspan="5"><b> Pelayanan UNIMAR AMNI selalu berkoordinasi dengan bidang terkait bila ada permasalahan yang menyangkut bidang yang lainnya</b></td>
    </tr>
    <tr>
      <td><b>Pilihan</b></td>
      <td><b>Sangat Tidak Setuju</b></td>
      <td><b>Tidak Setuju</b></td>
      <td><b>Biasa Saja</b></td>
      <td><b>Setuju</b></td>
      <td><b>Sangat Setuju</b></td>
    </tr>
    <tr>
      <td>Fakultas</td>
      <td align="center"><input type="radio" name="ml_11a" value="1"></td>
          <td align="center"><input type="radio" name="ml_11a" value="2"></td>
          <td align="center"><input type="radio" name="ml_11a" value="3"></td>
          <td align="center"><input type="radio" name="ml_11a" value="4"></td>
          <td align="center"><input type="radio" name="ml_11a" value="5"></td>
    </tr>
    <tr>
      <td>Program Studi</td>
      <td align="center"><input type="radio" name="ml_11b" value="1"></td>
          <td align="center"><input type="radio" name="ml_11b" value="2"></td>
          <td align="center"><input type="radio" name="ml_11b" value="3"></td>
          <td align="center"><input type="radio" name="ml_11b" value="4"></td>
          <td align="center"><input type="radio" name="ml_11b" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Keuangan</td>
      <td align="center"><input type="radio" name="ml_11c" value="1"></td>
          <td align="center"><input type="radio" name="ml_11c" value="2"></td>
          <td align="center"><input type="radio" name="ml_11c" value="3"></td>
          <td align="center"><input type="radio" name="ml_11c" value="4"></td>
          <td align="center"><input type="radio" name="ml_11c" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Umum (Sarpras)</td>
      <td align="center"><input type="radio" name="ml_11d" value="1"></td>
          <td align="center"><input type="radio" name="ml_11d" value="2"></td>
          <td align="center"><input type="radio" name="ml_11d" value="3"></td>
          <td align="center"><input type="radio" name="ml_11d" value="4"></td>
          <td align="center"><input type="radio" name="ml_11d" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Kemahataran (Pencamahatar, Registrasi)</td>
      <td align="center"><input type="radio" name="ml_11e" value="1"></td>
          <td align="center"><input type="radio" name="ml_11e" value="2"></td>
          <td align="center"><input type="radio" name="ml_11e" value="3"></td>
          <td align="center"><input type="radio" name="ml_11e" value="4"></td>
          <td align="center"><input type="radio" name="ml_11e" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Akademik (Pengajaran, Ujian Akademik, UKP) </td>
      <td align="center"><input type="radio" name="ml_11f" value="1"></td>
          <td align="center"><input type="radio" name="ml_11f" value="2"></td>
          <td align="center"><input type="radio" name="ml_11f" value="3"></td>
          <td align="center"><input type="radio" name="ml_11f" value="4"></td>
          <td align="center"><input type="radio" name="ml_11f" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Pengembangan Mahatar dan Alumni </td>
      <td align="center"><input type="radio" name="ml_11g" value="1"></td>
          <td align="center"><input type="radio" name="ml_11g" value="2"></td>
          <td align="center"><input type="radio" name="ml_11g" value="3"></td>
          <td align="center"><input type="radio" name="ml_11g" value="4"></td>
          <td align="center"><input type="radio" name="ml_11g" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Bemahatar</td>
      <td align="center"><input type="radio" name="ml_11h" value="1"></td>
          <td align="center"><input type="radio" name="ml_11h" value="2"></td>
          <td align="center"><input type="radio" name="ml_11h" value="3"></td>
          <td align="center"><input type="radio" name="ml_11h" value="4"></td>
          <td align="center"><input type="radio" name="ml_11h" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Perpustakaan</td>
      <td align="center"><input type="radio" name="ml_11i" value="1"></td>
          <td align="center"><input type="radio" name="ml_11i" value="2"></td>
          <td align="center"><input type="radio" name="ml_11i" value="3"></td>
          <td align="center"><input type="radio" name="ml_11i" value="4"></td>
          <td align="center"><input type="radio" name="ml_11i" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Laboratorium</td>
      <td align="center"><input type="radio" name="ml_11j" value="1"></td>
          <td align="center"><input type="radio" name="ml_11j" value="2"></td>
          <td align="center"><input type="radio" name="ml_11j" value="3"></td>
          <td align="center"><input type="radio" name="ml_11j" value="4"></td>
          <td align="center"><input type="radio" name="ml_11j" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prada dan PKL</td>
      <td align="center"><input type="radio" name="ml_11k" value="1"></td>
          <td align="center"><input type="radio" name="ml_11k" value="2"></td>
          <td align="center"><input type="radio" name="ml_11k" value="3"></td>
          <td align="center"><input type="radio" name="ml_11k" value="4"></td>
          <td align="center"><input type="radio" name="ml_11k" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prala</td>
      <td align="center"><input type="radio" name="ml_11l" value="1"></td>
          <td align="center"><input type="radio" name="ml_11l" value="2"></td>
          <td align="center"><input type="radio" name="ml_11l" value="3"></td>
          <td align="center"><input type="radio" name="ml_11l" value="4"></td>
          <td align="center"><input type="radio" name="ml_11l" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Umum</td>
      <td align="center"><input type="radio" name="ml_11m" value="1"></td>
          <td align="center"><input type="radio" name="ml_11m" value="2"></td>
          <td align="center"><input type="radio" name="ml_11m" value="3"></td>
          <td align="center"><input type="radio" name="ml_11m" value="4"></td>
          <td align="center"><input type="radio" name="ml_11m" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Khusus Pelaut (DKP)</td>
      <td align="center"><input type="radio" name="ml_11n" value="1"></td>
          <td align="center"><input type="radio" name="ml_11n" value="2"></td>
          <td align="center"><input type="radio" name="ml_11n" value="3"></td>
          <td align="center"><input type="radio" name="ml_11n" value="4"></td>
          <td align="center"><input type="radio" name="ml_11n" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Pusat Komputer</td>
      <td align="center"><input type="radio" name="ml_11o" value="1"></td>
          <td align="center"><input type="radio" name="ml_11o" value="2"></td>
          <td align="center"><input type="radio" name="ml_11o" value="3"></td>
          <td align="center"><input type="radio" name="ml_11o" value="4"></td>
          <td align="center"><input type="radio" name="ml_11o" value="5"></td>
    </tr>
    <tr>
      <td><b>12.</b></td>
      <td colspan="5"><b> UNIMAR AMNI menyediakan fasilitas yang nyaman guna menunjang pelayanan bagi Mahatar</b></td>
    </tr>
    <tr>
      <td><b>Pilihan</b></td>
      <td><b>Sangat Tidak Setuju</b></td>
      <td><b>Tidak Setuju</b></td>
      <td><b>Biasa Saja</b></td>
      <td><b>Setuju</b></td>
      <td><b>Sangat Setuju</b></td>
    </tr>
    <tr>
      <td>Fakultas</td>
      <td align="center"><input type="radio" name="ml_12a" value="1"></td>
          <td align="center"><input type="radio" name="ml_12a" value="2"></td>
          <td align="center"><input type="radio" name="ml_12a" value="3"></td>
          <td align="center"><input type="radio" name="ml_12a" value="4"></td>
          <td align="center"><input type="radio" name="ml_12a" value="5"></td>
    </tr>
    <tr>
      <td>Program Studi</td>
      <td align="center"><input type="radio" name="ml_12b" value="1"></td>
          <td align="center"><input type="radio" name="ml_12b" value="2"></td>
          <td align="center"><input type="radio" name="ml_12b" value="3"></td>
          <td align="center"><input type="radio" name="ml_12b" value="4"></td>
          <td align="center"><input type="radio" name="ml_12b" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Keuangan</td>
      <td align="center"><input type="radio" name="ml_12c" value="1"></td>
          <td align="center"><input type="radio" name="ml_12c" value="2"></td>
          <td align="center"><input type="radio" name="ml_12c" value="3"></td>
          <td align="center"><input type="radio" name="ml_12c" value="4"></td>
          <td align="center"><input type="radio" name="ml_12c" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Umum (Sarpras)</td>
      <td align="center"><input type="radio" name="ml_12d" value="1"></td>
          <td align="center"><input type="radio" name="ml_12d" value="2"></td>
          <td align="center"><input type="radio" name="ml_12d" value="3"></td>
          <td align="center"><input type="radio" name="ml_12d" value="4"></td>
          <td align="center"><input type="radio" name="ml_12d" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Kemahataran (Pencamahatar, Registrasi)</td>
      <td align="center"><input type="radio" name="ml_12e" value="1"></td>
          <td align="center"><input type="radio" name="ml_12e" value="2"></td>
          <td align="center"><input type="radio" name="ml_12e" value="3"></td>
          <td align="center"><input type="radio" name="ml_12e" value="4"></td>
          <td align="center"><input type="radio" name="ml_12e" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Akademik (Pengajaran, Ujian Akademik, UKP) </td>
      <td align="center"><input type="radio" name="ml_12f" value="1"></td>
          <td align="center"><input type="radio" name="ml_12f" value="2"></td>
          <td align="center"><input type="radio" name="ml_12f" value="3"></td>
          <td align="center"><input type="radio" name="ml_12f" value="4"></td>
          <td align="center"><input type="radio" name="ml_12f" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Pengembangan Mahatar dan Alumni </td>
      <td align="center"><input type="radio" name="ml_12g" value="1"></td>
          <td align="center"><input type="radio" name="ml_12g" value="2"></td>
          <td align="center"><input type="radio" name="ml_12g" value="3"></td>
          <td align="center"><input type="radio" name="ml_12g" value="4"></td>
          <td align="center"><input type="radio" name="ml_12g" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Bemahatar</td>
      <td align="center"><input type="radio" name="ml_12h" value="1"></td>
          <td align="center"><input type="radio" name="ml_12h" value="2"></td>
          <td align="center"><input type="radio" name="ml_12h" value="3"></td>
          <td align="center"><input type="radio" name="ml_12h" value="4"></td>
          <td align="center"><input type="radio" name="ml_12h" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Perpustakaan</td>
      <td align="center"><input type="radio" name="ml_12i" value="1"></td>
          <td align="center"><input type="radio" name="ml_12i" value="2"></td>
          <td align="center"><input type="radio" name="ml_12i" value="3"></td>
          <td align="center"><input type="radio" name="ml_12i" value="4"></td>
          <td align="center"><input type="radio" name="ml_12i" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Laboratorium</td>
      <td align="center"><input type="radio" name="ml_12j" value="1"></td>
          <td align="center"><input type="radio" name="ml_12j" value="2"></td>
          <td align="center"><input type="radio" name="ml_12j" value="3"></td>
          <td align="center"><input type="radio" name="ml_12j" value="4"></td>
          <td align="center"><input type="radio" name="ml_12j" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prada dan PKL</td>
      <td align="center"><input type="radio" name="ml_12k" value="1"></td>
          <td align="center"><input type="radio" name="ml_12k" value="2"></td>
          <td align="center"><input type="radio" name="ml_12k" value="3"></td>
          <td align="center"><input type="radio" name="ml_12k" value="4"></td>
          <td align="center"><input type="radio" name="ml_12k" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prala</td>
      <td align="center"><input type="radio" name="ml_12l" value="1"></td>
          <td align="center"><input type="radio" name="ml_12l" value="2"></td>
          <td align="center"><input type="radio" name="ml_12l" value="3"></td>
          <td align="center"><input type="radio" name="ml_12l" value="4"></td>
          <td align="center"><input type="radio" name="ml_12l" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Umum</td>
      <td align="center"><input type="radio" name="ml_12m" value="1"></td>
          <td align="center"><input type="radio" name="ml_12m" value="2"></td>
          <td align="center"><input type="radio" name="ml_12m" value="3"></td>
          <td align="center"><input type="radio" name="ml_12m" value="4"></td>
          <td align="center"><input type="radio" name="ml_12m" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Khusus Pelaut (DKP)</td>
      <td align="center"><input type="radio" name="ml_12n" value="1"></td>
          <td align="center"><input type="radio" name="ml_12n" value="2"></td>
          <td align="center"><input type="radio" name="ml_12n" value="3"></td>
          <td align="center"><input type="radio" name="ml_12n" value="4"></td>
          <td align="center"><input type="radio" name="ml_12n" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Pusat Komputer</td>
      <td align="center"><input type="radio" name="ml_12o" value="1"></td>
          <td align="center"><input type="radio" name="ml_12o" value="2"></td>
          <td align="center"><input type="radio" name="ml_12o" value="3"></td>
          <td align="center"><input type="radio" name="ml_12o" value="4"></td>
          <td align="center"><input type="radio" name="ml_12o" value="5"></td>
    </tr>
    <tr>
      <td><b>13.</b></td>
      <td colspan="5"><b>  UNIMAR AMNI selalu dapat memberikan solusi untuk mengatasi permasalahan/keluhan Mahatar</b></td>
    </tr>
    <tr>
      <td><b>Pilihan</b></td>
      <td><b>Sangat Tidak Setuju</b></td>
      <td><b>Tidak Setuju</b></td>
      <td><b>Biasa Saja</b></td>
      <td><b>Setuju</b></td>
      <td><b>Sangat Setuju</b></td>
    </tr>
    <tr>
      <td>Fakultas</td>
      <td align="center"><input type="radio" name="ml_13a" value="1"></td>
          <td align="center"><input type="radio" name="ml_13a" value="2"></td>
          <td align="center"><input type="radio" name="ml_13a" value="3"></td>
          <td align="center"><input type="radio" name="ml_13a" value="4"></td>
          <td align="center"><input type="radio" name="ml_13a" value="5"></td>
    </tr>
    <tr>
      <td>Program Studi</td>
      <td align="center"><input type="radio" name="ml_13b" value="1"></td>
          <td align="center"><input type="radio" name="ml_13b" value="2"></td>
          <td align="center"><input type="radio" name="ml_13b" value="3"></td>
          <td align="center"><input type="radio" name="ml_13b" value="4"></td>
          <td align="center"><input type="radio" name="ml_13b" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Keuangan</td>
      <td align="center"><input type="radio" name="ml_13c" value="1"></td>
          <td align="center"><input type="radio" name="ml_13c" value="2"></td>
          <td align="center"><input type="radio" name="ml_13c" value="3"></td>
          <td align="center"><input type="radio" name="ml_13c" value="4"></td>
          <td align="center"><input type="radio" name="ml_13c" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Umum (Sarpras)</td>
      <td align="center"><input type="radio" name="ml_13d" value="1"></td>
          <td align="center"><input type="radio" name="ml_13d" value="2"></td>
          <td align="center"><input type="radio" name="ml_13d" value="3"></td>
          <td align="center"><input type="radio" name="ml_13d" value="4"></td>
          <td align="center"><input type="radio" name="ml_13d" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Kemahataran (Pencamahatar, Registrasi)</td>
      <td align="center"><input type="radio" name="ml_13e" value="1"></td>
          <td align="center"><input type="radio" name="ml_13e" value="2"></td>
          <td align="center"><input type="radio" name="ml_13e" value="3"></td>
          <td align="center"><input type="radio" name="ml_13e" value="4"></td>
          <td align="center"><input type="radio" name="ml_13e" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Akademik (Pengajaran, Ujian Akademik, UKP) </td>
      <td align="center"><input type="radio" name="ml_13f" value="1"></td>
          <td align="center"><input type="radio" name="ml_13f" value="2"></td>
          <td align="center"><input type="radio" name="ml_13f" value="3"></td>
          <td align="center"><input type="radio" name="ml_13f" value="4"></td>
          <td align="center"><input type="radio" name="ml_13f" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Pengembangan Mahatar dan Alumni </td>
      <td align="center"><input type="radio" name="ml_13g" value="1"></td>
          <td align="center"><input type="radio" name="ml_13g" value="2"></td>
          <td align="center"><input type="radio" name="ml_13g" value="3"></td>
          <td align="center"><input type="radio" name="ml_13g" value="4"></td>
          <td align="center"><input type="radio" name="ml_13g" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Bemahatar</td>
      <td align="center"><input type="radio" name="ml_13h" value="1"></td>
          <td align="center"><input type="radio" name="ml_13h" value="2"></td>
          <td align="center"><input type="radio" name="ml_13h" value="3"></td>
          <td align="center"><input type="radio" name="ml_13h" value="4"></td>
          <td align="center"><input type="radio" name="ml_13h" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Perpustakaan</td>
      <td align="center"><input type="radio" name="ml_13i" value="1"></td>
          <td align="center"><input type="radio" name="ml_13i" value="2"></td>
          <td align="center"><input type="radio" name="ml_13i" value="3"></td>
          <td align="center"><input type="radio" name="ml_13i" value="4"></td>
          <td align="center"><input type="radio" name="ml_13i" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Laboratorium</td>
      <td align="center"><input type="radio" name="ml_13j" value="1"></td>
          <td align="center"><input type="radio" name="ml_13j" value="2"></td>
          <td align="center"><input type="radio" name="ml_13j" value="3"></td>
          <td align="center"><input type="radio" name="ml_13j" value="4"></td>
          <td align="center"><input type="radio" name="ml_13j" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prada dan PKL</td>
      <td align="center"><input type="radio" name="ml_13k" value="1"></td>
          <td align="center"><input type="radio" name="ml_13k" value="2"></td>
          <td align="center"><input type="radio" name="ml_13k" value="3"></td>
          <td align="center"><input type="radio" name="ml_13k" value="4"></td>
          <td align="center"><input type="radio" name="ml_13k" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prala</td>
      <td align="center"><input type="radio" name="ml_13l" value="1"></td>
          <td align="center"><input type="radio" name="ml_13l" value="2"></td>
          <td align="center"><input type="radio" name="ml_13l" value="3"></td>
          <td align="center"><input type="radio" name="ml_13l" value="4"></td>
          <td align="center"><input type="radio" name="ml_13l" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Umum</td>
      <td align="center"><input type="radio" name="ml_13m" value="1"></td>
          <td align="center"><input type="radio" name="ml_13m" value="2"></td>
          <td align="center"><input type="radio" name="ml_13m" value="3"></td>
          <td align="center"><input type="radio" name="ml_13m" value="4"></td>
          <td align="center"><input type="radio" name="ml_13m" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Khusus Pelaut (DKP)</td>
      <td align="center"><input type="radio" name="ml_13n" value="1"></td>
          <td align="center"><input type="radio" name="ml_13n" value="2"></td>
          <td align="center"><input type="radio" name="ml_13n" value="3"></td>
          <td align="center"><input type="radio" name="ml_13n" value="4"></td>
          <td align="center"><input type="radio" name="ml_13n" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Pusat Komputer</td>
      <td align="center"><input type="radio" name="ml_13o" value="1"></td>
          <td align="center"><input type="radio" name="ml_13o" value="2"></td>
          <td align="center"><input type="radio" name="ml_13o" value="3"></td>
          <td align="center"><input type="radio" name="ml_13o" value="4"></td>
          <td align="center"><input type="radio" name="ml_13o" value="5"></td>
    </tr>
    <tr>
      <td><b>14.</b></td>
      <td colspan="5"><b>UNIMAR AMNI terbuka dalam menerima masukan Mahatarnya.</b></td>
    </tr>
    <tr>
      <td><b>Pilihan</b></td>
      <td><b>Sangat Tidak Setuju</b></td>
      <td><b>Tidak Setuju</b></td>
      <td><b>Biasa Saja</b></td>
      <td><b>Setuju</b></td>
      <td><b>Sangat Setuju</b></td>
    </tr>
    <tr>
      <td>Fakultas</td>
      <td align="center"><input type="radio" name="ml_14a" value="1"></td>
          <td align="center"><input type="radio" name="ml_14a" value="2"></td>
          <td align="center"><input type="radio" name="ml_14a" value="3"></td>
          <td align="center"><input type="radio" name="ml_14a" value="4"></td>
          <td align="center"><input type="radio" name="ml_14a" value="5"></td>
    </tr>
    <tr>
      <td>Program Studi</td>
      <td align="center"><input type="radio" name="ml_14b" value="1"></td>
          <td align="center"><input type="radio" name="ml_14b" value="2"></td>
          <td align="center"><input type="radio" name="ml_14b" value="3"></td>
          <td align="center"><input type="radio" name="ml_14b" value="4"></td>
          <td align="center"><input type="radio" name="ml_14b" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Keuangan</td>
      <td align="center"><input type="radio" name="ml_14c" value="1"></td>
          <td align="center"><input type="radio" name="ml_14c" value="2"></td>
          <td align="center"><input type="radio" name="ml_14c" value="3"></td>
          <td align="center"><input type="radio" name="ml_14c" value="4"></td>
          <td align="center"><input type="radio" name="ml_14c" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Umum (BAU) – Bagian Umum (Sarpras)</td>
      <td align="center"><input type="radio" name="ml_14d" value="1"></td>
          <td align="center"><input type="radio" name="ml_14d" value="2"></td>
          <td align="center"><input type="radio" name="ml_14d" value="3"></td>
          <td align="center"><input type="radio" name="ml_14d" value="4"></td>
          <td align="center"><input type="radio" name="ml_14d" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Kemahataran (Pencamahatar, Registrasi)</td>
      <td align="center"><input type="radio" name="ml_14e" value="1"></td>
          <td align="center"><input type="radio" name="ml_14e" value="2"></td>
          <td align="center"><input type="radio" name="ml_14e" value="3"></td>
          <td align="center"><input type="radio" name="ml_14e" value="4"></td>
          <td align="center"><input type="radio" name="ml_14e" value="5"></td>
    </tr>
    <tr>
      <td>Biro Administrasi Akademik Kemahataran (BAAK) – Bagian Administrasi Akademik (Pengajaran, Ujian Akademik, UKP) </td>
      <td align="center"><input type="radio" name="ml_14f" value="1"></td>
          <td align="center"><input type="radio" name="ml_14f" value="2"></td>
          <td align="center"><input type="radio" name="ml_14f" value="3"></td>
          <td align="center"><input type="radio" name="ml_14f" value="4"></td>
          <td align="center"><input type="radio" name="ml_14f" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Pengembangan Mahatar dan Alumni </td>
      <td align="center"><input type="radio" name="ml_14g" value="1"></td>
          <td align="center"><input type="radio" name="ml_14g" value="2"></td>
          <td align="center"><input type="radio" name="ml_14g" value="3"></td>
          <td align="center"><input type="radio" name="ml_14g" value="4"></td>
          <td align="center"><input type="radio" name="ml_14g" value="5"></td>
    </tr>
    <tr>
      <td>Biro Kemahataran dan Pemasaran (BKP) – Bagian Bemahatar</td>
      <td align="center"><input type="radio" name="ml_14h" value="1"></td>
          <td align="center"><input type="radio" name="ml_14h" value="2"></td>
          <td align="center"><input type="radio" name="ml_14h" value="3"></td>
          <td align="center"><input type="radio" name="ml_14h" value="4"></td>
          <td align="center"><input type="radio" name="ml_14h" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Perpustakaan</td>
      <td align="center"><input type="radio" name="ml_14i" value="1"></td>
          <td align="center"><input type="radio" name="ml_14i" value="2"></td>
          <td align="center"><input type="radio" name="ml_14i" value="3"></td>
          <td align="center"><input type="radio" name="ml_14i" value="4"></td>
          <td align="center"><input type="radio" name="ml_14i" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Laboratorium</td>
      <td align="center"><input type="radio" name="ml_14j" value="1"></td>
          <td align="center"><input type="radio" name="ml_14j" value="2"></td>
          <td align="center"><input type="radio" name="ml_14j" value="3"></td>
          <td align="center"><input type="radio" name="ml_14j" value="4"></td>
          <td align="center"><input type="radio" name="ml_14j" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prada dan PKL</td>
      <td align="center"><input type="radio" name="ml_14k" value="1"></td>
          <td align="center"><input type="radio" name="ml_14k" value="2"></td>
          <td align="center"><input type="radio" name="ml_14k" value="3"></td>
          <td align="center"><input type="radio" name="ml_14k" value="4"></td>
          <td align="center"><input type="radio" name="ml_14k" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Penempatan Praktik Kerja (PPK) – Subbagian Prala</td>
      <td align="center"><input type="radio" name="ml_14l" value="1"></td>
          <td align="center"><input type="radio" name="ml_14l" value="2"></td>
          <td align="center"><input type="radio" name="ml_14l" value="3"></td>
          <td align="center"><input type="radio" name="ml_14l" value="4"></td>
          <td align="center"><input type="radio" name="ml_14l" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Umum</td>
      <td align="center"><input type="radio" name="ml_14m" value="1"></td>
          <td align="center"><input type="radio" name="ml_14m" value="2"></td>
          <td align="center"><input type="radio" name="ml_14m" value="3"></td>
          <td align="center"><input type="radio" name="ml_14m" value="4"></td>
          <td align="center"><input type="radio" name="ml_14m" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Diklat Khusus Pelaut (DKP)</td>
      <td align="center"><input type="radio" name="ml_14n" value="1"></td>
          <td align="center"><input type="radio" name="ml_14n" value="2"></td>
          <td align="center"><input type="radio" name="ml_14n" value="3"></td>
          <td align="center"><input type="radio" name="ml_14n" value="4"></td>
          <td align="center"><input type="radio" name="ml_14n" value="5"></td>
    </tr>
    <tr>
      <td>Bagian Pusat Komputer</td>
      <td align="center"><input type="radio" name="ml_14o" value="1"></td>
          <td align="center"><input type="radio" name="ml_14o" value="2"></td>
          <td align="center"><input type="radio" name="ml_14o" value="3"></td>
          <td align="center"><input type="radio" name="ml_14o" value="4"></td>
          <td align="center"><input type="radio" name="ml_14o" value="5"></td>
    </tr>
  </table>
            <button type="submit" class="btn btn-primary">Simpan</button>  
    </form>
      
        
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
 