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
    <h1>grouphouz</h1>
</div>

<?php
    include "connection.php";
    if(!isset($_SESSION['grouppassword'])) {
        header("Location: index.php");
    }
    if (isset($_POST['username']) && ($_POST['password'])) {
        $username =  $_POST['username'];
        $password = $_POST['password'];
        $id = $_SESSION['group_id'];
        $query = "SELECT * FROM `users` WHERE username = '$username' 
        AND group_id = '$id'";
        $result=$conn->query($query);
        if ( $result === FALSE) {
            echo "error" . $query . "<br />" . $conn->error;
        } else {
            if ($result->num_rows>0) {
                while($row=$result->fetch_assoc())
                {
                    sleep(3);
                    if (password_verify($password, $row['password'])) {
                        $_SESSION["user_id"]=$row['id'];
                        $_SESSION["username"]=$row['username'];
                        $_SESSION["group_id"]=$row['group_id'];
                    } else {
                        echo "Wachtwoord niet gevonden!";
                    }
                }
            } else {
                echo "Gebruiker niet gevonden!";
            }
        }
        
    }
    $query = "SELECT * FROM `groups` WHERE id=" . $_SESSION["group_id"]."";
    $result=$conn->query($query);
    if ( $result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
    if ($result->num_rows>0) {
        while($row=$result->fetch_assoc())
        {
            $groupname['name'] = $row;
            
        }
    }
}
    if (isset($_SESSION['user_id'])) {
        header('Location: group.php');
    } 
    $conn->close();
?>

<?php foreach($groupname as $row) :?>
    <h2> Je zit nu in de <?php echo $row['name'] ?> groep
    met de hudige wachtwoord  <?php echo $row['password'] ?>
    </h2>            
    <?php endforeach ?>

<a href="index.php">Terug</a>

    <form method="POST">
        username <input type="text" name="username" id="username" required>
        <br>
        password <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" name="submit" value="log in">
        <br>
    </form>
    Geen account? <a href="register.php">Registreer</a>
</body>
</html>