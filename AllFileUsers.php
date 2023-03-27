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
            $uploads_dir = 'MyFiles';
            $uploads_files = scandir($uploads_dir);
            // объединяем массивы файлов
            $files = array_merge($uploads_files);
            // удаляем "." и ".." из списка файлов
            $files = array_diff($files, array('.', '..'));
            if ($files) {
                echo "<h2>Список файлов:</h2>";
                echo "<ul>";
                foreach ($files as $file) {
                    echo "<li>$file <a href='download.php?file=".urlencode($file)."' class='btn btn-sm btn-primary'>Download</a></li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Файлы пока не загружены.</p>";
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
