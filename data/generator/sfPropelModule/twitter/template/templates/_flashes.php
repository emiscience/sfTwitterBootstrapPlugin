[?php if ($sf_user->hasFlash('success')): ?]
  <div class="alert alert-success">
    <a class="close" data-dismiss="alert">&times;</a>
    [?php echo __($sf_user->getFlash('success'), array(), 'sf_admin') ?]
  </div>
[?php endif; ?]

[?php if ($sf_user->hasFlash('warning')): ?]
<div class="alert alert-warning">[?php echo __($sf_user->getFlash('warning'), array(), 'sf_admin') ?]</div>
[?php endif; ?]

[?php if ($sf_user->hasFlash('error')): ?]
  <div class="alert alert-error">[?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?]</div>
[?php endif; ?]
