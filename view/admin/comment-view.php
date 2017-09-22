<?php $this->renderView('admin/comment-details', $data); ?>
<p>
    <a class="btn" href="<?= $this->url('admin/comment/edit/' . $comment->id) ?>">Redigera</a>
    <a class="btn" href="<?= $this->url('admin/comment/delete/' . $comment->id) ?>">Ta bort</a>
    <a class="btn btn-2" href="<?= $this->url('admin/comment') ?>">Tillbaka till lista</a>
</p>
