<form id="<?= $form->id ?>" action="<?= $di->request->getCurrentUrl() ?>" method="post">
<?php if ($book && $book->id) : ?>
    <?= $form->input('id', 'hidden') ?>
<?php endif; ?>
    <div>
        <?= $form->label('title', 'Titel:') ?>
        <?= $form->textfield('title', ['maxlength' => 200, 'required' => true, 'autofocus' => true]) ?>
<?php if ($form->hasError('title')) : ?>
        <em><?= $form->getError('title') ?></em>
<?php endif; ?>
    </div>
    <div>
        <?= $form->label('author', 'Författare:') ?>
        <?= $form->textfield('author', ['maxlength' => 200, 'required' => true]) ?>
<?php if ($form->hasError('author')) : ?>
        <em><?= $form->getError('author') ?></em>
<?php endif; ?>
    </div>
    <div>
        <?= $form->label('published', 'Publiceringsår:') ?>
        <?= $form->input('published', 'number', ['max' => date('Y')]) ?>
<?php if ($form->hasError('published')) : ?>
        <em><?= $form->getError('published') ?></em>
<?php endif; ?>
    </div>
    <div>
        <?= $form->label('isbn', 'IBSN:') ?>
        <?= $form->textfield('isbn', ['maxlength' => 13]) ?>
<?php if ($form->hasError('isbn')) : ?>
        <em><?= $form->getError('isbn') ?></em>
<?php endif; ?>
    </div>
    <div>
        <?= $form->label('language', 'Språk:') ?>
        <?= $form->textfield('language', ['maxlength' => 50]) ?>
<?php if ($form->hasError('language')) : ?>
        <em><?= $form->getError('language') ?></em>
<?php endif; ?>
    </div>
    <input type="submit" value="<?= $submit ?>">
    <a class="btn" href="<?= $this->url('book') ?>">Avbryt</a> 
</form>
