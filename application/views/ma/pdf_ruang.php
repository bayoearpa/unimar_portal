<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cetak QRCODE Ruang</title>
<style>
  

   figure {
     border: 4px solid #575D63;
     margin: 20px;
     padding: 10px;
     width: 95px;
     height: 65px;
    width: 25%;
    float: left;
    text-align: center;
    padding: 0;
    display: inline-block;
    font-size: 10px;
}
</style>
</head>
<body>
<?php 
foreach ($qrcode as $q) {
# code...
?>

  <figure>
  <img src="<?php echo base_url().'assets/aset/qrcode/'.$q->qrcode;?>">
  <figcaption><?php echo $q->nama."-".$q->nama_gedung."-".$q->nama_ruang."-".$q->nama_barang."-".$q->brg_ke." Ket :".$q->keterangan; ?></figcaption>
</figure>


<?php 
}
 ?>
</body>
</html>