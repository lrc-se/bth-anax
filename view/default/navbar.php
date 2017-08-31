<nav class="navbar">
    <a class="logo" href="<?= $app->url->create('') ?>">Kalles sida</a>
    <button id="menu-toggle">Meny</button>
<?= $app->navbar->renderItems() ?>
</nav>
