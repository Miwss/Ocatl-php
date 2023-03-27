<!DOCTYPE html>
<html>
<head>
    <title>Моя страница</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- подключаем стили для кнопок -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #fff;
            color: #222;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 50px; /* добавляем отступ сверху */
        }

        .btn {
            margin: 0 10px;
            padding: 12px 16px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #444;
            color: #fff;
            transition: background-color 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #666;
        }

        .fa {
            color: #fff;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
<h1>Welcome!</h1>
<div class="button-container">
    <form action="registration.php" method="post">
        <button class="btn"><i class="fa fa-user-plus" ></i>Регистрация</button>
    </form>
    <form action="login.php" method="post">
        <button class="btn"><i class="fa fa-sign-in"></i>Вход</button>
    </form>
</div>
</body>
</html>
