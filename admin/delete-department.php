<?php 
require_once "../connection.php";

// Check if department ID is provided via GET request
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    // Prepare DELETE query
    $sql = "DELETE FROM departments WHERE id =$id";

    // Execute query
    if(mysqli_query($conn, $sql)) {
        // Redirect to manage-departments.php with success message
        header("Location: manage-department.php?delete-success-where-id=" . $id);
        exit(); // Stop further execution
    } else {
        // If deletion fails, display error message
        echo "Error deleting department: " . mysqli_error($conn);
    }
} else {
    // If department ID is not provided, display error message
    echo "Department ID not provided.";
}
?>

