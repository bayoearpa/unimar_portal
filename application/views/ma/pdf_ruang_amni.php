<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cetak QRCODE Ruang</title>
<style>
  

   figure {
     /*border: 4px solid #575D63;*/
     margin: 20px;
     padding: 10px;
     width: 65px;
     height: 35px;
    width: 25%;
    float: left;
    text-align: center;
    padding: 0;
    display: inline-block;
    font-size: 10px;
}
table {
  border-collapse: collapse;
}
table, td, th {
  border: 1px solid;
}
p {
   letter-spacing: 2px;
}
</style>
</head>
<body>



  <?php 
foreach ($qrcode as $q) {
# code...
?>
<table>
  <tr>
    <td rowspan="2"> <img width="20%" src="<?php echo base_url() ?>assets/1/images/amni-png-cilik.png"></td>
    <!-- <td><center><h2>UNIMAR AMNI</h2></br><p>Universitas Maritim AMNI</p></br><h2>SEMARANG</h2></center></td> -->
    <td><center><h2>UNIMAR AMNI SEMARANG</h2><br><p>GEDUNG <?php $q->nama_gedung ?></p></center></td>
    <td rowspan="2">
      <figure>
      <img width="20%" src="<?php echo base_url().'assets/aset/qrcode/'.$q->qrcode;?>">
      <!-- <figcaption><?php //echo $q->nama."-".$q->nama_gedung."-".$q->nama_ruang."-".$q->nama_barang."-".$q->brg_ke." Ket :".$q->keterangan; ?></figcaption> -->
      </figure>
    </td>
  </tr>
  <tr>
    <td><center><?php echo $q->kode_ruangan."  "$q->nama_ruang."  ".$q->nama_barang."  ".$q->brg_ke." Keterangan :".$q->keterangan; ?></center></td>
  </tr>
</table>
<br>
  <?php 
}
 ?>



</body>
</html>