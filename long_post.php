<?php
    require_once 'src/base.php';

    $id = $request->id ?? 0;
    if (is_numeric($id)) {
        $post = $db->getRowById('post', $id);
        if ($post) {
            $title = $post['title'];
            $content = 'long_post';
            $user = $db->getRowById('users', $post['user_id']);
            $comments = $db->getRows('comment', 'post_id = ?', [$id]);
            require_once 'html/main.php';
            exit;
        }
    }
    to404();
?>