<h2>Налаштування</h2>

<h3>Колір фону</h3>
<form method="post">
    <input type="color" name="bg_color" value="<?= $_SESSION['bg_color'] ?? '#ffffff' ?>">
    <button type="submit" name="save_color">Зберегти</button>
</form>

<h3>Ім'я та стать</h3>
<form method="post">
    <input type="text" name="user_name" placeholder="Ім'я" value="<?= $_COOKIE['user_name'] ?? '' ?>" required>
    <br>
    <label><input type="radio" name="user_gender" value="male" <?= ($_COOKIE['user_gender'] ?? '') === 'male' ? 'checked' : '' ?>> Чоловік</label>
    <label><input type="radio" name="user_gender" value="female" <?= ($_COOKIE['user_gender'] ?? '') === 'female' ? 'checked' : '' ?>> Жінка</label>
    <br>
    <button type="submit" name="save_user">Зберегти</button>
</form>