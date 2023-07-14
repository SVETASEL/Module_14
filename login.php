<?php
if (!empty($_POST)) {
    require('auth.php');

    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';
    $birthdate = $_POST['birthdate'] ?? '';
    $hashedPassword = getPasswordHash($login);

    if ($hashedPassword && password_verify($password, $hashedPassword)) {
        setcookie('login', $login, 0, '/');
        setcookie('birthdate', $birthdate, 0, '/');
        header('Location: index.php');
    } else {
        $error = 'Ошибка авторизации';
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Форма авторизации</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            background-image: url('BG image.jpg');
            background-size: 100;
        }
    </style>
</head>
<body>
<?php if (isset($error)): ?>
    <span style="color: red">
        <?= $error ?>
    </span>
<?php endif; ?>
<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
        <a href="#" class="navbar-brand">AlmaSpa</a>
        <ul class="navbar-nav">
            <li class="nav-item">
</nav>
<div class="container">
    <div class="col-md-4">
        <form action="login.php" method="post">
            <label for="login" class="form-label">Имя пользователя</label>
            <input required name="login" type="text" id="login" class="form-control"><br>
            <label for="password" class="form-label">Пароль</label>
            <input required name="password" type="password" id="password" class="form-control"><br>
            <label for="birthdate" class="form-label">Дата Рождения</label>
            <input name="birthdate" type="date" id="birthdate" class="form-control"><br>
            <input name="submit" type="submit" value="Войти"/>
        </form>
    </div>
</div>
</body>
</html>
