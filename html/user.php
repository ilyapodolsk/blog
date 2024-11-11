<h1><?=$user['name']?></h1>
<p><b>Информация о пользователе:</b> <?=$user['information']?></p>
<h2>Посты пользователя:</h2>
<?php if ($posts) { ?>
    <ul>
        <?php foreach($posts as $post) { ?>
            <li><a href="post.php?id=<?=$post['id']?>"><?=$post['title']?></a></li>
        <?php } ?>
    </ul>
<?php } else { ?>
    <p>У пользователя нет постов</p>
<?php } ?>
