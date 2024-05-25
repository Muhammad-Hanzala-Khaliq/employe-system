<?php
require_once "include/header.php";
?>

<?php 

$nameErr = $resignReasonErr = $resignDateErr = "";
$name = $resignReason = $resignDate = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if (empty($_REQUEST["name"])) {
        $nameErr = "<p style='color:red'>* Name is Required</p>";    
    } else {
        $name = $_REQUEST["name"];
    }

    if (empty($_REQUEST["resignReason"])) {
        $resignReasonErr = "<p style='color:red'>* Reason is Required</p>";    
    } else {
        $resignReason = $_REQUEST["resignReason"];
    }

    if (empty($_REQUEST["resignDate"])) {
        $resignDateErr = "<p style='color:red'>* Resignation Date is Required</p>";    
    } else {
        $resignDate = $_REQUEST["resignDate"];
    }

    if (!empty($name) && !empty($resignReason) && !empty($resignDate)) {
          
        // Database connection 
        require_once "../connection.php";

        $sql = "INSERT INTO emp_resignations (name, reason, resign_date, status) VALUES ('$name', '$resignReason', '$resignDate', 'pending')";
        $result = mysqli_query($conn , $sql);
        if ($result) {
            $name = $resignReason = $resignDate = "";
            echo "<script>
            $(document).ready(function() {
                $('#showModal').modal('show');
                $('#addMsg').text('Resignation Applied, Please Wait until it is approved!!');
                $('#linkBtn').attr('href', 'resignation-status.php');
                $('#linkBtn').text('Check Resignation Status');
                $('#closeBtn').text('Apply Another');
            });
            </script>
            ";
        }
    }
}
?>
  <style> 
     
     .additional-css{
 background-color: #EEF7FF !important;
    }
    .additional-2{
        background-color: #CDE8E5 !important;

    }
    </style>

<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6 pt-5">
                <div class="form-input-content">
                    <div class="card login-form mb-0 additional-css">
                        <div class="card-body pt-5 shadow ">
                          
                            <h4 class="text-center">Apply For Resignation</h4>
                            <form method="POST" action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                
                                <div class="form-group">
                                    <label>Name :</label>
                                    <input type="text" class="form-control additional-css" value="<?php echo $name; ?>" name="name">  
                                    <?php echo $nameErr; ?>           
                                </div>

                                <div class="form-group">
                                    <label>Reason :</label>
                                    <input type="text" class="form-control additional-css" value="<?php echo $resignReason; ?>" name="resignReason">  
                                    <?php echo $resignReasonErr; ?>           
                                </div>

                                <div class="form-group">
                                    <label>Resignation Date :</label>
                                    <input type="date" class="form-control additional-css" value="<?php echo $resignDate; ?>" name="resignDate">
                                    <?php echo $resignDateErr; ?>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Apply Now" class="btn btn-primary btn-lg w-100" name="signin">
                                </div>
                            </form>
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
