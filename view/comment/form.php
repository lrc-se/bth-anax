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
                    <?= $form->text('name', ['required' => true, 'maxlength' => 100]) ?>
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
                    <?= $form->textarea('text', ['required' => true, 'rows' => 7]) ?>
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
