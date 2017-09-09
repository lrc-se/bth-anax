<form class="form" action="<?= $this->url('user/login') ?>" method="post">
    <div class="form-control">
        <div class="form-label"><label for="username">Användarnamn:</label></div>
        <div class="form-input"><input id="username" type="text" name="username" required></div>
    </div>
    <div class="form-control">
        <div class="form-label"><label for="password">Lösenord:</label></div>
        <div class="form-input"><input id="password" type="password" name="password" required></div>
    </div>
    <div class="form-control">
        <div class="form-label"></div>
        <div class="form-input"><input type="submit" value="Logga in"></div>
    </div>
</form>
