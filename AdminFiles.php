<!DOCTYPE html>
<html>
<head>
    <title>Загрузка файла на сервер</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>
<body>
<?php
// проверяем, был ли отправлен файл
if(isset($_FILES['file'])) {
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_path_admin = 'AdminFiles/' . $file_name;
    $file_path_users = 'uploads/' . $file_name;
    // перемещаем загруженный файл в нужные папки
    if(move_uploaded_file($file_tmp, $file_path_admin) && copy($file_path_admin, $file_path_users))
    {
        echo "<div class='alert alert-success' role='alert'>Файл успешно загружен.</div>";
        // добавляем новый файл в список
        $files[] = $file_path_admin;
        $files[] = $file_path_users;
    } else {
        echo "<div class='alert alert-danger' role='alert'>Ошибка загрузки файла.</div>";
    }
}

// получаем список файлов из директорий и выводим их на страницу
$files_admin = glob('AdminFiles/*');
$files = array_merge($files_admin);

?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="file">Выберите файл для загрузки:</label>
                    <input type="file" name="file" class="form-control-file" id="file">
                </div>
                <button type="submit" class="btn btn-primary">Загрузить</button>
            </form>
            <form action="AdminPanel.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                </div>
                <button type="submit" class="btn btn-primary">Вернутся на страницу выбора</button>
            </form>
            <?php
            if ($files) {
                echo "<h2>Загруженные файлы:</h2>";
                echo "<ul>";
                foreach ($files as $file) {
                    $file_name = basename($file);
                    echo "<li><a href='$file'>$file_name</a></li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Файлы пока не загружены</p>";
            }
            ?>
        </div>
    </div>
</div>
