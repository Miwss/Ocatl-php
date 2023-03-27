<!DOCTYPE html>
<html>
<head>
    <title>Страница с кнопками на PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="button-container">
    <div class="container mt-5">
        <div class="row justify-content-between">
            <div class="col-sm-4">
                <form action="OS.php" method="post">
                    <button class="btn btn-primary btn-lg btn-block"><i class="fa fa-user-plus" ></i>Фича Админа</button>
                </form>
            </div>
            <div class="col-sm-4">
                <form action="AdminFiles.php" method="post">
                    <button class="btn btn-secondary btn-lg btn-block"><i class="fa fa-sign-in"></i>Загрузить файл</button>
                </form>
            </div>
            <div class="col-sm-4">
                <form action="AllFileAdmin.php" method="post">
                    <button class="btn btn-info btn-lg btn-block"><i class="fa fa-sign-in"></i>Список всех файлов</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>