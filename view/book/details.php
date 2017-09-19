<dl class="dl-small">
    <dt>ID:</dt>
    <dd><?= $book->id ?></dd>
    <dt>Titel:</dt>
    <dd><?= $di->common->esc($book->title) ?></dd>
    <dt>Författare:</dt>
    <dd><?= $di->common->esc($book->author) ?></dd>
    <dt>Publiceringsår:</dt>
    <dd><?= $di->common->esc($book->published) ?></dd>
    <dt>ISBN:</dt>
    <dd><?= $di->common->esc($book->isbn) ?></dd>
    <dt>Språk:</dt>
    <dd><?= $di->common->esc($book->language) ?></dd>
</dl>
