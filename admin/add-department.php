<?php 
require_once "include/header.php";
?>

<?php  
$nameErr = $userErr = "";
$name = $user = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_REQUEST["name"])) {
        $nameErr = "<p style='color:red'> * Department Name is required</p>";
    } else {
        $name = $_REQUEST["name"];
    }

    if (empty($_REQUEST["user"])) {
        $userErr = "<p style='color:red'> * User Name is required</p>";
    } else {
        $user = $_REQUEST["user"];
    }

    if (!empty($name) && !empty($user)) {
        // Database connection
        require_once "../connection.php";

        $sql_select_query = "SELECT name FROM departments WHERE name = '$name'";
        $r = mysqli_query($conn, $sql_select_query);

        if (mysqli_num_rows($r) > 0) {
            $nameErr = "<p style='color:red'> * Department Already Exists</p>";
        } else {
            $sql = "INSERT INTO departments (name, user_name) VALUES ('$name', '$user')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $name = $user = "";
                echo "<script>
                $(document).ready(function(){
                    $('#showModal').modal('show');
                    $('#modalHead').hide();
                    $('#linkBtn').attr('href', 'manage-department.php');
                    $('#linkBtn').text('View Departments');
                    $('#addMsg').text('Department Added Successfully!');
                    $('#closeBtn').text('Add More?');
                });
                </script>";
            } else {
                echo "<p style='color:red'> * Error in adding department. Please try again.</p>";
            }
        }
    }
}
?>
<style>
    .additional-css{
    background-color: #EEF7FF !important;
}
</style>
<div style=""> 
<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0 additional-css">
                        <div class="card-body pt-4 shadow">                       
                            <h4 class="text-center ">Add New Department</h4>
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                <div class="form-group">
                                    <label>Department Name:</label>
                                    <input type="text" class="form-control additional-css" value="<?php echo $name; ?>" name="name">
                                    <?php echo $nameErr; ?>
                                </div>
                                <div class="form-group">
                                    <label>User Name:</label>
                                    <input type="text" class="form-control additional-css" value="<?php echo $user; ?>" name="user">
                                    <?php echo $userErr; ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php 
require_once "include/footer.php";
?>


