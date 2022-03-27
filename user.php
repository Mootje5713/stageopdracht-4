<?php
include "connection.php";
if (!isset($_GET['id'])) {
    header("Location: group.php");
}
$query = "SELECT * FROM `messages` WHERE about_user_id = ".$_GET['id']." ORDER BY id DESC";
$result = $conn->query($query);
if ($result === FALSE) {
    echo "error" . $query . "<br />" . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }
    }
}
$conn->close();
?>

<?php
include "header.php";
?>
<div class="message">
<a href="group.php">Terug</a>
</div>


<?php if (!isset($messages)): 
            echo "<h3>nog geen berichten</h3>"; 
    else:
        foreach($messages as $row):
            echo "<h1>" .  $row ['title'] . "</h1>"; 
            echo "<div>" . $row['message'] . "</div>";
            echo "<div>" . $row['timestamp'] . "</div>";
        endforeach; 
    endif; ?>

<?php include "addmessage_form.php"; ?>

<?php
include "footer.php";
?>