<?php
$host = 'localhost';
$db   = 'guestbook';
$user = 'root';
$pass = '';

// Спроба підключення
$conn = mysqli_connect($host, $user, $pass, $db);

// Перевірка, чи все працює
if (!$conn) {
    die("Помилка підключення: " . mysqli_connect_error());
}
?>