

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
    <table border="1" width="100%">
      <tr>
        <td rowspan="2" width="5%" align="center"><b>No</b></td>
        <td rowspan="2" align="center"><b>Diskripsi</b></td>
        <td colspan="5" align="center"><b>Skor</b></td>
      </tr>
      <tr>
        <td width="5%" align="center"><b>1</b></td>
        <td width="5%" align="center"><b>2</b></td>
        <td width="5%" align="center"><b>3</b></td>
        <td width="5%" align="center"><b>4</b></td>
        <td width="5%" align="center"><b>5</b></td>
      </tr>
      <tr>
        <td colspan="7">Keandalan<i>(Realibility)</i></td>
      </tr>
      <tr>
        <td>1</td>
        <td>Dosen memberikan materi kuliah secara jelas</td>
        <td align="center"><input type="radio" name="md_a1" value="1"></td>
        <td align="center"><input type="radio" name="md_a1" value="2"></td>
        <td align="center"><input type="radio" name="md_a1" value="3"></td>
        <td align="center"><input type="radio" name="md_a1" value="4"></td></td>
        <td align="center"><input type="radio" name="md_a1" value="5"></td>
      </tr>
      <tr>
        <td>2</td>
        <td>Dosen memberikan waktu diskusi dan tanya jawab materi pembelajaran</td>
        <td align="center"><input type="radio" name="md_a2" value="1"></td>
        <td align="center"><input type="radio" name="md_a2" value="2"></td>
        <td align="center"><input type="radio" name="md_a2" value="3"></td>
        <td align="center"><input type="radio" name="md_a2" value="4"></td>
        <td align="center"><input type="radio" name="md_a2" value="5"></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Dosen menfasilitasi bahan ajar sebagai pelengkap materi perkuliahan</td>
        <td align="center"><input type="radio" name="md_a3" value="1"></td>
        <td align="center"><input type="radio" name="md_a3" value="2"></td>
        <td align="center"><input type="radio" name="md_a3" value="3"></td>
        <td align="center"><input type="radio" name="md_a3" value="4"></td>
        <td align="center"><input type="radio" name="md_a3" value="5"></td>
      </tr>
      <tr>
        <td colspan="7">Empathy<i>(Empathy)</i></td>
      </tr>
      <tr>
        <td>1</td>
        <td>Dosen sangat peduli terhadap Mahatar yang mengalami kesulitan dalam menerima materi perkuliahan</td>
        <td align="center"><input type="radio" name="md_b1" value="1"></td>
        <td align="center"><input type="radio" name="md_b1" value="2"></td>
        <td align="center"><input type="radio" name="md_b1" value="3"></td>
        <td align="center"><input type="radio" name="md_b1" value="4"></td>
        <td align="center"><input type="radio" name="md_b1" value="5"></td>
      </tr>
      <tr>
        <td>2</td>
        <td>Dosen memonitor perkembangan Mahatar</td>
        <td align="center"><input type="radio" name="md_b2" value="1"></td>
        <td align="center"><input type="radio" name="md_b2" value="2"></td>
        <td align="center"><input type="radio" name="md_b2" value="3"></td>
        <td align="center"><input type="radio" name="md_b2" value="4"></td>
        <td align="center"><input type="radio" name="md_b2" value="5"></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Dosen bersikap terbuka dan koperatif terhadap Mahatar</td>
        <td align="center"><input type="radio" name="md_b3" value="1"></td>
        <td align="center"><input type="radio" name="md_b3" value="2"></td>
        <td align="center"><input type="radio" name="md_b3" value="3"></td>
        <td align="center"><input type="radio" name="md_b3" value="4"></td>
        <td align="center"><input type="radio" name="md_b3" value="5"></td>
      </tr>
      <tr>
        <td colspan="7">Bukti Langsung<i>(Tangible)</i></td>
      </tr>
      <tr>
        <td>1</td>
        <td>Dosen memberikan fasilitas kelas tambahan terhadap Mahatar yang mengalami kesulitan dalam menerima materi perkuliahan</td>
        <td align="center"><input type="radio" name="md_c1" value="1"></td>
        <td align="center"><input type="radio" name="md_c1" value="1"></td>
        <td align="center"><input type="radio" name="md_c1" value="1"></td>
        <td align="center"><input type="radio" name="md_c1" value="1"></td>
        <td align="center"><input type="radio" name="md_c1" value="1"></td>
      </tr>
      <tr>
        <td>2</td>
        <td>Dosen menyediakan waktu secara khusus terhadap Mahatar yang membutuhkan pendampingan dalam bidang akademik</td>
        <td align="center"><input type="radio" name="md_c2" value="1"></td>
        <td align="center"><input type="radio" name="md_c2" value="2"></td>
        <td align="center"><input type="radio" name="md_c2" value="3"></td>
        <td align="center"><input type="radio" name="md_c2" value="4"></td>
        <td align="center"><input type="radio" name="md_c2" value="5"></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Dosen menginformasikan ketersedian buku refrensi yang dibutuhkan dalam mendalami materi perkuliahan</td>
        <td align="center"><input type="radio" name="md_c3" value="1"></td>
        <td align="center"><input type="radio" name="md_c3" value="2"></td>
        <td align="center"><input type="radio" name="md_c3" value="3"></td>
        <td align="center"><input type="radio" name="md_c3" value="4"></td>
        <td align="center"><input type="radio" name="md_c3" value="5"></td>
      </tr>
      <tr>
        <td colspan="7">Daya Tanggap<i>(Responsiveness)</i></td>
      </tr>
      <tr>
        <td>1</td>
        <td>Dosen selalu bersedia memberikan bimbingan konseling</td>
        <td align="center"><input type="radio" name="md_d1" value="1"></td>
        <td align="center"><input type="radio" name="md_d1" value="2"></td>
        <td align="center"><input type="radio" name="md_d1" value="3"></td>
        <td align="center"><input type="radio" name="md_d1" value="4"></td>
        <td align="center"><input type="radio" name="md_d1" value="5"></td>
      </tr>
      <tr>
        <td>2</td>
        <td>Dosen selalu bersedia membimbing Mahatar yang mengalami kesulitan dalam menerima materi perkuliahan</td>
        <td align="center"><input type="radio" name="md_d2" value="1"></td>
        <td align="center"><input type="radio" name="md_d2" value="2"></td>
        <td align="center"><input type="radio" name="md_d2" value="3"></td>
        <td align="center"><input type="radio" name="md_d2" value="4"></td>
        <td align="center"><input type="radio" name="md_d2" value="5"></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Dosen memberikan pelayanan yang baik kepada Mahatar yang membutuhkan</td>
        <td align="center"><input type="radio" name="md_d3" value="1"></td>
        <td align="center"><input type="radio" name="md_d3" value="2"></td>
        <td align="center"><input type="radio" name="md_d3" value="3"></td>
        <td align="center"><input type="radio" name="md_d3" value="4"></td>
        <td align="center"><input type="radio" name="md_d3" value="5"></td>
      </tr>
      <tr>
        <td colspan="7">Jaminan<i>(Assurance)</i></td>
      </tr>
      <tr>
        <td>1</td>
        <td>Dosen sangat ramah dalam melayani Mahatar</td>
        <td align="center"><input type="radio" name="md_e1" value="1"></td>
        <td align="center"><input type="radio" name="md_e1" value="2"></td>
        <td align="center"><input type="radio" name="md_e1" value="3"></td>
        <td align="center"><input type="radio" name="md_e1" value="4"></td>
        <td align="center"><input type="radio" name="md_e1" value="5"></td>
      </tr>
      <tr>
        <td>2</td>
        <td>Permasalahan/keluhan Mahatar didiskusikan oleh Dosen ke bagian Kemahasiswaan/Ketarunaan</td>
        <td align="center"><input type="radio" name="md_e2" value="1"></td>
        <td align="center"><input type="radio" name="md_e2" value="2"></td>
        <td align="center"><input type="radio" name="md_e2" value="3"></td>
        <td align="center"><input type="radio" name="md_e2" value="4"></td>
        <td align="center"><input type="radio" name="md_e2" value="5"></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Dosen adil dalam memberlakukan sanksi akademik bila Mahatar melakukan pelanggaran</td>
        <td align="center"><input type="radio" name="md_e3" value="1"></td>
        <td align="center"><input type="radio" name="md_e3" value="2"></td>
        <td align="center"><input type="radio" name="md_e3" value="3"></td>
        <td align="center"><input type="radio" name="md_e3" value="4"></td>
        <td align="center"><input type="radio" name="md_e3" value="5"></td>
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
 