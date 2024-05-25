<?php 
    require_once "include/header.php";
?>

<?php 
    // Database connection
    require_once "../connection.php";

    // Fetch all departments
    $sql = "SELECT * FROM departments";
    $result = mysqli_query($conn, $sql);

    $i = 1;
?>

<style>
    table,
    th,
    td {
        border: 1px solid black;
        padding: 15px;
    }

    table {
        border-spacing: 10px;
    }
</style>

<div class="container bg-white shadow">
    <div class="py-4 mt-5">
        <h4 class="text-center pb-3">All Departments</h4>
        <table style="width:100%" class="table-hover text-center ">
            <tr class="bg-dark">
                <th>S.No.</th>
                <th>Department Id</th>
                <th>Name</th>
            </tr>
            <?php 
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"];
                        $name = $row["name"];
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
            </tr>
            <?php 
                    $i++;
                    }
                } else {
                    echo "<tr><td colspan='3'>No departments found</td></tr>";
                }
            ?>
        </table>
    </div>
</div>

<?php 
    require_once "include/footer.php";
?>
