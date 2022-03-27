<?php
    include "connection.php";
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        $user_id = $_SESSION['user_id'];
        $message = "INSERT INTO `message` (message, user_id)
        VALUES('$message', '$user_id')";
        $result = $conn->query($message);
        if ( $result === FALSE) {
            echo "error" . $message . "<br />" . $conn->error;
        } 
    }

    $query = "SELECT * FROM `users` WHERE group_id = " . $_SESSION["group_id"] . "  AND username != '" . $_SESSION["username"] . "' ORDER BY id DESC";
    $result=$conn->query($query);
    if ( $result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc())
            {
                $users[] = $row;
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
                $groupname = $row['name'];
                
            }
        }
    }

    $conn->close();
?>

<?php
    include "header.php";
?>

<div class="message">
    <a href="addmessage.php">Voeg een bericht toe</a>
    <?php echo "<h1>$groupname</h1>"; ?>
    <h1>Je bent nu ingelogd als <?php echo $_SESSION['username']; ?>
    </h1>
</div>

<?php if (!isset($users)): 
    echo "<h3>Nog geen gebruikers!!</h3>";    
        else: 
?>

<?php foreach($users as $row): ?>
    <ul>
        <li>
            <a href="user.php?id=<?php echo $row['id'] ?>">
            <?php echo $row['username']?> - <?php echo $row['total']?>
            </a>
        </li>
    </ul>
<?php endforeach ?>
<?php endif; ?>

<?php
    include "footer.php";
?>