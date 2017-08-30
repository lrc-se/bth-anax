<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> ~ Kalles sida</title>
<?php foreach ($stylesheets as $stylesheet) : ?>
    <link rel="stylesheet" href="<?= $this->asset($stylesheet) ?>">
    <link rel="shortcut icon" href="favicon.ico">
<?php endforeach; ?>
</head>
<body>

<?php if ($this->regionHasContent('navbar')) : ?>
<div class="wrap navbar-wrap">
<?php $this->renderRegion('navbar') ?>
</div>
<?php endif; ?>

<?php if ($this->regionHasContent('main')) : ?>
<div class="wrap main-wrap">
<?php $this->renderRegion('main') ?>
</div>
<?php endif; ?>

<?php if ($this->regionHasContent('footer')) : ?>
<div class="wrap footer-wrap">
<?php $this->renderRegion('footer') ?>
</div>
<?php endif; ?>

</body>
</html>
