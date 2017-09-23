<h4>Är du säker på att du vill ta bort denna kommentar? Detta kan inte ångras!</h4>
<?php $this->renderView('admin/comment-details', $data); ?>
<form action="<?= $this->currentUrl() ?>" method="post">
    <input type="hidden" name="action" value="delete">
    <input type="submit" value="Ta bort">
    <a class="btn btn-2" href="<?= $this->url('admin/comment') ?>">Avbryt</a>
</form>
