<?php

use MintyPHP\DB;
use MintyPHP\Router;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;
    $insertid = DB::insert(
        'INSERT INTO messages (`title`, `message`, `about_user_id`, `group_id`, `user_id`) 
        VALUES (?,?,?,?,?)',
        $data['title'],
        $data['message'],
        $data['about_user_id'],
        $_SESSION['user']['group_id'],
        $_SESSION['user']['id']
    );
    Router::redirect("/app");
}

$messages = DB::select(
    'SELECT * FROM messages WHERE group_id = ? AND about_user_id = ?
    AND about_user_id !=?',
    $_SESSION['user']['group_id'],
    $id,
    $_SESSION['user']['id'],
);
