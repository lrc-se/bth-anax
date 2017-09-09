<?php

$err = $app->session->getOnce('err');
$msg = $app->session->getOnce('msg');

?>
<?php if (!empty($err)) : ?>
<div class="msg err"><div><?= $err ?></div></div>
<?php endif; ?>
<?php if (!empty($msg)) : ?>
<div class="msg"><div><?= $msg ?></div></div>
<?php endif; ?>
