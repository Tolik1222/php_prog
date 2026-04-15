<?php

require_once 'config.php';

function renderComments($conn, $page = 1, $perPage = 5)
{
    $start = ($page - 1) * $perPage;
    
    $query = "SELECT * FROM comments ORDER BY created_at DESC LIMIT $start, $perPage";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $name = htmlspecialchars($row['name']);
        $email = htmlspecialchars($row['email']);
        $text = htmlspecialchars($row['comment_text']);
        $date = $row['created_at'];

        echo "<div style='border:1px solid #ccc;padding:10px;margin:10px 0'>";
        echo "<strong>$name</strong> ($email)<br>";
        echo "<p>$text</p>";
        echo "<small style='color:gray;'>Опубліковано: $date</small>";
        echo "</div>";
    }

    $countQuery = "SELECT COUNT(*) as total FROM comments";
    $countResult = mysqli_query($conn, $countQuery);
    $total = mysqli_fetch_assoc($countResult)['total'];
    $pages = ceil($total / $perPage);
    
    echo "<div>";
    for ($i = 1; $i <= $pages; $i++) {
        echo "<a style='margin-right:10px' href='?page=$i'>$i</a>";
    }
    echo "</div>";
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['name'])) {
        $errors[] = "Name is required";
    }

    if (empty($_POST['email'])) {
        $errors[] = "Email is required";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($_POST['text'])) {
        $errors[] = "Comment text is required";
    }

    if (empty($errors)) {
        $email = mysqli_real_escape_string($conn, trim($_POST['email']));
        $name = mysqli_real_escape_string($conn, trim($_POST['name']));
        $text = mysqli_real_escape_string($conn, trim($_POST['text']));

        $query = "INSERT INTO comments (name, email, comment_text) VALUES ('$name', '$email', '$text')";

        if (mysqli_query($conn, $query)) {
            header("Location: guestbook.php");
            exit;
        } else {
            $errors[] = "Database error: " . mysqli_error($conn);
        }
    }
}

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
?>

<!DOCTYPE html>
<html>
<head>
    <title>GuestBook (Database version)</title>
</head>
<body>

<h2>GuestBook</h2>

<form method="POST">
    <p>
        Name:<br>
        <input type="text" name="name">
    </p>
    <p>
        Email:<br>
        <input type="text" name="email">
    </p>
    <p>
        Comment:<br>
        <textarea name="text"></textarea>
    </p>
    <button type="submit">Send</button>
</form>

<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
}
?>

<hr>
<h3>Comments</h3>

<?php
renderComments($conn, $page);
?>

</body>
</html>