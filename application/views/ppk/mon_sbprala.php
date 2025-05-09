    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Stand By Prala</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <form id="filter-form" class="form-inline mb-3">
                      <select id="year" name="year" class="form-control mr-2">
                          <option value="">-- Pilih Tahun --</option>
                          <?php for ($y = date('Y'); $y >= 2015; $y--): ?>
                              <option value="<?= $y ?>"><?= $y ?></option>
                          <?php endfor; ?>
                      </select>

                      <select id="program_studi" name="program_studi" class="form-control mr-2">
                          <option value="">-- Pilih Prodi --</option>
                          <option value="92403">Teknika</option>
                          <option value="92402">Nautika</option>
                      </select>

                      <button type="submit" class="btn btn-primary">Filter</button>
                  </form>

                  <!-- Container tempat tabel akan di-reload -->
                  <div id="tabel-container">
                      <?php $this->load->view('ppk/mon_sbpraladata'); ?>
                  </div>

       </div>
        </div>
    </div>
</div>
