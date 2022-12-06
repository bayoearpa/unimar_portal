      
      <div class="container-wrapper" style="min-height: 501px">
        <div class="container">
        <section class="content">
  

   <div class="box box-default">
   
            <div class="box-header">
              <h3 class="box-title">Pengajuan Kliring Ujian Akhir Semester</h3>
            </div>       
<div class="box-body">
  <?php 
    // echo validation_errors(); 
    
    if ($this->session->flashdata('success') > "0") {
      # code...
      echo "<div class='alert alert-success'>".$this->session->flashdata('success')."</div>";
    }
     if ($this->session->flashdata('error') > "0") {
      # code...
      echo "<div class='alert alert-danger'>".$this->session->flashdata('error')."</div>";
    }
    ?>
  <form name="form1" id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>pencarianpengajuanuas">
   
    
    <div class="callout callout-danger">
      <p>Tata Cara Kliring UAS :</p>
      <ol>
          <li>Masukan NIM/NRP anda pada form diatas.</li>
          <li>Jika data tidak ditemukan, klik tombol <b>Form Pengajuan UAS</b> dan isi datanya.</li>
          <li>setelah selesai input pengajuan, silakan cek kembali pada menu home, lalu masukan NIM/NRP.</li>
          <li>ketika data telah muncul harap menguhubungi pihak terkait untuk melakukan kliring hinga "ACC".</li>
          <li>jika terjadi Error pada pengajuan dapat menghubungi IT (nomor tertera di bawah).</li>
      </ol>
    </div>
    <div class="callout callout-info">
       <div class="form-group">
      <p><b>Kontak yang dapat dihubungi:</b> </p>
      <table>
        <tr>
          <td><b>IT</b></td>
          <td>:</td>
          <td>082220220573 (Bayu) Hubungi jika ada kendala di sistem!</td>
        </tr>
         <tr>
          <td><b>Mahatar</b></td>
          <td>:</td>
          <td>081312606684 (Pak Iwan Samsul)</td>
        </tr>
         <tr>
          <td><b>Keuangan</b></td>
          <td>:</td>
          <td>082241613131 (Aisah)</td>
        </tr>
        <!-- <tr>-->
        <!--  <td><b>BAAK</b></td>-->
        <!--  <td>:</td>-->
        <!--  <td>085876516196 (Rima)</td>-->
        <!--</tr>-->
      </table>
      </div>  
    </div>
    <a href="<?php echo base_url() ?>permohonanuas"><button type="button" class="btn bg-orange btn-flat margin">Form Pengajuan UAS</button></a>
     <div class="form-group">
      <label for="exampleInputEmail">Masukan NIM anda untuk cek proses kliring</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan NIM anda">
    </div> 
        <button type="submit" class="btn btn-primary">Cari</button>        
  

 