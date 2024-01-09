 <tr id="tr_file_konduite">
    <?php foreach($catar as $c){ ?>
                  <td>3.</td>
                   <!-- Tombol Lihat File Sign On -->
                    <?php if ($c->file_konduite) { ?>
                        <td>File Konduite tersedia</td>
                        <td colspan="2"> <button class="btn btn-info view-filek-button" data-filename="<?php echo$c->file_konduite; ?>">Lihat</button></td>
                    <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        <td>File Konduite tidak tersedia</td>
                        <td colspan="2">
                        <form id="formKonduite" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label for="file_konduite">Upload File Konduite</label>
                        <input type="file" class="form-control" id="file_konduite" name="file_konduite">
                        <button class="editfk-button" data-id-tpkl="<?php echo $c->id_tpkl; ?>" data-nim="<?php echo $c->nim; ?>">Edit File Konduite</button>
                        </div>
                        </form>
                        </td>
                    <?php } ?>
                </tr>
                <tr id="td_file_suratketoff">
                  <td>4.</td>
                   <!-- Tombol Lihat File Sign On -->
                    <?php if ($c->file_suratketoff) { ?>
                        <td>File Konduite tersedia</td>
                        <td colspan="2"> <button class="btn btn-info view-filesk-button" data-filename="<?php echo $c->file_suratketoff; ?>">Lihat</button></td>
                    <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        <td>File Surat Keterangan Off tidak tersedia</td>
                        <td colspan="2">
                        <form id="formSuratKetOff" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label for="file_suratketoff">Upload File Surat Keterangan Off</label>
                        <input type="file" class="form-control" id="file_suratketoff" name="file_suratketoff">
                        <button class="editsk-button" data-id-tpkl="<?php echo $c->id_tpkl; ?>" data-nim="<?php echo $c->nim; ?>">Edit File Surat Ket Off</button>
                        </div>
                        </form>
                        </td>
                    <?php } }?>
                </tr>