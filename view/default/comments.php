<section class="comments">
    <h3 id="comments" class="anchor">Kommentarer<?= (!empty($comments) ? ' (' . count($comments) . ')' : '') ?></h3>
<?php $this->renderView('default/msgs'); ?>
    <ol class="comment-list">
<?php if (!empty($comments)) : ?>
<?php   foreach ($comments as $comment) : ?>
<?php       $this->renderView('default/comment', ['comment' => $comment, 'user' => $user]); ?>
<?php   endforeach; ?>
<?php else : ?>
        <li class="comment"><em>Inga kommentarer ännu.</em></li>
<?php endif; ?>
    </ol>
    <div id="comment-add" class="comment-add anchor">
        <h5>Skriv kommentar</h5>
        <?= $form->form($this->url('comment/create'), 'post', ['class' => 'form form-small comment-form']) ?>
            <input type="hidden" name="url" value="<?= $this->currentUrl() ?>">
            <input type="hidden" name="contentId" value="<?= $contentId ?>">
<?php if ($user) : ?>
            <div class="form-control">
                <div class="form-input">
                    <?= $form->textarea('text', ['required' => true, 'rows' => 7]) ?>
<?php   if ($form->hasError('text')) : ?>
                    <div class="form-error"><?= $form->getError('text') ?></div>
<?php   endif; ?>
                </div>
            </div>
<?php else : ?>
            <div class="form-control">
                <div class="form-label"><?= $form->label('name', 'Namn:') ?></div>
                <div class="form-input">
                    <?= $form->text('name', ['required' => false, 'maxlength' => 100]) ?>
<?php   if ($form->hasError('name')) : ?>
                    <div class="form-error"><?= $form->getError('name') ?></div>
<?php   endif; ?>
                </div>
            </div>
            <div class="form-control">
                <div class="form-label"><?= $form->label('email', 'E-post:') ?></div>
                <div class="form-input">
                    <?= $form->input('email', 'email', ['maxlength' => 200]) ?>
<?php   if ($form->hasError('email')) : ?>
                    <div class="form-error"><?= $form->getError('email') ?></div>
<?php   endif; ?>
                </div>
            </div>
            <div class="form-control">
                <div class="form-label"><?= $form->label('text', 'Kommentar:') ?></div>
                <div class="form-input">
                    <?= $form->textarea('text', ['required' => false, 'rows' => 7]) ?>
<?php   if ($form->hasError('text')) : ?>
                    <div class="form-error"><?= $form->getError('text') ?></div>
<?php   endif; ?>
                </div>
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
