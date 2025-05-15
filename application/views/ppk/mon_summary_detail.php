<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>NIM</th>
      <th>Nama</th>
      <th>Prodi</th>
      <th>No. Ijazah</th>
      <th>Tanggal Lulus</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($items as $i): ?>
    <tr>
      <td><?php echo $i->nim; ?></td>
      <td><?php echo $i->nama; ?></td>
      <td><?php echo $i->prodi; ?></td>
      <td><?php echo $i->d3_no_ijasah; ?></td>
      <td><?php echo $i->d3_tanggal_lulus; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
