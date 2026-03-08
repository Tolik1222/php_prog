<?php


   //TODO 1: Function render comments


function renderComments($file, $page = 1, $perPage = 5)
{
    if (!file_exists($file)) {
       return;
    }
   
    $comments = file($file, FILE_IGNORE_NEW_LINES);
    $total = count($comments);
    $pages = ceil($total / $perPage);
    $start = ($page - 1) * $perPage;
    $commentsForPage = array_slice($comments, $start, $perPage);
   
    foreach ($commentsForPage as $comment) {
   
        $data = str_getcsv($comment);

        $email = isset($data[0]) ? htmlspecialchars($data[0]) : '';
        $name  = isset($data[1]) ? htmlspecialchars($data[1]) : '';
        $text  = isset($data[2]) ? htmlspecialchars($data[2]) : '';
   
        echo "<div style='border:1px solid #ccc;padding:10px;margin:10px 0'>";
        echo "<strong>$name</strong> ($email)<br>";
        echo "<p>$text</p>";
        echo "</div>";
    }
   
    echo "<div>";
    for ($i = 1; $i <= $pages; $i++) {
       echo "<a style='margin-right:10px' href='?page=$i'>$i</a>";
    }
     echo "</div>";
}



  //TODO 3: CODE by REQUEST METHODS


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

        $email = trim($_POST['email']);
        $name = trim($_POST['name']);
        $text = trim($_POST['text']);

        $data = [$email, $name, $text];

        $file = fopen("comments.csv", "a");

        fputcsv($file, $data);

        fclose($file);

        header("Location: guestbook.php");
        exit;
    }
}

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

?>

<!DOCTYPE html>
<html>
<head>
    <title>GuestBook</title>
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

   //Validation errors output

if (!empty($errors)) {

    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }

}

?>

<hr>

<h3>Comments</h3>

<?php


   //TODO: render GuestBook comments


renderComments("comments.csv", $page);

?>

</body>
</html>