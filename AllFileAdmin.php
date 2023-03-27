<?php

// установка параметров подключения к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// создание подключения к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

// проверка наличия ошибок при подключении
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$user_from_form = $_POST["username"];
$comments = $_POST["comments"];
$date = date("Y-m-d H:i:s");

$sql = "INSERT INTO comments (username, comments, date) VALUES ('$user_from_form', '$comments', '$date')";


// выполнение запроса
if ($conn->query($sql) === TRUE) {
    echo "Комментарий успешно сохранен в базе данных";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

// закрытие подключения к базе данных
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Список файлов</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php
            $files = array();
            // получаем список файлов из директорий
            $uploads_dir = 'uploads';
            $admin_files_dir = 'AdminFiles';
            $uploads_files = scandir($uploads_dir);
            $admin_files = scandir($admin_files_dir);
            // объединяем массивы файлов
            $files = array_merge($uploads_files, $admin_files);
            // удаляем "." и ".." из списка файлов
            $files = array_diff($files, array('.', '..'));
            // убираем повторяющиеся элементы
            $files = array_unique($files);
            if ($files) {
                echo "<h2>Список файлов:</h2>";
                echo "<ul>";
                foreach ($files as $file) {
                    echo "<li><a href='uploads/$file'>$file</a> <button onclick='showForm()'>Add Comment</button></li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Файлы пока не загружены.</p>";
            }
            ?>
        </div>
    </div>
    <style>
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
        }
        input, textarea{
            margin: 5px;
            width: 300px;
        }
        form{
            display: none;
            flex-direction: column;
        }
<!--    </style>-->
<!--    <button onclick="showForm()">Добавить комментарий</button>-->
<!--    <form id="comment-form" action="" method="post">-->
<!--        <input type="text" name="username" placeholder="mame">-->
<!--        <textarea name="comments" id="" cols="30" rows="10" placeholder="Comments"></textarea>-->
<!--        <input type="submit">-->
<!--    </form>-->
<!--    <form id="comment-form" action="" method="post">-->
<!--        <input type="text" name="username" placeholder="mame">-->
<!--        <textarea name="comments1" id="" cols="30" rows="10" placeholder="Comments"></textarea>-->
<!--        <input type="submit">-->
<!--        <button type="button" onclick="closeForm()">Отмена</button>-->
<!--    </form>-->

</div>
</body>
</html>
