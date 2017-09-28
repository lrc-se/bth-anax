<?php

$num = count($comments);

?>
<?php $this->renderView('default/msgs', $data); ?>
<?php if ($num) : ?>
<h3>Webbplatsen har <?= ($num == 1 ? '1 kommentar' : $num . ' kommentarer') ?></h3>
<p>
    <a class="btn btn-2" href="<?= $this->url('admin') ?>">Tillbaka till administration</a>
</p>
<div class="xscroll">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Innehåll</th>
                <th>Författare</th>
                <th>Skriven</th>
                <th>Uppdaterad</th>
                <th>Åtgärd</th>
            </tr>
        </thead>
        <tbody>
<?php   foreach ($comments as $comment) : ?>
<?php       $author = $comment->getReference($di->repository->users, 'userId'); ?>
            <tr<?= (is_null($author->username) ? ' class="anonymous"' : '') ?>>
                <td><?= $comment->id ?></td>
                <td><?= esc($comment->contentId) ?></a></td>
                <td>
<?php       if (is_null($author->deleted)) : ?>
                    <?= esc($author->name) ?><br><?= (is_null($author->username) ? '<em>(Anonym)</em>' : '<strong>(' . esc($author->username) . ')</strong>') ?>
<?php       else : ?>
                    <em>(Borttagen användare)</em>
<?php       endif; ?>
                </td>
                <td><?= $comment->created ?></td>
                <td><?= $comment->updated ?></td>
                <td>
                    <a href="<?= $this->url('admin/comment/' . $comment->id) ?>">Visa</a><br>
                    <a href="<?= $this->url('admin/comment/edit/' . $comment->id) ?>">Redigera</a><br>
                    <a href="<?= $this->url('admin/comment/delete/' . $comment->id) ?>">Ta bort</a>
                </td>
            </tr>
<?php   endforeach; ?>
        </tbody>
    </table>
</div>
<?php else : ?>
<h3>Inga kommentarer att visa</h3>
<p>
    <a class="btn btn-2" href="<?= $this->url('admin') ?>">Tillbaka till administration</a>
</p>
<?php endif; ?>
