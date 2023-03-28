<?php

// установка параметров подключения к базе данных
$servername = "localhost";
$username_1 = "root";
$password = "";
$dbname = "users";

// создание подключения к базе данных
$conn = new mysqli($servername, $username_1, $password, $dbname);

// проверка наличия ошибок при подключении
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

if (isset($_POST["username"]))
{
    $user = $_POST["username"];
}
else
{
    $user = null;
}
//$comments_form = $_POST["comments"];

if (isset($_POST["comments"]))
{
    $comments_form = $_POST["comments"];
}
else
{
    $comments_form = null;
}
$date = date("Y-m-d H:i:s");
//$file = $_POST["file"];
if (isset($_POST["file"])){
    $file = $_POST["file"];
}
else{
    $file = null;
}
$sql = "INSERT INTO comments (username, comments, date, file) VALUES ('$user', '$comments_form', '$date', '$file')";
// выполнение запроса
if ($conn->query($sql) === TRUE) {
    echo "Комментарий успешно сохранен в базе данных";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

// закрытие подключения к базе данных
//$conn->close();

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
        <div class="col-md-6"> <a href="javascript:history.back()" class="btn btn-primary mb-3">Назад</a>
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
                    echo "<li>";
                    echo "<a href='uploads/$file'>$file</a>";
                    echo "<button onclick='showForm(\"$file\")'>Добавить комментарий</button>";
                    echo "<form id='comment-form-$file' action='' method='post' style='display: none;'>";
                    echo "<input type='text' name='username' placeholder='Имя пользователя'>";
                    echo "<textarea name='comments' placeholder='Комментарий'></textarea>";
                    echo "<input type='hidden' name='file' value='$file'>";
                    echo "<button type='submit'>Отправить</button>";
                    echo "<button type='button' onclick='closeForm(\"$file\")'>Отмена</button>";
                    echo "</form>";
                    echo "</li>";
                     // выбираем комментарии для текущего файла из базы данных
                    $sql = "SELECT * FROM comments WHERE file='$file'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<h4>Комментарии:</h4>";
                        $comments = "";
                        while ($row = $result->fetch_assoc()) {
                            $comments .= "<b>" . $row["username"] . "</b>: " . $row["comments"] . " (" . $row["date"] . ")<br>";
                        }
                        echo "<div>$comments</div>";
                    }
                }
                echo "</ul>";
            } else {
                echo "<p>Файлы пока не загружены.</p>";
            }
            ?>
        </div>
    </div>
    <script>
        function showForm(file) {
            document.getElementById('comment-form-' + file).style.display = 'flex';
        }

        function closeForm(file) {
            document.getElementById('comment-form-' + file).style.display = 'none';
        }
    </script>
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
</div>
</body>
</html>
