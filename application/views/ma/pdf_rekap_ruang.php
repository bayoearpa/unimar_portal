<style type="text/css">
	td,li,p{
		font-size: 12px;
	}
	body{
		margin-top: 0px;
	}
</style>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- header -->

<table align="center" width="100%">
	<tr>
		<td align="center">
		<p style="margin: 0px;padding: 0px;"><b>YAYASAN BINA KEMARITIMAN</b></p>
		<p style="margin: 0px;padding: 0px;"><b><?php echo $nama_user ?></b></p>
		</td>
	</tr>
</table>
<!-- <hr size="2" style="border-color: #000000;border-width: 3px;margin: 0px;padding: 0px;">
<h1 align="right" style="margin-right: 20px;margin-bottom: 0px;margin: 0px;padding: 0px;"><?php //echo $c->no ?></h1> -->

<!-- datadiri -->

<P style="margin: 0px;padding: 0px;"><b><?php echo $nama_gedung ?></b></P>
<P style="margin: 0px;padding: 0px;"><b><?php echo $nama_ruang ?></b></P>

<table border="1" style="border-collapse: collapse;border: 1px solid black;margin-bottom: 10px;">
	<tr>
		<td><p><b>Nama Barcode</b></p></td>
		<td><p><b>Barang</b></p></td>
		<td><p><b>Merk</b></p></td>
		<td><p><b>Tahun Beli</b></p></td>
		<td><p><b>Harga beli</b></p></td>
		<td><p><b>Keterangan</b></p></td>
		<td><p><b>Status</b></p></td>
	</tr>
	<?php foreach($rekap as $r){ ?>
	<tr>
		<td><?php echo $r->nama."-".$r->nama_gedung."-".$r->nama_ruang."-".$r->nama_barang."-".$r->brg_ke; ?></td>
		<td><?php echo $r->nama_barang; ?></td>
		<td><?php echo $r->merk; ?></td>
		<td><?php echo $r->tahun_beli; ?></td>
		<td><?php echo $r->harga_beli; ?></td>
		<td><?php echo $r->keterangan; ?></td>
		<td><?php echo $r->status; ?></td>
	</tr>
	<?php } ?>

</table>




<!-- halaman 2 -->
<div style="page-break-before:always; ">
<table align="center" width="100%">
	<tr>
		<td align="center">
		<p style="margin: 0px;padding: 0px;"><b>YAYASAN BINA KEMARITIMAN</b></p>
		<p style="margin: 0px;padding: 0px;"><b><?php echo $nama_user ?></b></p>
		</td>
	</tr>
</table>
<!-- <hr size="2" style="border-color: #000000;border-width: 3px;margin: 0px;padding: 0px;">
<h1 align="right" style="margin-right: 20px;margin-bottom: 0px;margin: 0px;padding: 0px;"><?php //echo $c->no ?></h1> -->

<!-- datadiri -->

<P style="margin: 0px;padding: 0px;"><b><?php echo $nama_gedung ?></b></P>
<P style="margin: 0px;padding: 0px;"><b><?php echo $nama_ruang ?></b></P>
<P style="margin: 0px;padding: 0px;"><b>Rincian :</b></P>

<table border="1" style="border-collapse: collapse;border: 1px solid black;margin-bottom: 10px;">
	<tr>
		<td><p><b>Nama Barang</b></p></td>
		<td><p><b>Jumlah Barang</b></p></td>
	</tr>
	<?php foreach($summary as $s){ ?>
	<tr>
		<td><?php echo $s->dis_nama_barang; ?></td>
		<td><?php echo $s->count_barang; ?></td>
	</tr>
<?php } ?>
</table>

<!-- ttd -->
<table width="80%" align="center" style="margin: 0px;padding: 0px;">
	<tr><td align="center" style="height: 100px;">Penanggung jawab</td></tr>
	<tr><td><hr style="border-style: dotted;width: 50%;"></td></tr>
</table>

</div>
<!-- akhir halaman 2 -->



</body>
</html>
