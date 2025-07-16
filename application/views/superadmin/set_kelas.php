    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Set Kelas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <button class="btn btn-primary add-button">Tambah Kelas</button>
              <table id="example31082023" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID TKBI Kelas</th>
                  <th>Periode Kelas</th>
                  <th>Status</th>
                  <th>Waktu Pelaksanaan</th>
                  <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($kelas as $i) {
                  # code...
                 ?>
                  <tr>
                <td><?php echo $i->id_tkbi_kelas; ?></td>
                <td><?php echo $i->periode_kelas; ?></td>
                <td><?php echo $i->status; ?></td>
                <td><?php echo $i->waktu_pelaksanaan; ?></td>
                <td>
                        <button class="btn btn-primary edit-button" data-id="<?php echo $i->id_tkbi_kelas; ?>">Edit</button>
                </td>
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID TKBI Kelas</th>
                  <th>Periode Kelas</th>
                  <th>Status</th>
                  <th>Waktu Pelaksanaan</th>
                  <th>Edit</th>
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
   
   <!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editModalLabel">Form Edit Set Kelas</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Data -->
                <form id="editForm">
                    <input type="hidden" id="id_tkbi_kelas" name="id_tkbi_kelas">
                    <div class="form-group">
                        <label for="editNama">Periode Kelas:</label>
                        <input type="text" class="form-control" id="periode_kelas" name="periode_kelas">
                    </div>
                     <div class="form-group">
                        <label for="editstatpra">Status Kelas:</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="status" name="status" value="sudah">
                            <label class="form-check-label" for="editstatd3">Sudah</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="status" name="status" value="belum">
                            <label class="form-check-label" for="editstatd3">Belum</label>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="edittgllls">Waktu Pelaksanaan:</label>
                        <input type="date" class="form-control" id="waktu_pelaksanaan" name="waktu_pelaksanaan">
                    </div>
                    <!-- Tambahkan input lain sesuai kebutuhan -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="saveEdit">Simpan</button>
            </div>
        </div>
    </div>
</div>


   <!-- Modal Edit -->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editModalLabel">Form Tambah Set Kelas</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Data -->
                <form id="insertForm">
                    <div class="form-group">
                        <label for="editNama">Periode Kelas:</label>
                        <input type="text" class="form-control" id="iperiode_kelas" name="iperiode_kelas">
                    </div>
                     <div class="form-group">
                        <label for="editstatpra">Status Kelas:</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="istatus" name="istatus" value="sudah">
                            <label class="form-check-label" for="editstatd3">Sudah</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="istatus" name="istatus" value="belum">
                            <label class="form-check-label" for="editstatd3">Belum</label>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="edittgllls">Waktu Pelaksanaan:</label>
                        <input type="date" class="form-control" id="iwaktu_pelaksanaan" name="iwaktu_pelaksanaan">
                    </div>
                    <!-- Tambahkan input lain sesuai kebutuhan -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="saveData">Simpan</button>
            </div>
        </div>
    </div>
</div>
