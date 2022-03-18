<?php
include "connection.php";
    if (isset($_POST['submit'])) {
        $bericht = $_POST['bericht'];
        $user_id = $_SESSION['user_id'];
        $query = "INSERT INTO `message` (bericht, user_id)
        VALUES('$bericht', '$user_id')"; 
        $result = $conn->query($query);
        if ( $result === FALSE) {
            echo "error <br />" . $query . "<br />" . $conn->error;
        } else {
            header("Location: index.php");
        }
    }
?>

<?php include "header.php"; ?>
<div class="category">
<a href="index.php">Terug</a>
</div>
<form method="POST">
    <textarea id="bericht" name="bericht" rows="4" cols="50" maxlength="255" required></textarea>
    <button type="submit" class="btn"  name="submit"> Voeg een bericht toe toe </button>
</form>
<?php include "footer.php"; ?>