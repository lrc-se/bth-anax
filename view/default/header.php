<header<?= (!empty($flash) ? ' class="has-flash"' : '') ?>>
<?php if (!empty($flash)) : ?>
    <div class="flash" style="background-image: url('<?= $this->asset($flash) ?>')"></div>
<?php endif; ?>
    <h1><?= $title ?></h1>
</header>
