<?php
    include "connection.php";
    if(!isset($_SESSION['grouppassword'])) {
        header("Location: index.php");
    }
    if (isset($_POST['username']) && ($_POST['password'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $group_id = $_SESSION['group_id'];
        $query = "SELECT COUNT(id) as sumid FROM messages WHERE group_id = $group_id";
        $result=$conn->query($query);
        if ( $result === FALSE) {
            echo "error" . $query . "<br />" . $conn->error;
        } else {
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc())
                {
                    $sumid = $row['sumid'];
                }
            }
        }
        //uitvoeren kan niet omdat group_id niet in messages zit
        if ($sumid == 0):
            $user = "INSERT INTO `users` (username, password, group_id)
            VALUES ('$username', '$password', $group_id)";
                if ( $conn->query($user) === FALSE) {
                    echo "error" . $user . "<br />" . $conn->error;
                } else {
                    header("location: login.php");
                }
        else:
            echo "helaas groep al gestart";        
        endif;
    }
    $conn->close();
?>
<?php include "header.php"; ?>
<div class="loginstatus">
    <a href="login.php">Terug</a>
</div>
    <form action="" method="POST">
        username <input type="text" name="username" id="username" required>
        <br>
        password <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" name="submit" value="sign up">
        </form>
</body>
</html>