<?php
require_once 'config.php';
session_start();

if (!empty($_SESSION['auth'])) {
    header('Location: admin.php');
    die;
}

$infoMessage = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Шукаємо користувача за email
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // Перевіряємо пароль (verify порівнює звичайний текст із хешем у базі)
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['auth'] = true;
        $_SESSION['email'] = $user['email'];
        header("Location: admin.php");
        die;
    } else {
        $infoMessage = "Невірний логін або пароль. <a href='register.php'>Зареєструватися?</a>";
    }
} elseif (!empty($_POST)) {
    $infoMessage = 'Заповніть форму авторизації!';
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
        <div class="card-header bg-primary text-light">Login form</div>
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
                    <input type="submit" class="btn btn-primary" name="form" value="Login"/>
                </div>
            </form>
            <?php if ($infoMessage) echo "<hr/><span style='color:red'>$infoMessage</span>"; ?>
        </div>
    </div>
</div>
</body>
</html>