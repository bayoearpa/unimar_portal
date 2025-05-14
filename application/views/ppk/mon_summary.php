    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Summary</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <form id="filter-form">
                <label for="year">Pilih Tahun:</label>
                <select id="year" name="year">
                  <option value="">Semua</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <!-- Tambahkan pilihan tahun sesuai kebutuhan -->
                </select>
                <label for="program_studi">Pilih Program Studi:</label>
                <select id="program_studi" name="program_studi">
                    <option value="">Semua</option>
                    <option value="92403">Nautika</option>
                    <option value="92402">Teknika</option>
                    <!-- Tambahkan program studi lain jika ada -->
                </select>
                <button type="submit">Filter</button>
            </form>
              <table id="example31082023" class="table table-bordered table-striped">
              <tbody>
                <tr>
                  <td>JUMLAH TARUNA</td>
                  <td id="jml_taruna">0</td>
                  <td><button type="button" class="btn btn-info btn-sm detail-btn" data-type="taruna">Lihat</button></td>
                </tr>
                <tr>
                  <td>LULUS UKP PRA</td>
                  <td id="lls_ukp_pra">0</td>
                  <td><button type="button" class="btn btn-info btn-sm detail-btn" data-type="ukp_pra">Lihat</button></td>
                </tr>
                <tr>
                  <td>STAND BY PRALA</td>
                  <td id="sb_prala">0</td>
                  <td><button type="button" class="btn btn-info btn-sm detail-btn" data-type="sb_prala">Lihat</button></td>
                </tr>
                <tr>
                  <td>ON BOARD</td>
                  <td id="onboard">0</td>
                  <td><button type="button" class="btn btn-info btn-sm detail-btn" data-type="onboard">Lihat</button></td>
                </tr>
                <tr>
                  <td>OFF BOARD</td>
                  <td id="offboard">0</td>
                  <td><button type="button" class="btn btn-info btn-sm detail-btn" data-type="offboard">Lihat</button></td>
                </tr>
                <tr>
                  <td>LULUS UKP PASCA</td>
                  <td id="lls_ukp_pasca">0</td>
                  <td><button type="button" class="btn btn-info btn-sm detail-btn" data-type="ukp_pasca">Lihat</button></td>
                </tr>
                <tr>
                  <td>LULUS D3</td>
                  <td id="lls_d3">0</td>
                  <td><button type="button" class="btn btn-info btn-sm detail-btn" data-type="d3">Lihat</button></td>
                </tr>
              </tbody>

              </table>
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
<!-- modal detai
 -->

    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="detailModalLabel">Detail Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="detail-content">
        <!-- Data detail akan dimuat di sini -->
      </div>
    </div>
  </div>
</div>
   
  