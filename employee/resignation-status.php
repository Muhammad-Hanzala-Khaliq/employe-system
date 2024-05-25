<?php 
require_once "include/header.php";
?>

<?php 
// Database connection
require_once "../connection.php";

// SQL query to fetch all resignation records
$sql = "SELECT * FROM emp_resignations";
$result = mysqli_query($conn, $sql);

$i = 1;
?>

<style>
table, th, td {
  border: 1px solid black;
  padding: 15px;
}
table {
  border-spacing: 10px;
}

      .additional-css{
 background-color: #EEF7FF !important;
    }
    

</style>

<div class="container additional-css shadow">
    <div class="py-4 mt-5"> 
        <h4 class="text-center pb-3">Resignation Status</h4>

        <?php
        // Check for accept and cancel success messages
        if (isset($_GET['accept-success-id'])) {
            echo "<div class='alert alert-success'>Resignation request with ID " . htmlspecialchars($_GET['accept-success-id']) . " has been accepted successfully.</div>";
        }
        if (isset($_GET['cancel-success-id'])) {
            echo "<div class='alert alert-success'>Resignation request with ID " . htmlspecialchars($_GET['cancel-success-id']) . " has been cancelled successfully.</div>";
        }
        ?>

        <table style="width:100%" class="table-hover text-center">
            <tr class="bg-dark">
                <th>S.No.</th>
                <th>Name</th>
                <th>Resignation Date</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php 
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    $name = $rows["name"];
                    $resign_date = $rows["resign_date"];
                    $reason = $rows["reason"];
                    $status = $rows["status"]; 
                    $id = $rows["id"];   
                    ?>
                    <tr>
                        <td><?php echo "$i."; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo date("jS F, Y", strtotime($resign_date)); ?></td>
                        <td><?php echo $reason; ?></td> 
                        <td><?php echo $status; ?></td> 
                        <td>
                            <?php 
                            $delete_icon = "<a href='delete-resignation.php?id={$id}' id='bin' class='btn-sm btn-primary'> <span><i class='fa fa-trash'></i></span> </a>";
                            echo $delete_icon;
                            ?> 
                        </td>
                    </tr>
                    <?php 
                    $i++;
                }
            } else {
                echo "<script>
                $(document).ready(function() {
                    $('#showModal').modal('show');
                    $('#addMsg').text('No resignation applied by you!!');
                    $('#linkBtn').attr('href', 'apply-resignation.php');
                    $('#linkBtn').text('Apply for Resignation');
                    $('#closeBtn').text('Remind me Later');
                });
                </script>";
            }
            ?>
        </table>
    </div>
</div>

<?php 
require_once "include/footer.php";
?>
