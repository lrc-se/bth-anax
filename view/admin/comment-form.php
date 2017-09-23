<?php $this->renderView('default/msgs'); ?>
<?= $form->form($di->request->getCurrentUrl(), 'post', ['class' => 'form']) ?>
    <div class="form-control">
        <div class="form-label"><?= $form->label('id', 'ID:') ?></div>
        <div class="form-input">
            <div class="form-static"><?= $comment->id ?></div>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"><?= $form->label('contentId', 'Innehålls-ID:') ?></div>
        <div class="form-input">
            <div class="form-static"><?= esc($comment->contentId) ?></div>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"><label>Skriven av:</label></div>
        <div class="form-input">
            <div class="form-static">
<?php if (is_null($author->deleted)) : ?>
                <?= esc($author->name) . (is_null($author->username) ? ' <em>(Anonym)</em>' : ' <strong>(' . esc($author->username) . ')</strong>') ?>
<?php else : ?>
                <em>(Borttagen användare)</em>
<?php endif; ?>
            </div>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"><label>Skapad:</label></div>
        <div class="form-input">
            <div class="form-static"><?= $comment->created ?></div>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"><?= $form->label('text', 'Kommentar:') ?></div>
        <div class="form-input"><?= $form->textarea('text', ['rows' => 7,  'required' => true]) ?></div>
    </div>
    <div class="form-control">
        <div class="form-label"></div>
        <div class="form-input">
            <input type="submit" value="Spara">
            <a class="btn btn-2" href="<?= $this->url('admin/comment') ?>">Avbryt</a>
        </div>
    </div>
</form>
