<?php $this->renderView('default/msgs', $data); ?>
<h3>Webbplatsen har <?= count($users) ?> användare</h3>
<p>
    <a class="btn" href="<?= $this->url('user/admin/user/create') ?>">Lägg till användare</a>
    <a class="btn btn-2" href="<?= $this->url('user/admin') ?>">Tillbaka till administration</a>
</p>
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
            <tr>
                <td><?= $user->id ?></td>
                <td><?= $di->common->esc($user->username) ?></a></td>
                <td><?= $di->common->esc($user->name) ?></td>
                <td><a href="mailto:<?= $di->common->esc($user->email) ?>"><?= $di->common->esc($user->email) ?></a></td>
                <td><?= ($user->admin ? 'Ja' : 'Nej') ?></td>
                <td><?= $user->deleted ?></td>
                <td>
                    <a href="<?= $this->url('user/admin/user/edit/' . $user->id) ?>">Redigera</a><br>
                    <a href="<?= $this->url('user/admin/user/delete/' . $user->id) ?>">Ta bort</a>
                </td>
            </tr>
<?php   endforeach; ?>
        </tbody>
    </table>
</div>
