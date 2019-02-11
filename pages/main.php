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
    <div class="page-container">
        <div class="menu-bar">
            <h4>Категории товаров</h4>
            <hr />
            <ul>
                <?php
                    foreach ($data_main as $key => $item){
                        echo '<li><a href="?page=' . ($key) . '">' . $item['name'] . '</a></li>';
                    }

                ?>
                
            </ul>
        </div>
        <div class="main-content">
            <h4>Выберите категорию</h4>
        </div>
    </div>
</body>
</html>