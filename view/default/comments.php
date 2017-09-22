<section class="comments">
    <h3 id="comments" class="anchor">Kommentarer<?= (!empty($comments) ? ' (' . count($comments) . ')' : '') ?></h3>
<?php $this->renderView('default/msgs'); ?>
    <ol class="comment-list">
<?php if (!empty($comments)) : ?>
<?php   foreach ($comments as $comment) : ?>
<?php       $creator = $comment->getReference('userId', $di->repository->users); ?>
<?php       $editor = $comment->getReference('editorId', $di->repository->users); ?>
        <li id="comment-<?= $comment->id ?>" class="comment">
            <div class="comment-header">
                <img src="<?= $creator->getGravatar(50) ?>">
                <div class="comment-author">
<?php       if (!empty($creator->email)) : ?>
                    <a href="mailto:<?= $di->common->esc($creator->email) ?>"><?= $di->common->esc($creator->name) ?></a>
<?php       else : ?>
                    <?= $di->common->esc($creator->name) ?>
<?php       endif; ?>
                </div>
                <div class="comment-time"><?= $comment->created ?></div>
            </div>
            <div class="comment-text"><?= $di->textfilter->markdown($di->common->esc($comment->text)) ?></div>
<?php       if (isset($comment->updated)) : ?>
            <div class="comment-edited">Redigerad <?= $comment->updated ?> av <?= $di->common->esc($editor->name) ?></div>
<?php       endif; ?>
<?php       if ($user && ($user->admin || $comment->userId === $user->id)) : ?>
            <div class="comment-actions">
                <a class="comment-edit" href="#!" data-id="<?= $comment->id ?>">Redigera</a> |
                <a class="comment-delete" href="#!" data-id="<?= $comment->id ?>">Ta bort</a>
            </div>
<?php       endif; ?>
        </li>
<?php   endforeach; ?>
<?php else : ?>
        <li class="comment"><em>Inga kommentarer ännu.</em></li>
<?php endif; ?>
    </ol>
    <div class="comment-add">
        <h5>Skriv kommentar</h5>
        <form class="form form-small comment-form" action="<?= $this->url('comment/create')?>" method="post">
            <input type="hidden" name="url" value="<?= $di->request->getCurrentUrl() ?>">
            <input type="hidden" name="contentId" value="<?= $contentId ?>">
<?php if ($user) : ?>
            <div class="form-control">
                <div class="form-input">
                    <textarea id="comment-text" name="text" rows="7" required></textarea>
                </div>
            </div>
<?php else : ?>
            <div class="form-control">
                <div class="form-label"><label for="comment-name">Namn:</label></div>
                <div class="form-input"><input id="comment-name" type="text" name="name" maxlength="100" required></div>
            </div>
            <div class="form-control">
                <div class="form-label"><label for="comment-email">E-post:</label></div>
                <div class="form-input"><input id="comment-email" type="email" name="email" maxlength="200"></div>
            </div>
            <div class="form-control">
                <div class="form-label"><label for="comment-text">Kommentar:</label></div>
                <div class="form-input"><textarea id="comment-text" name="text" rows="7" required></textarea></div>
            </div>
<?php endif; ?>
            <div class="form-control">
<?php if (!$user) : ?>
                <div class="form-label"></div>
<?php endif; ?>
                <div class="form-input"><input type="submit" value="Skicka"></div>
            </div>
        </form>
    </div>
<?php if ($user) : ?>
    <form id="comment-edit-form" class="form form-small comment-form" action="" method="post" style="display: none">
        <input type="hidden" name="url" value="<?= $di->request->getCurrentUrl() ?>">
        <input type="hidden" name="contentId" value="<?= $contentId ?>">
        <div class="form-control">
            <div class="form-input"><textarea name="text" rows="5" required></textarea></div>
        </div>
        <div class="form-control">
            <div class="form-input">
                <input type="submit" value="Spara">
                <input id="comment-edit-cancel" type="button" value="Avbryt">
            </div>
        </div>
    </form>
    <form id="comment-delete-form" action="" method="post"></form>
    <script src="<?= $this->asset('js/comments.js') ?>" async></script>
<?php endif; ?>
</section>
