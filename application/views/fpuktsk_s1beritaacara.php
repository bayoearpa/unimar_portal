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
<img src="<?php echo base_url() ?>assets/1/images/beritaacaras1.jpg" alt="">
<?php foreach($catar as $c){ ?>
<p>Pada hari ini ............................. tanggal ..................... bulan ..................... tahun dua ribu ............................. bertempat di ruang ......................................</p>
</br>
<p>Berdasarkan Surat Tugas NO. 041/UNIMAR-AMNI/II/2020 tertanggal 28 Februari 2020</p>
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
<p>Telah melaksanakan Pengujian Seminar Proposal Skripsi yang diajukan oleh Mahasiswa</p>
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
	<tr><td colspan="3"></td></tr>
	<tr><td colspan="3"></td></tr>
	<tr><td colspan="3"></td></tr>
	<tr><td colspan="3"></td></tr>
	<tr><td colspan="3"></td></tr>
	<tr><td colspan="3"></td></tr>
	<tr>
		<td>Hasil</td>
		<td>:</td>
		<td>.................................................</td>
	</tr>
</table>
<table width="100%"  border="1" style="border-collapse: collapse;border: 1px solid black;">
	<tr>
		<td><b><center>No.</center></b></td>
		<td><b><center>Penguji</center></b></td>
		<td><b><center>Nilai (dalam angka)</center></b></td>
		<td><b><center>Keterangan</center></b></td>
	</tr>
	<tr>
		<td height="30px">1.</td>
		<td>Penguji 1</td>
		<td><center>.....................</center></td>
		<td rowspan="2">Nilai Rata-Rata :</td>
	</tr>
	<tr>
		<td height="30px">2.</td>
		<td>Penguji 2</td>
		<td><center>.....................</center></td>
	</tr>
	<tr>
		<td height="30px">3.</td>
		<td>Penguji 3</td>
		<td><center>.....................</center></td>
		<td rowspan="2">Konversi :</td>
	</tr>
	<tr>
		<td colspan="2" align="right" height="30px"><b>Jumlah Nilai</b></td>
		<td><center>.....................</center></td>
	</tr>
</table>
<p>Konversi:</p>
<table width="30%">
	<tr>
		<td>A</td>
		<td>=</td>
		<td>85</td>
		<td>-</td>
		<td>100</td>
	</tr>
	<tr>
		<td>B</td>
		<td>=</td>
		<td>70</td>
		<td>-</td>
		<td>84</td>
	</tr>
	<tr>
		<td>C</td>
		<td>=</td>
		<td>60</td>
		<td>-</td>
		<td>69</td>
	</tr>
	<tr>
		<td>D</td>
		<td>=</td>
		<td>50</td>
		<td>-</td>
		<td>59</td>
	</tr>
</table>
<table width="100%">
	<tr>
		<td width="45%"><center>Tanda Tangan Mahasiswa Teruji</center> </td>
		<td colspan="3"><center>Tanda Tangan Tim Penguji</center> </td>
	</tr>
	<tr>
		<td></td>
		<td height="30px">1.</td>
		<td><b><?php echo $c->pembimbing1 ?></b></td>
		<td>(.................................)</td>
	</tr>
	<tr>
		<td></td>
		<td height="30px">2.</td>
		<td><b><?php echo $c->pembimbing2 ?></b></td>
		<td>(.................................)</td>
	</tr>
	<tr>
		<td></td>
		<td height="30px">3.</td>
		<td><b><?php echo $c->pembimbing3 ?></b></td>
		<td>(.................................)</td>
	</tr>
	<tr>
		<td><center><b>(<?php echo $nama; ?>)</b></center></td>
		<td colspan="3"></td>
	</tr>
</table>


<?php } ?>
</body>
</html>
