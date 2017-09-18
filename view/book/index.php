<?php

$num = count($books);

?>
<?php $this->renderView('default/msgs', $data); ?>
<?php if ($num) : ?>
<h3><?= ($num == 1 ? '1 bok' : "$num böcker") ?> i databasen</h3>
<p><a class="btn" href="<?= $this->url('book/create') ?>">Lägg till bok</a></p>
<div class="xscroll">
    <table>
        <tr>
            <th>ID</th>
            <th>Titel</th>
            <th>Författare</th>
            <th>Publiceringsår</th>
            <th>ISBN</th>
            <th>Språk</th>
            <th>Åtgärd</th>
        </tr>
<?php   foreach ($books as $book) : ?>
        <tr>
            <td><?= $book->id ?></td>
            <td><a href="<?= $this->url('book/' . $book->id) ?>"><?= $di->common->esc($book->title) ?></a></td>
            <td><?= $di->common->esc($book->author) ?></td>
            <td><?= $di->common->esc($book->published) ?></td>
            <td><?= $di->common->esc($book->isbn) ?></td>
            <td><?= $di->common->esc($book->language) ?></td>
            <td>
                <a href="<?= $this->url('book/edit/' . $book->id) ?>">Redigera</a><br>
                <a href="<?= $this->url('book/delete/' . $book->id) ?>">Ta bort</a>
            </td>
        </tr>
<?php   endforeach; ?>
    </table>
</div>
<?php else : ?>
<h5>Inga böcker att visa</h5>
<p><a class="btn" href="<?= $this->url('book/create') ?>">Lägg till bok</a></p>
<?php endif; ?>
