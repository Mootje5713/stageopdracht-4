<?php

use MintyPHP\Router;

if (!$_SESSION['user']['id']) Router::redirect('/');
