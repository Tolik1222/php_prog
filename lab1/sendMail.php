<?php

$subject = "Практична робота №1";

$name  = "Smirnow Anton";
$group = "539";

$message  = "Студент: {$name}\n";
$message .= "Група: {$group}\n";
$message .= "Тест надсилання листа через PHP";

$headers = "From: vilk2er2280@gmail.com";

mail(
    "a.y.smirnov@student.khai.edu",
    $subject,
    $message,
    $headers
);

echo "Done";

?>