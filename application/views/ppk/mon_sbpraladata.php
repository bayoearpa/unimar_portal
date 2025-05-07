<table id="example31082023" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>No. Ijasah</th>
            <th>Tanggal Lulus</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $i): ?>
            <tr>
                <td><?= $i->nim ?></td>
                <td><?= $i->nama ?></td>
                <td><?= $i->prodi ?></td>
                <td><?= $i->d3_no_ijasah ?></td>
                <td><?= $i->d3_tanggal_lulus ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>No. Ijasah</th>
            <th>Tanggal Lulus</th>
        </tr>
    </tfoot>
</table>
