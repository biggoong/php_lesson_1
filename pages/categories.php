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
            <div class="item-container">
                <?php
                    if ($data_page !== ''){                
                        foreach ($data_page as $item){
                            echo '<a href="?page=' . ($page) . '&id=' . ($item['id']) . '"><div class="item"><h4>' .
                            ($item['name']) . '</h4><p>Код: ' . 
                            ($item['id']) . '</p><p>Цена: ' .
                            ($item['price']) . ' руб.</p></div></a>';
                        }
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