<p>Du är inloggad som <strong><?= $user['name'] ?></strong>.</p>
<form action="<?= $this->url('user/logout') ?>" method="post">
    <input type="hidden" name="logout" value="1">
    <input type="submit" value="Logga ut">
</form>
