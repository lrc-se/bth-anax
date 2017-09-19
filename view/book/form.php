<?php $this->renderView('default/msgs'); ?>
<form id="<?= $form->id ?>" class="form" action="<?= $di->request->getCurrentUrl() ?>" method="post">
<?php if ($book && $book->id) : ?>
    <?= $form->input('id', 'hidden') ?>
<?php endif; ?>
    <div class="form-control">
        <div class="form-label"><?= $form->label('title', 'Titel:') ?></label></div>
        <div class="form-input">
            <?= $form->textfield('title', ['maxlength' => 200, 'required' => false, 'autofocus' => true]) ?>
<?php if ($form->hasError('title')) : ?>
            <div class="form-error"><?= $form->getError('title') ?></div>
<?php endif; ?>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"><?= $form->label('author', 'Författare:') ?></div>
        <div class="form-input">
            <?= $form->textfield('author', ['maxlength' => 200, 'required' => false]) ?>
<?php if ($form->hasError('author')) : ?>
            <div class="form-error"><?= $form->getError('author') ?></div>
<?php endif; ?>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"><?= $form->label('published', 'Publiceringsår:') ?></div>
        <div class="form-input">
            <?= $form->input('published', 'number', ['max' => date('Y')]) ?>
<?php if ($form->hasError('published')) : ?>
            <div class="form-error"><?= $form->getError('published') ?></div>
<?php endif; ?>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"><?= $form->label('isbn', 'ISBN:') ?></div>
        <div class="form-input">
            <?= $form->textfield('isbn', ['maxlength' => 15]) ?>
<?php if ($form->hasError('isbn')) : ?>
            <div class="form-error"><?= $form->getError('isbn') ?></div>
<?php endif; ?>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"><?= $form->label('language', 'Språk:') ?></div>
        <div class="form-input">
            <?= $form->textfield('language', ['maxlength' => 50]) ?>
<?php if ($form->hasError('language')) : ?>
            <div class="form-error"><?= $form->getError('language') ?></div>
<?php endif; ?>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"></div>
        <div class="form-input">
            <input type="submit" value="<?= $submit ?>">
            <a class="btn btn-2" href="<?= $this->url('book') ?>">Avbryt</a> 
        </div>
    </div>
</form>
