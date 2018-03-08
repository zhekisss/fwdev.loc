<form action="/admin/login/login-action/" method="POST">
<p>
    <label for="username">username</label>
    <input type="text" name="name" required />
</p>
<p>
    <label for="email">email</label>
    <input type="email" name="email" required />
</p>
<p>
    <label for="password">password</label>
    <input type="password" name="password" required />
</p>
<p>
    <input type="submit" name="" placeholder="Отправить" required />
</p>
</form>
<p class="error"><?= $session ?? NULL ?></p>