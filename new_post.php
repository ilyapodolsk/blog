<?php
    require_once 'src/base.php';

    if (!$auth_user) to403();
    
    if (isset($_POST['post'])) { 
        $post_author = $auth_user['id']; // айди автора поста
        $post_text = $_POST['new_post']; // текст поста
        $short_text = $_POST['short_post']; // текст темы поста
        $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
        $mysqli->set_charset('utf8mb4');
        $error = true;

        if ($post_text && $short_text) {
            $query = "INSERT INTO blog_post
            (short_title, title, user_id) 
            VALUES ('$short_text', '$post_text', '$post_author');";
            $result = $mysqli->query($query);
            
            if ($result) {
                header("Location: " . $_SERVER['REQUEST_URI']);
                exit;
            } else {
                echo "Ошибка добавления комментария.";
            }
        }
        // else echo 'Вы ввели не все данныве';  
        $mysqli->close();
    }
?>