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
</style>
</head>
<body>


<table>
  <?php 
foreach ($qrcode as $q) {
# code...
?>
  <tr>
    <td rowspan="2"> <img width="20%" src="<?php echo base_url() ?>assets/1/images/amni-png-cilik.png"></td>
    <td> <h2>UNIMAR AMNI SEMARANG</h2> </td>
    <td rowspan="2">
      <figure>
      <img width="20%" src="<?php echo base_url().'assets/aset/qrcode/'.$q->qrcode;?>">
      <!-- <figcaption><?php //echo $q->nama."-".$q->nama_gedung."-".$q->nama_ruang."-".$q->nama_barang."-".$q->brg_ke." Ket :".$q->keterangan; ?></figcaption> -->
      </figure>
    </td>
  </tr>
  <tr>Keterangan</tr>
  <?php 
}
 ?>
</table>


</body>
</html>