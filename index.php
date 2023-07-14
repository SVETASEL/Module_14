<?php

require('auth.php');
$login = getCurrentUser();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Spa Salon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
<a href="#" class="navbar-brand">AlmaSpa</a>
<ul class="navbar-nav">
    <li class="nav-item">   
    <?php if ($login === null): ?>
<a href = "login.php">Авторизируйтесь</a>
<?php else: ?>
<span style="color: white">Добро пожаловать,  <?php echo $login; ?></span><br>
<a href = "logout.php">Выйти</a>
<?php endif; ?>
<br>
    </li>
</ul>

     </div>
    </nav>
<div class="container">
    <div class="row">
        <div class="col">
        <?php

setcookie('login_time', time(), time() + 24 * 60 * 60, '/');

$loginTime = $_COOKIE['login_time'] ?? 0;

$expirationTime = $loginTime + (24 * 60 * 60);

$remainingTime = $expirationTime - time();

$formattedTime = gmdate('H:i:s', $remainingTime);
?>

    <?php if ($remainingTime > 0) : ?>
        <p><img src = "PromoInd.png"/><br>
        <H2 style="text-align:center"><?php echo $formattedTime; ?></H2></p>
    <?php else : ?>
        <p>Время скидки истекло</p>
    <?php endif; ?>

<?php
$birthdate = $_COOKIE['birthdate'] ?? null;
$daysToBirthday = calculateDaysToBirthday($birthdate);
$daysWord = getDaysWord($daysToBirthday);
?>

<?php if ($daysToBirthday > 0): ?>
    <p><img src = "PromoBD.png"/><br>
    <h2 style="text-align:center";> <?php echo $daysToBirthday; ?> <?php echo $daysWord; ?> </h2></p>
<?php else: ?>
    <h3 style = "text-align:center">С Днем Рождения!<br>Вам сегодня скидка на все услуги салона - 5%</h3>
<?php endif; ?>


    <h1>Добро пожаловать!</h1>
    <h3>Наши услуги</h3>
    <div class="card-group">
                <div class="card">
                    <div class="card-header">Спа-услуги для ваших рук</div>
                    <img src="Manicure.jpg" class="card-img-top" alt="Маникюр" />
                    <div class="card-body">
                        <h4 class="card-title">Маникюр</h4>
                        <div class="card-text">Описание услуги</div>                       
</div>
<div class="card-footer">Цена от 1500 р</div>
</div>
                <div class="card">
                <div class="card-header">Спа-услуги для ваших ног</div>
                    <img src="Pedicure.jpg" class="card-img-top" alt="Педикюр" />
                    <div class="card-body">
                        <h5 class="card-title">Педикюр</h5>
                        <p class="card-text">Описание услуги</p>
                    </div>
                    <div class="card-footer">Цена от 2000 р</div>
                </div>
                </div>
                <div class="card-group">
                <div class="card">
                <div class="card-header">Спа-услуги для тела</div>
                    <img src="Massage1.jpg" class="card-img-top" alt="Массаж тела" />
                    <div class="card-body">
                        <h5 class="card-title">Массаж тела</h5>
                        <div class="card-text">Описание услуги</div>

                    </div>
                    <div class="card-footer">Цена от 4000 р</div>
                </div>

               
                <div class="card">
                <div class="card-header">Спа-услуги для лица</div>
                    <img src="Massage2.jpg" class="card-img-top" alt="Массаж лица" />
                    <div class="card-body">
                        <h5 class="card-title">Массаж лица</h5>
                        <div class="card-text">Описание услуги</div>
                    </div>
                    <div class="card-footer">Цена от 3000 р</div>
                </div>
</div>
            </div>
        </div>
    </div>

</body>
</html>





