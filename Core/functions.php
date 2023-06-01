<?php
date_default_timezone_set("Europe/Lisbon");

use Core\App;
use Core\Database;
use Core\Response;




function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }

    return true;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function login($user)
{

    $_SESSION['user'] = [
        'email' => $user['email'],
        'user_id' => $user['user_id'],
        'name' => $user['name']
    ];
    //dd($_SESSION['user']['user_id']);
    session_regenerate_id(true);
}

function logout()
{
    $_SESSION = [];

    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

function checkUserId($currentUser)
{
    $db = App::resolve(Database::class);
    $currentUser = $_SESSION['user']['user_id'];
    $email = $_SESSION['user']['email'];

    if (!$currentUser) {
        //echo 'no user id';
        $user = $db->query('select * from users where email = :email', [
            'email' => $email
        ])->get();

        $user_id = $user[0]['id'];
        $currentUser = $user_id;
        return $currentUser;
    } else {
        return $currentUser;
    }
}

function getTime()
{
    return date("Y-m-d H:i:s");
}
