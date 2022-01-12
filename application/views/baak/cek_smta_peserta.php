 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-body">
            <?php echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
            
              ?>
              <table width="25%">
                <tr>
                  <td>Prodi</td>
                  <td style="width: 10%;">:</td>
                  <td><?php echo $prodi ?></td>
                </tr>
                <tr>
                  <td>Nama Mata Kuliah</td>
                  <td>:</td>
                  <td><?php echo $nm_makul ?></td>
                </tr>
                <tr>
                  <td>Semester</td>
                  <td>:</td>
                  <td><?php echo $smt ?></td>
                </tr>
              </table>
             <table class="table table-bordered">
               <tr>
                <td><b>Nama</b></td>
                <td><b>NIM</b></td>

               
               </tr>
               <?php foreach($catar as $k){ ?>
                <tr>
                  <td><?php echo $k->nama ?></td>
                  <td><?php echo $k->nim ?></td>

                </tr>
                <?php } ?>
             </table>
              
             
              
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->