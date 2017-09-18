<p>Du är inloggad som <strong><?= $di->common->esc($user->name) ?></strong>.</p>
<form action="<?= $this->url('user/logout') ?>" method="post">
    <input type="hidden" name="logout" value="1">
    <input type="submit" value="Logga ut">
</form>
