<?php

use MintyPHP\DB;

$group = DB::selectOne('SELECT * FROM groups WHERE id =?', $_SESSION['user']['group_id']);
$users = DB::select('SELECT * FROM users WHERE group_id =? AND username !=?', $_SESSION['user']['group_id'],
    $_SESSION['user']['group_id']);
