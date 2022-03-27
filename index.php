<?php
    include "connection.php";
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        $query = "SELECT * FROM `groups` WHERE password =  '$password'";
        $result=$conn->query($query);
        if ( $result === FALSE) {
            echo "error" . $query . "<br />" . $conn->error;
        } else {
            if ($result->num_rows>0) {
                while($row=$result->fetch_assoc())
                {
                    $_SESSION['group_id'] = $row['id'];
                    $_SESSION['grouppassword'] = $row['password'];
                }
            }
        }
        header("Location: login.php");
    }

?>

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
<form method="POST">
    <p>Voer je groepswachtwoord in</p>
    <input type="password" name="password" id="password">
    <input type="submit" class="btn" name="submit" value="send">
    <br>
    nog geen groep <a href="addgroup.php">klik hier</a>
</form>



<?php
    include "footer.php";
?>