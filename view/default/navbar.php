<nav class="navbar">
    <a class="logo" href="<?= $this->url('') ?>">
        <img src="<?= $this->asset('img/kalle.png') ?>" alt="KB" title="Kalles sida">
    </a>
    <button id="menu-toggle">Sektioner</button>
<?= $navbar->renderItems() ?>
</nav>
