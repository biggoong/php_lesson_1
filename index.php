<?php

//ini_set('display_errors', '1');
//error_reporting(E_ALL);

session_start();

$page = $_REQUEST['page'] ?? 'main';

function show($page)
{ 
    $data_main = include 'data/main.php';

    $available_pages = array_keys($data_main);
    $available_login = ['authorization', 'registration', 'check_access'];

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
    } elseif (in_array($page, $available_login)){
        include 'auth/' . $page . '.php';
    
    } else {
        include 'pages/404.php';
    }
}

show($page);


if (!empty($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'reg':
            reg($_POST);
            break;
        case 'login':
            login($_POST);
			break;
		case 'logout':
			logout();
			die();
			break;
    }
}

function reg($request)
{
    if ($request['password'] != $request['password_confirm']){
        header('Location: ?page=registration&error=DIFFERENCE');
    }
    $salt = random_int(0, PHP_INT_MAX);
    $password_hash = md5($salt . $request['password']);
    $f = fopen('./users.txt', 'a+');
    $record = $request['login']. '|' . $salt . '|' . $password_hash."\n";
    fwrite($f, $record);
    fclose($f);
    header('Location: ?page=authorization');
}

function login($request)
{
    $users = file('./users.txt');
    $error = '';
    foreach ($users as $u) {
        $user_parts = explode('|', $u);
        if ($request['login'] == $user_parts[0]) {
            $hash_check = md5($user_parts[1] . $request['password']);
            if (trim($hash_check) == trim($user_parts[2])) {
                $token = $user_parts[2];
                setcookie('token', $token, time() + 86400*365);
				$_SESSION = [
					'login' => $user_parts[0],
					'token' => $token,
					'enter_date' => time()
				];
				
                header('Location: /');
                return;
            } else {
                $error = 'pwd_fail';
            }
        } else {
            $error = 'login_fail';
        }
        header('Location: ?page=authorization&error=' . $error);
    } 
}

function logout()
{
	$_SESSION = [];
	setcookie('token', '', time()+1);
	header('Location: ?page=authorization');
}

function isAuth() {
	$is_auth = false;
	if (isset($_SESSION['token'])){
		$is_auth = true;
	} elseif (isset($_COOKIE['token'])){
		$user = findUser(false, $_COOKIE['token']);
		if ($user !== false) {
			setcookie('token', $user[2], time() + 86400*365);
			$_SESSION = [
				'login' => $user[0],
				'token' => $user[2],
				'enter_date' => time()
			];
			$is_auth = true;
		}
	}
	return $is_auth;
}

function findUser($login = false, $token = false){
	if($login === false && $token === false) {
		return false;
	}
	$users = file('./users.txt');
	foreach ($users as $user) {
		$user_parts = explode('|', $user);

		$search_index = $login ? 0 : 2;
		$search_word = $login ? $login : $token;

		if ($search_word == $user_parts[$search_index]){
			return $user_parts;
		}
	}
	return false;
}

function getLogin (){
	return $_SESSION['login'];
}

?>
