<form action="<?= $this->url('user/login') ?>" method="post">
    <p><label>Användarnamn: <input type="text" name="username" required></label></p>
    <p><label>Lösenord: <input type="password" name="password" required></label></p>
    <p><input type="submit" value="Logga in"></p>
</form>
