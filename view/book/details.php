<dl class="dl-small">
    <dt>ID:</dt>
    <dd><?= $book->id ?></dd>
    <dt>Titel:</dt>
    <dd><?= esc($book->title) ?></dd>
    <dt>Författare:</dt>
    <dd><?= esc($book->author) ?></dd>
    <dt>Publiceringsår:</dt>
    <dd><?= $book->published ?></dd>
    <dt>ISBN:</dt>
    <dd><?= esc($book->isbn) ?></dd>
    <dt>Språk:</dt>
    <dd><?= esc($book->language) ?></dd>
</dl>
