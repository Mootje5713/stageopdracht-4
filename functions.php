<?php 

function updateMessageTotal($about_user_id, $conn) {
    $query = "SELECT count(id) as total FROM messages WHERE about_user_id= $about_user_id
    AND group_id =" . $_SESSION['group_id'];
    $result=$conn->query($query);

    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
        return FALSE;
    } else {
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc())
            {
                $total = $row['total'];
            }
        }
    }
    if (!$total) $total = 0;

    $query = "UPDATE users SET total = $total WHERE id =" . $about_user_id;
    $result = $conn->query($query);
    if ( $result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
        return FALSE;
    } else {
        return true;
    }

}

?>