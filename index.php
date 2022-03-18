<?php
    include "connection.php";
    if (isset($_GET['bericht'])) {
        $bericht = $_GET['bericht'];
        $user_id = $_SESSION['user_id'];
        $bericht = "INSERT INTO `message` (bericht, user_id)
        VALUES('$bericht', '$user_id')";
        $result = $conn->query($bericht);
        if ( $result === FALSE) {
            echo "error" . $bericht . "<br />" . $conn->error;
        } 
    }

    $query = "SELECT * FROM `message` WHERE user_id='".$_SESSION["user_id"]."' ORDER BY id DESC";
    $result=$conn->query($query);
    if ( $result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc())
            {
                $bericht[] = $row;
            }
        }
    }
    $conn->close();
?>

<?php
    include "header.php";
?>

<div class="bericht">
    <a href="addmessage.php">Voeg een bericht toe</a>
    <h1>bericht</h1>
</div>

<?php if (!isset($bericht)): 
    echo "<h3>Je hebt nog geen categorieen toegevoegd!!</h3>";  
    else:
?>
<?php endif; ?>

<?php foreach($bericht as $row): ?>
    <ul>
        <li>
            <a href="bericht.php?id=<?php echo $row['id'] ?>">
            <h2><?php echo $row['bericht']?></a></h2>
        </li>
    </ul>
<?php endforeach ?>

<?php
    include "footer.php";
?>