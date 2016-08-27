<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Epic Blog</title>
</head>
<body>
    <h1>
    <?php 
    if(isset($_SESSION['login'])) {
        echo $_SESSION['login'];
    } else {
        header("Location: index.php?action=account&method=logout");
    }
    ?></h1>
    <ul>
        <?php foreach($messages AS $post): ?>
            <li>
                <?= $post['message'] ?> <br>
                <?= date('d.m.Y H:i', strtotime($post['date'])); ?> <br>
                <?= $post['user_name'] ?> <br>
                <?php if ($_SESSION['user_id'] == $post['user_id']) : ?>
                    <a href="index.php?action=messages&method=edit&id=<?= $post['id'] ?>">Редактировать</a>
                    <a href="index.php?action=messages&method=delete&id=<?= $post['id'] ?>">Удалить</a>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php?action=messages&method=add">Добавить сообщение</a>
     <a href="index.php?action=account&method=logout">Выход</a>
</body>
</html>