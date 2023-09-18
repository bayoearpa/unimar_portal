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
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
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
                <thead>
                <tr>
                  <th>Keterangan</th>
                  <th>Jumlah</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                <td>JUMLAH TARUNA</td>
                <td id="jml_taruna">0</td>
                  </tr>
                  <tr>
                <td>LULUS UKP PRA</td>
                <td id="lls_ukp_pra">0</td>
                  </tr>
                  <tr>
                <td>STAND BY PRALA</td>
                <td id="sb_prala">0</td>
                  </tr>
                  <tr>
                <td>ON BOARD</td>
                <td id="onboard">0</td>
                  </tr>
                  <tr>
                <td>OFF BOARD</td>
                <td id="offboard">0</td>
                  </tr>
                  <tr>
                <td>LULUS UKP PASCA</td>
                <td id="lls_ukp_pasca">0</td>
                  </tr>
                  <tr>
                <td>LULUS D3</td>
                <td id="lls_d3">0</td>
                  </tr>
                </tbody>
                <tfoot>
               <tr>
                  <th>Keterangan</th>
                  <th>Jumlah</th>
                </tr>
                </tfoot>
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
   
  