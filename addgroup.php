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
<?php include "header.php" ?>
    <div class="addgroup">
    <a href="login.php">Terug</a>
    </div>
    <form action="" method="POST">
        groupname <input type="text" name="name" id="name" required>
        <br>
        password <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" name="submit" value="sign up">
        </form>
</body>
</html>