<h2>Форма реєстрації</h2>
<?php if (isset($errors)): ?>
    <ul style="color:red;">
        <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<form action="index.php?route=regform/doreg" method="post">
    <label>Логін:</label><input type="text" name="login"><br><br>
    <label>Пароль 1:</label><input type="password" name="password1"><br><br>
    <label>Пароль 2:</label><input type="password" name="password2"><br><br>
    <label>Про себе:</label><textarea name="about"></textarea><br><br>
    <input type="submit" value="Відправити">
</form>