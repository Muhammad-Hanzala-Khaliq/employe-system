<?php 
require_once "../connection.php";

// Check if department ID is provided via GET request
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch department details from the database
    $sql = "SELECT * FROM departments WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $department = mysqli_fetch_assoc($result);
        $department_name = $department['name'];
    } else {
        // If department with provided ID doesn't exist, redirect to manage-departments.php
        header("Location: manage-department.php");
        exit(); // Stop further execution
    }
} else {
    // If department ID is not provided, redirect to manage-departments.php
    header("Location: manage-department.php");
    exit(); // Stop further execution
}

// Define variables to hold errors
$department_nameErr = "";

// Define variables to hold form data
$department_name = "";

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate department name
    if(empty($_POST["department_name"])) {
        $department_nameErr = "<p style='color:red'> * Department name is required</p>";
    } else {
        $department_name = $_POST["department_name"];
    }

    // If all inputs are valid, update department details
    if(empty($department_nameErr)) {
        $sql = "UPDATE departments SET name = '$department_name' WHERE id = $id";
        if(mysqli_query($conn, $sql)) {
            // Redirect to manage-departments.php with success message
            header("Location: manage-department.php?edit-success-where-id=" . $id);
            exit(); // Stop further execution
        } else {
            // If update fails, display error message
            echo "Error updating department: " . mysqli_error($conn);
        }
    }
}
?>

<?php require_once "include/header.php"; ?>

<div class="container bg-white shadow">
    <div class="py-4 mt-5"> 
        <h4 class="text-center pb-3">Edit Department Profile</h4>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?id=<?php echo $id; ?>">
            <div class="form-group">
                <label>Department Name:</label>
                <input type="text" class="form-control" value="<?php echo $department_name; ?>" name="department_name">
                <?php echo $department_nameErr; ?>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

<?php require_once "include/footer.php"; ?>
