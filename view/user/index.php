<?php $this->renderView('default/msgs'); ?>
<p><img src="<?= $user->getGravatar(128) ?>"></p>
<p>
    Du är inloggad som <strong><?= $di->common->esc($user->name) ?></strong>.
<?php if ($user->admin) : ?>
    Ditt konto har administratörs&shy;rättigheter.
<?php endif; ?>
</p>
<p>
    <a class="btn" href="<?= $this->url('user/profile/edit/' . $user->id) ?>">Redigera profil</a>
<?php if ($user->admin) : ?>
    <a class="btn" href="<?= $this->url('admin') ?>">Administration</a>
<?php endif; ?>
    <a class="btn btn-2" href="<?= $this->url('user/logout') ?>">Logga ut</a>
</p>
