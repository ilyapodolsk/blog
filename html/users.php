<h1>Наши пользователи</h1>
 <ul>
    <?php foreach ($users as $user) { ?>
        <li>
            <a href="user.php?id=<?=$user['id']?>"><?=$user['name']?></a>
        </li>
    <?php } ?>    
 </ul>