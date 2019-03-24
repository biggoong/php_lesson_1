<?php

//ini_set('display_errors', '1');
//error_reporting(E_ALL);

//include 'pages/main.php';

$page = $_REQUEST['page'] ?? 'main';


function show($page)
{
    $available_pages = ['processors', 'motherboards', 'videocards', 'rams', 'powers', 'shells'];    
        
    $data_main = include 'data/main.php';
    
    if ($page === 'main') {
        include 'pages/main.php';
    } elseif (in_array($page, $available_pages)) {
        if (isset($_REQUEST['id'])) {
            $data_item = $data_main[$page]['products'][$_REQUEST['id']] ?? '';
            include 'pages/item.php';
            
        } else {
            $data_page = $data_main[$page]['products'] ?? '';
            include 'pages/categories.php';
        }
        
    } else {
        include 'pages/404.php';
    }
}

show($page);

?>
