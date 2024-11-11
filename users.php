<?php
    require_once 'src/base.php';
    if (!$auth_user) to403();
    $title = 'Пользователи';
    $content = 'users';

    $users = $db->getRows('users', order_by: 'name');

    require_once 'html/main.php';
?>