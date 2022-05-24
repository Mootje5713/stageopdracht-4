<?php

use MintyPHP\Auth;
use MintyPHP\Router;

$_SESSION['grouppassword'] = "";

$error = '';
if (isset($_POST['username'])) {
  if (Auth::login($_POST['username'], $_POST['password'])) {
    Router::redirect("app");
  } else $error = "Username/password not valid";
}
