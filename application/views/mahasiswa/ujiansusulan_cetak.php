<style type="text/css">
	td,li,p{
		font-size: 12px;
	}
	body{
		margin-top: 0px;
		font-size: 12px;
	}
	.row-ttd td {
        height: 40px; /* Atur tinggi baris di sini */
        vertical-align: middle; /* Agar teks nomor & makul tetap di tengah */
        border: 1px solid black;
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
<p style="margin-bottom: 0px;text-align: center;"><h3 style="text-align: center;margin-bottom: 0px;"><b>KARTU UJIAN SUSULAN</b></h3></p>
<hr align="center" style="margin: 0px;width:30%;">

<!-- <table>
	<tr>
		<td style="vertical-align: text-bottom;">1.</td>
		<td>Berdasarkan Surat Keputusan Rektor UNIMAR AMNI Semarang No. 041/UNIMAR-AMNI/II/2020 perihal pengangkatan dosen Pembimbing/Penguji Skripsi tertanggal 28 Februari 2020 Rektor UNIMAR AMNI Semarang dengan ini memberikan tugas kepada : </td>
	</tr>
</table> -->
<?php foreach($catar as $c){  ?>
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
      <td><label for="exampleInputEmail1">Semester/Prodi</label></td>
      <td><label for="exampleInputEmail1">:</label></td>
      <td><label for="exampleInputEmail1"><?php echo "Semester ".$c->smt."/".$prodi; ?></label></td>
    </tr>
	<tr><td colspan="3"></td></tr>
	<tr><td colspan="3"></td></tr>
</table>
<?php } ?>

<table width="100%" style="border-collapse: collapse;border: 1px solid black;">
	<tr>
		<td align="center">No.</td>
		<td align="center">Mata Kuliah</td>
		<td align="center">SKS</td>
		<td align="center">TTD Pengawas</td>
	</tr>
	<?php 
	$no = 1;
	foreach ($list_makul as $keyz) { ?>
	<tr class="row-ttd">
        <td align="center"><?php echo $no++ ?></td>
        <td><?php echo $keyz->nama_makul; ?></td>
        <td align="center"><?php echo $keyz->sks;?></td>
        <td width="100"></td> </tr>
	<?php } ?>
</table>
<br>
<br>
<br>
<table>
	<tr>
		<td>Catatan : Melampirkan <b>KPK ASLI</b></td>
	</tr>
</table>

<br><br><br>
<table width="100%">
	<tr>
		<td width="60%"></td>
		<td align="center"><?php echo "Semarang, " . date("d-m-Y"); ?></td>
		
	</tr>
	<!-- <tr>
		<td></td>
		<td align="center"><b>an. Warek III Bidang Kemahasiswaan</b></td>
	</tr> -->
	<tr>
		<td></td>
		<td align="center"><b>Dosen Wali / Ka. Prodi</b></td>
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
		<td align="center"><b>(_______________________________________)</b></td>
	</tr>
</table>

</body>
</html>
