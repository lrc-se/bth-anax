<dl>
    <dt>ID:</dt>
    <dd><?= $comment->id ?></dd>
    <dt>Innehålls-ID:</dt>
    <dd><?= $di->common->esc($comment->contentId) ?></dd>
    <dt>Skriven av:</dt>
    <dd>
        <?= $di->common->esc($author->name) ?>
        <?= (is_null($author->username) ? '<em>(Anonym)</em>' : '<strong>(' . $di->common->esc($author->username) . ')</strong>') ?>
    </dd>
    <dt>Skapad:</dt>
    <dd><?= $comment->created ?></dd>
    <dt>Kommentar:</dt>
    <dd><?= $di->textfilter->markdown($di->common->esc($comment->text)) ?></dd>
</dl>
