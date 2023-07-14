<?php

function getUsersList()
{
    $users = require('userDB.php');
    return $users;
}


function checkPassword(string $login, string $password): bool
{
    $users = require('userDB.php');

    foreach ($users as $user) {
        if ($user['login'] === $login && password_verify($password, $user['password'])) {
            return true;
        }
    }

    return false;
}

function getCurrentUser(): ?string
{
    $loginFromCookie = $_COOKIE['login'] ?? '';
    $users = getUsersList();

    foreach ($users as $user) {
        if ($user['login'] === $loginFromCookie) {
            return $user['login'];
        }
    }

    return null;
}

function getPasswordHash($login)
{
    $users = getUsersList();

    foreach ($users as $user) {
        if ($user['login'] === $login) {
            return $user['password'];
        }
    }

    return null;
}

function existsUsers($login)
{
    $users = require('userDB.php');
    foreach ($users as $user) {
        if ($user['login'] === $login) {
            return true;
        }
    }

    return false;
}

function calculateDaysToBirthday($birthdate): int
{
    if (empty($birthdate)) {
        return 0; // Return 0 if the birthdate is not provided
    }

    $today = new DateTime();
    $birthDate = new DateTime($birthdate);
    $birthDate->setTime(0, 0, 0);

    $nextBirthday = clone $birthDate;
    $nextBirthday->modify('+' . $today->format('Y') - $birthDate->format('Y') . ' years');

    if ($nextBirthday < $today) {
        $nextBirthday->modify('+1 year');
    }

    $interval = $today->diff($nextBirthday);
    return $interval->days;
}

?>
<?php
function getDaysWord($days): string
{
    $lastDigit = $days % 10;
    $lastTwoDigits = $days % 100;

    if ($lastDigit === 1 && $lastTwoDigits !== 11) {
        return 'день';
    } elseif (
        ($lastDigit === 2 || $lastDigit === 3 || $lastDigit === 4) &&
        !($lastTwoDigits >= 12 && $lastTwoDigits <= 14)
    ) {
        return 'дня';
    } else {
        return 'дней';
    }
}
?>
