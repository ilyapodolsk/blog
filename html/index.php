<h1>Сайт для блога</h1>
<p>Добро пожаловать на наш сайт <b>MindTrails</b>! Читайте, делитесь, вдохновляйтесь и вдохновляйте.</p>
<?php

    foreach($shortPosts as $post) { ?>
        <a href="long_post.php?id=<?=$post['id']?>"><?=$post['short_title']?></a> - <?=$post['commentsCount']?> комментраиев<br>
    <?}
?>
<hr>
<h2>На нашем сайте уже:</h2>
<ul>
    <li><?=$postsCount?> постов</li>
    <li><?=$commentsCount?> комментариев</li>
    <li><?=$usersCount?> пользователей</li>
</ul>

