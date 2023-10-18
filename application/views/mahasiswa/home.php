    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             <h3 class="box-title">Roadmap Perkuliahan UNIMAR AMNI Semarang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

               <?php
               $nim = $this->session->userdata('user');
                if ($this->session->userdata('prodi') == "92403" || $this->session->userdata('prodi') == "92402" ) {
                # code...
                ?>
             <!-- roadmap start Nautik Teknik -->
                   <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    Awal Perkuliahan
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-user bg-blue"></i>

              <div class="timeline-item">
                <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->

                <h3 class="timeline-header"><a href="#">Perkuliahan</a></h3>

                <div class="timeline-body">
                  Melakukan kegiatan perkuliahan di Universitas Maritim AMNI Semarang  
                </div>
               <!--  <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Read more</a>
                  <a class="btn btn-danger btn-xs">Delete</a>
                </div> -->
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
                <?php 
                if ($mahasiswa->cekstatus("status_prada","sudah", $nim) > 0) {
                  # code...?>
                  <i class="fa fa-user bg-blue"></i>
                <?php }else{?>
                  <i class="fa fa-user bg-red"></i>
                <?php } ?>
              <div class="timeline-item">
                <!-- <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span> -->

                <h3 class="timeline-header no-border"><a href="#">Prada</a></h3>
                  <div class="timeline-body">
                    <b>Prada dilaksanakan oleh Taruna Program Diploma Tiga di lingkungan UNIMAR AMNI
                    yang telah memenuhi persyaratan sebagai berikut:</b>
                    <ol>
                    <li>Telah menyelesaikan kuliah sampai dengan semester V.</li>
                    <li>Telah selesai menempuh kuliah minimal 80 sks.</li>
                    <li>Nilai mata kuliah sampai dengan semester IV tidak terdapat nilai D dan E.</li>
                    <li>Mempunyai Indeks Prestasi Kumulatif (IPK) minimal 2,5.</li>
                    <li>Mempunyai nilai Test of English as a Foreign Language (TOEFL) minimal 400.</li>
                    </ol>
                    <b>Prosedur yang harus dilakukan oleh Taruna Program Diploma Tiga di lingkungan 
                    UNIMARAMNI untuk pelaksanaan Prada adalah sebagai berikut:</b>
                    <ol>
                    <li>Minimal 2 (dua) bulan sebelumnya, taruna mengajukan surat booking space ke
                    perusahaan/instansi.</li>
                    <li>Melaksanakan pembekalan Prada.</li>
                    <li>Melaksanakan kliring dari Bagian Pembinaan Karakter Mahatar, Biro Administrasi Umum
                    dan Keuangan (BAUK), Biro Administrasi Akademik Kemahataran (BAAK), Program
                    Studi masing-masing dan Bagian PPK.</li>
                    <li>Melaksanakan pemberkasan kliring siap Prada dan dilampiri fotocopy Kartu Hasil Studi
                    (KHS) semester I sampai dengan IV.</li>
                    <li>Mengajukan surat permohonan penempatan Prada.</li>
                    <li>Melaksanakan Prada selama 4 (empat) bulan dengan dibekali Surat Penempatan Prada, 
                    BukuSaku dan Conduite Nilai Prada.</li>
                    </ol>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <?php 
                if ($mahasiswa->cekstatus("status_d3","sudah", $nim) > 0) {
                  # code...?>
                  <i class="fa fa-user bg-blue"></i>
                <?php }else{?>
                  <i class="fa fa-user bg-red"></i>
                <?php } ?>

              <div class="timeline-item">
                <!-- <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span> -->

                <h3 class="timeline-header"><a href="#">Lulus D3</a></h3>

                <div class="timeline-body">
                  Telah selesai menempuh perkuliahan D3.
                </div>
               <!--  <div class="timeline-footer">
                  <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                </div> -->
              </div>
            </li>
            <!-- END timeline item -->
             <!-- timeline item -->
            <li>
              <?php 
                if ($mahasiswa->cekstatus("pra_status","sudah", $nim) > 0) {
                  # code...?>
                  <i class="fa fa-user bg-blue"></i>
                <?php }else{?>
                  <i class="fa fa-user bg-red"></i>
                <?php } ?>

              <div class="timeline-item">
                <h3 class="timeline-header"><a href="#">Ujian Pra Prala</a></h3>
                <div class="timeline-body">
                  Ujian Pra Prala merupakan ujian kepelautan bagi Taruna Program Studi Diploma Tiga Teknika dan Program Studi Diploma Tiga Nautika telah menyelesaikan studinya sampai semester IV dengan ketentuan tidak ada nilai D pada mata kuliah yang akan diujikan dan melaksanakan ujian kepelautan ATT III / ANT III sebagai syarat melaksakan praktik laut (prala). Ujian Pra Prala dilaksanakan oleh Pelaksana Ujian Keahlian Pelaut (PUKP) 5 Semarang.
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <?php 
                if ($mahasiswa->cekstatus("status_sb","iya", $nim) > 0) {
                  # code...?>
                  <i class="fa fa-user bg-blue"></i>
                <?php }else{?>
                  <i class="fa fa-user bg-red"></i>
                <?php } ?>

              <div class="timeline-item">
                <h3 class="timeline-header no-border"><a href="#">Stand By untuk Prala</a></h3>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
             <?php 
                if ($mahasiswa->cekstatus("status_onboard","iya", $nim) > 0 || $mahasiswa->cekstatus("status_onboard","tidak", $nim) > 0 ) {
                  # code...?>
                  <i class="fa fa-user bg-blue"></i>
                <?php }else{?>
                  <i class="fa fa-user bg-red"></i>
                <?php } ?>

              <div class="timeline-item">

                <h3 class="timeline-header"><a href="#">Onboard</a></h3>
                <div class="timeline-body">
                  <b>Pelaksanaan Prala harus memenuhi persyaratan sesuai dengan ketentuan sebagai berikut:</b>
                  <ol>
                  <li> Dilaksanakan berlayar di kapal selama minimal 12 bulan 1 hari sesuai bidangnya
                  (dibuktikan dengan Surat Pengalaman Berlayar yang dikeluarkan dari pihak yang
                  berwenang).</li>
                  <li>Dilaksanakan pada kapal niaga (bukan kapal perang, kapal negara, kapal pesiar pribadi atau
                  kapal tradisional).</li> 
                  <li>Dilaksanakan maksimum pada 2 (dua) kapal, di mana masing-masing kondite pada kapal
                  tersebut sekurang-kurangnya harus “B”.</li> 
                  <li>Dilaksanakan pada kapal dengan Gross Tons minimal 500 GT, untuk Program Studi
                  Diploma Tiga Nautika.</li> 
                  <li> Dilaksanakan pada kapal dengan Horse Power/Tenaga penggerak utama minimal 750 KW,
                  untuk Program Studi Diploma Tiga Teknika.</li>
                  <li>Pelaporan:</li> 
                  <ol type="a">
                  <li>Batas waktu taruna Prala mengirimkan laporan sign on ke kampus melalui email atau
                  link/website yang sudah disiapkan oleh Bagian PPK adalah maksimal 1 (satu) bulan
                  setelah taruna naik kapal.</li>
                  <li>Selanjutnya setelah taruna naik kapal (sign onboard) secara rutin dan bertahap harus
                  mengirimkan laporan tri wulan setiap 3 (tiga) bulan sekali yaitu di bulan ke 3, 6, 9, dan
                  12 selama dalam masa praktik lautnya terhitung dari tanggal sign on nya.</li>
                  <li>Apabila dalam batas waktu yang telah ditetapkan tidak ditaati, maka taruna yang
                  bersangkutan dikenakan sanksi hukuman dan wajib melaksanakan sanksi hukuman
                  sesuai ketentuan yang berlaku.</li>
                  <li>Untuk batas waktu taruna laporan turun Prala adalah maksimal 15 (lima belas) hari 
                  setelah tanggal sign off dengan melampirkan surat masa layar, surat sign on dan sign off 
                  dari perusahaan tempat Prala, dan dokumen pendukung lainnya yang digunakan saat
                  Prala.</li>
                  <li>Jika dalam waktu yang telah ditetapkan, taruna yang bersangkutan tidak
                  melaksanakakan sesuai ketentuan yang berlaku, maka taruna yang bersangkutan akan
                  dikenakan sanksi hukuman dan wajib melaksanakan sanksi hukuman sesuai ketentuan
                  yang berlaku.Pembimbingan Skripsi dan Karya Tulis serta Pengujian</li>
                </ol>
                  </ol>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
              <!-- timeline item -->
            <li>
              <?php 
                if ($mahasiswa->cekstatus("status_offboard","iya", $nim) > 0) {
                  # code...?>
                  <i class="fa fa-user bg-blue"></i>
                <?php }else{?>
                  <i class="fa fa-user bg-red"></i>
                <?php } ?>

              <div class="timeline-item">
                <h3 class="timeline-header"><a href="#">Offboard</a></h3>
                <div class="timeline-body">
                  <ul>
                  <li>Untuk batas waktu taruna laporan turun Prala adalah maksimal 15 (lima belas) hari 
                  setelah tanggal sign off dengan melampirkan surat masa layar, surat sign on dan sign off 
                  dari perusahaan tempat Prala, dan dokumen pendukung lainnya yang digunakan saat
                  Prala.</li>
                  <li>Jika dalam waktu yang telah ditetapkan, taruna yang bersangkutan tidak
                  melaksanakakan sesuai ketentuan yang berlaku, maka taruna yang bersangkutan akan
                  dikenakan sanksi hukuman dan wajib melaksanakan sanksi hukuman sesuai ketentuan
                  yang berlaku.Pembimbingan Skripsi dan Karya Tulis serta Pengujian</li>
                  <li>Apabila dalam batas waktu yang telah ditetapkan tidak ditaati, maka taruna yang
                  bersangkutan dikenakan sanksi hukuman dan wajib melaksanakan sanksi hukuman
                  sesuai ketentuan yang berlaku.</li>
                  </ul>
                 
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <?php 
                if ($mahasiswa->cekstatus("status_modeling","sudah", $nim) > 0) {
                  # code...?>
                  <i class="fa fa-user bg-blue"></i>
                <?php }else{?>
                  <i class="fa fa-user bg-red"></i>
                <?php } ?>

              <div class="timeline-item">
                <h3 class="timeline-header no-border"><a href="#">Ujian Modeling</a></h3>
                <div class="timeline-body">
                  <b>Taruna Program Studi Diploma Tiga Teknika dan Program Studi Diploma Tiga Nautika di
                  lingkungan UNIMAR AMNI yang telah menempuh Prala, selanjutnya wajib melaksanakan
                  pembimbingan modeling sampai dengan pengujiannya, serta melaksanakan serangkaian ujian
                  kepelautan. Prosedur yang harus dilakukan oleh taruna selesai Prala adalah sebagai berikut:</b>
                  <ol>
                  <li>Melaksanakan laporan turun Prala di Bagian PPK, dengan melampirkan surat sign off dari 
                  perusahaan, buku saku, conduite nilai Prala, dan melampirkan bukti telah mendaftar atau 
                  telah mengikuti diklat yang disyaratkan yang telah diferifikasi dari UPT Diklat Kepelautan 
                  UNIMAR AMNI.</li>
                  <li>Mengajukan dosen pembimbing modeling kepada Ketua Program Studi masing-masing,
                  selanjutnya Kepala Subbagian Prala berdasarkan petunjuk dari Ketua Program Studi
                  masing-masing menerbitkan Surat Pengantar Pembimbingan Modeling.</li>
                  <li>Melaksanakan pembimbingan modeling dengan membawa Surat Pengantar Pembimbingan
                  Modeling.</li>
                  <li>Melaksanakan Ujian Modeling Internal (berdasarkan laporan yang telah diisi dan ditulis
                  taruna selama Prala di atas kapal) dengan diuji oleh dosen profesi yang ditunjuk oleh 
                  Ketua Program Studi masing-masing sampai dinyatakan lulus.</li>
                  </ol>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <?php 
                if ($mahasiswa->cekstatus("status_trb","sudah", $nim) > 0) {
                  # code...?>
                  <i class="fa fa-user bg-blue"></i>
                <?php }else{?>
                  <i class="fa fa-user bg-red"></i>
                <?php } ?>

              <div class="timeline-item">

                <h3 class="timeline-header"><a href="#">Ujian TRB</a></h3>
                <div class="timeline-body">
                  <ul>
                  <li>Ujian Training Record Book (TRB) Internal
                  Ujian turun prala (TRB) Internal merupakan ujian bagi Taruna Program Studi 
                  Diploma Tiga Teknika dan Program Studi Diploma Tiga Nautika setelah turun Prala 
                  (berdasarkan laporan yang telah diisi dan ditulis taruna selama Prala di atas kapal). 
                  Ujian Modeling Internal dilaksanakan oleh internal UNIMAR AMNI, dengan diuji oleh 
                  dosen profesi di lingkungan UNIMAR AMNI yang ditunjuk oleh Dekan Kemaritiman 
                  UNIMAR AMNI Semarang. </li>
                  <li>Ujian Training Record Book (TRB) di PUKP 5
                  Ujian Training Record Book (TRB) di PUKP 5 merupakan ujian bagi Taruna 
                  Program Studi Diploma Tiga Teknika dan Program Studi Diploma Tiga Nautika yang 
                  menempuh ATT-III/ANT-III dan diselenggarakan di PUKP 5, dengan verifikasi 
                  dokumen Prala.</li>
                  <li>Ujian Training Record Book (TRB)
                  Ujian TRB merupakan ujian bagi Taruna Program Studi Diploma Tiga Teknika 
                  dan Program Studi Diploma Tiga Nautika yang menempuh ATT-III/ANT-III setelah 
                  menyelesaikan Ujian Training Record Book (TRB) di PUKP 5.</li>
                  </ul>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <?php 
                if ($mahasiswa->cekstatus("pasca_status","sudah", $nim) > 0) {
                  # code...?>
                  <i class="fa fa-user bg-blue"></i>
                <?php }else{?>
                  <i class="fa fa-user bg-red"></i>
                <?php } ?>

              <div class="timeline-item">
                <h3 class="timeline-header no-border"><a href="#">Ujian Pasca Prala</a></h3>
                <div class="timeline-body">
                  Ujian Pasca Prala merupakan ujian kepelautan bagi Taruna Program Studi Diploma Tiga Teknika dan Program Studi Diploma Tiga Nautika yang melaksanakan ujian kepelautan ATT-III/ANT-III dan telah melaksanakan Prala selama 12 bulan. Ujian Pasca Prala dilaksanakan oleh PUKP 5 Semarang.
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    Akhir Perkuliahan
                  </span>
            </li>
            <!-- /.timeline-label -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
             <!-- roadmap end Nautik Teknik -->
             <?php }else{ echo "coming soon";}?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->