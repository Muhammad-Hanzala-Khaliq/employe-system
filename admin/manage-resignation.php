<?php 
require_once "include/header.php";
?>

<?php 
// Database connection
require_once "../connection.php";

$sql = "SELECT * FROM emp_resignations WHERE status = 'pending'";
$result = mysqli_query($conn , $sql);

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
        <h4 class="text-center pb-3">Resignation Requests</h4>
        <table style="width:100%" class="table-hover text-center">
            <tr class="bg-dark">
                <th>S.No.</th>
                <th>Employee Name</th>
                <th>Resignation Date</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php 
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    $name = $rows["name"];  // Using 'name' instead of 'email'
                    $resign_date = $rows["resign_date"];
                    $reason = $rows["reason"];
                    $status = $rows["status"];   
                    $id = $rows["id"]; 
                    ?>
                    <tr>
                        <td><?php echo "$i."; ?></td>
                        <td><?php echo $name; ?></td> <!-- Displaying the employee's name -->
                        <td><?php echo date("jS F, Y", strtotime($resign_date)); ?></td>
                        <td><?php echo $reason; ?></td>
                        <td><?php echo $status; ?></td> 
                        <td><?php 
                            echo "<a href='accept-resignation.php?id={$id}' class='btn btn-sm btn-outline-primary mr-2'>Accept</a>";
                            echo "<a href='cancel-resignation.php?id={$id}' class='btn btn-sm btn-outline-danger'>Cancel</a>"; 
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
                    $('#linkBtn').hide();
                    $('#addMsg').text('No Resignation Requests Found');
                    $('#closeBtn').text('Ok, Understood');
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
