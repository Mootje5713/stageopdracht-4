<!DOCTYPE html>
<html lang="en">
<head>
    <link rel=stylesheet href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="name">
        <h1>grouphouz<?php if(isset($_SESSION['groupname'])): ?>:
            <?php echo $_SESSION['groupname'] ?> 
            (<?php echo $_SESSION['grouppassword'] ?>)
        <?php endif; ?>
        </h1>
    </div>
    <div class="loginstatus">
    <?php if(isset($_SESSION['username'])): ?>
    ingelogd als <?php echo $_SESSION['username']; ?> &nbsp;
    <?php endif; ?>
    <?php if(isset($_SESSION['groupname'])): ?>
        <a href="logout.php">logout</a>
        <?php endif; ?>
    </div>