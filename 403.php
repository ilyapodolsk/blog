<?php
    require_once 'src/base.php';
    header('HTTP/1.0 403 Forbidden');

    $title = 'Нет прав для просмотра';
    $content = '403';

    require_once 'html/main.php';
?>