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
                    include 'menu.php';
                ?>
            </ul>
        </div>
        <div class="main-content">
            <div class='description'>
                <?php
                    if ($data_item !== ''){
                    echo '<h3>' . ($data_item['name']) . '</h3>
                    <p>Код: ' . ($data_item['id']) . '</p>
                    <h5>Доп. характеристики:</h5>
                    <p>' . ($data_item['descriptions']) . '</p>
                    <h4>Цена: ' . ($data_item['price']) . ' руб.</h4>';

                    } else {
                        echo '';
                    }

                ?>

                
            </div> 
            
            <p><a href="?page=main">На главную</a></p>
        </div>
    </div>
</body>
</html>