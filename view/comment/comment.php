<?php

$creator = $comment->getReferenceSoft('userId', $di->repository->users);
$editor = $comment->getReferenceSoft('editorId', $di->repository->users);

?>
        <li id="comment-<?= $comment->id ?>" class="comment">
            <div class="comment-header">
                <img src="<?= ($creator ? $creator->getGravatar(50) : (new \LRC\User\User())->getGravatar(50)) ?>">
                <div class="comment-author">
<?php       if ($creator && !empty($creator->email)) : ?>
                    <a href="mailto:<?= esc($creator->email) ?>"><?= esc($creator->name) ?></a>
<?php       else : ?>
                    <?= ($creator ? esc($creator->name) : '(Borttagen användare)') ?>
<?php       endif; ?>
                </div>
                <div class="comment-time"><?= $comment->created ?></div>
            </div>
            <div class="comment-text"><?= $di->textfilter->markdown(esc($comment->text)) ?></div>
<?php       if (isset($comment->updated)) : ?>
            <div class="comment-edited">
                Redigerad <?= $comment->updated ?> av <?= ($editor ? esc($editor->name) : '(Borttagen användare)') ?>
            </div>
<?php       endif; ?>
<?php       if ($user && ($user->admin || $comment->userId === $user->id)) : ?>
            <div class="comment-actions">
                <a class="comment-edit" href="#!" data-id="<?= $comment->id ?>">Redigera</a> |
                <a class="comment-delete" href="#!" data-id="<?= $comment->id ?>">Ta bort</a>
            </div>
<?php       endif; ?>
        </li>
