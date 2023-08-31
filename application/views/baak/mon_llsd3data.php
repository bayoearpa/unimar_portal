  <table id="example31082023">
                <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
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
                  </tr>
                <?php } ?>
                </tbody>

                <tfoot>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                </tr>
                </tfoot>
              </table>