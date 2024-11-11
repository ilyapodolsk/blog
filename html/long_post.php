<?require_once 'comments.php'?> 
<h1><?=$post['short_title']?> Автор: <?=$user['name']?></h1>

<?php echo $post['title']; ?>
<hr>

<?php foreach ($comments as $comment) { ?>
    <?php 
        $author = $db->getRowById('users', $comment['user_id']);
        ?>
        <b><?php echo $author['name']; ?>:</b><br />
        <?php echo $comment['text']; ?><br />
        <? if ($comment['file']) { ?>
          <img src="<?=$comment['file']?>" alt="Описание изображения">
        <? } ?>
        <span style="color: gray;"><?php echo $comment['date']; ?></span><hr />
    <?php } ?>
    
    <?php if ($auth_user) { ?>
  <form name="form" method="post" action="" enctype="multipart/form-data">

    <p>
      <label>Оставить комментарий:</label>
      <input type="text" name="comment">
    </p>
    <p>
        <input type="file" name="upload_file">
    </p>
    <p>
      <input type="submit" name="com" value="Отправить">
    </p>
  </form>
<?php } ?>