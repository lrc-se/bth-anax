<?php $this->renderView('book/details', ['book' => $book]); ?>
<a class="btn" href="<?= $this->url('book/edit/' . $book->id) ?>">Redigera</a>
<a class="btn" href="<?= $this->url('book/delete/' . $book->id) ?>">Ta bort</a>
<a class="btn" href="<?= $this->url('book') ?>">Tillbaka till lista</a>
