<?php
    foreach ($data_main as $key => $item){
        echo '<li ' . ($key === $page ? 'class="selected"' : '') . '><a href="?page=' . ($key) . '">' . $item['name'] . '</a></li>';
    }

?>