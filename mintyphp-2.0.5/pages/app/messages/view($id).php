<?php

use MintyPHP\DB;

$messages = DB::select(
    'SELECT * FROM messages WHERE group_id = ? AND about_user_id = ?',
    $_SESSION['user']['group_id'],
    $id
);
