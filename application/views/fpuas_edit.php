 <?php 
if ($catar==null) {
  echo $catar;
  echo "<div class='alert alert-danger'>Data Tidak Ditemukan.</div>";
}else{
 foreach($catar as $c){  ?>
              <!-- data diri -->
               <table class="table">
                <tr>
                  <td width="10%"><label for="exampleInputEmail1">NIM</label></td>
                  <td width="5%"><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->nim; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Nama</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $nama; ?></label></td>
                </tr>
                <form  name="form1" id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>permohonanuasp">
                <tr>
                  <td><label for="exampleInputEmail1">Semester</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><input type="text" name="smt_now" id="smt_now" value="<?php echo $c->smt_now; ?>"></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Kelas</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><input type="text" name="kelas" id="kelas" value="<?php echo strtoupper($c->kelas); ?>"></label></td>
                </tr>
                </form>
              </table>

            

              <?php } ?>
