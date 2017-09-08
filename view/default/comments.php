<div id="comments" class="comments anchor">
    <h3>Kommentarer</h3>
<?php if (!empty($comments)) : ?>
<?php   foreach ($comments as $n => $comment) : ?>
    <div id="comment-<?= $n ?>" class="comment">
        <strong>
            <img src="https://www.gravatar.com/avatar/<?= md5(strtolower(trim($comment['user']['email']))) ?>?s=50&amp;d=retro">
<?php       if (!empty($comment['user']['email'])) : ?>
            <a href="mailto:<?= $comment['user']['email'] ?>"><?= $comment['user']['name'] ?></a>
<?php       else : ?>
            <?= $comment['user']['name'] ?>
<?php       endif; ?>
        </strong>
        <em><?= $comment['created'] ?></em>
        <?= $app->textfilter->markdown($comment['text']) ?>
<?php       if (isset($comment['updated'])) : ?>
        <em>Redigerad <?= $comment['updated'] ?></em>
<?php       endif; ?>
    </div>
<?php   endforeach; ?>
<?php else : ?>
    <p><em>Inga kommentarer ännu.</em></p>
<?php endif; ?>
    <h5>Skriv kommentar</h5>
    <form action="<?= $this->url("comment/create/$contentId")?>" method="post">
        <input type="hidden" name="url" value="<?= $app->request->getCurrentUrl() ?>">
        <input type="hidden" name="id" value="<?= $contentId ?>">
        <p><label>Namn: <input type="text" name="name" maxlength="100" required></label></p>
        <p><label>E-post: <input type="email" name="email" maxlength="200"></label></p>
        <p><label>Kommentar:<br><textarea name="text" rows="5" required></textarea></label></p>
        <p><input type="submit" value="Skicka"></p>
    </form>
</div>
