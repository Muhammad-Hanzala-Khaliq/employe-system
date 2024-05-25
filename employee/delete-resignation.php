<?php 

// Database connection
require_once "../connection.php";

// Get the ID from the URL
$id = $_GET["id"];

// SQL query to delete the resignation record with the given ID
$sql = "DELETE FROM emp_resignations WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

// Check if the deletion was successful and redirect accordingly
if ($result) {
    header("Location: resignation-status.php?delete-success-id=" . $id);
} else {
    // Optional: Handle the error if the deletion fails
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
