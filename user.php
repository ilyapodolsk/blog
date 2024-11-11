<?php
    require_once 'src/base.php';

    $id = $request->id ?? 0;
    if (is_numeric($id)) {
        $user = $db->getRowById('users', $id);
        if ($user) {
            $title = $user['name'];
            $content = 'user';
            $posts = $db->getRows('post', '`user_id` = ?', [$user['id']]);
            require_once 'html/main.php';
            exit;
        }
    }
    to404();
?>