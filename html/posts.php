<? require_once 'new_post.php';?>
<h1>Публикации</h1>
<ul>
    <?php foreach ($posts as $post) { ?>
        <li>
            <a href="post.php?id=<?=$post['id']?>"><?=$post['title']?></a>
        </li>
    <?php } ?>    
</ul>

<form method="post" action="">
<?php if ($error) { ?>
    <p style="color: red;">Вы ввели не все данные!</p>
<?php } ?>  
    <p>
      <label>Написать пост:</label>
      <textarea name="new_post"></textarea>
    </p>
    <p>
        <label>Тема поста:</label>
        <input type="text" name="short_post">
    </p>
    <p>
      <input type="submit" name="post" value="Отправить">
    </p>
</form> 