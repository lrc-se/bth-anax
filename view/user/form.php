<?php $this->renderView('default/msgs'); ?>
<!--<form id="<?= $form->id ?>" class="form" action="<?= $di->request->getCurrentUrl() ?>" method="post">-->
<?= $form->form($di->request->getCurrentUrl(), 'post', ['class' => 'form']) ?>
<?php if ($update) : ?>
    <?= $form->input('id', 'hidden') ?>
<?php endif; ?>
    <div class="form-control">
        <div class="form-label"><?= $form->label('username', 'Användarnamn:') ?></label></div>
        <div class="form-input">
<?php if (!$update) : ?>
            <?= $form->text('username', ['required' => true, 'maxlength' => 25, 'autofocus' => true]) ?>
<?php   if ($form->hasError('username')) : ?>
            <div class="form-error"><?= $form->getError('username') ?></div>
<?php   endif; ?>
<?php else : ?>
            <div class="form-static"><?= esc($user->username) ?></div>
<?php endif; ?>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"><?= $form->label('name', 'Namn:') ?></div>
        <div class="form-input">
            <?= $form->text('name', ['required' => true, 'maxlength' => 100]) ?>
<?php if ($form->hasError('name')) : ?>
            <div class="form-error"><?= $form->getError('name') ?></div>
<?php endif; ?>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"><?= $form->label('password', 'Lösenord:') ?></div>
        <div class="form-input">
            <?= $form->input('password', 'password', ['minlength' => 8, 'required' => !$update, 'placeholder' => ($update ? 'Lämna blankt för att behålla nuvarande' : '')]) ?>
<?php if ($form->hasError('password')) : ?>
            <div class="form-error"><?= $form->getError('password') ?></div>
<?php endif; ?>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"><?= $form->label('password2', 'Upprepa lösenord:') ?></div>
        <div class="form-input">
            <?= $form->input('password2', 'password', ['minlength' => 8, 'required' => !$update]) ?>
<?php if ($form->hasError('password2')) : ?>
            <div class="form-error"><?= $form->getError('password2') ?></div>
<?php endif; ?>
        </div>
    </div>
    <div class="form-control">
        <div class="form-label"><?= $form->label('email', 'E-postadress:') ?></div>
        <div class="form-input">
            <?= $form->input('email', 'email', ['maxlength' => 200]) ?>
<?php if ($form->hasError('email')) : ?>
            <div class="form-error"><?= $form->getError('email') ?></div>
<?php endif; ?>
        </div>
    </div>
<?php if ($admin) : ?>
    <div class="form-control">
        <div class="form-label"><?= $form->label('admin', 'Administratör:') ?></div>
        <div class="form-input">
<?php   if (!$admin || !$user || $user->id != $admin->id) : ?>
            <?= $form->checkbox('admin', 1) ?>
<?php   else : ?>
            <input type="hidden" name="admin" value="1">
            <div class="form-static">Ja</div>
<?php   endif; ?>
        </div>
    </div>
<?php endif; ?>
    <div class="form-control">
        <div class="form-label"></div>
        <div class="form-input">
            <input type="submit" value="<?= ($update ? 'Spara' : 'Registrera') ?>">
<?php if ($update) : ?>
            <a class="btn btn-2" href="<?= $this->url(($admin ? 'admin/user' : 'user/profile')) ?>">Avbryt</a> 
<?php endif; ?>
        </div>
    </div>
</form>
