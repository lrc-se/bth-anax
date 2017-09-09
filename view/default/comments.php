<section class="comments">
    <h3 id="comments" class="anchor">Kommentarer</h3>
    <ol class="comment-list">
<?php if (!empty($comments)) : ?>
<?php   foreach ($comments as $comment) : ?>
        <li id="comment-<?= $comment['id'] ?>" class="comment">
            <div class="comment-header">
                <img src="https://www.gravatar.com/avatar/<?= md5(strtolower(trim($comment['user']['email']))) ?>?s=50&amp;d=retro">
                <div class="comment-author">
<?php       if (!empty($comment['user']['email'])) : ?>
                    <a href="mailto:<?= $app->esc($comment['user']['email']) ?>"><?= $app->esc($comment['user']['name']) ?></a>
<?php       else : ?>
                    <?= $app->esc($comment['user']['name']) ?>
<?php       endif; ?>
                </div>
                <div class="comment-time"><?= $comment['created'] ?></div>
            </div>
            <div class="comment-text"><?= $app->textfilter->markdown(strip_tags($comment['text'])) ?></div>
<?php       if (isset($comment['updated'])) : ?>
            <div class="comment-edited">Redigerad <?= $comment['updated'] ?></div>
<?php       endif; ?>
<?php       if ($user && ($user['admin'] == 1 || $comment['userId'] == $user['id'])) : ?>
            <div class="comment-actions">
                <a class="comment-edit" href="#!" data-id="<?= "$contentId/" . $comment['id'] ?>">Redigera</a> |
                <a class="comment-delete" href="#!" data-id="<?= "$contentId/" . $comment['id'] ?>">Ta bort</a>
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
        <form action="<?= $this->url("comment/create/$contentId")?>" method="post">
            <input type="hidden" name="url" value="<?= $app->request->getCurrentUrl() ?>">
<?php if ($user) : ?>
            <input type="hidden" name="userId" value="<?= $user['id'] ?>">
<?php else : ?>
            <p><label>Namn: <input type="text" name="name" maxlength="100" required></label></p>
            <p><label>E-post: <input type="email" name="email" maxlength="200"></label></p>
<?php endif; ?>
            <p><label>Kommentar:<br><textarea name="text" rows="5" required></textarea></label></p>
            <p><input type="submit" value="Skicka"></p>
        </form>
    </div>
<?php if ($user) : ?>
    <form id="comment-edit-form" action="" method="post" style="display: none">
        <input type="hidden" name="url" value="<?= $app->request->getCurrentUrl() ?>">
        <input type="hidden" name="userId" value="">
        <p><label>Kommentar:<br><textarea name="text" rows="5" required></textarea></label></p>
        <p>
            <input type="submit" value="Spara">
            <input id="comment-edit-cancel" type="button" value="Avbryt">
        </p>
    </form>
    <form id="comment-delete-form" action="" method="post"></form>
    <script src="<?= $this->asset('js/comments.js') ?>" async></script>
<?php endif; ?>
</section>
