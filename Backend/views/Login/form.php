<form action="/admin/login/login-action/" method="POST">
    <label required for="username">username</label>
    <input required type="text" name="name">
    <label required for="email">email</label>
    <input required type="email" name="email">
    <label required for="password">password</label>
    <input required type="password" name="password">
    <input required type="submit" name="" placeholder="Отправить">
</form>
<p class="error"><?= $session ?></p>