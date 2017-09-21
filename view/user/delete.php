<h4>Är du säker på att du vill ta bort användaren '<?= $di->common->esc($user->username) ?>'?</h4>
<form action="<?= $di->request->getCurrentUrl() ?>" method="post">
    <input type="hidden" name="action" value="delete">
    <input type="submit" value="Ta bort">
    <a class="btn btn-2" href="<?= $this->url('user/admin/user') ?>">Avbryt</a>
</form>
