<?php $this->renderView('default/msgs'); ?>
<p><img src="https://www.gravatar.com/avatar/<?= md5(strtolower(trim($user->email))) ?>?s=128&amp;d=retro"></p>
<p>
    Du är inloggad som <strong><?= $di->common->esc($user->name) ?></strong>.
<?php if ($user->admin) : ?>
    Ditt konto har administratörs&shy;rättigheter.
<?php endif; ?>
</p>
<p>
    <a class="btn" href="<?= $this->url('user/profile/edit/' . $user->id) ?>">Redigera profil</a>
    <a class="btn btn-2" href="<?= $this->url('user/logout') ?>">Logga ut</a>
</p>
