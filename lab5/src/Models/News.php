<?php
namespace App\Models;

class News {
    public function getNewsList() {
        // Підключення до БД
        $conn = mysqli_connect("localhost", "root", "", "guestbook");

        if (!$conn) {
            return [['title' => 'Помилка', 'text' => 'Не вдалося підключитися до БД']];
        }

        // Запит до таблиці
        $result = mysqli_query($conn, "SELECT title, text FROM news ORDER BY id DESC");

        //  масив
        $news = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $news[] = $row;
        }

        mysqli_close($conn);
        return $news;
    }
}