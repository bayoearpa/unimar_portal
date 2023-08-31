  <table id="example31082023" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <!-- <th>Jenjang</th>
                  <th>Mahatar</th>
                  <th>D.Wali</th>
                  <th>BAAK</th>
                  <th>BK</th>
                  <th>PPK</th>
                  <th>Hasil</th> -->
                </tr>
                </thead>
                <?php foreach ($items as $i) {
                  # code...
                 ?>
                <tbody>
                  <tr>
                <td><?php echo $i->nim; ?></td>
                <td><?php echo $i->nama; ?></td>
                <td><?php echo $i->prodi; ?></td>
                  </tr>
                </tbody>
              <?php } ?>
                <tfoot>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                 <!--  <th>Jenjang</th>
                  <th>Mahatar</th>
                  <th>D.Wali</th>
                  <th>BAAK</th>
                  <th>BK</th>
                  <th>PPK</th>
                  <th>Hasil</th> -->
                </tr>
                </tfoot>
              </table>