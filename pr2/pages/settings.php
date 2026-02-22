<h2>Налаштування</h2>

<h3>Оберіть колір фону</h3>
<form method="post">
    <label for="bg_color">Колір:</label>
    <input type="color" id="bg_color" name="bg_color" value="<?php echo isset($_SESSION['bg_color']) ? $_SESSION['bg_color'] : '#ffffff'; ?>">
    <input type="submit" name="save_color" value="Зберегти">
</form>

<?php
if (isset($_POST['save_color'])) {
    $_SESSION['bg_color'] = $_POST['bg_color'];
    header('Location: index.php?page=settings');
    exit;
}
?>

<h3>Вкажіть ім'я та стать</h3>
<form method="post">
    <label for="user_name">Ім'я:</label>
    <input type="text" id="user_name" name="user_name" required><br><br>

    <label>Стать:</label><br>
    <input type="radio" id="male" name="user_gender" value="male" required>
    <label for="male">Чоловік</label><br>
    <input type="radio" id="female" name="user_gender" value="female">
    <label for="female">Жінка</label><br><br>

    <input type="submit" name="save_user" value="Зберегти">
</form>

<?php
if (isset($_POST['save_user'])) {
    setcookie('user_name', $_POST['user_name'], time() + 3600 * 24 * 30);  
    setcookie('user_gender', $_POST['user_gender'], time() + 3600 * 24 * 30);
    header('Location: index.php?page=settings'); 
    exit;
}
?>