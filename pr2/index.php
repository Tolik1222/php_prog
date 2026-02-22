<?php

session_start();

$page = isset($_GET['page']) ? $_GET['page'] : 'main';

$allowed_pages = ['main', 'form', 'params', 'settings'];

if (in_array($page, $allowed_pages)) {
    include 'inc/header.php';
    include 'pages/' . $page . '.php';
    include 'inc/footer.php';
} else {
    echo "Сторінка не знайдена!";
}
?>