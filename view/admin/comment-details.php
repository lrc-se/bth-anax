<dl>
    <dt>ID:</dt>
    <dd><?= $comment->id ?></dd>
    <dt>Innehålls-ID:</dt>
    <dd><?= esc($comment->contentId) ?></dd>
    <dt>Skriven av:</dt>
    <dd>
<?php if (is_null($author->deleted)) : ?>
        <?= esc($author->name) . (is_null($author->username) ? ' <em>(Anonym)</em>' : ' <strong>(' . esc($author->username) . ')</strong>') ?>
<?php else : ?>
        <em>(Borttagen användare)</em>
<?php endif; ?>
    </dd>
    <dt>Skapad:</dt>
    <dd><?= $comment->created ?></dd>
    <dt>Kommentar:</dt>
    <dd><?= $di->textfilter->markdown(esc($comment->text)) ?></dd>
</dl>
