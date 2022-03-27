<?php
include "connection.php";
include "functions.php";
    if (isset($_POST['submit'])) {
        $message = $_POST['message'];
        $title = $_POST['title'];
        $about_user_id = $_POST['about_user_id'];
        $user_id = $_SESSION['user_id'];
        $group_id = $_SESSION['group_id'];
        $query = "INSERT INTO `messages` (message, title, about_user_id, group_id, user_id)
        VALUES('$message', '$title', '$about_user_id', '$group_id', '$user_id')"; 
        $result = $conn->query($query);
        if ( $result === FALSE) {
            echo "error <br />" . $query . "<br />" . $conn->error;
        } else {
            updateMessageTotal($about_user_id, $conn);
            header("Location: user.php?id=".$about_user_id);
        }
    }

    $query = "SELECT * FROM `users` WHERE username != '" . $_SESSION["username"] . "' AND group_id = ". $_SESSION['group_id'] . "   ORDER BY id DESC";
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

    $conn->close();
?>

<?php include "header.php"; ?>
<div class="message">
    <a href="group.php">Terug</a>
<div class="message">
<?php include "addmessage_form.php"; ?>

<?php include "footer.php"; ?>