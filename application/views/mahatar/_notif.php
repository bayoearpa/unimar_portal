<?php
/* Notifikasi sekali tampil: ditampilkan, lalu dihapus dari session sehingga
   tidak muncul lagi saat pengguna pindah menu atau memuat ulang halaman. */
$smw_notif = $this->session->userdata('smw_notif');
if (is_array($smw_notif) && $smw_notif):
  $smw_cls = ['success' => 'alert-success', 'error' => 'alert-danger', 'warning' => 'alert-warning', 'info' => 'alert-info'];
?>
<div style="padding:15px 15px 0">
  <?php foreach ($smw_cls as $t => $c): if (empty($smw_notif[$t])) { continue; } ?>
    <div class="alert <?php echo $c; ?> alert-dismissible" style="margin-bottom:10px">
      <button type="button" class="close" data-dismiss="alert" aria-label="Tutup">&times;</button>
      <?php echo html_escape($smw_notif[$t]); ?>
    </div>
  <?php endforeach; ?>
</div>
<?php
  $this->session->unset_userdata('smw_notif');
endif;
?>
