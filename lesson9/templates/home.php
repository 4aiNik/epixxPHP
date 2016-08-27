<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Epic Blog</title>
</head>
<body>
    <ul>
        <?php foreach($messages AS $post): ?>
            <li>
                <?= $post['message'] ?> <br>
                <?= date('d.m.Y H:i', strtotime($post['date'])); ?> <br>
                <?= $post['user_id'] ?> <br>
                <a href="index.php?action=messages&method=edit&id=<?= $post['id'] ?>">Редактировать</a>
                <a href="index.php?action=messages&method=delete&id=<?= $post['id'] ?>">Удалить</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php?action=messages&method=add">Добавить сообщение</a>
</body>
</html>