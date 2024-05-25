<?php
require_once "../connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Update the status to 'cancelled'
    $sql = "UPDATE emp_resignations SET status = 'cancelled' WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: manage-resignation.php?cancel-success-id=" . $id);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: manage-resignation.php");
}
?>
