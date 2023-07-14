<?php
return [
    ['login' => 'admin', 'password' => password_hash('P@ssword', PASSWORD_DEFAULT)],
    ['login' => 'moderator', 'password' => password_hash('password', PASSWORD_DEFAULT)],
    ['login' => 'user', 'password' => password_hash('123', PASSWORD_DEFAULT)],
    ['login' => 'Светлана', 'password' => password_hash('Svetlana', PASSWORD_DEFAULT)],
];