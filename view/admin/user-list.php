<?php

$num = count($users);

?>
<?php $this->renderView('default/msgs', $data); ?>
<?php if ($num) : ?>
<h3>Visar <?= $num ?> av <?= $total ?> användare</h3>
<?php else : ?>
<h3>Inga användare att visa</h3>
<?php endif; ?>
<p>
    <a class="btn" href="<?= $this->url('admin/user/create') ?>">Lägg till användare</a>
    <a class="btn btn-2" href="<?= $this->url('admin') ?>">Tillbaka till administration</a>
</p>
<form action="<?= $this->currentUrl() ?>">
    <p>
        <select name="filter" onchange="this.form.submit()">
            <option value="">Alla typer</option>
            <option value="registered"<?= ($filter == 'registered' ? ' selected' : '') ?>>Endast registrerade</option>
            <option value="anonymous"<?= ($filter == 'anonymous' ? ' selected' : '') ?>>Endast anonyma</option>
        </select>
        &nbsp;
        <select name="status" onchange="this.form.submit()">
            <option value="">Aktiva och inaktiva</option>
            <option value="active"<?= ($status == 'active' ? ' selected' : '') ?>>Endast aktiva</option>
            <option value="inactive"<?= ($status == 'inactive' ? ' selected' : '') ?>>Endast inaktiva</option>
        </select>
    </p>
</form>
<?php if ($num) : ?>
<div class="xscroll">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Anv.namn</th>
                <th>Namn</th>
                <th>E&#8209;post</th>
                <th>Admin</th>
                <th>Raderad</th>
                <th>Åtgärd</th>
            </tr>
        </thead>
        <tbody>
<?php   foreach ($users as $user) : ?>
            <tr<?= ($user->deleted ? ' class="deleted"' : (is_null($user->username) ? ' class="anonymous"' : '')) ?>>
                <td><?= $user->id ?></td>
                <td><?= (!is_null($user->username) ? esc($user->username) : '<em>(Anonym)</em>') ?></a></td>
                <td><?= esc($user->name) ?></td>
                <td><a href="mailto:<?= esc($user->email) ?>"><?= esc($user->email) ?></a></td>
                <td><?= ($user->admin ? 'Ja' : 'Nej') ?></td>
                <td><?= $user->deleted ?></td>
                <td>
<?php       if ($user->deleted) : ?>
                    <a href="<?= $this->url('admin/user/restore/' . $user->id) ?>">Återställ</a>
<?php       else : ?>
<?php           if ($user->username) : ?>
                    <a href="<?= $this->url('admin/user/edit/' . $user->id) ?>">Redigera</a><br>
<?php               if ($user->id != $admin->id) : ?>
                    <a href="<?= $this->url('admin/user/delete/' . $user->id) ?>">Ta bort</a>
<?php               endif; ?>
<?php           else : ?>
                    <a href="<?= $this->url('admin/user/register/' . $user->id) ?>">Registrera</a><br>
<?php           endif; ?>
<?php       endif; ?>
                </td>
            </tr>
<?php   endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>
