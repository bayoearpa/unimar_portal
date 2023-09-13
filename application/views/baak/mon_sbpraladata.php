 <table id="example31082023" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>No. Ijasah</th>
                  <th>Tanggal Lulus</th>
                 <!--  <th>proses</th> -->
                  <!-- <th>Jenjang</th>
                  <th>Mahatar</th>
                  <th>D.Wali</th>
                  <th>BAAK</th>
                  <th>BK</th>
                  <th>PPK</th>
                  <th>Hasil</th> -->
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
                <td><?php echo $i->d3_no_ijasah; ?></td>
                <td><?php echo $i->d3_tanggal_lulus; ?></td>
                <!-- <td> -->
                      <!-- Tombol Tambah/Edit -->
                    <?php //if ($i->id_mon) { ?>
                        <!-- <button class="btn btn-primary edit-button" data-id="<?php// echo $i->nim; ?>">Edit</button> -->
                    <?php //} else { ?>
                        <!-- <button class="btn btn-primary add-button" data-id="<?php// echo $i->nim; ?>">Tambah</button> -->
                    <?php// } ?>
                <!-- </td> -->
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>No. Ijasah</th>
                  <th>Tanggal Lulus</th>
                 <!--  <th>proses</th> -->
                 <!-- <th>Jenjang</th>
                  <th>Mahatar</th>
                  <th>D.Wali</th>
                  <th>BAAK</th>
                  <th>BK</th>
                  <th>PPK</th>
                  <th>Hasil</th> -->
                </tr>
                </tfoot>
              </table>