<!DOCTYPE html>
<html>
<head>
    <title>Загрузка файла на сервер</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1>Загрузка файла на сервер</h1>
    <?php
    // проверяем, был ли отправлен файл
    if (isset($_FILES['file'])) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_path = 'MyFiles/' . $file_name;
        // перемещаем загруженный файл в нужную папку
        if (move_uploaded_file($file_tmp, $file_path)) {
            echo "<p class='text-success'>Файл '$file_name' успешно загружен.</p>";
        } else {
            echo "<p class='text-danger'>Ошибка загрузки файла.</p>";
        }
    }

    // получаем список файлов из директории и выводим их на страницу
    $files = glob('MyFiles/*');
    if ($files) {
        echo "<h2>Загруженные файлы:</h2>";
        echo "<ul>";
        foreach ($files as $file) {
            $file_name = basename($file);
            echo "<li><a href='$file'>$file_name</a></li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Файлы не найдены.</p>";
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="file" class="form-control-file" name="file">
        </div>
        <button type="submit" class="btn btn-primary">Загрузить</button>
    </form>
    <a href="#" onclick="history.back(); return false;">Вернуться назад</a>
</div>
</body>
</html>