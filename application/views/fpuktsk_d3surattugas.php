<style type="text/css">
	td,li,p{
		font-size: 12px;
	}
	body{
		margin-top: 0px;
		font-size: 12px;
	}
</style>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- header -->
<img src="<?php echo base_url() ?>assets/1/images/suratujiand3.jpg" alt="">
<?php foreach($catar as $c){ ?>
<p style="margin-bottom: 0px;text-align: center;"><h3 style="text-align: center;margin-bottom: 0px;"><b>SURAT TUGAS</b></h3></p>
<hr align="center" style="margin: 0px;width:30%;">
</br>
<p style="margin-top: 0px;text-align: center;">No.:<?php echo $nosurat; ?>/UNIMAR-AMNI/IV/2020</p>
<br>
<table>
	<tr>
		<td style="vertical-align: text-bottom;">1.</td>
		<td>Berdasarkan Surat Keputusan Rektor UNIMAR AMNI Semarang No. 041/UNIMAR-AMNI/II/2020 perihal pengangkatan dosen Pembimbing/Penguji Karya Tulis tertanggal 28 Februari 2020 Rektor UNIMAR AMNI Semarang dengan ini memberikan tugas kepada : </td>
	</tr>
</table>
<table width="100%">
	<tr>
		<td>1.</td>
		<td><b><?php echo $c->pembimbing1 ?></b></td>
		<td>Dosen Penguji</td>
	</tr>
	<tr>
		<td>2.</td>
		<td><b><?php echo $c->pembimbing2 ?></b></td>
		<td>Dosen Penguji</td>
	</tr>
	<tr>
		<td>3.</td>
		<td><b><?php echo $c->pembimbing3 ?></b></td>
		<td>Dosen Penguji</td>
	</tr>
</table>
<p>Untuk melaksanakan pengujian Karya Tulis yang diajukan Taruna : </p>
<table width="100%">
	<tr>
		<td width="20%">Nama</td>
		<td width="2%">:</td>
		<td><b><?php echo $nama;?></b></td>
	</tr>
	<tr>
		<td>NIM</td>
		<td>:</td>
		<td><b><?php echo $c->nim;?></b></td>
	</tr>
	<tr>
		<td>Program / Prodi</td>
		<td>:</td>
		<td><b><?php echo $jenjang." / ".$prodi;?></b></td>
	</tr>
	<tr>
		<td>Judul Skripsi</td>
		<td>:</td>
		<td></td>
	</tr>
	<tr>
		<td colspan="3" align="center"><b>"<?php echo $c->karya;?>"</b></td>
	</tr>
	<tr><td colspan="3"></td></tr>
	<tr><td colspan="3"></td></tr>
</table>
<table>
	<tr>
		<td>Hari/ Tanggal</td>
		<td>:</td>
		<td><b>Selama Pandemi Covid-19 ujian online menyesuaikan dosen penguji</b></td>
	</tr>
	<tr>
		<td>Jam</td>
		<td>:</td>
		<td></td>
	</tr>
	<tr>
		<td>Tempat</td>
		<td>:</td>
		<td></td>
	</tr>
</table>
<table>
	<tr>
		<td>2.</td>
		<td>Demikian agar dilaksanakan sabaik-baiknya dan penuh tanggung jawab.</td>
	</tr>
</table>
<br><br><br>
<table width="100%">
	<tr>
		<td width="60%"></td>
		<td align="center">Semarang, <?php echo $tanggal;?></td>
		
	</tr>
	<tr>
		<td></td>
		<td align="center"><b>an. Warek III Bidang Kemahasiswaan</b></td>
	</tr>
	<tr>
		<td></td>
		<td align="center"><b>Kabag. Penempatan Praktek Kerja</b></td>
	</tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr>
		<td></td>
		<td align="center"><b>(Wahyudi Santoso, ANT-II, S.Tr)</b></td>
	</tr>
</table>



<?php } ?>
</body>
</html>
