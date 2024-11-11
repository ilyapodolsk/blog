<?php
    require_once 'src/base.php';

    if (!$auth_user) to403();
    
    if (isset($_POST['com']) && isset($_FILES['upload_file'])) { 
        $dist = 'files/' . $_FILES['upload_file']['name']; // путь к файлу
        $uploaded = move_uploaded_file($_FILES['upload_file']['tmp_name'], $dist); //куда поместить
        $post_id = $post['id']; // айди поста
        $comment_author = $auth_user['id']; // айди автора комментария
        $comment_text = $_POST['comment']; // текст комментария
        $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
        $mysqli->set_charset('utf8mb4');
        
        if ($comment_text || $uploaded) {
            $query = "INSERT INTO blog_comment
            (file, text, user_id, post_id) 
            VALUES ('$dist', '$comment_text', '$comment_author', '$post_id');";
            $result = $mysqli->query($query);  
            
            if ($result) {
                header("Location: " . $_SERVER['REQUEST_URI']);
                exit;
            } else {
                echo "Ошибка добавления комментария.";
            }
        }
        $mysqli->close();
    }
?>