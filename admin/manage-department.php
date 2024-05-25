<?php 
    require_once "include/header.php";
?>

<?php 
    require_once "../connection.php";

    // Fetch all departments
    $sql = "SELECT * FROM departments";
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
        <div class='text-center pb-2'><h4>Manage Departments</h4></div>
        <table style="width:100%" class="table-hover text-center  ">
            <tr class="bg-dark">
                <th>S.No.</th>
                <th>Department Id</th>
                <th>Name</th>
                <th>User Name</th>
                <th>Action</th>
            </tr>
            <?php 
            if( mysqli_num_rows($result) > 0){
                while( $rows = mysqli_fetch_assoc($result) ){
                    $id = $rows["id"];
                    $name = $rows["name"];
                    $user = $rows["user_name"]; // Fetch the user_name from the database
            ?>
            <tr>
                <td><?php echo "{$i}."; ?></td>
                <td><?php echo $id; ?></td>
                <td> <?php echo $name ; ?></td>
                <td> <?php echo $user ; ?></td> <!-- Display the user_name -->
                <td>
                    <?php 
                        $edit_icon = "<a href='edit-department.php?id={$id}' class='btn-sm btn-primary float-right ml-3'> <span><i class='fa fa-edit'></i></span> </a>";
                        $delete_icon = "<a href='delete-department.php?id={$id}' id='bin' class='btn-sm btn-primary float-right'> <span><i class='fa fa-trash'></i></span> </a>";
                        echo $edit_icon . $delete_icon;
                    ?>
                </td>
            </tr>
            <?php 
                $i++;
                }
            } else {
                echo "<script>
                $(document).ready(function(){
                    $('#showModal').modal('show');
                    $('#linkBtn').attr('href', 'add-department.php');
                    $('#linkBtn').text('Add Department');
                    $('#addMsg').text('No Departments Found!');
                    $('#closeBtn').text('Remind Me Later!');
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
