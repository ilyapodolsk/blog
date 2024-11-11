<?php
    require_once 'src/base.php';

    $title = 'Блог';
    $content = 'index';

    $postsCount = $db->getCountRows('post');
    $commentsCount = $db->getCountRows('comment');
    $usersCount = $db->getCountRows('users');

    $posts = $db->getRows('post');
    $shortPosts = []; 

    foreach ($posts as $key => $post) {
    $where = 'post_id = ' . $post['id']; 
    $comments = $db->getCountRows('comment', $where);

    $shortPosts[$key] = $post; 
    $shortPosts[$key]['commentsCount'] = $comments;
}

    require_once 'html/main.php';
?>