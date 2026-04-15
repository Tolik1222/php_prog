<?php
require_once 'config.php'; // Підключаємо БД
session_start();

if (!empty($_SESSION['auth'])) {
    header('Location: admin.php');
    die;
}

$infoMessage = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Перевіряємо через SQL, чи існує такий email
    $query = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $infoMessage = "Такий користувач вже існує! <a href='login.php'>Сторінка входу</a>";
    } else {
        // Хешуємо пароль
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Записуємо в таблицю users
        $insertQuery = "INSERT INTO users (email, password) VALUES ('$email', '$hashedPassword')";
        
        if (mysqli_query($conn, $insertQuery)) {
            header('Location: login.php');
            die;
        } else {
            $infoMessage = "Помилка бази даних: " . mysqli_error($conn);
        }
    }
} elseif (!empty($_POST)) {
    $infoMessage = 'Заповніть форму реєстрації!';
}
?>

<!DOCTYPE html>
<html>
<?php require_once 'sectionHead.php' ?>
<body>
<div class="container">
    <?php require_once 'sectionNavbar.php' ?>
    <br>
    <div class="card card-primary">
        <div class="card-header bg-success text-light">Register form</div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email"/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password"/>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="formRegister" value="Register"/>
                </div>
            </form>
            <?php if ($infoMessage) echo "<hr/><span style='color:red'>$infoMessage</span>"; ?>
        </div>
    </div>
</div>
</body>
</html>