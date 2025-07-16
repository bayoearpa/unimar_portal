
<form method="post" action="<?php echo base_url() ?>koperasi/cetak_excel">
    <input type="hidden" name="kelas" value="<?php echo isset($frm_kelas) ? $frm_kelas : ''; ?>">
    
    <button type="submit" class="btn btn-primary btn-sm" style="width:30%;">
        <i class="fa fa-fw fa-print"></i> Cetak Semua
    </button>
    
   <!--  <a href="<?php //echo base_url() ?>koperasi/cetak" class="btn btn-success btn-sm" style="width:30%;">
        <i class="fa fa-fw fa-backward"></i> Kembali
    </a> -->
</form>
<table id="example4" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No.</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>No.Wa</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no = 1;
    foreach($results as $c){ 
    ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $c->nim ?></td>
      <td><?php echo $c->nama_mhs ?></td>
      <td><?php echo $c->no_wa ?></td>
      <td><?php echo $c->email ?></td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
            <th>No.</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>No.Wa</th>
      <th>Email</th>
    </tr>
  </tfoot>
</table>
