<?php $this->renderView('default/msgs'); ?>
<?= $form->form($this->currentUrl(), 'post', ['class' => 'form']) ?>
    <?= $form->input('id', 'hidden') ?>
    <div class="form-control">
        <div class="form-label"><?= $form->label('id', 'ID:') ?></label></div>
        <div class="form-input">
            <div class="form-static"><?= $user->id ?></div>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"><?= $form->label('username', 'Användarnamn:') ?></label></div>
        <div class="form-input">
            <?= $form->text('username', ['required' => true, 'maxlength' => 25, 'autofocus' => true]) ?>
<?php if ($form->hasError('username')) : ?>
            <div class="form-error"><?= $form->getError('username') ?></div>
<?php endif; ?>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"><?= $form->label('password', 'Lösenord:') ?></div>
        <div class="form-input">
            <?= $form->input('password', 'password', ['minlength' => 8, 'required' => true]) ?>
<?php if ($form->hasError('password')) : ?>
            <div class="form-error"><?= $form->getError('password') ?></div>
<?php endif; ?>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"><?= $form->label('password2', 'Upprepa lösenord:') ?></div>
        <div class="form-input">
            <?= $form->input('password2', 'password', ['minlength' => 8, 'required' => true]) ?>
<?php if ($form->hasError('password2')) : ?>
            <div class="form-error"><?= $form->getError('password2') ?></div>
<?php endif; ?>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"><?= $form->label('name', 'Namn:') ?></div>
        <div class="form-input">
            <div class="form-static"><?= esc($user->name) ?></div>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"><?= $form->label('email', 'E-postadress:') ?></div>
        <div class="form-input">
            <div class="form-static"><a href="mailto:<?= esc($user->email) ?>"><?= esc($user->email) ?></a></div>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"></div>
        <div class="form-input">
            <input type="submit" value="Registrera">
            <a class="btn btn-2" href="<?= $this->url('admin/user') ?>">Avbryt</a> 
        </div>
    </div>
</form>
