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
<?php       if ($user && ($user['admin'] == 1 || $comment['userId'] == $user['id'])) : ?>
        <a href="#!">Redigera</a> | <a class="comment-delete" href="#!" data-id="<?= $comment['id'] ?>">Ta bort</a>
<?php       endif; ?>
    </div>
<?php   endforeach; ?>
<?php else : ?>
    <p><em>Inga kommentarer ännu.</em></p>
<?php endif; ?>
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
    <form id="comment-delete-form" action="" method="post"></form>
</div>
<script>
    (function() {
        function deleteComment(e) {
            e.preventDefault();
            var form = document.getElementById("comment-delete-form");
            form.action = "<?= $this->url("comment/delete/$contentId") ?>/" + e.target.getAttribute("data-id");
            form.submit();
        }
        
        Array.prototype.forEach.call(document.getElementsByClassName("comment-delete"), function(a) {
            a.addEventListener("click", deleteComment);
        });
    })();
</script>