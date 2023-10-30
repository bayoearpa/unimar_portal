 <table id="example31082023" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>Seafarercode</th>
                  <th>Status Offboard</th>
                  <th>Nama Perusahaan</th>
                  <th>Nama Kapal</th>
                  <th>Tanggal Sign On</th>
                   <th>Tanggal Sign Off</th>
                   <th>File Offboard</th>
                  <th>proses</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($items as $i) {
                  # code...
                 ?>
                  <tr>
                <td><?php echo $i->nim; ?></td>
                <td><?php echo $i->nama; ?></td>
                <td><?php echo $i->prodi; ?></td>
                <td><?php echo $i->seafarercode; ?></td>
                <td><?php echo $i->status_offboard; ?></td>
                <td><?php echo $i->nama_perusahaan; ?></td>
                <td><?php echo $i->nama_kapal; ?></td>
                <td><?php echo $i->tgl_sign_on; ?></td>
                <td><?php echo $i->tgl_sign_off; ?></td>
                <td>
                    <!-- Tombol Lihat File Sign Off -->
                    <?php if ($i->upload_file_signoff) { ?>
                        <button class="btn btn-info view-file-button" data-filename="<?php echo $i->upload_file_signoff; ?>">Lihat</button>
                    <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                    <?php } ?>
                </td>
                <td>
                      <!-- Tombol Tambah/Edit -->
                    <?php if ($i->id_mon) { ?>
                        <button class="btn btn-primary edit-button" data-id="<?php echo $i->nim; ?>">Edit</button>
                    <?php } else { ?>
                        <button class="btn btn-primary add-button" data-id="<?php echo $i->nim; ?>">Tambah</button>
                    <?php } ?>
                </td>
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
               <tr>
                   <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>Seafarercode</th>
                  <th>Status Offboard</th>
                   <th>Nama Perusahaan</th>
                  <th>Nama Kapal</th>
                  <th>Tanggal Sign On</th>
                   <th>Tanggal Sign Off</th>
                   <th>File Offboard</th>
                  <th>proses</th>
                </tr>
                </tfoot>
              </table>