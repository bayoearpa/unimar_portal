<?php if ($this->session->flashdata('smw_success')): ?>
  <div class="alert alert-success"><?php echo html_escape($this->session->flashdata('smw_success')); ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('smw_error')): ?>
  <div class="alert alert-danger"><?php echo html_escape($this->session->flashdata('smw_error')); ?></div>
<?php endif; ?>
