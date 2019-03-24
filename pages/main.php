<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Computer Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/pages/style.css" />
    
</head>
<body>
    <h1>Магазин онлайн</h1>
    <div id="login-bar">
        <a href="?page=registration">Регистрация</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="?page=authorization">Войти</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="?action=logout">Выйти</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="?page=check_access">Проверка</a>
    </div>
    <div class="page-container">
        <div class="menu-bar">
            <h4>Категории товаров</h4>
            <hr />
            <ul>
                <?php
                    include 'menu.php';
                ?>
                
            </ul>
        </div>
        <div class="main-content">
            <h4>Выберите категорию</h4>
        </div>
    </div>
</body>
</html>