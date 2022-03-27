<?php
    include "connection.php";
    if (isset($_POST['name']) && ($_POST['password'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $user = "INSERT INTO `groups` (name, password)
        VALUES ('$name', '$password')";
        if ( $conn->query($user) === FALSE) {
            echo "error" . $user . "<br />" . $conn->error;
        } else {
            header("location: login.php");
        }
    }
    $query = "SELECT * FROM `groups`";
    $result=$conn->query($query);
    if ( $result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc())
            {
                $groups[] = $row;
            }
        }
    }
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>grouphouz</h1>
    <a href="login.php">terug</a>
    <form action="" method="POST">
        groupname <input type="text" name="name" id="name" required>
        <br>
        password <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" name="submit" value="sign up">
        </form>
</body>
</html>