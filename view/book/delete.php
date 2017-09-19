<h4>Är du säker på att du vill ta bort denna bok?</h4>
<?php $this->renderView('book/details', ['book' => $book]); ?>
<form action="<?= $di->request->getCurrentUrl() ?>" method="post">
    <input type="hidden" name="action" value="delete">
    <input type="submit" value="Ta bort">
    <a class="btn btn-2" href="<?= $this->url('book') ?>">Avbryt</a>
</form>
