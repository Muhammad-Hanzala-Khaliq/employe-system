<?php
require_once "../connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Update the status to 'accepted'
    $sql = "UPDATE emp_resignations SET status = 'accepted' WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: manage-resignation.php?accept-success-id=" . $id);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: manage-resignation.php");
}
?>
