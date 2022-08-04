<html>
<head>
	<title></title>
<style type="text/css">
*{
font-family: monospace;
font-size: 10px;
margin:0px;
padding:0px;
}

@page {
margin-left:3cm 2cm 2cm 2cm;
margin-top: 10px;
}

table.grid{
font-size: 10pt;
border-collapse:collapse;
}

table.grid th{
padding-top:1mm;
padding-bottom:1mm;
}

table.grid th{
background: #F0F0F0;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
text-align:left;
padding-left:0.2cm;
}

table.grid tr td{
padding-top:0.5mm;
padding-bottom:0.5mm;
padding-left:2mm;
border-bottom:0.2mm solid #000;
}

h1{
font-size: 18pt;
}

h2{
font-size: 14pt;
}

.header{
display: block;
/*width:15.6cm ;*/
margin-bottom: 0.3cm;
text-align: center;
}

.attr{
font-size:9pt;
width: 100%;
padding-top:2pt;
padding-bottom:2pt;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
}

.pagebreak {
page-break-after: always;

}


	</style>
</head>
<body>
	<table align="center" width="100%">
		<tr><td align="center"><h3>UNIVERSITAS MARITIM AMNI</h3></td></tr>
		<tr><td align="center"><h3>( UNIMAR AMNI )</h3></td></tr>
	</table>
	
<table border="0" width="100%">

<tr><td colspan="5" align="center" style="border-top-style:dotted;border-bottom-style:dotted;border-width:1px;"><h3>S E M E S T E R   A N T A R A</h3></td></tr>
<tr><td width="30%"><p style="margin:2%;">Tanggal</p></td><td width="2%">:</td><td width="15%"><?php echo date("d-m-Y") ?></td><td></td><td width="30%"></td></tr>
<tr><td><p>No. Semester Antara</p></td><td>:</td><td><?php echo $id_smta ?></td><td></td></tr>
<tr><td><p>NRP / NIM</p></td><td>:</td><td><?php echo $nim ?></td><td></td></tr>
<tr><td><p>Nama</p></td><td>:</td><td><?php echo $nama ?></td><td></td></tr>
<tr><td><p>Prodi</p></td><td>:</td><td><?php echo $prodi ?></td><td></td></tr>
<!-- <tr><td><p>SKS yang diambil</p></td><td>:</td><td><?php //echo $value['total_sks']." " ?>SKS</td><td></td></tr>
 -->
<tr><td style="border-top-style:dotted;border-bottom-style:dotted;border-width:1px;" colspan="4"><p><b>JENIS PEMBAYARAN<b></p></td><td width="30%" style="border-top-style:dotted;border-bottom-style:dotted;border-width:1px;"><p><b>RINCIAN</b></p></td></tr>

<tr><td><p>Biaya Administrasi</p></td><td>:</td><td><?php echo $b_adm; ?></td><td></td><td>Rp.<?php echo $tot_adm; ?></td></tr>

<tr><td><p>Biaya SKS</p></td><td>:</td><td><?php echo $sum_sks."&nbsp X &nbsp".$per_sks;?></td><td></td><td>Rp. <?php echo $tot_sks; ?></td></tr>


<tr><td style="border-top-style:dotted;border-bottom-style:dotted;border-width:1px;" colspan="4"><p><b>TOTAL</b></p></td><td width="30%" style="border-top-style:dotted;border-bottom-style:dotted;border-width:1px;"><p><b>Rp.<?php echo $total; ?></b></p></td></tr>
<!-- <tr><td style="border-bottom-style:dotted;border-width:1px;" colspan="4"><p><b>Terbilang</b></p></td><td  width="30%" style="border-bottom-style:dotted;"><p><b><?php// echo terbilang($value['total_perbaikan']); ?></b></p></td></tr>
 -->
<tr><td></td><td></td><td></td><td>Petugas</td></tr>
<tr><td></td><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td><td>Keuangan</td></tr>
</table>
</body>
</html>

  <script language="javascript">
window.print();
</script>
  <?php 
