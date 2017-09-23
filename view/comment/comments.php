<section class="comments">
    <h3 id="comments" class="anchor">Kommentarer<?= (!empty($comments) ? ' (' . count($comments) . ')' : '') ?></h3>
<?php $this->renderView('default/msgs'); ?>
    <ol class="comment-list">
<?php if (!empty($comments)) : ?>
<?php   foreach ($comments as $comment) : ?>
<?php       $this->renderView('comment/comment', ['comment' => $comment, 'user' => $user]); ?>
<?php   endforeach; ?>
<?php else : ?>
        <li class="comment"><em>Inga kommentarer ännu.</em></li>
<?php endif; ?>
    </ol>
    <div id="comment-add" class="comment-add anchor">
        <h5>Skriv kommentar</h5>
        <?php $this->renderView('comment/form', $data); ?>
<?php if ($user) : ?>
    <form id="comment-edit-form" class="form form-small comment-form" action="" method="post" style="display: none">
        <input type="hidden" name="url" value="<?= $this->currentUrl() ?>">
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
