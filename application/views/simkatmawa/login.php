<section class="content">
  <div class="row"><div class="col-md-6">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Login SIMKATMAWA</h3>
      </div>
      <?php echo form_open(base_url() . 'simkatmawa/login'); ?>
      <div class="box-body">
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <?php if ($smw_logged_in): ?>
          <div class="alert alert-info">
            Sudah terhubung sebagai <b><?php echo html_escape($smw_user); ?></b>
            <?php echo $smw_kode_pt ? '(kode PT ' . html_escape($smw_kode_pt) . ')' : ''; ?>.
            <a href="<?php echo base_url(); ?>simkatmawa/logout">Logout</a>
          </div>
        <?php endif; ?>
        <p class="text-muted">Gunakan akun SIMKATMAWA (email dan password), bukan akun portal.</p>
        <div class="form-group">
          <label>Email SIMKATMAWA</label>
          <input type="text" name="username" class="form-control" required autofocus>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div></div>
</section>
