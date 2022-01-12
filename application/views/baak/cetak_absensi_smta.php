<style type="text/css">
	td{
		font-size: 12px;
	}
	p,li{
		font-size: 10px;
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
<img src="<?php echo base_url() ?>assets/1/images/kop.png" alt="">
<h4 style="margin-top: 0px;text-align: center;">DAFTAR HADIR SEMESTER ANTARA PERIODE</h4>
<table width="100%">
	<tr>
		<td>MATA KULIAH:</td>
		<td>:</td>
		<td><?php  echo $nm_makul;?></td>
	</tr>
	<tr>
		<td>SMT / PRODI</td>
		<td>:</b></td>
		<td><?php echo $smt." / ".$prodi; ?></td>
	</tr>
	<tr>
		<td>DOSEN PENGAMPU</td>
		<td>:</b></td>
		<td><?php echo $pengampu; ?></td>
	</tr>
</table>
<table width="100%" border="1" style="border-collapse: collapse;border: 1px solid black;">
	<tr>
		<td rowspan="2" style="font-weight: bold;text-align: center;">NO</td>
		<td rowspan="2" style="font-weight: bold;text-align: center;">NAMA</td>
		<td rowspan="2" style="font-weight: bold;text-align: center;">NRP</td>
		<td colspan="5" style="font-weight: bold;text-align: center;">HARI / TANGGAL</td>
	</tr>
	<tr style="border-style: groove;">
		<td style="height: 50px;"></td>
		<td style="height: 50px;"></td>
		<td style="height: 50px;"></td>
		<td style="height: 50px;"></td>
		<td style="height: 50px;"></td>
	</tr>


<?php 
$no=1;
foreach($catar as $c){ ?>
	<tr>
		<td  style="height: 30px;"><?php echo $no++ ?></td>
		<td><?php echo $c->nama ?></td>
		<td><?php echo $c->nim ?></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
<?php } ?>
	</table>
	<table width="100%">
		<tr>
			<td>
				<p>Keterangan :</p>
					<ul>
						<li>Isi tanggal pertemuan</li>
						<li>Paraf hadir</li>
						<li>Beri tanda : I -> Izin, A -> Alpha</li>
						<li>Isi jumlah hadir</li>
						<li>Paraf Dosen</li>
					</ul>
			</td>
			<td>
				<p>RANGKAP 2</p>
					<ul>
						<li>DOSEN PENGAMPU</li>
						<li>BAAK</li>
					</ul>
			</td>
		</tr>

	</table>
<table width="100%">
	<tr>
		<td width="60%"></td>
		<td align="center">Semarang, <?php echo $tanggal;?></td>
		
	</tr>
	<tr>
		<td></td>
		<td align="center"><b>Ketua Prodi</b></td>
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
		<td align="center">_________________________________</td>
	</tr>
</table>




</body>
</html>
