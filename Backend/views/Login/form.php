<form action="/admin/login/formlogin/" method="POST">
    <label for="username">username</label>
    <input type="text" name="name">
    <label for="email">email</label>
    <input type="email" name="email">
    <label for="password">password</label>
    <input type="password" name="password">
    <input type="submit" name="" placeholder="Отправить">
</form>
<p class="error"><?= $session ?></p>