<?php
    require_once 'src/base.php';

    $title = 'Посты';
    $content = 'posts';
    
    $posts = $db->getRows('post');
    
    require_once 'html/main.php';
?>