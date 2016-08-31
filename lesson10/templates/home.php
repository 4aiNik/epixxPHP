<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Epic Blog</title>
    <style>
        #pages{
            list-style:none;
        }

        #pages li{
            float:left;
            margin:auto 10px;
        }

        #pages a{
            text-decoration: none;
        }
    </style>
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
    
    <ul id="pages">
        <?php if($page > 1):?>
            <li><a href="index.php?action=home&method=index&page=<?=$page-1;?>"><</a></li>
        <?php endif;?>

    <?php for ($i=1; $i<=$total; $i++) :?>
        <li><a href="index.php?action=home&method=index&page=<?=$i;?>"><?=$i;?></a></li>
    <?php endfor;?> 

        <?php if($page < $total) :?>            
            <li><a href="index.php?action=home&method=index&page=<?=$page+1;?>">></a></li>
        <?php endif;?>
    </ul>

    <a href="index.php?action=messages&method=add">Добавить сообщение</a>
     <a href="index.php?action=account&method=logout">Выход</a>
</body>
</html>